import { createRouter, createWebHistory } from "vue-router";

import Home from "../Page/Home/Home.vue";
import Login from "../Page/Login/Login.vue";
import About from "../Page/About/About.vue";
import NotFound from "../Page/404/404.vue";



const Product = import('../Page/Product/Product.vue');
const NewProduct = import('../Page/Product/NewProduct.vue');
const EditProduct = import('../Page/Product/EditProduct.vue');


const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
        meta:{requiresAuth: false}
    },
    {
        path: "/login-user",
        name: "login",
        component: Login,
    },
    {
        path: "/my-products",
        name: "products",
        component: Product,
        meta:{requiresAuth: true}
    },
    {
        path: "/create-product",
        name: "new-product",
        component: NewProduct,
        meta:{requiresAuth: true}
    },
    {
        path: "/edit-product/:id",
        name: "edit-product",
        props: true,
        component: EditProduct,
        meta:{requiresAuth: true}
    },
    {
        path: "/about-us",
        name: "about-us",
        component: About,
    },
    {
        path: "/:pathMatch(.*)*",
        name: "404",
        component: NotFound,
    },
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

router.beforeEach(async (to, from) => {

    if (to.meta.requiresAuth && !window.localStorage.getItem('auth_token')) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        return {
          name: 'login',
          // save the location we were at to come back later
          query: { redirect: to.fullPath },
        }
      }

    // if (!isAuthenticated && to.name !== 'register') {
    //   return { name: 'register' }
    // }
  })



export default router;
