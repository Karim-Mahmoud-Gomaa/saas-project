<template>
    <!--begin::Modal-->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row" dir="rtl">
                    <div class="form-inline col-md-3" dir="ltr">
                        <div class="search-box">
                        <div class="position-relative">
                            <input type="text" v-model="filter.search" @change="goFilter" class="form-control bg-light rounded pt-1 pb-1" placeholder="Search...">
                            <i class="mdi mdi-magnify search-icon" style="margin-top:-3px;"></i>
                        </div>
                        </div> 
                    </div>

                    <div class="col-md-3" v-if="pages&&pages.length" dir="ltr">
                        <v-select label="name" @input="goFilter" class="vselect" style="width: 100%;" placeholder="Page Name" :options="pages" :reduce="val => val.id" v-model="filter.page_id"></v-select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
</template>
<script>
import axios from 'axios';
import "vue-select/dist/vue-select.css";
export default {
    props: ['fetchData'],
    data() {
        return {
            filter:{
                search:null,
                page_id:null,
            },
            pages:null,
        };
    }, 
    created() {
        this.getInfo();
    },
    methods: {
        getInfo() {
            axios.get("pages",{ params: { paginate: 0 } }).then(({ data }) => {
                this.pages = data.success.pages;
            }).catch((error) => { console.log("Error......") })
        },
        clearFilter() {
            this.filter.search=null
            this.filter.page_id=null
            this.fetchData(1,this.filter);
            // $('#collapse1')[0].click();
        },
        goFilter() {
            this.fetchData(1,this.filter);
            // $('#collapse1')[0].click();
        },
    },
}
</script>

