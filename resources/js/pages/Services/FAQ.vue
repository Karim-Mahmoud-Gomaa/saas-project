<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start faq title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Packages Table</h4>
                            <div class="page-title-right">
                                <button type="button" @click="$refs.FormModal.create()" class="btn btn-success waves-effect waves-light">Add New +</button>
                                <form-modal ref="FormModal" :fetchData="fetchData" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end faq title -->
                <div class="row">
                    <FormFilter ref="FormFilter" :fetchData="fetchData" />

                    <div class="col-12">
                        <div class="card">
                            <div v-if="faqs&&faqs.data.length&&locales" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>FAQ</th>
                                            <th>Service</th>
                                            <th>Languages</th>
                                            <th>Optionis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(faq,index) in faqs.data">
                                            <td>{{faq.question['en']}}?</td>
                                            <td>{{faq.service.name['en']}}</td>
                                            <td>
                                                <template v-for="(lang,index) in locales">
                                                    <div v-if="faq.question&&faq.question[index]&&faq.answer&&faq.answer[index]" @click="$refs.FormModal.edit(faq,index)" class="btn btn-sm btn-info btn-soft-info waves-effect waves-light m-1">
                                                        {{lang.name}} <i class="fa-regular fa-eye"></i>
                                                    </div>
                                                    <div v-else @click="$refs.FormModal.edit(faq,index)" class="btn btn-sm btn-success btn-soft-success waves-effect waves-light m-1">
                                                        {{lang.name}} <i class="fa-solid fa-plus"></i>
                                                    </div>
                                                </template>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-chevron-down"></i> More
                                                    </button>
                                                    <div class="dropdown-menu" style="min-width: 120px;">
                                                        <a @click="$refs.FormModal.destroy(faq.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav v-if="faqs.last_page>1" :faqSize="faqs.last_page" :currentPackage="faqs.current_page" :GoToPackage="fetchData" :loading="loader" />
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
import FormModal from '../../components/modals/faq/add';
import FormFilter from '../../components/filters/features';

import axios from 'axios';
///////////////////////////////
export default {
    components: { LayoutDefault, PaginationNav,FormModal,FormFilter },
    data() {
        return { 
            faqs: null,
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
            this.faqs = null;
            this.loader = true;
            let data = { params: { page: num } };
            axios.get('faq', data).then(({ data }) => {
                this.faqs = data.success.faq;
                if(!data.success.faq.data.length&&num!=1){this.fetchData(1)}
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