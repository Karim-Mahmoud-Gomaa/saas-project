<template>
    <!--begin::Modal-->  
     <div class="modal fade" id="featureUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="update" class="modal-content" v-if="form.lang">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >Update Feature Description - ( {{form.lang.toUpperCase()}} )</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <div class="col-12 mt-3">
                        <textarea :dir="form.lang=='ar'?'rtl':'ltr'" v-model="form.description" rows="2" 
                        class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                        <has-error :form="form" field="description"></has-error>
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
import {Form,HasError} from 'vform'
export default {
    components: {HasError},
    props: ['fetchData'],
    data() {
        return {
            feature:null,
            form: new Form({id:null,description:null,lang:null}),
        };
    }, 
    methods: {
        edit(feature,lang){ 
            this.form.reset();
            this.form.id=feature.id;
            this.form.lang=lang;
            this.form.description=feature.description?feature.description.[lang]:null;

            this.feature=feature;
            $('#featureUpdateModal').modal('show');
        },
        update(){
            this.form.put("features/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#featureUpdateModal').modal('hide');
                this.$swal.fire('Done', 'Feature Was Updated !', 'success');

            }).catch((error) => {console.log("Error......")})
        },  
    },
}
</script>
