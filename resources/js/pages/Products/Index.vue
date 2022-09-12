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
                            <div v-if="products&&products.data.length" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service</th>
                                            <th>Client Name</th>
                                            <th>Client Email</th>
                                            <th>Expired At</th>
                                            <th>Activation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(product,index) in products.data">
                                            <td>{{((products.current_page-1)*10)+index+1}}</td>
                                            <td>{{product.package.service.name['en']}} ({{product.package.name['en']}})</td>
                                            <td>{{product.user.name}}</td>
                                            <td>{{product.user.email}}</td>
                                            <td>{{product.expired_at| moment("DD/MM/YYYY")}}</td>
                                            <td>
                                                <b v-if="product.is_active" class="text-success">Yes</b>
                                                <b v-else class="text-danger">No</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav v-if="products.last_page>1" :productSize="products.last_page" :currentService="products.current_page" :GoToService="fetchData" :loading="loader" />
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
                return { products: null, loader: false }
            },
            created() {
                this.fetchData();
            },
            methods: {
                fetchData(num = 1) {
                    this.products = null;
                    this.loader = true;
                    let data = { params: { product: num } };
                    axios.get('products', data).then(({ data }) => {
                        this.products = data.success.products;
                        if(!data.success.products.data.length&&num!=1){this.fetchData(1)}
                        this.loader = false;
                    });
                },
            },
        }
    </script>