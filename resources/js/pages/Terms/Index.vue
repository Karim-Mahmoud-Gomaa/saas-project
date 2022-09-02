<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Terms Length Table</h4>
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
                            <div v-if="terms&&terms.data.length" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Term Length</th>
                                            <th>Optionis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(term,index) in terms.data">
                                            <td>{{((terms.current_page-1)*10)+index+1}}</td>
                                            <td>{{getTermLengthName(term.months)}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-chevron-down"></i> More
                                                    </button>
                                                    <div class="dropdown-menu" style="min-width: 120px;">
                                                        <a @click="$refs.FormModal.edit(term)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-edit"></i> Edit
                                                        </a>
                                                        <a @click="$refs.FormModal.destroy(term.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav v-if="terms.last_page>1" :termSize="terms.last_page" :currentService="terms.current_page" :GoToService="fetchData" :loading="loader" />
                                </div>
                                <div v-else class="card-body">
                                    <beat-loader v-if="loader" :loading="loader" color="#5578eb"></beat-loader>
                                    <p v-else class="card-title-desc" style="text-align: center;">No Data</p>
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
        import FormModal from '../../components/modals/term/add';
        import axios from 'axios';
        ///////////////////////////////
        export default {
            components: { LayoutDefault, PaginationNav, FormModal },
            data() {
                return { terms: null, loader: false }
            },
            created() {
                this.fetchData();
            },
            methods: {
                fetchData(num = 1) {
                    this.terms = null;
                    this.loader = true;
                    let data = { params: { term: num } };
                    axios.get('terms', data).then(({ data }) => {
                        this.terms = data.success.terms;
                        if(!data.success.terms.data.length&&num!=1){this.fetchData(1)}
                        this.loader = false;
                    });
                },

            },
        }
    </script>