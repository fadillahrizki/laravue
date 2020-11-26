import Vue from 'vue'
import Home from './pages/Home'
import Register from './pages/Register'
import Artists from './pages/Artists'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/',
            name:'home',
            component:Home
        },
        {
            path:'/artists',
            name:'artists',
            component:Artists
        },
        {
            path:'/register',
            name:'register',
            component:Register
        },
    ]
})

export default router