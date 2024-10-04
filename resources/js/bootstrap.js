import axios from 'axios';
window.axios = axios;

window.axios.defaults.baseURL = import.meta.env.VITE_APP_URL;
window.axios.defaults.headers.common["Accept"] = "application/json";
window.axios.defaults.headers.common["Content-Type"] = "application/json";
