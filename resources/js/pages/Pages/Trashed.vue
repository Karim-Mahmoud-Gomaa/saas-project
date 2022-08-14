<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Pages Trashed Table</h4>
                            <div class="page-title-right">
                                <button type="button" @click="$refs.FormModal.create()" class="btn btn-success waves-effect waves-light">Add New +</button>
                                <form-modal ref="FormModal" :fetchData="fetchData" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div v-if="pages&&pages.data.length" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Blocks</th>
                                            <th>Optionis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(page,index) in pages.data">
                                            <td class="col-1 text-center">
                                                <i v-if="page.is_home" class="fa-solid fa-house-chimney text-info"></i>
                                                <i v-if="!page.is_home&&!page.is_404" class="fa-solid fa-minus text-success"></i>
                                                <div v-if="page.is_404" class="text-center" style="font-size: smaller;">
                                                    <i class="fa-solid fa-4 text-danger"></i>
                                                    <i class="fa-solid fa-0 text-danger"></i>
                                                    <i class="fa-solid fa-4 text-danger"></i>
                                                </div>
                                            </td>
                                            <td>
                                                {{page.name}}
                                            </td>
                                            <td>{{page.title}}</td>
                                            <td>{{page.blocks.length}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-chevron-down"></i> More
                                                    </button>
                                                    <div class="dropdown-menu" style="min-width: 120px;">
                                                        <a @click="$refs.FormModal.restore(page.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="fa-solid fa-rotate-left"></i> restore
                                                        </a>
                                                        <a @click="$refs.FormModal.forceDestroy(page.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav class="mt-3" v-if="pages.links.total_pages>1" :pageSize="pages.links.total_pages" :currentPage="pages.links.current_page" :GoToPage="fetchData" />
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
        return { pages: null, loader: false }
    },
    created() {
        this.fetchData();
    },
    methods: { 
        fetchData(num = 1) {
            this.pages = null;
            this.loader = true;
            let data = { params: { page: num } };
            axios.get('pages/trashed', data).then(({ data }) => {
                this.pages = data.page;
                if(!data.page.data.length&&num!=1){this.fetchData(1)}
                this.loader = false;
            });
        },
    },
}
</script>