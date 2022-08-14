<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="itemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="form.id ? update() : store()" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >{{ form.id ? 'Update':'Add New Item' }}</h5>
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
                        <label >Title</label>
                        <input v-model="form.title" type="text" autocomplete="off" required
                        class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                        <has-error :form="form" field="title"></has-error>
                    </div> 
                    <div class="col-6 mt-3" v-if="pages&&pages.length">
                        <label>Item Page</label>
                        <v-select dir="rtl" label="title" class="vselect" style="width: 100%;" :options="pages" :reduce="val => val.id" v-model="form.page_id"></v-select>
                    </div>
                    <div class="col-6 mt-3">
                        <label >Order</label>
                        <input v-model="form.order" type="number" autocomplete="off" 
                        class="form-control" :class="{ 'is-invalid': form.errors.has('order') }">
                        <has-error :form="form" field="order"></has-error>
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
            form: new Form({id:null,title:null,order:null,page_id:null}),
            pages:null,
            menu_id:null,
            errors:null,
        };
    }, 
    methods: {
        create(menu_id){
            this.form.reset();
            this.menu_id=menu_id;
            this.errors=null;
            this.getInfo();
        },
        getInfo() {
            let data = { params: { page: 1 } };
            axios.get('pages', data).then(({ data }) => {
                this.pages = data.page.data;
                if(data.page.data.length){
                    $('#itemModal').modal('show');
                }else{
                    this.$swal.fire({ icon: 'warning', title: "Sorry!", text: 'You Do Not Have Any Pages ,Please Add Page First' });
                }
            }).catch((error) => { console.log("Error......") })
        },
        store(){ 
            this.form.post("menus/"+this.menu_id+"/item").then(({data}) => {
                this.fetchData();
                $('#itemModal').modal('hide');
            }).catch((error) => {this.errors=error.response.data.errors_bag})
        },  
        edit(form){ 
            this.errors=null;
            this.form.fill(form);
            this.form.page_id=form.page.id;
            this.getInfo();
        },
        update(){
            this.form.put("menus/"+this.menu_id+"/item/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#itemModal').modal('hide');
            }).catch((error) => {console.log("Error......")})
        },  
        destroy(id,menu_id) {
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
                    axios.delete('menus/'+menu_id+'/item/'+id).then(response => {
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
