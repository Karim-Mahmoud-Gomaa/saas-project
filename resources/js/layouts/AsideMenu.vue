<template>
    <div class="vertical-menu">
        <!-- LOGO -->
        <!--
            
        -->
        <div class="titlebar-brand-box">
            <router-link :to="{name:'home'}" tag="a" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="https://fakeimg.pl/250x100/" alt="" style="height: 35px;">
                </span>
                <span class="logo-lg ms-3">
                    <img src="https://fakeimg.pl/250x100/" alt="" style="height:62px;">
                </span>
            </router-link>
            <router-link :to="{name:'home'}" tag="a" class="logo logo-light">
                <span class="logo-sm">
                    <img src="https://fakeimg.pl/250x100/" alt="" style="height: 35px;">
                </span>
                <span class="logo-lg ms-3">
                    <img src="https://fakeimg.pl/250x100/" alt="" style="height:62px;">
                </span>
            </router-link>
        </div>
        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
        </button>
        <div data-simplebar class="sidebar-menu-scroll mt-0">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title"> Menu</li>
                    <li class="mm-active">
                        <router-link :to="{name:'home'}" tag="a" class="link-page">
                            <i class="uil-home-alt"></i>
                            <span>Home Page</span>
                        </router-link>
                    </li>
                   

                    <!--Start Admin Views-->
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="far fa-file-alt"></i><span>Public</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><router-link :to="{name:'terms'}" tag="a" class="link-page">Term Length</router-link></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="far fa-file-alt"></i><span>Pages</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><router-link :to="{name:'pages'}" tag="a" class="link-page">Pages SEO</router-link></li>
                            <li><router-link :to="{name:'pages-translations'}" tag="a" class="link-page">Pages Content</router-link></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="far fa-file-alt"></i><span>Services</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><router-link :to="{name:'services'}" tag="a" class="link-page">Services</router-link></li>
                            <li><router-link :to="{name:'packages'}" tag="a" class="link-page">Packages</router-link></li>
                            <li><router-link :to="{name:'features'}" tag="a" class="link-page">Features</router-link></li>
                            <li><router-link :to="{name:'faq'}" tag="a" class="link-page">FAQs</router-link></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-users"></i><span>Clients</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><router-link :to="{name:'renewals'}" tag="a" class="link-page">Renewals</router-link></li>
                        </ul>
                    </li>
                    
                   
                   
                    <li>
                        <router-link :to="{name:'promo'}" tag="a" class="link-page">
                            <i class="fas fa-percent"></i><span>Promo Codes</span>
                        </router-link>
                    </li>
                    
                    <!--
                    <li>
                        <router-link :to="{name:'users'}" tag="a" class="link-page">
                            <i class="fas fa-users"></i><span>Users</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'roles'}" tag="a" class="link-page">
                            <i class="fas fa-tags"></i><span>Roles</span>
                        </router-link>
                    </li>
                    -->                   
                    
                    <!--end Admin Views-->

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        let externalScript = document.createElement('script')
        externalScript.setAttribute('src', '/assets/js/app.js')
        document.head.appendChild(externalScript)
    },
}
</script>