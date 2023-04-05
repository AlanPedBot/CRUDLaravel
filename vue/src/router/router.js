import { createRouter, createWebHistory } from 'vue-router'
import AppHome from '../views/AppHome.vue';
import AppCreate from '../views/AppCreate.vue';
import AppRead from '../views/AppRead.vue';
import AppLogin from '../views/AppLogin.vue';
import AppRegister from '../views/AppRegister.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: AppHome
  },
  {
    path: '/adicionar',
    name: 'create',
    component: AppCreate 
  },
  {
    path: '/buscar',
    name: 'read',
    component: AppRead
  },
  {
    path: '/login',
    name: 'login',
    component: AppLogin
  },
  {
    path: '/register',
    name: 'register',
    component: AppRegister
  }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
  })
  
  router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    next()
  })
  
  
  export default router
