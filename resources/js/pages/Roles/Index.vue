<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Roles Table</h4>
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
                            <div v-if="roles&&roles.data.length" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Optionis</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <tr v-for="(role,index) in roles.data">
                                            <td>{{role.name}}</td>
                                            <td>{{role.created_at| moment("DD/MM/YYYY")}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-chevron-down"></i> More
                                                    </button>
                                                    <div class="dropdown-menu" style="min-width: 120px;">
                                                        <router-link :to="{ name: 'role_show', params: { role_id: role.id } }" tag="a" class="dropdown-item">
                                                            <i class="far fa-eye"></i> Show 
                                                        </router-link>
                                                        <a @click="$refs.FormModal.edit(role)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-edit"></i> Edit
                                                        </a>
                                                        <a @click="$refs.FormModal.destroy(role.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav class="mt-3" v-if="roles.links.total_pages>1" :pageSize="roles.links.total_pages" :currentPage="roles.links.current_page" :GoToPage="fetchData" />
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
import FormModal from '../../components/modals/role/add';
import axios from 'axios';
///////////////////////////////
export default {
    components: { LayoutDefault, PaginationNav, FormModal },
    data() {
        return { roles: null,loader: false }
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData(num = 1) {
            this.roles = null;
            this.loader = true;
            let data = { params: { page: num } };
            axios.get('roles',data).then(({data})=>{
                this.roles=data.roles;
                if(!data.roles.data.length&&num!=1){this.fetchData(1)}
                this.loader=false;
            });
        },
    },
}
</script>