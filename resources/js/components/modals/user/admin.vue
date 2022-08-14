<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="adminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="form.id ? update() : store()" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >{{ form.id ? 'Update':'Add New User' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <div class="col-12 mt-3">
                        <template v-for="error_group in errors">
                        <template v-for="error in error_group">
                            <div class="alert alert-danger" role="alert">{{error}}</div>
                        </template>
                        </template>
                    </div> 
                    <div class="col-6 mt-3">
                        <label >Name</label>
                        <input v-model="form.name" type="text" autocomplete="off" required
                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                    </div> 
                    <div class="col-6 mt-3">
                        <label >Email</label>
                        <input v-model="form.email" type="email" autocomplete="off" required
                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div> 
                    <div class="col-6 mt-3">
                        <label >Password</label>
                        <input v-model="form.password" type="password" autocomplete="off"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                    </div> 
                    <div class="col-6 mt-3">
                        <label >Password Confirmation</label>
                        <input v-model="form.password_confirmation" type="password" autocomplete="off"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }">
                    </div> 
                    
                    
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                    <button v-if="form.id" type="submit" class="btn btn-primary" >Update</button>
                    <button v-else type="submit" class="btn btn-primary" >Save</button>
                </div>
            </form>
        </div>
    </div>
    <!--end::Modal-->
</template>

<script>
import {Form,HasError} from 'vform'
import axios from 'axios';
import "vue-select/dist/vue-select.css";


export default {
    components: {HasError},
    props: ['fetchData'],
    data() {
        return {
            form: new Form({id:null,name:null,email:null,password:null,password_confirmation:null}),
            errors:null,
        };
    }, 
    methods: {
        edit(form){ 
            this.form.reset();
            this.errors=null;
            this.form.fill(form);
            $('#adminModal').modal('show');
        },
        update(){
            this.form.put("users/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#adminModal').modal('hide');
            }).catch((error) => {console.log("Error......")})
        },  
    },
}
</script>
