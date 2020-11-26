import './bootstrap'
import '../css/app.css'
import Vue from 'vue'
import router from './router'
import store from './store'
import App from './layouts/App'

const app = new Vue({
    router,
    store,
    el: '#app',
    render: h => h (App),
});
