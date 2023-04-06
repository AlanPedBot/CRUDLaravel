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
    component: AppHome,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/create',
    name: 'create',
    component: AppCreate,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/read',
    name: 'read',
    component: AppRead,
    meta: {
      requiresAuth: true
    }
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
  router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const isAuthenticated = localStorage.getItem('token');
    if (requiresAuth && !isAuthenticated) {
      next('/login');
    } else {
      next();
    }
  });
  
  
  export default router
