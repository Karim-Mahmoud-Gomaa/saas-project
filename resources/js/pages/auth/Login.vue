<template>
    <div>
        <div class="account-pages my-5 pt-sm-5" v-if="false">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="/assets/images/logo-dark.png" alt="" height="22" class="logo logo-dark">
                                <img src="/assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Dashboard.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form @submit.prevent="login">
        
                                        <div class="form-check" v-if="error">
                                            <p style="color:red;text-align: center;">{{error}}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="username">email Number</label>
                                            <input type="text" class="form-control" id="username" placeholder="email Number"
                                            :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email">
                                            <has-error :form="form" field="email"></has-error>
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password"
                                            :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password">
                                        </div>
                
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check" v-model="form.remember">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3" style="text-align: center">
                                        <!--
                                        -->
                                        <beat-loader v-if="loader" :loading="loader" color="#5578eb"></beat-loader>
                                        <button v-else class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                        
                                        </div>
            
                                        
                                    </form>
                                </div>
            
                            </div>
                        </div>
    
                        <div class="mt-5 text-center">
                            <p>2022 © Violet Medical. Created by <a href="https://www.bznsmonster.com/" target="_blank" class="text-reset">BznsMonster</a></p>
                        </div>
    
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
       
        <div class="main-wrapper">
             <section class="sign-up-in-section bg-dark ptb-60" style="background: url('/assets/web/img/page-header-bg.svg')no-repeat right bottom">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-5 col-md-8 col-12">
                            <a href="index.html" class="mb-4 d-block text-center"><img src="/assets/web/img/logo-white.png" alt="logo" class="img-fluid"></a>
                            <div class="register-wrap p-5 bg-light shadow rounded-custom">
                                <h1 class="h3">Nice to Seeing You Again</h1>
                                
                                <div class="position-relative d-flex align-items-center justify-content-center mt-4 py-4">
                                    <span class="divider-bar"></span>
                                    <h6 class="position-absolute text-center divider-text bg-light mb-0">Or</h6>
                                </div>
                                <form @submit.prevent="login" class="mt-4 register-form">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="email" class="mb-1">Email <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <input :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email" type="email" class="form-control" placeholder="Email" id="email" required aria-label="email">
                                                 <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="password" class="mb-1">Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <input :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password" type="password" class="form-control" placeholder="Password" id="password" required aria-label="Password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <beat-loader v-if="loader" :loading="loader" color="#5578eb"></beat-loader>
                                            <button v-else type="submit" class="btn btn-primary mt-3 d-block w-100">Submit</button>
                                        </div>
                                    </div>
                                    <!-- <p class="font-monospace fw-medium text-center text-muted mt-3 pt-4 mb-0">Don’t have an
                                        account? <a href="register.html" class="text-decoration-none">Sign up Today</a>
                                        <br>
                                        <a href="password-reset.html" class="text-decoration-none">Forgot password</a>
                                    </p> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import Vue from 'vue'
import {Form,HasError,AlertError} from 'vform'
import {mapGetters} from 'vuex'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
import axios from "axios";

export default {
    data() {
        return {
            form: new Form({
                email: 'admin@example.com',
                password: '12345678',
                remember: false
            }),
            error:null,
            loader:false
        }
    },
    methods: {
        login() {
            if(!this.loader){
                this.loader=true
                this.error=null;
                this.$store.dispatch("auth/login")
                axios.defaults.baseURL = '/api/v1/'; 

               this.form.post("login").then(({data}) => {
                    // console.log(data.accessToken);
                    this.$store.commit("auth/LOGIN_SUCCESS", {
                        token: data.accessToken,
                        user: {name:''},
                    })
                    this.$store.dispatch("auth/fetchUser");
                    this.$router.go({name:'home'})
                    // this.$router.push({name:'home'})
                })
                .catch((error) => {
                    this.loader=false
                    console.log('error',error);
                    // this.error=error.response.data.error;
                    this.$store.commit("auth/LOGIN_FAILED", 'error')
                })
            }
        }
    },
    computed: {
        ...mapGetters({
            authError: 'auth/authError',
            isLoading: 'auth/isLoading'
        })
    }
}
</script>
<style scoped>
    @import '/assets/web/css/main.css';
    @import '/assets/web/css/custom.css';
</style>