<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <h1><img alt="commerce" src="../../../assets/images/payment.png" /> Authorizations</h1>
                    <div class="alert alert-info text-left">
                        <b-icon icon="exclamation-circle-fill" variant="info" font-scale="1.5" style="vertical-align: middle" /> <b>Transactions :</b> Display all Authorizations.
                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Costumor</th>
                              <th>Currency code</th>
                              <th>Amount</th>
                              <th>Date</th>
                              <th>Expiration date</th>
                              <th>Capture date</th>
                              <th>Payment Method</th>
                              <th>status</th>
                              <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="loading">
                                <td colspan="10">
                                    <b-spinner variant="danger" style="width: 3rem; height: 3rem;" /><br />
                                    please wait
                                </td>
                            </tr>
                            <template v-else>
                            <tr v-if="errored">
                                <td colspan="10">
                                    <b style="color:#CC0000">{{ error.title }}</b>
                                    <div class="text-left">
                                        {{ error.detail }}
                                    </div>
                                </td>
                            </tr>
                            <template v-else>
                                <template v-for="(authorization, index) in datas.datas">
                                    <tr :key="index + '-' + authorization.authorization_id" :style="(index%2 == 0 ? 'background:#EDEDED' : '')">
                                        <td>{{ authorization.authorization_id }}</td>
                                        <td>{{ authorization.payment_transaction.costumorid }}</td>
                                        <td>{{ authorization.payment_transaction.currencycode }}</td>
                                        <td class="font-weight-bold" style="color:green">+ {{ (Number(authorization.payment_transaction.amount) + Number(authorization.payment_transaction.tax_total) + 10).toFixed(2) }}</td>
                                        <td class="text-muted">{{ authorization.createtime }}</td>
                                        <td class="text-muted">{{ authorization.expiration_date }}</td>
                                        <td class="text-muted">
                                            {{ authorization.status == 1 ? authorization.capture_date : '-' }}
                                        </td>
                                        <td>{{ authorization.payment.title }}</td>
                                        <td>{{ authorization.status == 0 ? 'NOT CAPTURED' : 'CAPTURED' }}</td>
                                        <td>
                                            <b-button
                                                variant="success"
                                                v-b-tooltip.hover
                                                class="btn text-white px-0"
                                                type="button"
                                                title="Capture"
                                                @click="makeAuthorization(authorization)"
                                                :disabled="authorization.status == 1"
                                                style="width: 42px; background: #556B2F">
                                                <i class="fas fa-money-check"></i>
                                            </b-button>
                                        </td>
                                    </tr>
                                    <tr :key="index + '-' + authorization.authorization_id + '-makeAuth'">
                                        <td colspan="10" class="p-0 m-0">
                                            <b-collapse :id="authorization.authorization_id" accordion="my-accordion" role="tabpanel">
                                                <div v-if="captureLoading" class="p-3">
                                                    <b-spinner variant="danger" style="width: 3rem; height: 3rem;" /><br />
                                                    please wait
                                                </div>
                                                <templat v-else>
                                                    <div class="alert alert-danger text-left my-2" v-if="captureError">
                                                        <div class="mb-2"><i class="fas fa-exclamation-triangle"></i> <b>{{ authorizationErrorObj.title }}</b></div>
                                                        <div v-html="authorizationErrorObj.detail"></div>
                                                    </div>
                                                </templat>
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
import axios from "axios";
import AdminSideBar from "@/components/AdminSideBar.vue";
export default {
  name: "Authorizations",
  components: {
    AdminSideBar,
  },
  data() {
    return {
      loading: true,
      errored: false,
      captureLoading: false,
      captureError: false,
      authorizationErrorObj: {
          title: '',
          detail: ''
      },
      error: {},
      datas: {}
    };
  },
  mounted(){
      axios.get(this.paymentService + 'payments/authorizations/getAll')
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
        reload: function() {
        var location = this.$route.fullPath;
        this.$router.replace("/");
        this.$nextTick(() => this.$router.replace(location));
        },
        makeAuthorization(authorization){
            this.captureLoading = true;
            this.captureError = false;

            this.$root.$emit('bv::toggle::collapse', authorization.authorization_id);
            if(authorization.status == 0){
                if(authorization.payment.paymentid == 1){ // paypal authorization
                    const params = new URLSearchParams();
                    params.append('authorizationid', authorization.authorization_id);
                    params.append('paypal_transaction', authorization.payment_transaction.paymenttransaction);
                    axios.post(this.paymentService + "payments/authorizations/capturePaypalAuth",params)
                    .then(response => {
                        var result = response.data;
                        if(result.status == "captured"){ // success
                            this.reload();
                        }
                        else if(result.status == 500){
                            this.captureError = true;
                            if(result.title){
                                if(result.source.pointer.search("paypal") > -1){
                                    var errorObjResponse = JSON.parse(result.title);
                                    if(errorObjResponse.error){
                                        this.authorizationErrorObj.title = "Paypal : " + errorObjResponse.error;
                                        this.authorizationErrorObj.detail = errorObjResponse.error_description;
                                    }else{
                                        this.authorizationErrorObj.title = "Paypal : " + errorObjResponse.name;
                                        var diplayLinks = '';
                                        var diplayDetails = '';
                                        errorObjResponse.details.forEach(function(item){
                                            diplayDetails += '<li><b>'+item.issue+' :</b>' + item.description + '</li>';
                                        });
                                        errorObjResponse.links.forEach(function(item){
                                            diplayLinks += '<li><a href="'+item.href+'" class="text-primary" target="_blank">'+item.rel+'</a></li>';
                                        });
                                        this.authorizationErrorObj.detail = errorObjResponse.message + '<ul>'+diplayDetails+'</ul> Links : <ul>'+diplayLinks+'</ul>';
                                    }
                                }else{
                                    this.authorizationErrorObj.title = result.title;
                                }
                            }else{
                                this.authorizationErrorObj.title = "unkonwn error";
                                this.authorizationErrorObj.detail = "";
                            }
                        }
                    })
                    .catch(error => {
                        this.captureError = true;
                        if(error.response){
                            this.authorizationErrorObj = error.response.data;
                        }else{
                            this.authorizationErrorObj.title = error;
                            this.authorizationErrorObj.detail = '';
                        }
                    })
                    .finally(() => {
                        this.captureLoading = false;
                    });
                }
            }
        }
    }
}
</script>
