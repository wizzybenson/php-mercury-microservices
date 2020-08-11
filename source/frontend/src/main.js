import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import {BootstrapVue, BootstrapVueIcons } from "bootstrap-vue";

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';
import "./assets/style.css";

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

// Payment Service
Vue.prototype.paymentService = "http://localhost:8084/";

// Other Services

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
