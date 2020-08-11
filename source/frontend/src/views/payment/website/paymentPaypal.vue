<template>
  <div class="container my-3" v-if="visible">
    <div class="row">
      <div class="col text-center">
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
                        src="../../../assets/images/5.gif"
                        style="width: 16px; height: 16px"
                        /> 
                          loading .. please wait ..
                        </div>
                      </div>
                      <template v-else>
                      <div class="row mb-2">
                          <div class="col-6 text-right">
                              Shipping name : 
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
                      <div class="row mb-2">
                          <div class="col-6 text-right">
                              Amount : 
                          </div>
                          <div class="col-6 text-left">
                            {{ theData.amountvalue + ' ' + theData.currencycode }}
                          </div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-6 text-right">
                              date : 
                          </div>
                          <div class="col-6 text-left">
                            {{ theData.createtime }}
                          </div>
                      </div>
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
      })
      .catch(e => {
        console.log(e);
      })
      .finally(() => {
        this.loading = false;
      });
  }
}
</script>
