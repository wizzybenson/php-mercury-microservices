<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <h1><img alt="commerce" src="../../../assets/images/payment.png" /> Refunds</h1>
                    <div class="alert alert-info text-left">
                        <b-icon icon="exclamation-circle-fill" variant="info" font-scale="1.5" style="vertical-align: middle" /> <b>Transactions :</b> Display all transactions.
                    </div>
                    <table class="table text-center table-striped">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Costumor</th>
                              <th>Currency code</th>
                              <th>Amount</th>
                              <th>type</th>
                              <th>date</th>
                              <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="loading">
                                <td colspan="7">
                                    <b-spinner variant="danger" style="width: 3rem; height: 3rem;" /><br />
                                    please wait
                                </td>
                            </tr>
                            <template v-else>
                            <tr v-if="errored">
                                <td colspan="11">
                                    <b style="color:#CC0000">{{ error.title }}</b>
                                    <div class="text-left">
                                        {{ error.detail }}
                                    </div>
                                </td>
                            </tr>
                            <template v-else>
                                <tr v-for="(refund, index) in datas.datas" :key="index + '-' + refund.refundid">
                                    <td>{{ refund.refundid }}</td>
                                    <td>{{ refund.payment_transaction.costumorid }}</td>
                                    <td>{{ refund.currencycode }}</td>
                                    <td class="font-weight-bold" style="color:#CC0000">- {{ refund.amount }}</td>
                                    <td>{{ refund.type == 1 ? 'Partial' : 'Total' }}</td>
                                    <td class="text-muted">{{ refund.createtime }}</td>
                                    <td>&nbsp;</td>
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
  name: "Refunds",
  components: {
    AdminSideBar,
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
      axios.get(this.paymentService + 'payments/refunds/getAll')
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
}
</script>
