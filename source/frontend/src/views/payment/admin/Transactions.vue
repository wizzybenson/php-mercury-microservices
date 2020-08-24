<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <h1><img alt="commerce" src="../../../assets/images/payment.png" /> Transactions</h1>
                    <div class="alert alert-info text-left">
                        <b-icon icon="exclamation-circle-fill" variant="info" font-scale="1.5" style="vertical-align: middle" /> <b>Transactions :</b> Display all transactions.
                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Costumor</th>
                              <th>Method</th>
                              <th>Status</th>
                              <th>Currency code</th>
                              <th>Amount</th>
                              <th>Tax</th>
                              <th>Shipping amount</th>
                              <th>Total Refunds</th>
                              <th>Total</th>
                              <th>Transaction code</th>
                              <th>Date</th>
                              <th>Payment Method</th>
                              <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="loading">
                                <td colspan="14">
                                    <b-spinner variant="danger" style="width: 3rem; height: 3rem;" /><br />
                                    please wait
                                </td>
                            </tr>
                            <template v-else>
                            <tr v-if="errored">
                                <td colspan="14">
                                    <b style="color:#CC0000">{{ error.title }}</b>
                                    <div class="text-left">
                                        {{ error.detail }}
                                    </div>
                                </td>
                            </tr>
                            <template v-else>
                                <template v-for="(transaction, index) in datas.datas">
                                  <tr :key="index + '-' + transaction.transactionid + '-transaction'" :style="(index%2 == 0 ? 'background:#EDEDED' : '')">
                                    <td>{{ transaction.transactionid }}</td>
                                    <td>{{ transaction.costumorid }}</td>
                                    <td>{{ transaction.transactionmethod == 1 ? 'CAPTURE' : 'AUTHORIZE'}}</td>
                                    <td>{{ transaction.payment_status }}</td>
                                    <td>{{ transaction.currencycode }}</td>
                                    <td>{{ transaction.amount }}</td>
                                    <td>{{ transaction.tax_total }}</td>
                                    <td>{{ transaction.shipping.amount }}</td>
                                    <td>
                                      <template v-if="refunds.loadings[index]">
                                        <b-spinner variant="primary" label="Spinning" class="m-0 p-0"></b-spinner>
                                      </template>
                                      <template v-else>
                                        <span v-if="refunds.amounts[index] > 0" style="font-weight: bold; color: #CC0000">-{{ refunds.amounts[index] }}</span>
                                        <span v-else>{{refunds.amounts[index]}}</span>
                                      </template>
                                    </td>
                                    <td>
                                      <!--+{{ (Number(transaction.tax_total)+Number(transaction.amount)+Number(transaction.shipping.amount)).toFixed(2) }}-->
                                      <template v-if="totals.loadings[index]">
                                        <b-spinner variant="primary" label="Spinning" class="m-0 p-0"></b-spinner>
                                      </template>
                                      <template v-else>
                                        <span v-if="totals.amounts[index] > 0" class="text-nowrap" style="font-weight: bold; color:green">+{{ totals.amounts[index] }}</span>
                                        <span v-else>{{totals.amounts[index]}}</span>
                                      </template>
                                    </td>
                                    <td>{{ transaction.transactioncode }}</td>
                                    <td class="text-muted">{{ transaction.transactiondate }}</td>
                                    <td>{{ transaction.payment.title }}</td>
                                    <td class="text-nowrap">
                                      <b-button
                                        variant="secondary"
                                        v-b-tooltip.hover
                                        class="btn text-white px-0"
                                        type="button"
                                        title="Refund"
                                        @click="changeRefund(transaction.transactionid)"
                                        style="width: 42px">
                                        <i class="fas fa-money-check"></i>
                                      </b-button> &nbsp;
                                      <b-button
                                        v-b-modal="transaction.transactionid"
                                        variant="info"
                                        v-b-tooltip.hover
                                        class="btn text-white"
                                        type="button"
                                        title="show details"
                                        style="background-color: #5F9EA0; width: 42px">
                                        <i class="far fa-eye"></i>
                                      </b-button>
                                      <b-modal :id="transaction.transactionid" size="lg" scrollable title="Payment Details">
                                        <component :is="paymentsDetails[transaction.payment.paymentid]" :transaction="transaction" />
                                      </b-modal>
                                    </td>
                                  </tr>
                                  <tr :key="index + '-' + transaction.transactionid + '-' + '2'" class="p-0 m-0">
                                    <td colspan="11" class="p-0 m-0">
                                      <b-collapse :id="transaction.transactionid" accordion="my-accordion" role="tabpanel">
                                        <b-card-body v-if="refundComponentSelected == transaction.transactionid">
                                          <component :is="refundComponents[transaction.payment.paymentid]" :transactionId="Number(transaction.transactionid)" :totalRefund="Number(refunds.amounts[index])" :paymentTransaction="Number(transaction.paymenttransaction)"></component> 
                                        </b-card-body>
                                      </b-collapse>
                                    </td>
                                  </tr>
                                </template>
                            </template>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";
import AdminSideBar from "@/components/AdminSideBar.vue";
import LoadComponent from "@/components/LoadComponent.vue";
import ErrorLoadComponent from "@/components/ErrorLoadComponent.vue";

const PaypalRefund = () => ({
  component: import("@/components/payment/admin/PaypalRefund.vue"),
  loading: LoadComponent,
  error: ErrorLoadComponent,
  //timeout: 3000
});
const GiftCardRefund = () => ({
  component: import("@/components/payment/admin/GiftCardRefund.vue"),
  loading: LoadComponent,
  error: ErrorLoadComponent,
  //timeout: 3000
});

export default {
  name: "Transactions",
  components: {
    AdminSideBar,
    GiftCardDetails: () => import("@/components/payment/admin/GiftCardDetails.vue"),
    PaypalDetails: () => import("@/components/payment/admin/PaypalDetails.vue"),
    PaypalRefund,
    GiftCardRefund
  },
  data() {
    return {
      loading: true,
      errored: false,
      refundComponentSelected: 0,
      refunds: {
        loadings: [],
        amounts: [],
        isTotals: []
      },
      totals: {
        loadings: [],
        amounts: []
      },
      error: {},
      datas: {},
      refundComponents:['', 'PaypalRefund', 'GiftCardRefund'],
      paymentsDetails:['', 'PaypalDetails', 'GiftCardDetails']
    };
  },
  mounted(){
    var getAll = async() => {
      return axios.get(this.paymentService + 'payments/costumorpayments/getAll');
    };
    var getRefunds = async(transactionId) => {
      return axios.get(this.paymentService + 'payments/costumorpayments/get_refunds/' + transactionId);
    }; 
    (async () => {
      await getAll().then(response =>{
          this.datas = response.data;
          var lines = this.datas.datas.length;
          for(var i=0; i<lines; i++){
            Vue.set(this.refunds.loadings, i, true);
            Vue.set(this.refunds.amounts, i, 0);
            Vue.set(this.refunds.isTotals, i, false);

            Vue.set(this.totals.loadings, i, true);
            Vue.set(this.totals.amounts, i, 0);
          }
      }).catch(e => {
        this.errored = true;
        if(e.response){
            self.error = e.response.data;
        }else{
            this.error.title = e;
            this.error.detail = '';
        }
      }).finally(() => {
        this.loading = false;
      });
      var lines = this.datas.datas.length;
      for(var i=0; i<lines; i++){
        await getRefunds(this.datas.datas[i].transactionid).then(response =>{
          var theRefunds = response.data;
          var amount = 0;
          var isTotalRefund = false;
          for(var j=0; j < theRefunds.count; j++){
            amount = amount + Number(theRefunds.datas[j].amount);
            if(theRefunds.datas[j].type == 0){
              isTotalRefund = true;
            }
          }
          var tax_total = this.datas.datas[i].tax_total;
          var amountvalue = this.datas.datas[i].amount;
          var shipping = this.datas.datas[i].shipping.amount;
          var totale = (Number(tax_total) + Number(amountvalue) + Number(shipping) - Number(amount)).toFixed(2);

          Vue.set(this.refunds.loadings, i, false);
          Vue.set(this.totals.loadings, i, false);
          Vue.set(this.refunds.amounts, i, Number(amount).toFixed(2));
          Vue.set(this.totals.amounts, i, Number(totale).toFixed(2));
          Vue.set(this.refunds.isTotals, i, isTotalRefund);
        });
      }
    })();

      
  },
  methods: {
    changeRefund(transactionid){
      this.refundComponentSelected = transactionid;
      this.$root.$emit('bv::toggle::collapse', transactionid);
    }
  }
};
</script>
