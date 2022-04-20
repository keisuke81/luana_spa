
import Vue from "vue";
import VueRouter from 'vue-router';
// Webpack CSS import
import 'onsenui/css/onsenui.css';
import 'onsenui/css/onsen-css-components.css';
// JS import
import VueOnsen from 'vue-onsenui'; // This imports 'onsenui', so no need to import it separately

Vue.use(VueOnsen); // VueOnsen set here as plugin to VUE. Done automatically if a call to window.Vue exists in the startup code.

import HeaderComponent from "./components/HeaderComponent";
import SearchComponent from "./components/SearchComponent";
import CastProfileComponent from "./components/CastProfileComponent.vue";
import OfferCastComponent from "./components/OfferCastComponent.vue";
import OfferConfirmComponent from "./components/OfferConfirmComponent.vue";
import UserReserveComponent from "./components/UserReserveComponent.vue";
import UserLikedComponent from "./components/UserLikedComponent";
import UserChatListComponent from "./components/UserChatListComponent";
import UserMypageComponent from "./components/UserMypageComponent";
import OfferCreateComponent from "./components/OfferCreateComponent.vue";
import LoginComponent from "./components/LoginComponent.vue";
import LinelogincallbackComponent from "./components/LinelogincallbackComponent.vue";
import HomeComponent from "./components/HomeComponent.vue";




require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('header-component', HeaderComponent);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/user',
            name: 'home',
            component:HomeComponent
        },

        {
            path: '/login',
            name: 'user.login',
            component: LoginComponent,
            props:true
        },

        {
            path: '/linelogincallback',
            name: 'user.callback',
            component:LinelogincallbackComponent
        },

        {
            path: '/user/search',
            name: 'user.search',
            component: SearchComponent,
            props:true
        },

        {
            path: '/user/search/:castId',
            name: 'user.cast.profile',
            component: CastProfileComponent,
            props: true,
        },
  
        {
            path: '/user/offer/:castId',
            name: 'user.cast.offer',
            component: OfferCastComponent,
            props:true
        },

        {
            path: '/user/offer/create',
            name: 'user.offer.create',
            component: OfferCreateComponent,
            props:true
        },

        {
            path: '/user/reserve/:reserveId',
            name: 'user.reserve',
            component: UserReserveComponent,
            props:true
        },

        {
            path: '/user/liked',
            name: 'user.liked',
            component: UserLikedComponent,
            props:true
        },

        {
            path: '/user/chat/list',
            name: 'user.chat.list',
            component: UserChatListComponent,
            props:true
        },

        {
            path: '/user/mypage',
            name: 'user.mypage',
            component: UserMypageComponent,
            props:true
        },
    ]
});


const app = new Vue({
    el: '#app',
    router
});