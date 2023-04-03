import { createRouter, createWebHistory } from 'vue-router'
import AppHome from '../views/AppHome.vue';
import AppCreate from '../views/AppCreate.vue';
import AppRead from '../views/AppRead.vue';

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
