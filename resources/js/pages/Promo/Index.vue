<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Promo Codes Table</h4>
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
                            <div v-if="promos&&promos.data.length" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Promo Code</th>
                                            <th>Value</th>
                                            <th>Expiration</th>
                                            <th>User Created</th>
                                            <th>Orders Used</th>
                                            <th>Optionis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(promo,index) in promos.data">
                                            <td>{{((promos.current_page-1)*10)+index+1}}</td>
                                            <td class="promo-code">{{promo.code}}</td>
                                            <td>{{promo.type=='rate'?'%':'$'}}{{promo.value}}</td>
                                            <td >{{promo.expired_at| moment("DD/MM/YYYY")}}</td>
                                            <td>{{promo.user.name}}</td>
                                            <td>{{promo.orders_count}} Order{{promo.orders_count>1?'s':''}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-chevron-down"></i> More
                                                    </button>
                                                    <div class="dropdown-menu" style="min-width: 120px;">
                                                        <a @click="$refs.FormModal.edit(promo)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-edit"></i> Edit
                                                        </a>
                                                        <a @click="$refs.FormModal.destroy(promo.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav v-if="promos.last_page>1" :promoSize="promos.last_page" :currentService="promos.current_page" :GoToService="fetchData" :loading="loader" />
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
        import FormModal from '../../components/modals/promo/add';
        import axios from 'axios';
        ///////////////////////////////
        export default {
            components: { LayoutDefault, PaginationNav, FormModal },
            data() {
                return { promos: null, loader: false }
            },
            created() {
                this.fetchData();
            },
            methods: {
                fetchData(num = 1) {
                    this.promos = null;
                    this.loader = true;
                    let data = { params: { promo: num } };
                    axios.get('promos', data).then(({ data }) => {
                        this.promos = data.success.promos;
                        if(!data.success.promos.data.length&&num!=1){this.fetchData(1)}
                        this.loader = false;
                    });
                },

            },
        }
    </script>

    <style scoped>
    .promo-code{
        letter-spacing: 10px;
        font-size: large;
        font-weight: bold;
    }
    </style>