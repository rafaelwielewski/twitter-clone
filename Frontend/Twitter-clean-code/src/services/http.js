import axios from 'axios';

const axiosInstance = axios.create({
    headers:{
        "Content-type":"aplication/json"
    },
    baseURL:"http://localhost"
});

export default axiosInstance;