<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Pages SEO Table</h4>
                            <div class="page-title-right">
                                <form-modal ref="FormModal" :fetchData="fetchData" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div v-if="pages&&pages.data.length&&locales" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Keywords</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(page,index) in pages.data">
                                            <td>{{pages.current_page*(index+1)}}</td>
                                            <td>{{page.name}}</td>
                                            <template v-if="page.id>1">
                                                <td>
                                                    <template v-for="(lang,index) in locales">
                                                        <div v-if="page.title&&page.title[index]" @click="$refs.FormModal.edit(page,'title',index)" class="btn btn-sm btn-info btn-soft-info waves-effect waves-light m-1">
                                                            {{lang.name}} <i class="fa-regular fa-eye"></i>
                                                        </div>
                                                        <div v-else @click="$refs.FormModal.edit(page,'title',index)" class="btn btn-sm btn-success btn-soft-success waves-effect waves-light m-1">
                                                            {{lang.name}} <i class="fa-solid fa-plus"></i>
                                                        </div>
                                                    </template>
                                                </td>
                                                <td>
                                                    <template v-for="(lang,index) in locales">
                                                        <div v-if="page.keywords&&page.keywords[index]" @click="$refs.FormModal.edit(page,'keywords',index)" class="btn btn-sm btn-info btn-soft-info waves-effect waves-light m-1">
                                                            {{lang.name}} <i class="fa-regular fa-eye"></i>
                                                        </div>
                                                        <div v-else @click="$refs.FormModal.edit(page,'keywords',index)" class="btn btn-sm btn-success btn-soft-success waves-effect waves-light m-1">
                                                            {{lang.name}} <i class="fa-solid fa-plus"></i>
                                                        </div>
                                                    </template>
                                                </td>
                                                <td>
                                                    <template v-for="(lang,index) in locales">
                                                        <div v-if="page.description&&page.description[index]" @click="$refs.FormModal.edit(page,'description',index)" class="btn btn-sm btn-info btn-soft-info waves-effect waves-light m-1">
                                                            {{lang.name}} <i class="fa-regular fa-eye"></i>
                                                        </div>
                                                        <div v-else @click="$refs.FormModal.edit(page,'description',index)" class="btn btn-sm btn-success btn-soft-success waves-effect waves-light m-1">
                                                            {{lang.name}} <i class="fa-solid fa-plus"></i>
                                                        </div>
                                                    </template>
                                                </td>
                                            </template>
                                            <template v-else>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </template>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav v-if="pages.last_page>1" :pageSize="pages.last_page" :currentPage="pages.current_page" :GoToPage="fetchData" :loading="loader" />
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
import FormModal from '../../components/modals/page/add';
import axios from 'axios';
///////////////////////////////
export default {
    components: { LayoutDefault, PaginationNav, FormModal },
    data() {
        return { 
            pages: null,
            locales: null, 
            loader: false,
        }
    },
    created() {
        this.fetchData();
        this.getLocales();
    },
    methods: { 
        fetchData(num = 1) {
            this.pages = null;
            this.loader = true;
            let data = { params: { page: num } };
            axios.get('pages', data).then(({ data }) => {
                this.pages = data.success.pages;
                if(!data.success.pages.data.length&&num!=1){this.fetchData(1)}
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