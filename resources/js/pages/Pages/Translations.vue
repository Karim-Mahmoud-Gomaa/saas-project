<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Pages Content Table</h4>
                            <div class="page-title-right">
                                <form-modal ref="FormModal" :fetchData="fetchData" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <FormFilter ref="FormFilter" :fetchData="fetchData" />

                    <div class="col-12">
                        <div class="card">
                            <div v-if="translations&&translations.data.length&&locales" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Page</th>
                                            <th>Languages</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(translation,index) in translations.data">
                                            <td>{{translations.current_page*(index+1)}}</td>
                                            <td>{{truncate(translation.content['en'], 50)}}</td>
                                            <td>{{translation.page.name}}</td>
                                            <td>
                                                <template v-for="(lang,index) in locales">
                                                    <div v-if="translation.content&&translation.content[index]" @click="$refs.FormModal.edit(translation,index)" class="btn btn-sm btn-info btn-soft-info waves-effect waves-light m-1">
                                                        {{lang.name}} <i class="fa-regular fa-eye"></i>
                                                    </div>
                                                    <div v-else @click="$refs.FormModal.edit(translation,index)" class="btn btn-sm btn-success btn-soft-success waves-effect waves-light m-1">
                                                        {{lang.name}} <i class="fa-solid fa-plus"></i>
                                                    </div>
                                                </template>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav v-if="translations.last_page>1" :pageSize="translations.last_page" :currentPage="translations.current_page" :GoToPage="fetchData" :loading="loader" />
                            </div>
                            <div v-else class="card-body">
                                <beat-loader v-if="loader" :loading="loader" color="#5578eb"></beat-loader>
                                <p v-else class="card-title-desc" style="text-align: center;">No Data Found</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
    </layout-default>
</template>
<script>
import LayoutDefault from '../../layouts/App';
import PaginationNav from '../../components/pagination';
import FormModal from '../../components/modals/page/translation';
import FormFilter from '../../components/filters/pageContent';
import axios from 'axios';
///////////////////////////////
export default {
    components: { LayoutDefault, PaginationNav, FormModal,FormFilter },
    data() {
        return { 
            translations: null,
            locales: null, 
            loader: false,
            filter: null,
        }
    },
    created() {
        this.fetchData();
        this.getLocales();
    },
    methods: { 
        fetchData(num = 1,filter=null) {
            this.filter=filter?filter:this.filter
            this.translations = null;
            this.loader = true;
            let data = { params: { page: num, filter:this.filter } };
            axios.get('page_translations', data).then(({ data }) => {
                this.translations = data.success.translations;
                if(!data.success.translations.data.length&&num!=1){this.fetchData(1)}
                this.loader = false;
            });
        },
        getLocales() {
            axios.get('locales').then(({ data }) => {
                this.locales = data.success;
            });
        },
    },
}
</script>