<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <div v-if="pageLoading" class="p-4 text-center">
                        <img
                        src="../../../assets/images/5.gif"
                        style="width: 16px; height: 16px"
                        />
                        Loading....
                    </div>
                    <template v-else>
                        <div class="alert alert-danger text-left my-2" v-if="errored">
                            <i class="fas fa-exclamation-triangle"></i> <b>{{ getError.title }}</b>
                            <div class="text-muted">
                                {{ getError.detail }}
                            </div>
                        </div>
                        <div class="card" v-else>
                            <div class="card-header text-center">
                                <h3>Update Gift card</h3>
                            </div>
                            <div class="card-body text-left">
                                <form @submit="formSubmit">
                                    <GiftCardForm :giftCard="giftCardInfo" :violations="anerror.violations" />
                                    <div v-if="loading" class="py-2">Sending....</div>
                                </form>
                                <div class="alert alert-danger text-left my-2" v-if="anerror.isError">
                                    <i class="fas fa-exclamation-triangle"></i> <b>{{ anerror.title }}</b>
                                    <div class="text-muted">
                                        {{ anerror.detail }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
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
export default {
    name: "updateGiftCard",
    components: {
        AdminSideBar,
        GiftCardForm
    },
    data() {
        return {
            pageLoading: true,
            errored: false,
            getError:{
                title: "",
                detail: ""
            },
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
            giftCardInfo: {}
        };
    },
    beforeMount(){
        Object.assign(this.anerror, this.initialErrors);
    },
    mounted() {
        axios.get(this.paymentService + "payments/giftcards/getOne/" +this.$route.params.id)
        .then(response => {
            this.giftCardInfo = response.data.data;
            var theDate = response.data.data.expiration_date.split(' ')
            this.giftCardInfo.expirationdate = theDate[0];
            var theTime = theDate[1].split(":");
            this.giftCardInfo.expirationtime = theTime[0] + ":" + theTime[1];
            console.log("yassine : " + theDate[0]);
        })
        .catch(e => {
            this.errored = true;
            if(e.response){
                this.getError.title = e.response.data.title;
                this.getError.detail = e.response.data.detail;
            }else{
                this.getError.title = e;
            }
        })
        .finally(() => {
            this.pageLoading = false;
        });
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
            axios.patch(this.paymentService + 'payments/giftcards/updateGiftCard/' + this.$route.params.id, params)
            .then(response => {
                var theResponse = response.data;
                if(theResponse.status == "updated"){
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
