import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

import bootstrap from "bootstrap"

import { createApp } from 'vue'
import App from './App.vue'
import router from './router/router'



const app = createApp(App)

app.use(router)
app.use(bootstrap)
app.mount('#app')

import axios from 'axios';

axios.interceptors.request.use(
  config => {
    const token = localStorage.getItem('token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  error => {
    return Promise.reject(error);
  }
);
