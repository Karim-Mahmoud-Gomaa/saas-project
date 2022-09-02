<template>
    <div class="modal fade" id="packageAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="store" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >Create New Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <div class="col-12 mt-3">
                        <label>Name</label>
                        <input v-model="form.name" type="text" autocomplete="off" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="col-12 mt-3" v-if="services&&services.length">
                        <label>Service</label>
                        <v-select label="name" class="vselect" style="width: 100%;" :options="services" :reduce="val => val.id" v-model="form.service_id"></v-select>
                    </div>
                    <div class="col-12 mt-3">
                        <label>Repository Path</label>
                        <input v-model="form.repo_path" type="text" autocomplete="off" class="form-control" :class="{ 'is-invalid': form.errors.has('repo_path') }">
                        <has-error :form="form" field="repo_path"></has-error>
                    </div>
                    <div class="col-12 mt-3">
                        <label>Price Per Month</label>
                        <input v-model="form.price" type="number" step="any" autocomplete="off" class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
                        <has-error :form="form" field="price"></has-error>
                    </div>
                    <div class="col-12 mt-3" v-if="terms.length">
                        <div class="row m-0">
                            <label>Select Term Length</label>
                            <div class="form-check col-4 mb-3" v-for="(term,index) in terms">
                                <input class="form-check-input" :value="term.id" v-model="form.terms" type="checkbox" :id="'formCheck-Term'+index">
                                <label class="form-check-label" :for="'formCheck-Term'+index">
                                    {{getTermLengthName(term.months)}}
                                </label>
                            </div>
                        </div>
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
                terms:[],
                form: new Form({service_id:null,name:null,repo_path:null,price:null,terms:[]}),
            };
        }, 
        methods: {
            create() {
                this.form.reset();
                this.getInfo();
            },
            store(){ 
                this.form.post("packages").then(({data}) => {
                    this.fetchData();
                    $('#packageAddModal').modal('hide');
                })
            },  
            getInfo() {
                axios.get("packages/create",{ params: { paginate: 0 } }).then(({ data }) => {
                    this.services =[];
                    if(data.success.services.length||data.success.terms.length){
                        let that= this
                        data.success.services.forEach(function (value) {
                            that.services.push({id:value.id,name:value.name['en']});
                        });
                        this.terms=data.success.terms;
                        $('#packageAddModal').modal('show');
                    }else{
                        this.$swal.fire({ icon: 'warning', title: "Sorry!", text: 'You Most Create Service & Terms Length First' });
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
                        axios.delete('packages/'+id).then(response => {
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
