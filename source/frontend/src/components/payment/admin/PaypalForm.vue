<template>
  <div>
    <div class="form-group">
      <label for="email">Email:</label>
      <b-input :state="violations.email"
        type="text"
        id="email"
        class="form-control"
        v-model="paypalAcc.email" />
        <b-form-invalid-feedback v-for="(violation, index) in violations.emailViolations" :key="index + '-' + violation" :state="false">
            * {{violation}}.
        </b-form-invalid-feedback>
    </div>
    <div class="form-group">
      <label for="clientid">client id:</label>
      <b-input
        type="text"
        id="clientid"
        class="form-control"
        v-model="paypalAcc.clientid" />
    </div>
    <div class="form-group">
      <label for="clientsecret">client secret:</label>
      <b-input
        type="text"
        id="clientsecret"
        class="form-control"
        v-model="paypalAcc.clientsecret" />
    </div>
    <div class="form-group">
      <label for="sandbox">Sandbox Mode:</label>
      <select id="sandbox" class="form-control" v-model="paypalAcc.sandboxmode">
        <option value="1">Yes</option>
        <option value="0">No</option>
      </select>
    </div>
    <div class="form-group">
      <label for="transaction">Transaction Method:</label>
      <select
        id="transaction"
        class="form-control"
        v-model="paypalAcc.transactionmethod">
        <option value="0">Authorisation</option>
        <option value="1">Sale</option>
      </select>
    </div>
    <button class="btn btn-danger">Send Information</button>
  </div>
</template>
<script>
export default {
  name: "PaypalForm",
  props: {
    paypalAcc: {
      email: String,
      clientid: String,
      clientsecret: String,
      sandboxmode: Number,
      transactionmethod: Number
    },
    violations:{
      email: Boolean,
      emailViolations: []
    }
  }
};
</script>
