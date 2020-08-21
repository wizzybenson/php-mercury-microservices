<template>
    <div class="p-2 mx-auto my-2" style="border-top: 1px solid #C3C3C3; border-bottom: 1px solid #C3C3C3; width: 60%">
        <div class="container">
            <div class="row p-2">
                <div class="col">
                    <img :src="image" />
                </div>
            </div>
            <div class="row p-2">
                <div class="col-lg-4 text-left">
                    Gift Card Code :
                </div>
                <div class="col-lg-5 text-left">
                    <b-input type="text" v-model="inputvals.code.val" :state="inputvals.code.state" class="form-control" />
                    <b-form-invalid-feedback :state="inputvals.code.state">
                        {{ inputvals.code.errorMsg }}
                    </b-form-invalid-feedback>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "paymentGiftCard",
    props:{
        image: String,
        inputvals: {
            code:{
                val: String,
                state: Boolean,
                errorMsg: String
            }
        }
    }
}
</script>
