import axios from "axios";

const token = localStorage.getItem('auth_token')
 const api = axios.create({
    baseURL: 'http://127.0.0.1:8001/api/v1/',
    timeout: 10000,
    headers: {
        'Accept': 'application/json',
        'Authorization': `Bearer ${token}`
      }
  });

  export default api
