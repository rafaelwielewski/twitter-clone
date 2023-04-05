import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store/store.js";
import "./assets/style.css";

const app = createApp(App);
app.use(store);
app.use(router);

app.mount("#app");

Vue.config.productionTip = false;
new Vue({
  render: (h) => h(App),
}).$mount("#app");
