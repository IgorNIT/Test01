import App from './App.vue';
import { createApp } from 'vue'
import './assets/global.css'

// APP
const app = createApp(App)

// Element UI
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
app.use(ElementPlus)

// Router
import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes';

const router = createRouter({
    history: createWebHistory(),
    routes
})
app.use(router)

app.mount('#app')
