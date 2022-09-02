<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="packageTermsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="update" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >Update Package Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <div class="col-12 mt-3" v-if="terms.length">
                        <label>Select Term Length</label>
                        <template v-if="package.price>0">
                            <div class="row m-1" v-for="(term,index) in terms">
                                <div class="col-6">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" :value="term.id" v-model="form.terms" type="checkbox" :id="'formCheck-Term'+index">
                                        <label class="form-check-label" :for="'formCheck-Term'+index">
                                            {{getTermLengthName(term.months)}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input :disabled="term.disabled" v-model="term.discount" type="number" step="any" placeholder="Discount" autocomplete="off" class="form-control"/>
                                </div>
                            </div>
                        </template>
                        <template v-else>
                            <div class="row m-1">
                                <div class="col-4" v-for="(term,index) in terms">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" :value="term.id" v-model="form.terms" type="checkbox" :id="'formCheck-Term'+index">
                                        <label class="form-check-label" :for="'formCheck-Term'+index">
                                            {{getTermLengthName(term.months)}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                        </template>
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
                form: new Form({id:null,terms:[],discounts:[]}),
            };
        }, 
        watch: {
            'form.terms'(newValue) {
                this.terms.forEach(function (value) {
                    if(newValue.includes(value.id)){
                        value.disabled=false;
                    }else{
                        value.discount=0;
                        value.disabled=true;
                    }
                });
            }
        },
        methods: {
            edit(pack){ 
                this.form.fill(pack);
                this.package=pack
                this.form.terms=[]
                let that=this
                
                //fill (form.terms) array of selected ids
                pack.terms.forEach(function (value) {
                    that.form.terms.push(value.id);
                });
                
                axios.get("packages/create",{ params: { paginate: 0 } }).then(({ data }) => {
                    let terms=data.success.terms;
                    this.terms=terms;
                    
                    terms.forEach(function (value) {
                        let exists = pack.terms.filter(o => o.id == value.id)[0];
                        if (exists) {
                            value.disabled=false;
                            value.discount=exists.pivot.discount
                        }else{
                            value.disabled=true;
                            value.discount=null
                        }
                    });
                    $('#packageTermsModal').modal('show');
                })
                // .catch((error) => { console.log("Error......") })
            },
            update(){
                let that=this
                that.form.discounts=[];
                this.form.terms.forEach(function (id) {
                    that.form.discounts.push(that.terms.filter(o => o.id == id)[0].discount);
                });
                this.form.put("packages/"+this.form.id).then(({data}) => {
                    this.fetchData();
                    $('#packageTermsModal').modal('hide');
                    this.$swal.fire('Done', 'Package Was Updated !', 'success');
                    
                }).catch((error) => {console.log("Error......")})
            },  
        },
    }
</script>
