import axios from 'axios';
import store from './store';




export default () => {
    return axios.create({
        apiURL  : store.state.apiURL,
     serverPath : store.state.serverPath,
  
})
} 