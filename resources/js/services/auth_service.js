import api from './apiAuth';

export default{
    register(user){
        return api().post("api/auth/register",user)

    },
    login(user){
        return api().post("api/auth/login",user).then(response=>{
            if(response.status===200){
         this.setToken(response.data)
            }
            return response.data
        })


    },
    setToken(user){
        localStorage.setItem('resturant_token',JSON.stringify(user))

    },
    islogin(){
        const token = localStorage.getItem('resturant_token')
        return token != null

    }

}