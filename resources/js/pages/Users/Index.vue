<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Users Table</h4>
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
                            <div v-if="users&&users.data.length" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Optionis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(user,index) in users.data">
                                            <td>{{user.name}}</td>
                                            <td>{{user.email}}</td>
                                            <td>{{user.created_at| moment("DD/MM/YYYY")}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-chevron-down"></i> More
                                                    </button>
                                                    <div class="dropdown-menu" style="min-width: 120px;">
                                                        <router-link :to="{ name: 'user_show', params: { user_id: user.id } }" tag="a" class="dropdown-item">
                                                            <i class="far fa-eye"></i> Show 
                                                        </router-link>
                                                        <a @click="$refs.FormModal.edit(user)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-edit"></i> Edit
                                                        </a>
                                                        <a @click="$refs.FormModal.destroy(user.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav class="mt-3" v-if="users.links.total_pages>1" :pageSize="users.links.total_pages" :currentPage="users.links.current_page" :GoToPage="fetchData" />
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
import FormModal from '../../components/modals/user/add';
import axios from 'axios';
///////////////////////////////
export default {
    components: { LayoutDefault, PaginationNav, FormModal },
    data() {
        return { users: null, loader: false }
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData(num = 1) {
            this.users = null;
            this.loader = true;
            let data = { params: { page: num } };
            axios.get('users', data).then(({ data }) => {
                this.users = data.users;
                if(!data.users.data.length&&num!=1){this.fetchData(1)}
                this.loader = false;
            });
        },
    },
}
</script>