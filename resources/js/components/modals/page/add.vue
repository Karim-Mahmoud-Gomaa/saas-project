<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="pageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="form.id ? update() : store()" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >{{ form.id ? 'Update':'Add New Page' }}</h5>
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
                        <label >Title</label>
                        <input v-model="form.title" type="text" autocomplete="off" required
                        class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                        <has-error :form="form" field="title"></has-error>
                    </div> 
                    <div class="col-12 mt-3">
                        <label >Keywords</label>
                        <input v-model="form.keywords" type="text" autocomplete="off"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('keywords') }">
                        <has-error :form="form" field="keywords"></has-error>
                    </div> 
                    <div class="col-12 mt-3">
                        <label >Description</label>
                        <textarea v-model="form.description" rows="5" 
                        class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                        <has-error :form="form" field="description"></has-error>
                    </div> 
                    <div class="col-12 row mt-3">
                        <label >Page Type</label>
                        <div class="col-4">
                            <div class="form-check mb-3">
                                <input v-model="types" value="1"  class="form-check-input" type="radio" name="formRadios" id="formRadios1">
                                <label class="form-check-label" for="formRadios1"> Home Page </label>
                            </div>
                        </div> 
                        <div class="col-4">
                            <div class="form-check mb-3">
                                <input v-model="types" value="2" class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                <label class="form-check-label" for="formRadios2"> 404 Page </label>
                            </div>
                        </div> 
                        <div class="col-4">
                            <div class="form-check mb-3">
                                <input v-model="types" value="3" class="form-check-input" type="radio" name="formRadios" id="formRadios3">
                                <label class="form-check-label" for="formRadios3"> Other Page </label>
                            </div>
                        </div> 
                    </div> 
                    <div class="col-6 mt-3">
                        <i v-if="image" class="fa-2x fa-check-circle far text-success"></i>
                        <a href="javascript:;" @click="$refs.file1.click()" class="btn btn-info btn-sm m-2 waves-effect mt-0 waves-light font-size-16"><i class="fas fa-upload"></i> Upload Featured Image</a>
                        <input @change="onFileChange($event)" ref="file1" type="file" class="hidden" accept="image/*" >
                        <has-error :form="form" field="logo"></has-error>
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
            types:3,image:null,
            form: new Form({id:null,name:null,title:null,keywords:null,description:null,image:null,is_404:false,is_home:false}),
            errors:null,
        };
    }, 
    watch: {
        types(type) {
            this.form.is_home=(type==1)?true:false;
            this.form.is_404=(type==2)?true:false;
        }
    },
    methods: {
        create(){
            this.form.reset();
            this.image=null;
            this.errors=null;
            $('#pageModal').modal('show');
        },
        store(){ 
            this.form.post("pages").then(({data}) => {
                // this.saveImage(data.success);
                this.fetchData();
                $('#pageModal').modal('hide');
            }).catch((error) => {this.errors=error.response.data.errors_bag})
        },  
        edit(form){ 
            this.form.reset();
            this.image=null;
            this.errors=null;
            this.form.fill(form);
            
            //change radio button
            if(form.is_home){this.types=1}
            else if(form.is_404){this.types=2}
            else{this.types=3}

            $('#pageModal').modal('show');
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (files.length){
                this.image=files[0]
            }
        },
        saveImage(id) {
            if(this.image){
                let fd = new FormData();
                fd.append("image", this.image);
                fd.append("blog_id", id);
                axios.post('/api/blog_image',fd,{headers:{'Content-Type':'multipart/form-data'}}).then(({ data }) => {
                    this.fetchData();
                    $('#formModal').modal('hide');
                });
            }else{
                this.fetchData();
                $('#formModal').modal('hide');
            }
        },
        update(){
            this.form.put("pages/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#pageModal').modal('hide');
            }).catch((error) => {console.log("Error......")})
        },  
        restore(id){
            axios.post("pages/"+id+'/restore').then(({data}) => {
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
                    axios.delete('pages/'+id).then(response => {
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
                    axios.delete('pages/'+id+'/force').then(response => {
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
