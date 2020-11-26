<template>
    <div class="register">

            <div class="row pb-3">
                <div class="col-12 m-auto text-center">
                    <h2>Register Artist</h2>
                </div>
            </div>

            <form class="row" @submit.prevent="handleRegist">
                <div class="col-6 m-auto">

                    <div class="alert alert-success" role="alert" v-if="result && submitted">
                        New Artist has been Registered!
                    </div>

                    <div class="alert alert-danger" role="alert" v-else-if="!result && submitted">
                        Failed to register new artist!
                    </div>
                    
                    <div class="row my-3">

                        <div class="col-2 ic text-center">
                            <img :src="ic_user" alt="User Icon">
                        </div>

                        <div class="col-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" v-model="artist.first_name" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" v-model="artist.last_name" class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row my-3">

                        <div class="col-2 ic text-center">
                            <img :src="ic_email" alt="Email Icon">
                        </div>

                        <div class="col-10">
                            <input type="text" v-model="artist.email" class="form-control" placeholder="Email" required>
                        </div>

                    </div>
                    
                    <div class="row my-3">

                        <div class="col-2 ic text-center">
                            <img :src="ic_phone" alt="Phone Icon">
                        </div>

                        <div class="col-10">
                            <input type="tel" v-model="artist.phone" class="form-control" placeholder="Phone" required>
                        </div>

                    </div>

                    <div class="row my-3">

                        <div class="col-2 ic text-center">
                            <img :src="ic_image" alt="Image Icon">
                        </div>

                        <div class="col-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" ref="image" @change="handleUpload" id="image" required>
                                <label class="custom-file-label" for="image">{{img_label}}</label>
                            </div>
                        </div>

                    </div>

                    <div class="row my-3">

                        <div class="col-2 ic text-center">
                            <img :src="ic_desc" alt="Description Icon">
                        </div>

                        <div class="col-10">
                            <textarea class="form-control" v-model="artist.description" cols="30" rows="5" placeholder="Description"></textarea>
                        </div>

                    </div>

                    <div class="row my-3">
                        <div class="col text-right">
                            <button class="btn-lavue"> 

                                <div class="d-flex justify-content-center text-info" v-if="submitting">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>

                                <span v-else>Submit</span>
                            </button>  
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
</template>

<script>
    import axios from 'axios'
    import { mapActions } from 'vuex';
    
    export default {
        data(){
            return{
                artist:{
                    first_name:'',
                    last_name:'',
                    email:'',
                    phone:'',
                    image:'',
                    description:'',
                },
                img_label:'Choose image...',
                result:null,
                submitting:false,
                submitted:false
            }
        },
        computed:{
            ic_user(){
                return window._asset+"icons/user.svg";
            },
            ic_email(){
                return window._asset+"icons/email.svg";
            },
            ic_phone(){
                return window._asset+"icons/phone.svg";
            },
            ic_image(){
                return window._asset+"icons/image.svg";
            },
            ic_desc(){
                return window._asset+"icons/description.svg";
            },
        },
        methods:{
            ...mapActions(['register']),
            async handleRegist(){

                var formData = new FormData()
                formData.append('first_name',this.artist.first_name)
                formData.append('last_name',this.artist.last_name)
                formData.append('email',this.artist.email)
                formData.append('phone',this.artist.phone)
                formData.append('description',this.artist.description)
                formData.append('image',this.artist.image)

                this.submitting = true

                this.result = await this.register(formData)

                if(this.result){
                    this.artist = {
                        first_name:'',
                        last_name:'',
                        email:'',
                        phone:'',
                        image:'',
                        description:'',
                    }

                    this.img_label = "Choose image..."
                }

                this.submitting = false

                this.submitted = true

            },
            handleUpload(){
                this.artist.image = this.$refs.image.files[0]
                this.img_label = this.artist.image.name
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>