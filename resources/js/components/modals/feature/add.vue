<template>
    <div class="modal fade" id="featureAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="store" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >Create New Feature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <div class="col-12 mt-3">
                        <label>Description</label>
                        <input v-model="form.description" type="text" autocomplete="off" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                        <has-error :form="form" field="description"></has-error>
                    </div>
                    <div class="col-12 mt-3" v-if="services&&services.length">
                        <label>Service</label>
                        <v-select label="name" class="vselect" style="width: 100%;" :options="services" :reduce="val => val.id" v-model="form.service_id"></v-select>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
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
            services:[],
            form: new Form({service_id:null,description:null}),
        };
    }, 
    methods: {
        create() {
            this.form.reset();
            this.getInfo();
        },
        store(){ 
            this.form.post("features").then(({data}) => {
                this.fetchData();
                $('#featureAddModal').modal('hide');
            })
        },  
        getInfo() {
            axios.get("services",{ params: { paginate: 0 } }).then(({ data }) => {
                this.services =[];
                if(data.success.services.length){
                    let that= this
                    data.success.services.forEach(function (value) {
                        that.services.push({id:value.id,name:value.name['en']});
                    });
                    $('#featureAddModal').modal('show');
                }else{
                    this.$swal.fire({ icon: 'warning', title: "Sorry!", text: 'You Most Create Service First' });
                }
            }).catch((error) => { console.log("Error......") })
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
                    axios.delete('features/'+id).then(response => {
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
