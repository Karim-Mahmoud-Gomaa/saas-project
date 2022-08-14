
// middlewares
import guest from "../middlewares/guest";
import auth from "../middlewares/auth";
import checkAuth from "../middlewares/auth-check";
import middlewarePipeline from "../routes/middlewarePipeline";
import i18n from '../i18n'
//////////////////////////////////////////////////////////
//
import VueRouter from "vue-router";
import Vue from "vue";
import store from "../store/index";
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin', 
            component: {
                render(c) { return c('router-view') }
            },
            children: [
                { path: '/', name: 'home', component: () => import('../pages/Home'), meta: { title: 'Home', middleware: [auth, checkAuth] } },
                { path: 'login', name: 'login', component: () => import('../pages/auth/Login'), meta: { title: 'Login', middleware: [guest] } },
                //#Vue:Routes
		        {path:'menus',name: 'menus',component:()=>import('../pages/Menus/Index'),meta:{title: 'Menus',middleware: [auth, checkAuth]} },
		        {path:'menus-trashed',name: 'menus-trashed',component:()=>import('../pages/Menus/Trashed'),meta:{title: 'Trashed Menus',middleware: [auth, checkAuth]} },
		        
                {path:'pages',name: 'pages',component:()=>import('../pages/Pages/Index'),meta:{title: 'Pages',middleware: [auth, checkAuth]} },
		        {path:'pages-trashed',name: 'pages-trashed',component:()=>import('../pages/Pages/Trashed'),meta:{title: 'Trashed Pages',middleware: [auth, checkAuth]} },
		        
                {path:'users',name: 'users',component:()=>import('../pages/Users/Index'),meta:{title: 'Users',middleware: [auth, checkAuth]} },
                {path:'users/:user_id',name: 'user_show',component:()=>import('../pages/Users/Show'),meta:{title: 'User Details',middleware: [auth, checkAuth]}},
		        
                {path:'roles',name: 'roles',component:()=>import('../pages/Roles/Index'),meta:{title: 'Roles',middleware: [auth, checkAuth]} },
                {path:'roles/:role_id',name: 'role_show',component:()=>import('../pages/Roles/Show'),meta:{title: 'Role Details',middleware: [auth, checkAuth]}},
		        

            ]
        },
        { path: '/*', name: '404', component: () => import('../pages/errors/404'), meta: { title: '404' } },
    ],
    // linkActiveClass: "", // active class for non-exact links.
    linkExactActiveClass: "active" // active class for *exact* links.
});

router.beforeEach((to, from, next) => {
    if (to.name == 'login') {
        document.body.classList.add('authentication-bg');
    } else {
        document.body.classList.remove('authentication-bg');
    }
    /////////////////////////////////////
    if (to.name == '404') { return next(); }
    
    if (!to.meta.middleware) return next();
    const middleware = to.meta.middleware;
    const context = { to, from, next, store };
    return middleware[0]({
        ...context, next: middlewarePipeline(context, middleware, 1)
    });
});

export default router;