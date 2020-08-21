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
                                <h3>Update Paypal</h3>
                            </div>
                            <div class="card-body text-left">
                                <form @submit="formSubmit">
                                    <PaypalForm :paypalAcc="paypalAccount" :violations="anerror.violations" />
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
import PaypalForm from "@/components/payment/admin/PaypalForm.vue";
export default {
    name: "updatePaypal",
    components: {
        AdminSideBar,
        PaypalForm
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
                    email: null,
                    emailViolations: [],
                }
            },
            anerror: {},
            paypalAccount: {}
        };
    },
    beforeMount(){
        Object.assign(this.anerror, this.initialErrors);
    },
    mounted() {
        axios.get(this.paymentService + "payments/paypalAdmin/getOne/" +this.$route.params.id)
        .then(response => {
            this.paypalAccount = response.data.data;
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
            const params = new URLSearchParams();
            params.append('email', this.paypalAccount.email);
            params.append('clientid', this.paypalAccount.clientid);
            params.append('clientsecret', this.paypalAccount.clientsecret);
            params.append('sandboxmode', this.paypalAccount.sandboxmode);
            params.append('transactionmethod', this.paypalAccount.transactionmethod);
            axios.patch(this.paymentService + 'payments/paypalAdmin/updatePaypal/' + this.$route.params.id, params)
            .then(response => {
                var theResponse = response.data;
                if(theResponse.status == "updated"){
                    this.$router.push({ name: "Paypal" });
                }
                else if(theResponse.errors){
                    theResponse.errors.forEach((item)=>{
                        if(item.source.pointer == "email"){
                            this.anerror.violations.email = false;
                            this.anerror.violations.emailViolations.push(item.detail);
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
}
</script>
