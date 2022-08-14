<template>
  <layout-default>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">User Profile</h4>
                        <form-modal ref="FormModal"/>
                        <div class="page-title-right" v-if="user">
                            <a href="javascript:;" @click="$refs.FormModal.edit(user)" class="btn btn-success w-md waves-effect waves-light"><i class="far fa-edit"></i> Update</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row" v-if="user">
                <div class="col-lg-12">
                    <div class="card mb-5">
                         <div class="card-body" style="margin: 20px;min-height: 600px;">
                            <div class="invoice-title row">
                                <div class="col-md-4">
                                    <h4 class="font-size-16">
                                        <b>Name /</b> {{user.name}}
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="font-size-16">
                                        <b>Email /</b> {{user.email}}
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="font-size-16">
                                        <b>Created At /</b> {{user.created_at| moment("DD/MM/YYYY")}}
                                    </h4>
                                </div>
                                <div class="col-md-12" v-if="roles">
                                    <hr class="mt-4 mb-4">
                                    <h4 class="font-size-16 mb-5">
                                        <b>Roles</b>
                                        <a v-if="ischanged" @click="saveRoles()" href="javascript:;" class="btn btn-info w-md waves-effect waves-light float-end">Save Changes</a>
                                    </h4>
                                    <h4 class="row font-size-16 m-2">
                                        <div class="form-check col-md-3 mb-4" v-for="(role,index) in roles">
                                            <input type="checkbox" @click="ischanged=true" class="form-check-input" v-model="user_roles" :value="role.id" :id="'check'+index">
                                            <label class="form-check-label" :for="'check'+index">{{role.name}}</label>
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
import FormModal from '../../components/modals/user/add';
import Datepicker from 'vuejs-datepicker';

export default {
  components: {
    LayoutDefault,PaginationNav,HasError,Datepicker,FormModal,
  },
  data() {
        return {
            user:null,
            roles:null,
            ischanged:false,
            user_roles:[],
        }
    },
    created() {  
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios.get('users/'+this.$route.params.user_id).then(({data}) => {
                this.user=data.user;
                let that=this;
                data.user.roles.forEach(function (value) {
                    that.user_roles.push(value.id)
                });
            });
            axios.get('roles').then(({data}) => {this.roles=data.roles.data;});
        },
        saveRoles() {
            this.ischanged=false,
            axios.put('/users/'+this.$route.params.user_id+'/roles',{roles:this.user_roles}).then(({data}) => {
                this.$swal.fire("Done!", "User Roles Successfully Updated", 'success');
            });
        },
    }, 
}
</script>
