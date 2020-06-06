require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import App from './App.vue';
import router from './router';

Vue.component('home', require('./components/Home'))

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

new Vue({
    router,
    render: h => h(App)
}).$mount('#app')
