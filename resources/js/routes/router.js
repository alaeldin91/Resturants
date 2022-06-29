import {createWebHistory,createRouter} from 'vue-router'


import Home from '../components/Home.vue';

const routes = [
    
    {
        path: '/home',
        name: 'Home',
        component:  Home,
        children: [
              
    {
        path: '/dashboard',
        name: 'dashboard',
        component:()=>import('../components/Dashboard.vue')
    },
    {
        path:'/manageUser',
        name:'manageUser',
        component:()=>import('../components/ManageUser.vue')    
    },
]

},

{
    path:'/register',
    component:()=>import('../authAdmin/Register.vue'),
    name:'register',
},
{
    path:'/login',
    component:()=>import('../authAdmin/Login.vue'),
    name:'login',
}
]
const router = createRouter({
    history: createWebHistory(),
    routes
  })
export default router;