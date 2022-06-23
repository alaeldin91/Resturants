import api from './api'
export default{
      creatOwner(data){
        return api().post('api/auth/addAdministrator',data)
        console.log(data)
    }
}
