<template>
  <div class="container my-3" v-if="visible">
    <div class="row">
      <div class="col" v-if="errored">
            <div class="alert alert-danger text-left my-2">
                <div class="mb-2"><i class="fas fa-exclamation-triangle"></i> <b>{{ errorObj.title }}</b></div>
                <div v-html="errorObj.detail"></div>
            </div>
      </div>
      <div class="col text-center" v-else>
          <div>
            <b-card no-body class="mb-1">
              <b-card-header  class="p-1">
                <h3>Payment by Paypal</h3>
              </b-card-header>
                <b-card-body>
                  <div class="container">
                      <div class="row mb-2" v-if="loading">
                        <div class="col">
                          <img
                        src="../../../assets/images/loading.gif"
                        style="width: 100px; height: 100px"
                        /> <br />
                          loading  ...
                        </div>
                      </div>
                      <template v-else>
                        <template v-if="inserted == false">
                          <div class="alert alert-danger text-left my-2">
                              <div class="mb-2"><i class="fas fa-exclamation-triangle"></i> <b>Transaction was not inserted!</b></div>
                              <div>An error is happened and the transaction is not inserted !</div>
                          </div>
                        </template>
                        <template v-else>
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Amount : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.amountvalue }} {{ theData.currencycode }}
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  date : 
                              </div>
                              <div class="col-6 text-left text-muted">
                                  {{ theData.createtime }}
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Transaction method : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.transaction_method }}
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Payment status : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.payment_status }}
                              </div>
                          </div>
                          <hr class="mb-0" />
                          <div class="row">
                              <div class="col my-2 text-center font-weight-bold">
                                  Paypal payer
                              </div>
                          </div>
                          <hr class="mt-0" />
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Payer full name : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.payerfullname }}
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Payer paypal email : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.payer_email_address }}
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Payer paypal id : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.payer_id }}
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Payer paypal country : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.payer_country_code }}
                              </div>
                          </div>
                          <hr class="mb-0" />
                          <div class="row">
                              <div class="col my-2 text-center font-weight-bold">
                                  Shipping informations
                              </div>
                          </div>
                          <hr class="mt-0" />
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Shipping full name : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.shippingname }}
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-right">
                                  Shipping adress : 
                              </div>
                              <div class="col-6 text-left">
                                  {{ theData.shippingadress }}
                              </div>
                          </div>
                        </template>
                      </template>
                  </div>
                </b-card-body>
            </b-card>
          </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "paymentPaypal",
  data() {
    return {
        loading: true,
        visible: true,
        errored: false,
        inserted: false,
        errorObj:{},
        theData: {}
    }
  },
  mounted(){
    if(this.$route.query.token == '' || this.$route.query.token == null){
      this.visible = false;
    }
    axios.get(this.paymentService + 'payments/costumorpayments/getPaypalPayment/' + this.$route.query.token)
      .then(response => {
        this.theData = response.data;
        console.log(this.theData);
          if(this.theData.status == "inserted"){
            this.inserted = true;
          }
          else if(this.theData.status == 500){
            this.errored = true;
            if(this.theData.title){
              if(this.theData.source.pointer.search("paypal") > -1){
                var errorObjResponse = JSON.parse(this.theData.title);
                if(errorObjResponse.error){
                  this.errorObj.title = "Paypal : " + errorObjResponse.error;
                  this.errorObj.detail = errorObjResponse.error_description;
                }else{
                  this.errorObj.title = "Paypal : " + errorObjResponse.name;
                  var diplayLinks = '';
                  var diplayDetails = '';
                  errorObjResponse.details.forEach(function(item){
                    diplayDetails += '<li><b>'+item.issue+' :</b>' + item.description + '</li>';
                  });
                  errorObjResponse.links.forEach(function(item){
                    diplayLinks += '<li><a href="'+item.href+'" class="text-primary" target="_blank">'+item.rel+'</a></li>';
                  });
                  this.errorObj.detail = errorObjResponse.message + '<ul>'+diplayDetails+'</ul> Links : <ul>'+diplayLinks+'</ul>';
                }
              }else{
                this.errorObj.title = this.theData.title;
              }
            }else{
              this.errorObj.title = "unkonwn error";
              this.errorObj.detail = "";
            }
          }
      })
      .catch(error => {
          this.errored = true;
          console.log(error);
            if(error.response){
                this.errorObj = error.response.data;
            }else{
                this.errorObj.title = error;
                this.errorObj.detail = '';
            }
      })
      .finally(() => {
        this.loading = false;
      });
  }
}
</script>
