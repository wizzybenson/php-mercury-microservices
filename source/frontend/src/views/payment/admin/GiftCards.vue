<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <div class="wrapper">
                <AdminSideBar />
                <!-- Content -->
                <div id="content">
                    <div class="text-left pb-2">
                        <router-link to="giftcards/add">
                            <button class="btn btn-dark">
                            <i class="fas fa-plus"></i> Add Gift card
                            </button>
                        </router-link>
                    </div>
                    <table class="table text-center table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>code</th>
                            <th>date</th>
                            <th>expiration date</th>
                            <th>used</th>
                            <th>status</th>
                            <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="loading">
                                <td colspan="8">
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
                                <tr v-for="(giftCard, index) in datas.datas" :key="index + '-' + giftCard.paymentid">
                                    <td>{{ giftCard.giftcardid }}</td>
                                    <td>{{ giftCard.title }}</td>
                                    <td><span class="badge badge-info p-1" style="font-size: 15px">{{ giftCard.code }}</span></td>
                                    <td class="text-muted">{{ giftCard.ladate }}</td>
                                    <td class="text-muted">{{ giftCard.expiration_date }}</td>
                                    <td>{{ giftCard.used }}/{{ giftCard.max_use == '-1' ? '∞' : giftCard.max_use }}</td>
                                    <td>
                                        <template v-if="giftCard.status == 1">
                                            <span class="font-weight-bold" style="color:green">Enabled</span>
                                        </template>
                                        <template v-else>
                                            <span class="font-weight-bold" style="color:red">Disabled</span>
                                        </template>
                                    </td>
                                    <td>
                                        <router-link :to="'/admin/payments/giftcards/update/'+giftCard.giftcardid">
                                            <b-button v-b-tooltip.hover class="btn text-white px-0 my-1" title="Edit" style="background-color:#5F9EA0; width: 42px">
                                                <i class="fas fa-pencil-alt"></i>
                                            </b-button>
                                        </router-link>&nbsp;
                                        <b-button v-b-tooltip.hover class="btn text-white px-0" @click="deleteGiftCard(giftCard.giftcardid)" title="delete" style="background-color:#8B0000; width: 42px">
                                            <i class="fas fa-trash-alt"></i>
                                        </b-button>&nbsp;

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
import axios from "axios";
import AdminSideBar from "@/components/AdminSideBar.vue";
export default {
    name: "GiftCard",
    components: {
        AdminSideBar
    },
    data() {
        return {
            loading: true,
            errored: false,
            error: {},
            datas: {},
            deleteData: {}
        };
    },
    mounted(){
        axios.get(this.paymentService + 'payments/giftcards/getAll')
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
        deleteGiftCard(id){
            var msg = "are you sure to delete giftCard ?";
            if(confirm(msg)){
                axios.delete(this.paymentService + 'payments/giftcards/deleteGiftCard/' + id)
                .then(response =>{
                    this.deleteData = response.data.data;
                    alert("git card "+ this.deleteData.title +" is deleted");
                    this.reload();
                }).catch(e => {
                    if(e.response){
                        console.log(e.response);
                    }else{
                        console.log(e)
                    }
                }).finally(() => {});
            }
        }
    }
};
</script>
