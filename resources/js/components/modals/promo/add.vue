<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="promoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <div class="col-6 mt-3">
                        <label >Promo Code</label>
                        <input v-model="form.code" type="text" autocomplete="off" required
                        class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                        <has-error :form="form" field="code"></has-error>
                    </div> 
                    <div class="col-6 mt-3">
                        <label>Expired At</label>
                        <div class="row">
                            <div class="col-10">
                                <Datepicker input-class="form-control" v-model="form.expired_at" format="dd-MM-yyyy"></Datepicker>
                            </div>
                            <a href="javascrept:;" @click="clearDate()" class="btn btn-danger col-2">X</a>
                            <has-error :form="form" field="expired_at"></has-error>
                        </div> 
                    </div> 
                    <div v-if="editable" class="col-8 mt-3">
                        <label >Value</label>
                        <input v-model="form.value" type="number" autocomplete="off" required
                        class="form-control" :class="{ 'is-invalid': form.errors.has('value') }">
                        <has-error :form="form" field="value"></has-error>
                    </div> 
                    <div v-if="editable" class="col-4 mt-3">
                        <label >Type</label>
                        <div class="row pt-2">
                            <div class="radio col-6">
                                <label><input type="radio" v-model="form.type" id="optionsRadios1" value="money"> $ </label>
                            </div>
                            <div class="radio col-6">
                                <label><input type="radio" v-model="form.type" id="optionsRadios2" value="rate"> % </label>
                            </div>
                        </div>
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
import Datepicker from 'vuejs-datepicker';
import axios from 'axios';
export default {
    components: {HasError,Datepicker},
    props: ['fetchData'],
    data() {
        return {
            form: new Form({id:null,code:null,type:'money',value:null,expired_at:null}),
            editable:true,
            errors:null,
        };
    }, 
    methods: {
        clearDate(){this.form.expired_at=null},
        create(){
            this.form.reset();
            this.editable=true;
            this.errors=null;
            $('#promoModal').modal('show');
        },
        store(){ 
            this.form.post("promos").then(({data}) => {
                this.fetchData();
                $('#promoModal').modal('hide');
            }).catch((error) => {this.errors=error.response.data.errors_bag})
        },  
        edit(form){ 
            this.form.reset();
            this.errors=null;
            this.editable=form.orders_count>0?false:true;
            this.form.fill(form);
            $('#promoModal').modal('show');
        },
        update(){
            this.form.put("promos/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#promoModal').modal('hide');
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
                    axios.delete('promos/'+id).then(response => {
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
