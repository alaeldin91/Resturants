require('./bootstrap');
import VueSweetalert2 from 'vue-sweetalert2';
import Swal from 'sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css';
import App from './components/App'
import router from './routes/router';
import { createApp } from 'vue'
const app = createApp(App)
app.use(VueSweetalert2)
app.use(router)
app.mount('#app')

