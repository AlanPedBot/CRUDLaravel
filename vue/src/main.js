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