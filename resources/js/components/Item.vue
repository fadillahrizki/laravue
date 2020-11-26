<template>
    <div class="item" :class="isMain ? 'main' : ''">
        <img :src="image" :alt="'Image '+name">

        <div class="followers">
            <h4>{{followers}}</h4>
            <p>followers</p>
        </div>

        <div class="detail">
            <h4>{{name}}</h4>
            <p>{{email}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props:['name','email','followers','image','isMain']
    }
</script>

<style lang="scss" scoped>

</style>