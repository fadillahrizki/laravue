<template>
    <div>
        <div class="row pb-3">
            <div class="col-md-12 m-auto text-center">
                <h2>All Artists</h2>
            </div>
        </div>

        <div class="row pb-5">
            <div class="col-md-12 m-auto text-center">
                <button class="btn-lavue" :class="active == 'latest' ? 'active' : ''" @click="handleSort('latest')">Latest</button>
                <button class="btn-lavue mx-3" :class="active == 'longest' ? 'active' : ''" @click="handleSort('longest')">Longest</button>
                <button class="btn-lavue" :class="active == 'followers' ? 'active' : ''" @click="handleSort('followers')">Followers</button>
            </div>
        </div>

        <div class="loading" v-if="loading">
            <div class="d-flex justify-content-center text-info">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>

        <div class="row centered" v-else>
            <div class="col-md-3 mb-3" v-for="(item,index) in items" :key="index">
                <Item :name="item.fullname" :email="item.email" :followers="item.followers" :image="item.image" />
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapMutations, mapState } from 'vuex'
    import Item from '../components/Item'

    export default {
        data(){
            return{
                loading:true,
                active:'latest'
            }
        },
        components:{Item},
        async created(){
            await this.getAll()
            this.loading = false
        },
        computed:{
            ...mapState({
                items:state=>state.all
            })
        },
        methods:{
            ...mapActions(['getAll']),
            ...mapMutations(['sortArtist']),

            handleSort(type){
                this.sortArtist(type)
                this.active = type
            }
        },
        watch:{
            items(people){

                people.forEach((person,i)=>{
                    person.fullname = person.first_name+' '+person.last_name
                    if(!person.image.includes('storage'))
                        person.image = window._asset+'storage/'+person.image
                })

            }
        }
    }
</script>

<style lang="scss" scoped>

</style>