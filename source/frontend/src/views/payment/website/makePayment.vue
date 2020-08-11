<template>
  <div class="container my-3">
    <div class="row">
      <div class="col text-center" v-if="responseResult == 1">
        <div class="alert alert-success">
            <strong><i class="fas fa-shopping-cart" style="font-size: 25px; vertical-align: middle"></i> You made payment succefully.</strong>
        </div>
      </div>
      <div class="col text-center" v-else>
        <b-form @submit="formSubmit">
          <div role="tablist">
            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1 btn" role="tab">
                <h3 href="#" v-b-toggle.accordion-1 variant="info">Custumor Informations <span v-if="errors[0]" class="text-muted" style="font-size:15px"><b style="color:red">* Errors</b></span></h3>
              </b-card-header>
              <b-collapse id="accordion-1" visible accordion="my-accordion" role="tabpanel">
                <b-card-body>
                  <div class="container">
                    <div class="row mb-3">
                      <div class="col-lg-4 col-md-3"></div>
                      <div class="col-lg-2 col-md-3 text-left pt-1">
                        <b>Custumor ID :</b>
                      </div>
                      <div class="col-lg-3 col-md-4 text-left">
                        <b-input v-model="payment.custumorID.val" :state="payment.custumorID.state" type="text" id="custumorID" class="form-control" required />
                        <b-form-invalid-feedback :state="payment.custumorID.state">
                          Enter Custumor ID.
                        </b-form-invalid-feedback>
                      </div>
                      <div class="col-lg-3 col-md-2"></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-4 col-md-3"></div>
                      <div class="col-lg-2 col-md-3 text-left pt-1">
                        <b>
                          Amount (<span style="color:green">$</span>) :
                        </b>
                      </div>
                      <div class="col-lg-3 col-md-4 text-left">
                        <b-input v-model="payment.amount.val" :state="payment.amount.state" type="text" id="amount" class="form-control" required />
                        <b-form-invalid-feedback :state="payment.amount.state">
                          Enter Amount.
                        </b-form-invalid-feedback>
                      </div>
                      <div class="col-lg-3 col-md-2"></div>
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
                       <div class="col-5 mx-auto">
                         <div class="row p-2">
                          <div class="col-md-6 text-left">
                            Custumor ID :
                          </div>
                          <div class="col-md-6 text-left text-muted font-weight-bold">
                              {{ payment.custumorID.val }}
                          </div>
                         </div>
                         <div class="row p-2">
                          <div class="col-md-6 text-left">
                            Amount :
                          </div>
                          <div class="col-md-6 text-left text-muted font-weight-bold">
                              {{ payment.amount.val }}
                          </div>
                         </div>
                         <div class="row p-2">
                          <div class="col-md-6 text-left">
                            Payment method :
                          </div>
                          <div class="col-md-6 text-left text-muted">
                              <template v-if="paymentMethod != -1">
                                <img :src="paymentMethods[paymentMethod].image" style="vertical-align: middle" />
                              </template>
                          </div>
                         </div>
                       </div>
                     </div>
                  </div>
                  <b-button type="submit" variant="primary">Submit</b-button>
                  <div v-if="loading" class="mt-3">
                    <img
                        src="../../../assets/images/5.gif"
                        style="width: 16px; height: 16px"
                        />
                        Loading.... please wait ...
                  </div>
                  <div v-if="anerror" class="mt-2" style="color: red">
                    <b><i class="fas fa-exclamation-triangle"></i> Une erreur est produite</b>
                  </div>
                  <div v-if="responseResult == 2" class="mt-2" style="color: red">
                    <b><i class="fas fa-exclamation-triangle"></i> Transaction non ajoutée</b>
                  </div>
                </b-card-body>
              </b-collapse>
            </b-card>
          </div>
        </b-form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "MakePayment",
  components: {
    PaymentEmpty: () => import("@/components/payment/admin/PaymentEmpty.vue"),
    PaymentPaypal: () => import("@/components/payment/admin/PaymentPaypal.vue"),
    PaymentGiftCard: () => import("@/components/payment/admin/PaymentGiftCard.vue"),
  },
  data() {
    return {
      payment:{
        custumorID: {
          val: 0,
          state: null
        },
        amount: {
          val: 0,
          state: null
        }
      },
      responseResult: 0,
      anerror: false,
      loading: false,
      paymentMethod: -1,
      paymentMethods: [],
      errors: [false, false, false],
      unselectedPaymentMethod: false,
      paymentComponents:['PaymentEmpty', 'PaymentPaypal', 'PaymentGiftCard'],
      inputs: [
        {
          email:{
            val: "",
            state: null
          }
        },
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
      // testing email:
      this.anerror = false;
      this.responseResult = 0;
      this.errors = [false, false, false];
      this.payment.custumorID.state = null;
      this.payment.amount.state = null;
      this.unselectedPaymentMethod = false;
      this.inputs[0].email.state = null;
      this.inputs[1].code.state = null;

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
          if(result.status == "gift_card_error"){
            this.errors[1] = true;
            this.inputs[1].code.state = false;
            this.inputs[1].code.errorMsg = result.title;
          }
          if(result.status == "paypalResponse"){
            if(result.statusCode == 201){
              location.href = result.approv;
            }else{
              console.log("Error Paypal Response");
            }
          }
          else{
            console.log("other msg : " + result);
          }
        })
        .catch(error => {
          this.anerror = true;
          console.log(error);
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
