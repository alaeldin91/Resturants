import  axios from 'axios';
import store from './store';



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
     headers:{
        'Content-type':'multipart/form-data'
    }
    })  
} 