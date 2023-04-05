import axios from "axios";

const axiosInstance = axios.create({
  headers: {
    "Content-type": "aplication/json",
  },
  baseURL: "http://187.85.146.112:8082",
});

export default axiosInstance;
