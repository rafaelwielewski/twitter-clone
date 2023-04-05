import axios from "axios";

const axiosInstance = axios.create({
  headers: {
    "Content-type": "aplication/json",
  },
  baseURL: "https://twitter-clone-server-638gqlp3q-rafaelwielewski.vercel.app",
});

export default axiosInstance;
