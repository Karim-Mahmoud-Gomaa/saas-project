<template>
    <layout-default>
        <div class="page-content">
            <div class="container-fluid">
                <!-- start package title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Packages Table</h4>
                            <div class="page-title-right">
                                <button type="button" @click="$refs.FormModal.create()" class="btn btn-success waves-effect waves-light">Add New +</button>
                                <form-modal ref="FormModal" :fetchData="fetchData" />
                                <update-modal ref="UpdateModal" :fetchData="fetchData" />
                                <price-modal ref="PriceModal" :fetchData="fetchData" />
                                <terms-modal ref="TermsModal" :fetchData="fetchData" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end package title -->
                <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                            <FormFilter ref="FormFilter" :fetchData="fetchData" />
                            <div v-if="packages&&packages.data.length&&locales" class="card-body" >
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Package Name</th>
                                            <th>Service</th>
                                            <th>Price</th>
                                            <th>Languages</th>
                                            <th>Optionis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(pack,index) in packages.data">
                                            <td>
                                                <i v-if="pack.is_active" class="fa-regular fa-circle-check text-success"></i>
                                                <i v-else class="fa-regular fa-circle-xmark text-danger"></i>
                                                {{pack.name['en']}}
                                            </td>
                                            <td>{{pack.service.name['en']}}</td>
                                            <td>{{moneyFormat(pack.price,2)}} / <b>Month</b></td>
                                            <td>
                                                <template v-for="(lang,index) in locales">
                                                    <div v-if="pack.name&&pack.name[index]" @click="$refs.UpdateModal.edit(pack,index)" class="btn btn-sm btn-info btn-soft-info waves-effect waves-light m-1">
                                                        {{lang.name}} <i class="fa-regular fa-eye"></i>
                                                    </div>
                                                    <div v-else @click="$refs.UpdateModal.edit(pack,index)" class="btn btn-sm btn-success btn-soft-success waves-effect waves-light m-1">
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
                                                        <a @click="$refs.TermsModal.edit(pack)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-edit"></i> Terms Length
                                                        </a>
                                                        <a @click="$refs.PriceModal.edit(pack)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-edit"></i> Update
                                                        </a>
                                                        <a @click="$refs.FormModal.destroy(pack.id)" class="dropdown-item dropdownItem" href="javascript:;">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination-nav v-if="packages.last_page>1" :packageSize="packages.last_page" :currentPackage="packages.current_page" :GoToPackage="fetchData" :loading="loader" />
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
import FormModal from '../../components/modals/package/add';
import PriceModal from '../../components/modals/package/update';
import UpdateModal from '../../components/modals/package/content';
import TermsModal from '../../components/modals/package/terms';
import FormFilter from '../../components/filters/packages';

import axios from 'axios';
///////////////////////////////
export default {
    components: { LayoutDefault, PaginationNav,UpdateModal,FormModal,FormFilter,PriceModal,TermsModal },
    data() {
        return { 
            packages: null,
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
            this.packages = null;
            this.loader = true;
            let data = { params: { package: num } };
            axios.get('packages', data).then(({ data }) => {
                console.log(data.success.packages.data);
                this.packages = data.success.packages;
                if(!data.success.packages.data.length&&num!=1){this.fetchData(1)}
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