import api from './api';
export default {
    creatOwner(data) {
        return api().post('api/auth/addAdministrator', data);

    },
    loadOwner() {
        return api().get('api/auth/allUsers');
    },
    deleteOwner(id){
       return api().get(`api/auth/deleteowner/${id}`);
    },
    updateOwner(id,data){
        return api().post(`api/auth/updateOwner/${id}`,data)

    },
    createBranch(data){
        return api().post('api/auth/addbranch',data);
    }
}

