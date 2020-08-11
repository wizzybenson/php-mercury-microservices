<template>
  <div>
    <div class="form-group">
      <label for="title">Title:</label>
      <b-input :state="violations.title" type="text" id="title" class="form-control" v-model="giftCard.title" />
      <b-form-invalid-feedback v-for="(violation, index) in violations.titleViolations" :key="index + '-' + violation" :state="false">
        * {{violation}}.
      </b-form-invalid-feedback>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input
        type="text"
        id="description"
        class="form-control"
        v-model="giftCard.description"
      />
    </div>
    <div class="form-group">
      <label for="code">Code:</label>
      <b-input :state="violations.code"
        type="text"
        id="code"
        class="form-control"
        v-model="giftCard.code"
      />
      <b-form-invalid-feedback v-for="(violation, index) in violations.codeViolations" :key="index + '-' + violation" :state="false">
        * {{violation}}.
      </b-form-invalid-feedback>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-6">
          <label for="expirencedate">expiration Date:</label>
          <input
            type="date"
            id="expirencedate"
            class="form-control"
            v-model="giftCard.expirationdate"
          />
        </div>
        <div class="col-6">
          <label for="expirencetime">time:</label>
          <input
            type="time"
            id="expirencetime"
            class="form-control"
            v-model="giftCard.expirationtime"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="max_use">Maximal use:</label>
      <input
        type="text"
        id="max_use"
        class="form-control"
        v-model="giftCard.max_use"
      />
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select id="status" class="form-control" v-model="giftCard.status">
        <option value="1">Enabled</option>
        <option value="0">Desabled</option>
      </select>
    </div>
    <button class="btn btn-danger">Send Information</button>
  </div>
</template>

<script>
export default {
  name: "GiftCardForm",
  props: {
    giftCard: {
      title: String,
      description: String,
      code: String,
      expirationdate: Date,
      expirationtime: String,
      max_use: Number,
      status: Number
    },
    violations:{
      title: Boolean,
      titleViolations: [],
      code: Boolean,
      codeViolations: []
    }
  }
};
</script>
