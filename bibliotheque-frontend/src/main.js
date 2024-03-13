// Importing required modules and components
import { createApp } from 'vue';
import App from './App.vue';
import store from './store'; // Vuex store
import router from './router.js'; // Vue router


// Creating a Vue application instance
const app = createApp(App)


// Registering Vuex store and Vue Router with the application
app.use(store)
app.use(router)


// Mounting the application to an HTML element with id 'app'
app.mount('#app')