<template>
    <div class="modal fade" id="featurePackageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="update" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >Create New Feature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Package Name</th>
                                <th>Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(pack,index) in packages">
                                <td>{{pack.name['en']}} ( {{moneyFormat(pack.price,2)}} / Month )</td>
                                <td>
                                    <div class="form-check form-switch form-switch-lg float-start">
                                        <input type="checkbox" :value="pack.id" v-model="form.packages" class="float-end form-check-input" :id="'customSwitchsizelg-'+index">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

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


export default {
    components: {HasError},
    props: ['fetchData'],
    data() {
        return {
            packages:[],
            form: new Form({id:null,packages:[]}),
        };
    }, 
    methods: {
        edit(feature) {
            this.form.reset();
            this.form.id=feature.id;
            let that=this;
            feature.packages.forEach(function (value) {
                that.form.packages.push(value.id)
            });
            this.getInfo(feature);
        },
        update(){ 
            this.form.put("features/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#featurePackageModal').modal('hide');
            })
        },  
        getInfo(feature) {
            axios.get("packages",{ params: { paginate: 0 ,filter:{service_id:feature.service_id}} }).then(({ data }) => {
                console.log(data.success);
                this.packages =data.success.packages;
                if(data.success.packages.length){
                    $('#featurePackageModal').modal('show');
                }else{
                    this.$swal.fire({ icon: 'warning', title: "Sorry!", text: 'You Most Create packages For This Service First' });
                }
            }).catch((error) => { console.log("Error......") })
        },

    },
}
</script>
