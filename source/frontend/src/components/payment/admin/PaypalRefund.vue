<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <template v-if="loading0">
                    <b-spinner variant="danger" style="width: 3rem; height: 3rem;" /><br />
                    please wait
                </template>
                <template v-else>
                    <div class="alert alert-danger text-left my-2" v-if="errored">
                        <i class="fas fa-exclamation-triangle"></i> <b>{{ errorObj.title }}</b>
                        <div class="text-muted">
                            {{ errorObj.detail }}
                        </div>
                    </div>
                    <template v-else>
                        <template v-if="refundAdded">
                            <div class="alert alert-success">
                                <strong><i class="fas fa-check-circle" style="font-size: 25px; vertical-align: middle"></i></strong>
                                Refund num {{ refundObj.refundid }} with amount <b>{{ refundObj.amount }}</b>{{ refundObj.currencycode }} is added.
                            </div>
                        </template>
                        <template v-else>
                            <b-overlay :show="loading" rounded="lg">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-2 text-left">
                                        <b-form-radio :disabled="totalRefund > 0" size="md" :name="'radios-' + transactionId" v-model="refund.refundMethod" value="0">
                                            Total Refund
                                        </b-form-radio>
                                        <b-form-radio class="text-nowrap" size="md" :name="'radios-' + transactionId" v-model="refund.refundMethod" value="1">
                                            Partial Refund :
                                        </b-form-radio>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-2"></div>
                                    <div class="col-4 text-left">
                                        <b-form @submit="formSubmit">
                                            <template v-if="refund.refundMethod == 1">
                                                <div class="form-group">
                                                    <label for="amout">Refund a partial amount: </label>
                                                    <b-input type="text" id="amout" class="form-control form-control-sm" v-model="refund.amount" placeholder="Enter an amount" />
                                                </div>
                                            </template>
                                            <template v-else>
                                                Refund the total amount : <b>{{ paypalTransaction.amountvalue }}</b> {{ paypalTransaction.currencycode }}
                                            </template>
                                            <div class="form-group">
                                                <b-button type="submit" class="btn btn-danger">Refund</b-button>
                                            </div>
                                        </b-form>
                                    </div>
                                </div>
                                <div class="alert alert-danger text-left my-2" v-if="refundErrored">
                                    <div class="mb-2"><i class="fas fa-exclamation-triangle"></i> <b>{{ refundErrorObj.title }}</b></div>
                                    <div v-html="refundErrorObj.detail"></div>
                                </div>
                            </b-overlay>
                        </template>
                    </template>
                </template>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    name: "PaypalRefund",
    props:{
        transactionId: Number,
        paymentTransaction: Number,
        totalRefund: Number
    },
    data() {
        return{
            errored: false,
            loading0: true,
            loading: false,
            refundAdded: false,
            refundErrored: false,
            refundObj: {},
            errorObj: {
                title: '',
                detail: ''
            },
            refundErrorObj: {
                title: '',
                detail: ''
            },
            paypalTransaction: {},
            refund:{
                // 0: total, 1: partial
                refundMethod: 0,
                amount: 0.00,
                currencycode: 'USD'
            }
        }
    },
    mounted(){
        if(this.totalRefund > 0){
            this.refund.refundMethod = 1;
        }
        axios.get(this.paymentService + 'payments/paypal_transactions/getOne/' + this.paymentTransaction)
        .then(response => {
            var theResponse = response.data;
            if(theResponse.data){
                this.paypalTransaction = theResponse.data;
            }else{
                this.errored = true;
                this.errorObj.title = theResponse.title;
                this.errorObj.detail = theResponse.detail;
            }
        })
        .catch(error => {
            this.errored = true;
            var theError = error.response;
            if(theError){
                this.errorObj.title = theError.data.title;
                this.errorObj.detail = theError.data.detail;
            }else{
                this.errorObj.title = error;
            }
        })
        .finally(() => {
            this.loading0 = false;
        });
    },
    methods: {
        formSubmit(e){
            e.preventDefault();
            this.refundErrored = false;
            this.loading = true;
            this.refundErrorObj.title = '';
            this.refundErrorObj.detail = '';
            const params = new URLSearchParams();
            params.append('type', this.refund.refundMethod);
            params.append('amount', (this.refund.refundMethod == 1 ? this.refund.amount : this.paypalTransaction.amountvalue));
            params.append('currencycode', this.refund.currencycode);
            params.append('transactionid', this.transactionId);
            params.append('paymentcaptureid', this.paypalTransaction.paymentcaptureid);
            axios.post(this.paymentService + "payments/refunds/addPaypalRefund",params)
            .then(response => {
                var result = response.data;
                if(result.status == 201){
                    this.refundAdded = true;
                    this.refundObj = result;
                }
                else if(result.status == 500){
                    this.refundErrored = true;
                    if(result.title){
                        if(result.source.pointer.search("paypal") > -1){
                            var errorObjResponse = JSON.parse(result.title);
                            if(errorObjResponse.error){
                            this.refundErrorObj.title = "Paypal : " + errorObjResponse.error;
                            this.refundErrorObj.detail = errorObjResponse.error_description;
                            }else{
                            this.refundErrorObj.title = "Paypal : " + errorObjResponse.name;
                            var diplayLinks = '';
                            var diplayDetails = '';
                            errorObjResponse.details.forEach(function(item){
                                diplayDetails += '<li><b>'+item.issue+' :</b>' + item.description + '</li>';
                            });
                            errorObjResponse.links.forEach(function(item){
                                diplayLinks += '<li><a href="'+item.href+'" class="text-primary" target="_blank">'+item.rel+'</a></li>';
                            });
                            this.refundErrorObj.detail = errorObjResponse.message + '<ul>'+diplayDetails+'</ul> Links : <ul>'+diplayLinks+'</ul>';
                            }
                        }else{
                            this.refundErrorObj.title = result.title;
                        }
                    }else{
                        this.refundErrorObj.title = "unkonwn error";
                        this.refundErrorObj.detail = "";
                    }
                }
            })
            .catch(error => {
                console.log(error);
            })
            .finally(() => {
                this.loading = false;
            });
        }
    }
}
</script>
