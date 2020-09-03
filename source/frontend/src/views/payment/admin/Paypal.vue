<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <h1 class="text-center"><img alt="commerce" src="../../../assets/images/paypal2.png" /> Paypal</h1>
                    <div class="bg-light mb-3">
                        <div class="container">
                            <div class="row">
                            <div class="col p-2">
                                <router-link :to="{name: 'Home'}">
                                    <i class="fas fa-home"></i> home
                                </router-link>&nbsp;
                                <i class="fas fa-chevron-right" style="font-size: 12px"></i> &nbsp;
                                <router-link :to="{name: 'Admin'}">
                                    Administration
                                </router-link> &nbsp;
                                <i class="fas fa-chevron-right" style="font-size: 12px"></i> &nbsp;
                                <router-link :to="{name: 'Payments'}">
                                    Payments
                                </router-link> &nbsp;
                                <i class="fas fa-chevron-right" style="font-size: 12px"></i> &nbsp;
                                <div class="d-inline txt">Paypal</div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info text-left">
                        <b-icon icon="exclamation-circle-fill" variant="info" font-scale="1.5" style="vertical-align: middle" /> <b>Paypal :</b> Manage differente paypal accounts.
                    </div>
                    <div class="text-left pb-2">
                        <router-link to="paypal/add">
                            <button class="btn btn-dark">
                            <i class="fas fa-plus"></i> Add Paypal Account
                            </button>
                        </router-link>
                    </div>
                    <table class="table text-center table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>email</th>
                                <th style="width: 130px">client id</th>
                                <th style="width: 130px">client secret</th>
                                <th>sandbox mode</th>
                                <th>transaction mode</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="loading">
                                <td colspan="7">
                                    <b-spinner variant="danger" style="width: 3rem; height: 3rem;" /><br />
                                    Loading
                                </td>
                            </tr>
                            <template v-else>
                            <tr v-if="errored">
                                <td colspan="5">
                                    <b style="color:#CC0000">{{ error.title }}</b>
                                    <div class="text-left">
                                        {{ error.detail }}
                                    </div>
                                </td>
                            </tr>
                            <template v-else>
                                <tr v-for="(paypal, index) in datas.datas" :key="index + '-' + paypal.paypalid" :style="activatedPaypal.activePaypal.paypalid == paypal.paypalid ? 'background-color: #FFE4E1' : ''">
                                    <td>{{ paypal.paypalid }}</td>
                                    <td><i>{{ paypal.email }}</i></td>
                                    <td><div style="width: 130px; overflow: auto;" class="text-nowrap">{{ paypal.clientid }}</div></td>
                                    <td><div style="width: 130px; overflow: auto;" class="text-nowrap">{{ paypal.clientsecret }}</div></td>
                                    <td>{{ paypal.sandboxmode == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ paypal.transactionmethod == 1 ? 'Sale' : 'Authorisation' }}</td>
                                    <td class="text-nowrap">
                                        <b-button
                                            v-b-tooltip.hover
                                            title="activer"
                                            class="btn text-white"
                                            type="button"
                                            @click="updateActivatedPaypal(paypal.paypalid)"
                                            style="background-color: #556B2F; width: 42px">
                                            <i class="fas fa-check"></i>
                                        </b-button>  &nbsp;
                                        <router-link :to="'/admin/payments/paypal/update/' + paypal.paypalid">
                                            <b-button v-b-tooltip.hover class="btn text-white px-0" title="Edit" style="background-color:#5F9EA0; width: 42px">
                                                <i class="fas fa-pencil-alt"></i>
                                            </b-button>
                                        </router-link> &nbsp;
                                        <b-button v-b-tooltip.hover class="btn text-white px-0" @click="deletePaypal(paypal.paypalid)" title="delete" style="background-color:#8B0000; width: 42px">
                                            <i class="fas fa-trash-alt"></i>
                                        </b-button>

                                    </td>
                                </tr>
                            </template>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
import AdminSideBar from "@/components/AdminSideBar.vue";
import axios from "axios";
export default {
  name: "Paypal",
  components: {
    AdminSideBar
  },
  data() {
    return {
      loading: true,
      errored: false,
      error: {},
      activatedPaypal: {},
      datas: {}
    };
  },
    mounted(){
        var getActivatedPaypal = async() => {
            return axios.get(this.paymentService + 'payments/activated_paypal/getActivated');
        };
        var getAll = async() => {
            return axios.get(this.paymentService + 'payments/paypalAdmin/getAll');
        };
        (async () => {
            await getActivatedPaypal().then(response =>{
                this.activatedPaypal = response.data.data;
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

            });
            await getAll().then(response =>{
                this.datas = response.data;
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
        })();
    },
    methods: {
        reload: function() {
        var location = this.$route.fullPath;
        this.$router.replace("/");
        this.$nextTick(() => this.$router.replace(location));
        },
        deletePaypal(id){
            var msg = "are you sure to delete this paypal account ?";
            if(confirm(msg)){
                axios.delete(this.paymentService + 'payments/paypalAdmin/deletePaypal/' + id)
                .then(response =>{
                    this.deleteData = response.data.data;
                    this.reload();
                }).catch(e => {
                    if(e.response){
                        console.log(e.response);
                    }else{
                        console.log(e)
                        alert(e);
                    }
                }).finally(() => {});
            }
        },
        updateActivatedPaypal(id){
            var msg = "Are you sure to activate this paypal account ?";
            if(confirm(msg)){
                const params = new URLSearchParams();
                //params.append('active', id);
                axios.patch(this.paymentService + 'payments/activated_paypal/updateActivatedPaypal/' + id, params).then(response => {
                    this.reload();
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>
