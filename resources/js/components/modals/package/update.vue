<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="packagePriceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="update" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >Update Package Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <div class="col-12 mt-3">
                        <label>Repository Path</label>
                        <input v-model="form.repo_path" type="text" autocomplete="off" class="form-control" :class="{ 'is-invalid': form.errors.has('repo_path') }">
                        <has-error :form="form" field="repo_path"></has-error>
                    </div>
                    <div class="col-6 mt-3">
                        <label>Price Per Month</label>
                        <input v-model="form.price" type="number" step="any" autocomplete="off" class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
                        <has-error :form="form" field="price"></has-error>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="form-check form-switch form-switch-lg mt-4 pe-5">
                            <label class="form-check-label float-end" for="customSwitchsizelg">Activation</label>
                            <input type="checkbox" v-model="form.is_active" class="float-end form-check-input" id="customSwitchsizelg"  :class="{ 'is-invalid': form.errors.has('is_active') }">
                            <has-error :form="form" field="is_active"></has-error>
                        </div>
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
    <!--end::Modal-->
</template>

<script>
    import axios from 'axios';
    import {Form,HasError} from 'vform'
    export default {
        components: {HasError},
        props: ['fetchData'],
        data() {
            return {
                terms:[],
                package:null,
                form: new Form({id:null,price:null,repo_path:null,terms:null,is_active:false}),
            };
        }, 
        methods: {
            edit(pack){ 
                this.form.fill(pack);
                this.form.terms=[]
                let that=this
                pack.terms.forEach(function (value) {
                    that.form.terms.push(value.id);
                });
                axios.get("packages/create",{ params: { paginate: 0 } }).then(({ data }) => {
                    this.terms=data.success.terms;
                    $('#packagePriceModal').modal('show');
                }).catch((error) => { console.log("Error......") })
            },
            update(){
                this.form.put("packages/"+this.form.id).then(({data}) => {
                    this.fetchData();
                    $('#packagePriceModal').modal('hide');
                    this.$swal.fire('Done', 'Package Was Updated !', 'success');
                    
                }).catch((error) => {console.log("Error......")})
            },  
        },
    }
</script>
