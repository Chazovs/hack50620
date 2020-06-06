require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import App from './App.vue';
import router from './router';
import 'jquery/src/jquery.js'
import 'bootstrap/dist/js/bootstrap.min.js'
import VueToast from 'vue-toast-notification';

Vue.component('home', require('./components/Home'))

Vue.use(VueToast);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

new Vue({
    router,
    render: h => h(App)
}).$mount('#app')
