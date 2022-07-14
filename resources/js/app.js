window.Vue = require('vue').default;
window.Event = new Vue();

import Vuetify from "./../plugins/vuetify";

require('./bootstrap');

Vue.component('welcome-page', require('./components/Welcome.vue').default);
Vue.component('app-menu', require('./components/Menu.vue').default);
Vue.component('app-footer', require('./components/Footer.vue').default);
Vue.component('game-list', require('./components/GameList.vue').default);
Vue.component('game-dashboard', require('./components/GameDashboard.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
});
