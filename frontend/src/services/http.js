import axios from 'axios';

const axiosInstance = axios.create({
    headers:{
        "Content-type":"aplication/json"
    },
    baseURL:"http://186.211.97.243:8082"
});

export default axiosInstance;