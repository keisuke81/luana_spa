import Vue from "vue";
import VueRouter from 'vue-router';
// Webpack CSS import
import 'onsenui/css/onsenui.css';
import 'onsenui/css/onsen-css-components.css';
// JS import
import VueOnsen from 'vue-onsenui'; // This imports 'onsenui', so no need to import it separately

Vue.use(VueOnsen); // VueOnsen set here as plugin to VUE. Done automatically if a call to window.Vue exists in the startup code.

import CastHeaderComponent from "./components/CastHeaderComponent";
import CastAppComponent from "./components/CastAppComponent.vue"





require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('header-component', CastHeaderComponent);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
      {
        path: '/cast',
        name: 'cast.app',
        component: CastAppComponent,
        ptops:true
    },
    ]
});


const app = new Vue({
    el: '#cast',
    router
});