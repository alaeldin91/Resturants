import axios from 'axios';
import store from './store';
import auth from './auth_service'




/**export   function httpFile(){
    return axios.creat({
        baseURL: store.state.apiURL,
        headers:{
            'Content-type':'multipart/form-data'
        }
    })
}**/
export default () => {
    return axios.create({
        apiURL: store.state.apiURL,
        serverPath: store.state.serverPath,
        headers: {
            authorization: 'Bearer '+auth.getAccessToken(),

            'Content-type': 'multipart/form-data'
        }
    })
} 