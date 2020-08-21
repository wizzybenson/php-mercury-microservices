<template>
    <div class="container-fluid">
        <div v-if="loading" class="text-center my-2">
            <b-spinner variant="primary" style="width: 5rem; height: 5rem;" label="Spinning"></b-spinner><br />
            Loading ...
        </div>
        <template v-else>
            <div class="alert alert-danger text-left my-2" v-if="errored">
                <i class="fas fa-exclamation-triangle"></i> <b>{{ error.title }}</b>
                <div class="text-muted">
                    {{ error.detail }}
                </div>
            </div>
            <template v-else>
                <div class="row">
                    <div class="col text-center">
                        <img :src="transaction.payment.image" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Payment method : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ transaction.payment.title }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Custumor : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ transaction.costumorid }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Transaction code : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ transaction.transactioncode }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Date : 
                    </div>
                    <div class="col-8 my-2 text-left text-muted">
                        {{ transaction.transactiondate }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Amount : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        <div class="row">
                            <div class="col-5 text-right">amount: </div>
                            <div class="col-4 text-left">+ {{ transaction.amount }}</div>
                            <div class="col-3 text-left">{{ transaction.currencycode }}</div>
                        </div>
                        <div class="row my-2">
                            <div class="col-5 text-right">Tax: </div>
                            <div class="col-4 text-left">+ {{ transaction.tax_total }}</div>
                            <div class="col-3 text-left">{{ transaction.currencycode }}</div>
                        </div>
                        <div class="row my-2">
                            <div class="col-5 text-right">Shipping: </div>
                            <div class="col-4 text-left">+ {{ transaction.shipping.amount }}</div>
                            <div class="col-3 text-left">{{ transaction.currencycode }}</div>
                        </div>
                        <div class="row my-2" v-for="(refund, index) in refunds.datas" :key="index + '-refund-amounts'">
                            <div class="col-5 text-right">Refund: </div>
                            <div class="col-4 text-left">- {{ refund.amount }}</div>
                            <div class="col-3 text-left">{{ refund.currencycode }}</div>
                        </div>
                        <div class="row my-2" v-if="isTotalRefund == false">
                            <div class="col-5 text-right">Paypal fee: </div>
                            <div class="col-4 text-left">- {{ paypalTransaction.paypalfee }}</div>
                            <div class="col-3 text-left">{{ transaction.currencycode }}</div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <hr class="w-100 mb-0" style="border-width: 2px; border-color: #5F9EA0" />
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-5 text-right">Total: </div>
                            <div class="col-4 text-left">
                                <span style="font-weight:bold; color:green" v-if="total > 0">+{{ total }}</span>
                                <span v-else>{{ total }}</span>
                            </div>
                            <div class="col-3 text-left">{{ transaction.currencycode }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Paypal transaction id : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ paypalTransaction.captureid }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Paypal capture id : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ paypalTransaction.paymentcaptureid }}
                    </div>
                </div>
                <hr class="mb-0" />
                <div class="row">
                    <div class="col my-2 text-center font-weight-bold">
                        Refunds history
                    </div>
                </div>
                <hr class="mt-0" />
                <div class="row" v-if="refunds.count == 0">
                    <div class="col p-2 text-center">
                        There are no refunds for this payment.
                    </div>
                </div>
                <template v-else>
                    <div class="row" v-for="(refund, index) in refunds.datas" :key="index + '-refund'">
                        <div class="col-4 my-2 text-right">
                            Refund {{index+1}} : 
                        </div>
                        <div class="col-8 my-2 text-left">
                            <div class="row">
                                <div class="col-4 text-right mb-1">
                                    amount :
                                </div>
                                <div class="col-8 text-left mb-1">
                                    <b style="color: #CC0000">-{{ refund.amount }}</b> {{ refund.currencycode }}
                                </div>
                                <div class="col-4 text-right my-1">
                                    type :
                                </div>
                                <div class="col-8 text-left my-1">
                                    {{ refund.type == 1 ? 'Partial' : 'Total' }}
                                </div>
                                <div class="col-4 text-right my-1">
                                    date :
                                </div>
                                <div class="col-8 text-left my-1 text-muted">
                                    {{ refund.createtime }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 text-right">
                            Total : 
                        </div>
                        <div class="col-8 my-2 text-left">
                            <b style="color: #CC0000">-{{ total_refund }}</b> {{ transaction.currencycode }}
                        </div>
                    </div>
                </template>
                <hr class="mb-0" />
                <div class="row">
                    <div class="col my-2 text-center font-weight-bold">
                        Shipping informations
                    </div>
                </div>
                <hr class="mt-0" />
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Method : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ transaction.shipping.method }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Full name : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ transaction.shipping.full_name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        adress : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ transaction.shipping.address_line_1 + ', ' + transaction.shipping.address_line_2 + ', ' + transaction.shipping.admin_area_2 + ', ' + transaction.shipping.admin_area_1 + ' ' + transaction.shipping.postal_code + ', ' + transaction.shipping.country_code}}
                    </div>
                </div>
                <hr class="mb-0" />
                <div class="row">
                    <div class="col my-2 text-center font-weight-bold">
                        Paypal payer informations
                    </div>
                </div>
                <hr class="mt-0" />
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Name : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ paypalTransaction.payer.given_name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Family name : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ paypalTransaction.payer.surname }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        email : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ paypalTransaction.payer.email_address }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Paypal Payer id : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ paypalTransaction.payer.payer_id }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        Country : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ paypalTransaction.payer.country_code }}
                    </div>
                </div>
            </template>
        </template>
    </div>
</template>
<script>
import axios from "axios";
export default {
    name: "PaypalDetails",
    props:{
        transaction: Object
    },
    data(){
        return{
            loading: true,
            errored: false,
            refunds: {},
            total_refund: 0.00,
            total: 0.00,
            isTotalRefund: false,
            error: {},
            paypalTransaction: {}
        }
    },
    mounted(){
        var get_paypal_transaction = async(id) => {
            return axios.get(this.paymentService + 'payments/paypal_transactions/getOne/' + id);
        }
        var getRefunds = async(transactionId) => {
            return axios.get(this.paymentService + 'payments/costumorpayments/get_refunds/' + transactionId);
        };
        (async () => {
            await get_paypal_transaction(this.transaction.paymenttransaction)
            .then(response =>{
                this.paypalTransaction = response.data.data;
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
            .finally(() => {});
            
            await getRefunds(this.transaction.transactionid)
            .then(response =>{
                this.refunds = response.data;
                    for(var i =0; i < this.refunds.count; i++){
                        this.total_refund = Number(this.total_refund)+Number(this.refunds.datas[i].amount);
                        if(this.refunds.datas[i].type == 0){
                            this.isTotalRefund = true;
                        }
                    }
                    this.total_refund = Number(this.total_refund).toFixed(2);
                    this.total = (Number(this.transaction.tax_total)+Number(this.transaction.amount)+Number(this.transaction.shipping.amount)-(this.isTotalRefund ? 0 : Number(this.paypalTransaction.paypalfee))-Number(this.total_refund)).toFixed(2);
            })
            .finally(() => {
                this.loading = false;
            });
        })();
    }
}
</script>
