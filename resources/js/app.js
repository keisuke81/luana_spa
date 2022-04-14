
import Vue from "vue";
import VueRouter from 'vue-router';
import HeaderComponent from "./components/HeaderComponent";
import SearchComponent from "./components/SearchComponent";
import CastProfileComponent from "./components/CastProfileComponent.vue";
import OfferCastComponent from "./components/OfferCastComponent.vue";
import UserReserveComponent from "./components/UserReserveComponent.vue";
import UserLikedComponent from "./components/UserLikedComponent";
import UserChatListComponent from "./components/UserChatListComponent";
import UserMypageComponent from "./components/UserMypageComponent";


require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('header-component', HeaderComponent);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/search',
            name: 'user.search',
            component: SearchComponent
        },

        {
            path: '/search/:castId',
            name: 'user.cast.profile',
            component: CastProfileComponent,
            props:true
        },

        {
            path: 'offer/:castId',
            name: 'user.cast.offer',
            component:OfferCastComponent
        },

        {
            path: '/reserve/:reserveId',
            name: 'user.reserve',
            component: UserReserveComponent,
            props:true
        },

        {
            path: '/liked',
            name: 'user.liked',
            component: UserLikedComponent,
            props:true
        },

        {
            path: '/chat/list',
            name: 'user.chat.list',
            component: UserChatListComponent,
            props:true
        },

        {
            path: '/mypage',
            name: 'user.mypage',
            component: UserMypageComponent,
            props:true
        }
    ]
});


const app = new Vue({
    el: '#app',
    router
});
