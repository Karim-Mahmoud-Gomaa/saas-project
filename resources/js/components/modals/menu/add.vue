<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="menuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="form.id ? update() : store()" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >{{ form.id ? 'Update':'Add New Menu' }}</h5>
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
                    <div class="col-12 mt-3">
                        <label >Name</label>
                        <input v-model="form.name" type="text" autocomplete="off" required
                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
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
            form: new Form({id:null,name:null}),
            errors:null,
        };
    }, 
    methods: {
        create(){
            this.form.reset();
            this.errors=null;
            $('#menuModal').modal('show');
        },
        store(){ 
            this.form.post("menus").then(({data}) => {
                this.fetchData();
                $('#menuModal').modal('hide');
            }).catch((error) => {this.errors=error.response.data.errors_bag})
        },  
        edit(form){ 
            this.errors=null;
            this.form.fill(form);
            $('#menuModal').modal('show');
        },
        update(){
            this.form.put("menus/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#menuModal').modal('hide');
            }).catch((error) => {console.log("Error......")})
        },  
        restore(id){
            axios.post("menus/"+id+'/restore').then(({data}) => {
                this.fetchData();
                this.$swal.fire(data.message, data.success+'!', 'success');
            }).catch((error) => {console.log("Error......")})
        },  
        destroy(id) {
            this.$swal.fire({
                 title: 'warning',
                text: "Are you sure you want to remove this page?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "cancel",
                confirmButtonText: "Yes,Delete It!",
            }).then((result) => {
                if (result.value) {
                    axios.delete('menus/'+id).then(response => {
                        this.$swal.fire(response.data.message, response.data.success+'!', 'success');
                        this.fetchData();
                    }).catch(() => {
                        this.$swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        }); 
                    });
                }
            })
        },
        forceDestroy(id) {
            this.$swal.fire({
                 title: 'warning',
                text: "Are you sure you want to remove this page?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "cancel",
                confirmButtonText: "Yes,Delete It!",
            }).then((result) => {
                if (result.value) {
                    axios.delete('menus/'+id+'/force').then(response => {
                        this.$swal.fire(response.data.message, response.data.success+'!', 'success');
                        this.fetchData();
                    }).catch(() => {
                        this.$swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        }); 
                    });
                }
            })
        },
    },
}
</script>
