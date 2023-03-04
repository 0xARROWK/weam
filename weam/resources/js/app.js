/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueRouter from 'vue-router'
import Vuex from 'vuex'
import VueSweetalert2 from 'vue-sweetalert2'
import VueLibraries from './lib'

require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');

Vue.use(VueRouter)
Vue.use(Vuex)
Vue.use(VueSweetalert2)

Vue.mixin(VueLibraries)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/HomeComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// App
let App = require('./components/AppComponent').default;

// Authentication components
let EmailResend = require('./components/auth/VerifyComponent').default;

// Public components
let Home = require('./components/home/HomeComponent').default;

// Verified components
let Tasks = require('./components/settings/TaskComponent').default;

// Swal components
let swalLang = Vue.component('swalLang', require('./components/general/swal/ChooseLanguageComponent').default);
let swalLoginAndSigninForm = Vue.component('swalLoginAndSigninForm', require('./components/general/swal/LoginAndSigninFormComponent').default);
let swalWarning = Vue.component('swalWarning', require('./components/general/swal/WarningComponent').default);

// Vue router
const router = new VueRouter({
    mode: 'history',
    //base: '/weam/weam/public',
    routes: [

        // Public path
        {
            path: '/',
            component: Home,
            meta: {
                title: VueLibraries.methods.__('Weam')
            }
        },

        {
            path: '/app/login',
            component: Home,
            meta: {
                title: VueLibraries.methods.__('Weam')
            }
        },

        {
            path: '/app/register',
            component: Home,
            meta: {
                title: VueLibraries.methods.__('Weam')
            }
        },

        // Verified path
        {
            path: '/settings',
            component: Tasks,
            meta: {
                title: VueLibraries.methods.__('Tasks')
            }
        },

        // Channel
        /*{
            path: '*',
            redirect: '/'
        }*/
    ]
});



// Page title
router.beforeEach((to, from, next) => {
    document.title = to.meta.title

    next()
});



// Vue global variables
Vue.prototype.$appURL = "http://weam.tv"
Vue.prototype.$apiURL = "http://weam.tv/api"
Vue.prototype.$swalRouter = router


// Vue app
const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
