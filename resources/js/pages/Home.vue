<template>
  <layout-default>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Home Page</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div>
                <div class="row" v-if="false">

                    <div class="col-md-3 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                    <i class="far fa-envelope fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1">
                                        <ICountUp :delay="1000" :endVal="totals.messages" :options="{decimalPlaces:0}"/>
                                    </h4>
                                    <p class="text-muted mb-0">Messages</p>
                                </div>
                            
                            </div>
                        </div>
                    </div> 
                    <!-- end col-->
                    <div class="col-md-3 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                    <i class="fas fa-tooth fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1">
                                        <ICountUp :delay="1000" :endVal="totals.services" :options="{decimalPlaces:0}"/>
                                    </h4>
                                    <p class="text-muted mb-0">Services</p>
                                </div>
                            
                            </div>
                        </div>
                    </div> 
                    
                    <!-- end col-->
                    <div class="col-md-3 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                    <i class="fas fa-blog fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1">
                                        <ICountUp :delay="1000" :endVal="totals.blogs" :options="{decimalPlaces:0}"/>
                                    </h4>
                                    <p class="text-muted mb-0">Blogs</p>
                                </div>
                            
                            </div>
                        </div>
                    </div> 
                    
                    <!-- end col-->
                    <div class="col-md-3 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                    <i class="far fa-sticky-note fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1">
                                        <ICountUp :delay="1000" :endVal="totals.testimonials" :options="{decimalPlaces:0}"/>
                                    </h4>
                                    <p class="text-muted mb-0">Testimonials</p>
                                </div>
                            
                            </div>
                        </div>
                    </div> 
                   

                </div>
            </div> <!-- end row-->

            <div class="row">
               
             
                
            </div> <!-- end row-->    

        </div> <!-- container-fluid -->
    </div>
  </layout-default>
</template>  


<script>
import LayoutDefault from '../layouts/App';
import axios from 'axios';
import ICountUp from 'vue-countup-v2';
import { mapGetters } from "vuex";
import ApexCharts from 'apexcharts'

export default {
  components: {LayoutDefault,ICountUp,ApexCharts},
  computed: {...mapGetters({user: "auth/user",})},

  data() {
      return {
        totals:{
            services:0,
            testimonials:0,
            messages:0,
            blogs:0,
        },
      }
    },  
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      
    //   axios.get('/api/home').then(({data}) => {
    //     this.totals.services=data.success.services;
    //     this.totals.testimonials=data.success.testimonials;
    //     this.totals.messages=data.success.messages;
    //     this.totals.blogs=data.success.blogs;
    //   });  
    },
   
  },
}
</script>
