import Vue from "vue";
import VueRouter from 'vue-router';
// Webpack CSS import
import 'onsenui/css/onsenui.css';
import 'onsenui/css/onsen-css-components.css';
// JS import
import VueOnsen from 'vue-onsenui'; // This imports 'onsenui', so no need to import it separately

Vue.use(VueOnsen); // VueOnsen set here as plugin to VUE. Done automatically if a call to window.Vue exists in the startup code.

import CastHeaderComponent from "./components/CastHeaderComponent.vue";
import CastAppComponent from "./components/CastAppComponent.vue";
import CastMypageComponent from "./components/CastMypageComponent.vue";
import CastMyprofileComponent from "./components/CastMyprofileComponent.vue";
import CastMyprofileEditComponent from "./components/CastMyprofileEditComponent";
import CastOfferedComponent from "./components/CastOfferedComponent.vue";
import CastReserveComponent from "./components/CastReserveComponent.vue";
import CastOfferedDetailComponent from "./components/CastOfferedDetailComponent.vue";



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
      
      {
        path: '/cast/mypage',
        name: 'cast.mypage',
        component: CastMypageComponent,
        props:true
      },

      {
        path: '/cast/myprofile/:castId',
        name: 'cast.myprofile',
        component: CastMyprofileComponent,
        props: true
      },

      {
        path: '/cast/myprofile/:castId/edit',
        name: 'cast.myprofile.edit',
        component: CastMyprofileEditComponent,
        props:true
      },

      {
        path: '/cast/offered/:castId',
        name: 'cast.offered',
        component: CastOfferedComponent,
        props:true
      },

      {
        path: '/cast/reserve/:castId',
        name: 'cast.reserve',
        component: CastReserveComponent,
        props:true
      },

      {
        path: '/cast/reserve/detail/:offerId',
        name: 'cast.offered.detail',
        component: CastOfferedDetailComponent,
        props:true
      },
  ]
});


const app = new Vue({
    el: '#cast',
    router
});