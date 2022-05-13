require('./bootstrap');
import { createApp } from 'vue'
import App from './src/index.vue'
import router from './src/routes/routes';
import store from './store';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


const app = createApp(App)
app.provide('store',store())
app.use(VueSweetalert2);

window.Swal=app.config.globalProperties.$swal

app.use(router)

app.mount('#app')
