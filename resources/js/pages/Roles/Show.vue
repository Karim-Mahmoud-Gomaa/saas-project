<template>
  <layout-default>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Role Details</h4>
                        <form-modal ref="FormModal"/>
                        <div class="page-title-right" v-if="role">
                            <a href="javascript:;" @click="$refs.FormModal.edit(role)" class="btn btn-success w-md waves-effect waves-light"><i class="far fa-edit"></i> Update</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row" v-if="role">
                <div class="col-lg-12">
                    <div class="card mb-5">
                         <div class="card-body" style="margin: 20px;min-height: 600px;">
                            <div class="invoice-title row">
                                <div class="col-md-4">
                                    <h4 class="font-size-16">
                                        <b>Name /</b> {{role.name}}
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="font-size-16">
                                        <b>Created At /</b> {{role.created_at| moment("DD/MM/YYYY")}}
                                    </h4>
                                </div>
                                
                                <div class="col-md-12" v-if="permissions">
                                    <hr class="mt-4 mb-4">
                                    <h4 class="font-size-16 mb-5">
                                        <b>Permissions</b>
                                        <a v-if="ischanged" @click="savePermissions()" href="javascript:;" class="btn btn-info w-md waves-effect waves-light float-end">Save Changes</a>
                                    </h4>
                                    <h4 class="row font-size-16 m-2">
                                        <div class="form-check col-md-3 mb-4" v-for="(permission,index) in permissions">
                                            <input type="checkbox" @click="ischanged=true" class="form-check-input" v-model="role_permissions" :value="permission.name" :id="'check'+index">
                                            <label class="form-check-label" :for="'check'+index">{{permission.name}}</label>
                                        </div>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- end row -->
            
        </div> <!-- container-fluid -->
    </div>
  </layout-default>
</template>  


<script>
import LayoutDefault from '../../layouts/App';
import PaginationNav from '../../components/pagination';
import axios from 'axios';
import {Form,HasError} from 'vform'
import FormModal from '../../components/modals/role/add';
import Datepicker from 'vuejs-datepicker';

export default {
  components: {
    LayoutDefault,PaginationNav,HasError,Datepicker,FormModal,
  },
  data() {
        return {
            loader:false,
            role:null,
            permissions:null,
            ischanged:false,
            role_permissions:[],
        }
    },
    created() {  
        this.fetchData();
    },
    methods: {
        async fetchData() {
            await axios.get('roles/'+this.$route.params.role_id).then(({data}) => {
                this.role=data.role;
                let that=this;
                data.permissions.data.forEach(function (value) {
                    that.role_permissions.push(value.name)
                });
            });
            axios.get('permissions').then(({data}) => {this.permissions=data.permissions.data;});
        },
        savePermissions() {
            this.ischanged=false,
            axios.put('/roles/'+this.$route.params.role_id+'/permissions',{permissions:this.role_permissions}).then(({data}) => {
                this.$swal.fire("Done!", "Role Permissions Successfully Updated", 'success');
            });
        },
    },
}
</script>
