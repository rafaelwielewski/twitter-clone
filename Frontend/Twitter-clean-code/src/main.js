import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import VueSession from "vue-session";
import axios from 'axios'

//import './assets/main.css'
import './assets/style.css'

//import 'bootstrap/dist/css/bootstrap.css';
//import 'bootstrap-vue/dist/bootstrap-vue.css';


//import 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css';
const app = createApp(App)

app.use(router)

app.mount('#app')

Vue.use(VueSession);
Vue.config.productionTip = false;
new Vue({
  render: (h) => h(App)
}).$mount("#app");
