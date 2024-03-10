import './bootstrap';

import { createApp } from 'vue';
import AppNavBar from './components/AppNavBar.vue';
import UsersList from './components/users/UsersList.vue';
import AppFooter from './components/AppFooter.vue';

const app = createApp({});

app
    .component('app-navbar', AppNavBar)
    .component('usersList', UsersList)
    .component('app-footer', AppFooter);

app.mount('#app');