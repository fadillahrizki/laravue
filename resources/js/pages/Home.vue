<template>
    <div>
        <div class="row pb-3">
            <div class="col-12 m-auto text-center">
                <h2>Most Popular</h2>
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
            <div class="col-3">
                <Item :name="popular[1].fullname" :email="popular[1].email" :followers="popular[1].followers" :image="popular[1].image" />
            </div>
            <div class="col-5">
                <Item :name="popular[0].fullname" :email="popular[0].email" :followers="popular[0].followers" :image="popular[0].image" :isMain="true" />
            </div>
            <div class="col-3">
                <Item :name="popular[2].fullname" :email="popular[2].email" :followers="popular[2].followers" :image="popular[2].image" />
            </div>
        </div>
    
    </div>
</template>

<script>
    import Item from '../components/Item'
    import {mapActions, mapState} from 'vuex'
    export default {
        components:{Item},
        data(){
            return{
                loading:true
            }
        },
        async created(){
            await this.getPopular()
            this.loading = false
        },
        computed:{
            ...mapState({
                popular:state=>state.popular
            })
        },
        methods:{
            ...mapActions(['getPopular'])
        },
        watch:{
            popular(people){

                people.forEach(person=>{
                    person.fullname = person.first_name+' '+person.last_name
                    person.image = window._asset+'storage/'+person.image
                })

            }
        }
    }
</script>

<style lang="scss" scoped>

</style>