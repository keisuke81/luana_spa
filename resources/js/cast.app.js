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
import CastReserveContentComponent from "./components/CastReserveContentComponent.vue";
import CastSearchComponent from "./components/CastSearchComponent.vue";
import CastUserProfileComponent from "./components/CastUserProfileComponent.vue";
import CastChatListComponent from "./components/CastChatListComponent.vue";
import CastChatRoomComponent from "./components/CastChatRoomComponent.vue";
import CastLikedComponent from "./components/CastLikedComponent.vue";




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

      {
        path: '/cast/reserve/content/:offerId',
        name: 'cast.reserve.content',
        component: CastReserveContentComponent,
        props:true
      },

      {
        path: '/cast/search',
        name: 'cast.search',
        component: CastSearchComponent,
        props:true
      },

      {
        path: '/cast/search/:userId/:castId',
        name: 'cast.user.profile',
        component: CastUserProfileComponent,
        props:true
      },

      {
        path: '/cast/chat/list/:castId',
        name: 'cast.chat.list',
        component: CastChatListComponent,
        props:true
      },

      {
        path: '/cast/chat/room/:castId/:userId',
        name: 'cast.chat.room',
        component: CastChatRoomComponent,
        props:true
      },

      {
        path: '/cast/liked/:castId',
        name: 'cast.liked',
        component: CastLikedComponent,
        props:true
      },
  ]
});


const app = new Vue({
    el: '#cast',
    router
});