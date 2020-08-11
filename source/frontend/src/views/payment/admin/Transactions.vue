<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <h1><img alt="commerce" src="../../../assets/images/payment.png" /> Transaction</h1>
                    <div class="alert alert-info text-left">
                        <b-icon icon="exclamation-circle-fill" variant="info" font-scale="1.5" style="vertical-align: middle" /> <b>Transactions :</b> Display all transactions.
                    </div>
                    <table class="table text-center table-striped">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>CustumorID</th>
                              <th>Amount ($)</th>
                              <th>Transaction code</th>
                              <th>Date</th>
                              <th>Payment Method</th>
                              <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="loading">
                                <td colspan="7">
                                    <img src="../../../assets/images/5.gif" style="width: 16px; height: 16px" />
                                    Loading...
                                </td>
                            </tr>
                            <template v-else>
                            <tr v-if="errored">
                                <td colspan="5">
                                    <b style="color:#CC0000">{{ error.title }}</b>
                                    <div class="text-left">
                                        {{ error.detail }}
                                    </div>
                                </td>
                            </tr>
                            <template v-else>
                                <tr v-for="(transaction, index) in datas.datas" :key="index + '-' + transaction.transactionid">
                                  <td>{{ transaction.transactionid }}</td>
                                  <td>{{ transaction.costumorid }}</td>
                                  <td>{{ transaction.amount }}</td>
                                  <td><i>{{ transaction.transactioncode }}</i></td>
                                  <td class="text-muted">{{ transaction.transactiondate }}</td>
                                  <td>{{ transaction.payment.title }}</td>
                                  <td>
                                  <b-button
                                            v-b-tooltip.hover
                                            class="btn text-white"
                                            type="button"
                                            title="show details"
                                            style="background-color: #5F9EA0; width: 42px">
                                            <i class="far fa-eye"></i>
                                          </b-button>
                                  </td>
                                </tr>
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
import axios from "axios";
import AdminSideBar from "@/components/AdminSideBar.vue";
export default {
  name: "Transactions",
  components: {
    AdminSideBar
  },
  data() {
    return {
      loading: true,
      errored: false,
      error: {},
      datas: {}
    };
  },
  mounted(){
      axios.get(this.paymentService + 'payments/costumorpayments/getAll')
      .then(response =>{
          this.datas = response.data;
      })
      .catch(e => {
        this.errored = true;
        if(e.response){
            this.error = e.response.data;
        }else{
            this.error.title = e;
            this.error.detail = '';
        }
      })
      .finally(() => {
        this.loading = false;
      });
  },
  methods: {
    getPaymentName(id){
      var title = "t";
      axios.get(this.paymentService + 'payments/payments/getPayment/' + id)
      .then(response =>{
          title = response.data.data.title;
          console.log(title);
      })
      .catch(e => {
        console.log(e);
      })
      .finally(() => {
      });
      return title;
    }
  }
};
</script>
