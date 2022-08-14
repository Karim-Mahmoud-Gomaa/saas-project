<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Menus Table</h4>
                            <div class="page-title-right">
                                <button type="button" @click="$refs.FormModal.create()" class="btn btn-success waves-effect waves-light">Add New +</button>
                                <form-modal ref="FormModal" :fetchData="fetchData" />
                                <Item-modal ref="ItemModal" :fetchData="fetchData" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row" v-if="menus.length">
                    <div class="col-lg-12" v-for="(menu,index) in menus">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a @click="$refs.ItemModal.create(menu.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                            <i class="fa-solid fa-plus"></i> Add Item
                                        </a>
                                        <a @click="$refs.FormModal.edit(menu)" class="dropdown-item dropdownItem" href="javascript:;">
                                            <i class="far fa-edit"></i> Edit
                                        </a>
                                        <a @click="$refs.FormModal.destroy(menu.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                            <i class="far fa-trash-alt"></i> Delete
                                        </a>
                                    </div>
                                </div>
                                <h4 class="card-title mb-5">{{menu.name}}</h4>
                                <div v-if="menu.items.length">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Page Name</th>
                                                <th>Optionis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item,index) in menu.items">
                                                
                                                <td>{{item.order}}</td>
                                                <td>{{item.title}}</td>
                                                <td>{{item.page.name}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-chevron-down"></i> More
                                                        </button>
                                                        <div class="dropdown-menu" style="min-width: 120px;">
                                                            <!-- <router-link :to="{ name: 'page_show', params: { page_id: page.id } }" tag="a" class="dropdown-item">
                                                                <i class="far fa-eye"></i> Show 
                                                            </router-link> -->
                                                            <a @click="$refs.ItemModal.edit(item)" class="dropdown-item dropdownItem" href="javascript:;">
                                                                <i class="far fa-edit"></i> Edit
                                                            </a>
                                                            <a @click="$refs.ItemModal.destroy(item.id,menu.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                                <i class="far fa-trash-alt"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                    <div v-else class="card-body p-0">
                                    <p class="card-title-desc m-0" style="text-align: center;">No Items Found</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <div class="row" v-else>
                    <div class="col-12">
                        <div class="card">
                            <beat-loader class="m-5" v-if="loader" :loading="loader" color="#5578eb"></beat-loader>
                            <p v-else class="card-title-desc m-5" style="text-align: center;">No Data Found</p>
                        </div>
                    </div>
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
import FormModal from '../../components/modals/menu/add';
import ItemModal from '../../components/modals/menu/item';
import axios from 'axios';
///////////////////////////////
export default {
    components: { LayoutDefault, PaginationNav, FormModal,ItemModal },
    data() {
        return { menus: [], loader: false }
    },
    created() {
        this.fetchData();
    },
    methods: { 
        fetchData(num = 1) {
            this.menus = [];
            this.loader = true;
            let data = { params: { page: num } };
            axios.get('menus', data).then(({ data }) => {
                this.menus = data.menu;
                if(!data.menu.length&&num!=1){this.fetchData(1)}
                this.loader = false;
            });
        },
    },
}
</script>