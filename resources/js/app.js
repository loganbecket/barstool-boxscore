window.Vue = require('vue').default;

import Vuetify from "./../plugins/vuetify";

require('./bootstrap');

Vue.component('main-dashboard', require('./components/Dashboard.vue').default);
Vue.component('app-menu', require('./components/Menu.vue').default);
Vue.component('app-footer', require('./components/Footer.vue').default);
Vue.component('box-score', require('./components/Boxscore.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
});
