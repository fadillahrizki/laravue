<template>
    <div class="container">
        <nav class="navbar navbar-light">
            <router-link :to="{name:'artists'}" class="btn-lavue" :class="$route.path.includes('artists') ? 'active' : ''">All Artists</router-link>
            <router-link :to="{name:'home'}" class="navbar-brand m-auto">LaraVue</router-link>
            <router-link :to="{name:'register'}" class="btn-lavue" :class="$route.path === '/register' ? 'active' : ''">Register Artist</router-link>
        </nav>

        <router-view class="my-5"></router-view>

        <footer class="bg-light p-3 text-center">
            Copyright © RizkyFadillah. All Rights Reserved.
        </footer>
    </div>
</template>