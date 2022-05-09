require('./bootstrap');
import { createApp } from 'vue'
import App from './src/index.vue'
import router from './src/routes/routes';
import store from './store';
const app = createApp(App)
app.provide('store',store())



app.use(router)

app.mount('#app')
