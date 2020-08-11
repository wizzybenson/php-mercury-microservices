<template>
    <div></div>
</template>
<script>
export default {
    name: "paymentPaypal",
    props:{
        inputvals: {
            email: {
                val: String,
                state: Boolean
            }
        }
    },
    data(){
        return{
            activatedPaypalAccount:{}
        }
    }
}
</script>
