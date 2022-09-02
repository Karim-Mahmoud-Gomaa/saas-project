<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="termModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="form.id ? update() : store()" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >{{ form.id ? 'Update':'Add New' }} Length</h5>
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
                        <label >Months (term Length)</label>
                        <input v-model="form.months" type="number" autocomplete="off" required
                        class="form-control" :class="{ 'is-invalid': form.errors.has('months') }">
                        <has-error :form="form" field="months"></has-error>
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
export default {
    components: {HasError},
    props: ['fetchData'],
    data() {
        return {
            form: new Form({id:null,months:null}),
            errors:null,
        };
    }, 
    methods: {
        create(){
            this.form.reset();
            this.errors=null;
            $('#termModal').modal('show');
        },
        store(){ 
            this.form.post("terms").then(({data}) => {
                this.fetchData();
                $('#termModal').modal('hide');
            }).catch((error) => {this.errors=error.response.data.errors_bag})
        },  
        edit(form){ 
            this.form.reset();
            this.errors=null;
            this.form.fill(form);
            $('#termModal').modal('show');
        },
        update(){
            this.form.put("terms/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#termModal').modal('hide');
            }).catch((error) => {console.log("Error......")})
        },  
        destroy(id) {
            this.$swal.fire({
                 title: 'warning',
                text: "Are you sure you want to remove this row?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "cancel",
                confirmButtonText: "Yes,Delete It!",
            }).then((result) => {
                if (result.value) {
                    axios.delete('terms/'+id).then(response => {
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
