
require('./bootstrap');

import "datatables.net-bs4";
import "datatables.net-bs4/css/dataTables.bootstrap4.css";
import "jszip";
import "pdfmake";
import "datatables.net-buttons-bs4";
import "datatables.net-buttons-bs4/css/buttons.bootstrap4.css";
import "datatables.net-buttons/js/buttons.colVis";
import "datatables.net-buttons/js/buttons.flash";
import "datatables.net-buttons/js/buttons.html5";
import "datatables.net-buttons/js/buttons.print";

// main.js
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import swal from 'sweetalert2';
window.Swal = swal;

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)


Vue.use(VueSweetalert2);

window.Vue = require('vue').default;
import VueRouter from "vue-router";
Vue.use(VueRouter)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('one-vue', require('./components/One.vue'));



import Dashboard from './components/admins/Dashboard'
import Admins from './components/admins/Admins.vue'
import Articals from './components/admins/Articals.vue'
import Insident from './components/admins/Insident.vue'
import collections from './components/admins/collections.vue'
import CreateUser from './components/pages/CreateUser'


const routes = [

    //admin routes
    { path:'/home', component:Dashboard},//Dashboard
    { path: '/admin/admin-users', component : Admins}, 
    { path: '/admin/insident', component : Insident}, //to Tour page
    { path: '/admin/Articals', component : Articals}, //to Articals page
    { path: '/admin/Collection', component : collections}, //to Articals page
  ];


const router = new VueRouter({
    mode:'history',
    routes,
})

const app = new Vue({

    el: '#app',
    router,

    components:{
        CreateUser,
        Dashboard,
        Insident,
        Articals,
        collections
    },

    mounted() {
        console.log('mounted');
      }
   
});
