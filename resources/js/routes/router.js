import {createWebHistory,createRouter} from 'vue-router'

import Dashboard from '../components/Dashboard.vue';
import ManageUser from '../components/ManageUser.vue';


const routes = [{
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
},
{
    path:'/manageUser',
    name:'manageUser',
    component:ManageUser

}]

const router = createRouter({
    history: createWebHistory(),
    routes
  })
export default router;