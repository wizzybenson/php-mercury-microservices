<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <h1><img alt="commerce" src="../../../assets/images/payment.png" /> Payments</h1>
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
                                <div class="d-inline txt">Payments</div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info text-left">
                        <b-icon icon="exclamation-circle-fill" variant="info" font-scale="1.5" style="vertical-align: middle" /> <b>Payment methods :</b> Manage differente payment methods.
                    </div>
                    <table class="table text-center table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="loading">
                                <td colspan="5">
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
                                <tr v-for="(payment, index) in datas.datas" :key="payment.paymentid">
                                    <td>{{ payment.paymentid }}</td>
                                    <td>{{ payment.title }}</td>
                                    <td class="font-italic">{{ payment.description }}</td>
                                    <td><img :src="payment.image" /></td>
                                    <td>
                                        <router-link :to="'/admin/payments'+payment.url">
                                            <b-button v-b-tooltip.hover class="btn text-white px-0" title="Edit" style="background-color:#5F9EA0; width: 42px">
                                                <b-icon icon="pencil" class="align-middle" />
                                            </b-button>
                                        </router-link>&nbsp;
                                        <template v-if="payment.status == 0">
                                            <b-button v-b-tooltip.hover class="btn text-white px-0" type="button" @click="activatePayment(payment.status, payment.paymentid, index)" title="Activer" style="background-color: #556B2F; width: 42px">
                                                <b-icon icon="check2" class="align-middle" />
                                            </b-button>
                                        </template>
                                        <template v-else>
                                            <b-button
                                            v-b-tooltip.hover
                                            class="btn text-white px-0"
                                            type="button"
                                            title="Désactiver"
                                            @click="activatePayment(payment.status, payment.paymentid, index)"
                                            style="background-color:#8B0000; width: 42px"
                                            >
                                            <b-icon icon="x" class="align-middle" />
                                            </b-button>
                                        </template>
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
  name: "Payments",
  components: {
    AdminSideBar
  },
  data() {
    return {
      loading: true,
      errored: false,
      error: {},
      datas: {}
    };
  },
  mounted(){
      axios.get(this.paymentService + 'payments/payments/getAll')
      .then(response =>{
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
  },
  methods: {
    reload: function() {
      var location = this.$route.fullPath;
      this.$router.replace("/");
      this.$nextTick(() => this.$router.replace(location));
    },
    activatePayment: function(status, id, index){
        var msg = "";
        if(status == 0){
            msg = "Are you sure to activate this payment method ?";
        }else{
            msg = "Are you sure to disable this payment method ?";
        }
        if(confirm(msg)){
            const params = new URLSearchParams();
            params.append('status', 1-status);
            axios.patch(this.paymentService + 'payments/payments/updatePayment/' + id , params)
            .then(response => {
                var theResponse = response.data;
                if(theResponse.status == "updated"){
                    Object.assign(this.datas.datas[index], theResponse.data);
                }else{
                    alert("Error");
                }
            }).catch(e => {
                if(e.response){
                    alert(e.response.data.message);
                }else{
                    alert(e);
                }
            })
            .finally(()=>{});
        }
    }
  }
};
</script>
