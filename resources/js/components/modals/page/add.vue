<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="pageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="update" class="modal-content" v-if="form.col&&form.lang">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >Update Page ( {{form.col.toUpperCase()}} ) - ( {{form.lang.toUpperCase()}} )</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <div class="col-12 mt-3">
                        <textarea :dir="form.lang=='ar'?'rtl':'ltr'" v-model="form.content" rows="2" 
                        class="form-control" :class="{ 'is-invalid': form.errors.has('content') }"></textarea>
                        <has-error :form="form" field="content"></has-error>
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
import axios from 'axios';
import "vue-select/dist/vue-select.css";


export default {
    components: {HasError},
    props: ['fetchData'],
    data() {
        return {
            page:null,
            form: new Form({id:null,content:null,col:null,lang:null}),
        };
    }, 
    methods: {
        edit(page,col,lang){ 
            this.form.reset();
            this.form.id=page.id;
            this.form.lang=lang;
            this.form.col=col;
            this.form.content=page.[col].[lang];

            this.page=page;
            $('#pageModal').modal('show');
        },
        update(){
            this.form.put("pages/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#pageModal').modal('hide');
                this.$swal.fire('Done', 'Page Was Updated !', 'success');

            }).catch((error) => {console.log("Error......")})
        },  
    },
}
</script>
