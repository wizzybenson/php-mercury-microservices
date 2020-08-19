<template>
  <div class="container my-3">
    <div class="row">
      <div class="col text-center" v-if="responseResult == 1">
        <div class="alert alert-success">
            <strong><i class="fas fa-shopping-cart" style="font-size: 25px; vertical-align: middle"></i> You made payment succefully.</strong>
        </div>
      </div>
      <div class="col text-center my-3" v-else-if="redirect_paypal">
        <h4>
            Redirect to paypal, please wait ...
        </h4>
      </div>
      <div class="col text-center" v-else>
        <b-overlay :show="loading" rounded="lg">
          <b-form @submit="formSubmit">
            <div role="tablist">
              <b-card no-body class="mb-1">
                <b-card-header header-tag="header" class="p-1 btn" role="tab">
                  <h3 href="#" v-b-toggle.accordion-1 variant="info">Custumor Informations <span v-if="errors[0]" class="text-muted" style="font-size:15px"><b style="color:red">* Errors</b></span></h3>
                </b-card-header>
                <b-collapse id="accordion-1" visible accordion="my-accordion" role="tabpanel">
                  <b-card-body>
                    <div class="row mb-3">
                      <div class="col-6 text-right pt-1">
                        <b>Custumor ID :</b>
                      </div>
                      <div class="col-3 text-left">
                        <b-input v-model="payment.custumorID.val" :state="payment.custumorID.state" type="number" id="custumorID" class="form-control" required />
                        <b-form-invalid-feedback :state="payment.custumorID.state">
                          Enter Custumor ID.
                        </b-form-invalid-feedback>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6 text-right pt-1">
                        <b>Amount :</b>
                      </div>
                      <div class="col-3 text-left">
                        <b-input v-model="payment.amount.val" :state="payment.amount.state" step=".01" type="number" id="amount" class="form-control" required />
                        <b-form-invalid-feedback :state="payment.amount.state">
                          Enter Amount.
                        </b-form-invalid-feedback>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6 text-right">
                        <b>Currency code :</b>
                      </div>
                      <div class="col-3 text-left">
                        USD
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6 text-right">
                        <b>Taxe :</b>
                      </div>
                      <div class="col-3 text-left">
                        20% ( {{ (0.2*payment.amount.val).toFixed(2) }} USD)
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6 text-right">
                        <b>Shipping :</b>
                      </div>
                      <div class="col-6 text-left">
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            Amount:
                          </div>
                          <div class="col-6 text-left">
                            <i>10.00 USD</i>
                          </div>
                        </div>
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            Method:
                          </div>
                          <div class="col-6 text-left">
                            <i>United States Postal Service</i>
                          </div>
                        </div>
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            Full name:
                          </div>
                          <div class="col-6 text-left">
                            <i>LAGRIDA Yassine</i>
                          </div>
                        </div>
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            address line 1:
                          </div>
                          <div class="col-6 text-left">
                            <i>123 Townsend St</i>
                          </div>
                        </div>
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            address line 2:
                          </div>
                          <div class="col-6 text-left">
                            <i>Floor 6</i>
                          </div>
                        </div>
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            admin area 2:
                          </div>
                          <div class="col-6 text-left">
                            <i>San Francisco</i>
                          </div>
                        </div>
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            admin area 1:
                          </div>
                          <div class="col-6 text-left">
                            <i>CA</i>
                          </div>
                        </div>
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            postal code:
                          </div>
                          <div class="col-6 text-left">
                            <i>94107</i>
                          </div>
                        </div>
                        <div class="row my-2">
                          <div class="col-4 text-right">
                            country code:
                          </div>
                          <div class="col-6 text-left">
                            <i>US</i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4 mx-auto">
                        <b-card-text class="my-2">
                          <b-button
                            block
                            href="#"
                            v-b-toggle.accordion-2
                            variant="info"
                            class="btn">send informations</b-button>
                        </b-card-text>
                      </div>
                    </div>
                  </b-card-body>
                </b-collapse>
              </b-card>

              <b-card no-body class="mb-1">
                <b-card-header header-tag="header" class="p-1 btn" role="tab">
                  <h3 href="#" v-b-toggle.accordion-2 variant="info">Payment Method  <span v-if="errors[1]" class="text-muted" style="font-size:15px"><b style="color:red">* Errors</b></span></h3>
                </b-card-header>
                <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
                  <b-card-body>
                    <b-card-text>
                      <b-form-group>
                        <template v-for="(pm, index) in paymentMethods">
                          <b-form-radio size="lg" :key="'form-radio-' + pm.paymentid" v-model="paymentMethod" name="some-radios" :value="index">{{ pm.title }}</b-form-radio>
                          <template v-if="paymentMethod != -1">
                            <template v-if="paymentMethods[paymentMethod].paymentid == pm.paymentid">
                              <component :is="paymentComponents[pm.paymentid]" :inputvals="inputs[pm.paymentid-1]" :image="pm.image" :key="pm.paymentid"></component> 
                            </template>
                          </template>
                        </template>
                      </b-form-group>
                      <div class="mt-3" style="color:red" v-if="unselectedPaymentMethod"><b>Select a payment Method!</b></div>
                      <b-button href="#" v-b-toggle.accordion-3 variant="info">send informations</b-button>
                    </b-card-text>
                  </b-card-body>
                </b-collapse>
              </b-card>

              <b-card no-body class="mb-1">
                <b-card-header header-tag="header" class="p-1 btn" role="tab">
                  <h3 href="#" v-b-toggle.accordion-3 variant="info">Make payment  <span v-if="errors[2]" class="text-muted" style="font-size:15px"><b style="color:red">* Errors</b></span></h3>
                </b-card-header>
                <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
                  <b-card-body>
                    <div class="container">
                      <div class="row">
                        <div class="col mx-auto">
                          <div class="row p-2">
                            <div class="col-md-6 text-right font-weight-bold">
                              Payment method :
                            </div>
                            <div class="col-md-6 text-left text-muted">
                                <template v-if="paymentMethod != -1">
                                  <img :src="paymentMethods[paymentMethod].image" style="vertical-align: middle" />
                                </template>
                            </div>
                          </div>
                          <div class="row p-2 font-weight-bold">
                            <div class="col-md-6 text-right">
                              Custumor ID :
                            </div>
                            <div class="col-md-6 text-left text-muted font-weight-bold">
                                {{ payment.custumorID.val }}
                            </div>
                          </div>
                          <div class="row p-2">
                            <div class="col-md-6 text-right font-weight-bold">
                              Amount :
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                  <div class="col-5 text-right">
                                    amount: 
                                  </div>
                                  <div class="col-4 text-left">
                                    {{ payment.amount.val }}
                                  </div>
                                  <div class="col-3 text-left">
                                    USD
                                  </div>
                                </div>
                                <div class="row my-2">
                                  <div class="col-5 text-right">
                                    Taxe: 
                                  </div>
                                  <div class="col-4 text-left">
                                    {{ (0.2*payment.amount.val).toFixed(2) }}
                                  </div>
                                  <div class="col-3 text-left">
                                    USD
                                  </div>
                                </div>
                                <div class="row my-2">
                                  <div class="col-5 text-right">
                                    Shipping: 
                                  </div>
                                  <div class="col-4 text-left">
                                    10.00
                                  </div>
                                  <div class="col-3 text-left">
                                    USD
                                  </div>
                                </div>
                                <div class="row my-2">
                                  <div class="col">
                                    <hr class="w-100 mb-0" style="border-width: 2px; border-color: #5F9EA0" />
                                  </div>
                                </div>
                                <div class="row my-2">
                                  <div class="col-5 text-right">
                                    Total: 
                                  </div>
                                  <div class="col-4 text-left font-weight-bold">
                                    {{ (1.2*payment.amount.val+10.00).toFixed(2) }}
                                  </div>
                                  <div class="col-3 text-left">
                                    USD
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="row p-2">
                            <div class="col-md-6 text-right font-weight-bold">
                              Shipping Adress :
                            </div>
                            <div class="col-md-6 text-left">
                                123 Townsend St, Floor 6, San Francisco, CA 94107, US
                            </div>
                          </div>
                          <div class="row p-2 mb-2">
                            <div class="col-md-6 text-right font-weight-bold">
                              Shipping Method :
                            </div>
                            <div class="col-md-6 text-left">
                                United States Postal Service
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <b-button type="submit" variant="primary">Submit payment</b-button>
                    <div class="alert alert-danger text-left my-2" v-if="anerror">
                        <div class="mb-2"><i class="fas fa-exclamation-triangle"></i> <b>{{ errorObj.title }}</b></div>
                        <div v-html="errorObj.detail"></div>
                    </div>
                  </b-card-body>
                </b-collapse>
              </b-card>
            </div>
          </b-form>
        </b-overlay>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import LoadComponent from "@/components/LoadComponent.vue";
import ErrorLoadComponent from "@/components/ErrorLoadComponent.vue";
const PaymentEmpty = () => ({
  component: import("@/components/payment/admin/PaymentEmpty.vue"),
  loading: LoadComponent,
  error: ErrorLoadComponent,
  //timeout: 3000
});
const PaymentPaypal = () => ({
  component: import("@/components/payment/admin/PaymentPaypal.vue"),
  loading: LoadComponent,
  error: ErrorLoadComponent,
  //timeout: 3000
});
const PaymentGiftCard = () => ({
  component: import("@/components/payment/admin/PaymentGiftCard.vue"),
  loading: LoadComponent,
  error: ErrorLoadComponent,
  //timeout: 3000
});
export default {
  name: "MakePayment",
  components: {
    PaymentEmpty,
    PaymentPaypal,
    PaymentGiftCard
  },
  data() {
    return {
      payment:{
        custumorID: {
          val: 0,
          state: null
        },
        amount: {
          val: 0.00,
          state: null
        }
      },
      redirect_paypal: false,
      responseResult: 0,
      anerror: false,
      loading: false,
      paymentMethod: -1,
      paymentMethods: [],
      errors: [false, false, false],
      unselectedPaymentMethod: false,
      paymentComponents:['PaymentEmpty', 'PaymentPaypal', 'PaymentGiftCard'],
      errorObj:{
        title: '',
        detail: ''
      },
      inputs: [
        {},
        {
          code:{
            val: "",
            state: null,
            errorMsg: ""
          }
        }
      ]
    };
  },
  methods: {
    
    formSubmit(e){
      e.preventDefault();
      var send = true;
      this.anerror = false;
      this.responseResult = 0;
      this.errors = [false, false, false];
      this.payment.custumorID.state = null;
      this.payment.amount.state = null;
      this.unselectedPaymentMethod = false;
      this.inputs[1].code.state = null;
      this.errorObj = {
        title: '',
        detail: ''
      };
      if(this.payment.custumorID.val <= 0){
        this.payment.custumorID.state = false;
        this.errors[0] = true;
        send = false;
      }
      if(this.payment.amount.val <= 0){
        this.payment.amount.state = false;
        this.errors[0] = true;
        send = false;
      }
      if(this.paymentMethod == -1){
        this.errors[1] = true;
        this.unselectedPaymentMethod = true;
        send = false;
        return;
      }
      if(this.paymentMethods[this.paymentMethod].paymentid == 2){
        if(this.inputs[1].code.val == ""){
          this.errors[1] = true;
          this.inputs[1].code.state = false;
          this.inputs[1].code.errorMsg = "please enter a gift card code";
          send = false;
        }
      }
      // sending data
      if(send){
        this.loading = true;
        const params = new URLSearchParams();
        
        // Paypal Payment
        if(this.paymentMethods[this.paymentMethod].paymentid == 1){
          params.append('paymentMethod', 1);
          params.append('costumorid', this.payment.custumorID.val);
          params.append('amount', this.payment.amount.val);
          params.append('origin', window.location.origin);
        }
        // gift Card payment
        if(this.paymentMethods[this.paymentMethod].paymentid == 2){
          params.append('code', this.inputs[1].code.val);
          params.append('costumorid', this.payment.custumorID.val);
          params.append('amount', this.payment.amount.val);
          params.append('paymentMethod', 2);
        }
        axios.post(this.paymentService + "payments/costumorpayments/addPayment",params)
        .then(response => {
          var result = response.data;
          if(result.status == "inserted"){
            this.responseResult = 1;
          }
          else if(result.status == "gift_card_error"){
            this.errors[1] = true;
            this.inputs[1].code.state = false;
            this.inputs[1].code.errorMsg = result.title;
          }
          else if(result.status == "paypalResponse"){
            if(result.statusCode == 201){
              this.redirect_paypal = true;
              location.href = result.approv;
            }else{
              this.errorObj.title = "Paypal Error Response, Please try again";
              this.errorObj.detail = "";
            }
          }
          else if(result.status == 500){
            this.anerror = true;
            if(result.title){
              if(result.source.pointer.search("paypal") > -1){
                var errorObjResponse = JSON.parse(result.title);
                this.errorObj.title = errorObjResponse.name;
                var diplayLinks = '';
                var diplayDetails = '';
                errorObjResponse.details.forEach(function(item){
                  diplayDetails += '<li><b>'+item.issue+' :</b>' + item.description + '</li>';
                });
                errorObjResponse.links.forEach(function(item){
                  diplayLinks += '<li><a href="'+item.href+'" class="text-primary" target="_blank">'+item.rel+'</a></li>';
                });
                this.errorObj.detail = errorObjResponse.message + '<ul>'+diplayDetails+'</ul> Links : <ul>'+diplayLinks+'</ul>';
              }else{
                this.errorObj.title = result.title;
              }
            }else{
              this.errorObj.title = "unkonwn error";
              this.errorObj.detail = "";
            }
          }
          else{
            this.anerror = true;
            this.errorObj.title = "unkonwn error";
            this.errorObj.detail = "";
          }
          console.log(result);
        })
        .catch(error => {
          this.anerror = true;
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
  },
  mounted(){
    axios.get(this.paymentService + 'payments/payments/getActivatedPayments')
      .then(response => {
        this.paymentMethods = response.data.datas;
      })
      .catch(e => {
        console.log(e);
      })
      .finally(() => {});
  }
};
</script>
