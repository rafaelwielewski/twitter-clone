import axios from "axios";

const axiosInstance = axios.create({
  headers: {
    "Content-type": "aplication/json",
  },
  baseURL: "https://twitter-clone-server-rafaelwielewski.vercel.app",
});

export default axiosInstance;
