<template>
    <!--begin::Modal-->
    <div class="card-body">
        <div class="row" dir="rtl">
            <div class="col-md-3" v-if="services&&services.length" dir="ltr">
                <v-select label="name" @input="goFilter" class="vselect" style="width: 100%;" placeholder="Service Name" :options="services" :reduce="val => val.id" v-model="filter.service_id"></v-select>
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
                service_id:null,
            },
            services:[],
        };
    }, 
    created() {
        this.getInfo();
    },
    methods: {
        getInfo() {
            axios.get("services",{ params: { paginate: 0 } }).then(({ data }) => {
                let that= this
                data.success.services.forEach(function (value) {
                    that.services.push({id:value.id,name:value.name['en']});
                });
            }).catch((error) => { console.log("Error......") })
        },
        clearFilter() {
            this.filter.service_id=null
            this.fetchData(1,this.filter);
        },
        goFilter() {
            this.fetchData(1,this.filter);
        },
    },
}
</script>

