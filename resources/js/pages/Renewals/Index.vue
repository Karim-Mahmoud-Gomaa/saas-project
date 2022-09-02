<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Renewals Table</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div v-if="renewals&&renewals.data.length" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client Name</th>
                                            <th>Client Email</th>
                                            <th>Expired At</th>
                                            <th>Refused At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(renewal,index) in renewals.data">
                                            <td>{{((renewals.current_page-1)*10)+index+1}}</td>
                                            <td>{{renewal.user.name}}</td>
                                            <td>{{renewal.user.email}}</td>
                                            <td>{{renewal.expired_at| moment("DD/MM/YYYY")}}</td>
                                            <td>{{renewal.refused_at| moment("DD/MM/YYYY")}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav v-if="renewals.last_page>1" :renewalSize="renewals.last_page" :currentService="renewals.current_page" :GoToService="fetchData" :loading="loader" />
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
        import axios from 'axios';
        ///////////////////////////////
        export default {
            components: { LayoutDefault, PaginationNav },
            data() {
                return { renewals: null, loader: false }
            },
            created() {
                this.fetchData();
            },
            methods: {
                fetchData(num = 1) {
                    this.renewals = null;
                    this.loader = true;
                    let data = { params: { renewal: num } };
                    axios.get('renewals', data).then(({ data }) => {
                        this.renewals = data.success.renewals;
                        if(!data.success.renewals.data.length&&num!=1){this.fetchData(1)}
                        this.loader = false;
                    });
                },
            },
        }
    </script>