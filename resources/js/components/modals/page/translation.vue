<template>
    <!--begin::Modal-->  
    <div class="modal fade" id="translationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form @submit.prevent="update" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" >Update {{form.name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div> 
                <div class="modal-body row"> 
                    <div class="name-12 mt-3" v-if="form.lang">
                        <label >{{form.name.toUpperCase()}} ({{form.lang.toUpperCase()}})</label>
                        <textarea :dir="form.lang=='ar'?'rtl':'ltr'" v-model="form.content" rows="3" 
                        class="form-control" :class="{ 'is-invalid': form.errors.has('content') }"></textarea>
                        <has-error :form="form" field="content"></has-error>
                    </div> 
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary" >Save</button>
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
            page:null,
            form: new Form({id:null,content:null,name:null,lang:null}),
        };
    }, 
    methods: {
        edit(page,lang){ 
            // console.log(page.content.[lang],lang);
            this.form.reset();
            this.form.id=page.id;
            this.form.lang=lang;
            this.form.name=page.name;
            this.form.content=page.content?page.content.[lang]:null;

            this.page=page;
            $('#translationModal').modal('show');
        },
        update(){
            this.form.put("page_translations/"+this.form.id).then(({data}) => {
                this.fetchData();
                $('#translationModal').modal('hide');
                this.$swal.fire('Done', 'Page Was Updated !', 'success');

            }).catch((error) => {console.log("Error......")})
        },  
    },
}
</script>
