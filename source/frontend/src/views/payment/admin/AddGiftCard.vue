<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Add Gift card</h3>
                        </div>
                        <div class="card-body text-left">
                            <b-overlay :show="loading" rounded="lg">
                                <form @submit="formSubmit">
                                    <GiftCardForm :giftCard="giftCardInfo" :violations="anerror.violations" />
                                </form>
                                <div class="alert alert-danger text-left my-2" v-if="anerror.isError">
                                    <i class="fas fa-exclamation-triangle"></i> <b>{{ anerror.title }}</b>
                                    <div class="text-muted">
                                        {{ anerror.detail }}
                                    </div>
                                </div>
                            </b-overlay>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import AdminSideBar from "@/components/AdminSideBar.vue";
import GiftCardForm from "@/components/payment/admin/GiftCardForm.vue";
var d = new Date(Date.now());
export default {
    name: "AddGiftCard",
    components: {
        AdminSideBar,
        GiftCardForm
    },
    beforeMount(){
        Object.assign(this.anerror, this.initialErrors);
    },
    data() {
        return {
            loading: false,
            initialErrors: {
                isError: false,
                title: "",
                detail: "",
                violations:{
                    title: null,
                    titleViolations: [],
                    code: null,
                    codeViolations: []
                }
            },
            anerror: {},
            giftCardInfo: {
                title: "",
                description: "",
                code: "",
                expirationdate: "",
                expirationtime: d.getHours() + ':' + d.getMinutes(),
                discount: 50,
                max_use: -1,
                status: 1
            },
        };
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();
            this.loading = true;
            Object.keys(this.anerror.violations).forEach(item => {
                if(Array.isArray(this.anerror.violations[item])){
                    this.anerror.violations[item] = [];
                }else if(typeof this.anerror.violations[item] === "boolean"){
                    this.anerror.violations[item] = null;
                }
            });
            this.anerror = {};
            Object.assign(this.anerror, this.initialErrors);
            var theDate = this.giftCardInfo.expirationdate + " " + this.giftCardInfo.expirationtime;
            const params = new URLSearchParams();
            params.append('title', this.giftCardInfo.title);
            params.append('code', this.giftCardInfo.code);
            params.append('description', this.giftCardInfo.description);
            params.append('expiration_date', theDate);
            params.append('max_use', this.giftCardInfo.max_use);
            params.append('status', this.giftCardInfo.status);
            axios.post(this.paymentService + 'payments/giftcards/addGiftCard', params)
            .then(response => {
                var theResponse = response.data;
                if(theResponse.status == "inserted"){
                    this.$router.push({ name: "GiftCards" });
                }
                else if(theResponse.errors){
                    theResponse.errors.forEach((item)=>{
                        if(item.source.pointer == "title"){
                            this.anerror.violations.title = false;
                            this.anerror.violations.titleViolations.push(item.detail);
                        }
                        if(item.source.pointer == "code"){
                            this.anerror.violations.code = false;
                            this.anerror.violations.codeViolations.push(item.detail);
                        }
                    });
                }
                else{
                    this.anerror.isError = true;
                    this.anerror.title = theResponse.title;
                    this.anerror.detail = theResponse.detail;
                    console.log(theResponse);
                }
            })
            .catch(error => {
                this.anerror.isError = true;
                if(error.response){
                    this.anerror.title = error.response.data.message
                }else{
                    this.anerror.title = error;
                }
            })
            .finally(() => {
                this.loading = false;
            });
        }
    }
};
</script>
