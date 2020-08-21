<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center my-2">
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
                <div class="row">
                    <div class="col-5 text-right">Tax: </div>
                    <div class="col-4 text-left">+ {{ transaction.tax_total }}</div>
                    <div class="col-3 text-left">{{ transaction.currencycode }}</div>
                </div>
                <div class="row">
                    <div class="col-5 text-right">Shipping: </div>
                    <div class="col-4 text-left">+ {{ transaction.shipping.amount }}</div>
                    <div class="col-3 text-left">{{ transaction.currencycode }}</div>
                </div>
                <div class="row my-2">
                    <div class="col">
                        <hr class="w-100 mb-0" style="border-width: 2px; border-color: #5F9EA0" />
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-5 text-right">Total: </div>
                    <div class="col-4 text-left" style="font-weight:bold; color:green">
                        + {{ (Number(transaction.tax_total)+Number(transaction.amount)+Number(transaction.shipping.amount)).toFixed(2) }}
                    </div>
                    <div class="col-3 text-left">{{ transaction.currencycode }}</div>
                </div>
            </div>
        </div>
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
                Gift card used
            </div>
        </div>
        <hr class="mt-0" />
        <div v-if="loading" class="text-center py-2">
            <img src="../../../assets/images/loading.gif" style="width: 100px; height: 100px" />
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
                    <div class="col-4 my-2 text-right">
                        GiftCard title : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        {{ giftCardTransaction.giftcard.title }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        GiftCard code : 
                    </div>
                    <div class="col-8 my-2 text-left">
                        <span class="badge badge-info p-2" style="font-size: 15px">{{ giftCardTransaction.giftcard.code }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        GiftCard created : 
                    </div>
                    <div class="col-8 my-2 text-left text-muted">
                        {{ giftCardTransaction.giftcard.ladate }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        GiftCard expiration : 
                    </div>
                    <div class="col-8 my-2 text-left text-muted">
                        {{ giftCardTransaction.giftcard.expiration_date }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        GiftCard used : 
                    </div>
                    <div class="col-8 my-2 text-left text-muted">
                        {{ giftCardTransaction.giftcard.used + '/' + (giftCardTransaction.giftcard.max_use == '-1' ? '∞' : giftCardTransaction.giftcard.max_use) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 my-2 text-right">
                        GiftCard status : 
                    </div>
                    <div class="col-8 my-2 text-left text-muted">
                        <template v-if="giftCardTransaction.giftcard.status == 1">
                            <span class="font-weight-bold" style="color:green">Enabled</span>
                        </template>
                        <template v-else>
                            <span class="font-weight-bold" style="color:red">Disabled</span>
                        </template>
                    </div>
                </div>
            </template>
        </template>
    </div>
</template>
<script>
import axios from "axios";
export default {
    name: "GiftCardDetails",
    props:{
        transaction: Object
    },
    data(){
        return{
            loading: true,
            errored: false,
            error: {},
            giftCardTransaction: {}
        }
    },
    mounted(){
        axios.get(this.paymentService + 'payments/gift_card_transactions/getOne/'+this.transaction.paymenttransaction)
        .then(response =>{
                this.giftCardTransaction = response.data.data;
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
    }
}
</script>
