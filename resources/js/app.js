import './bootstrap';
window.Vue = require('vue');

Vue.component('works-component', require('./components/WorksComponent.vue'));

const app = new Vue({
    el: '#app'
});