import axios from 'axios';
const instance = axios.create({
baseURL: 'http://projet-cda.test/api'
});


export default instance;