import './bootstrap';

import { createApp } from 'vue';
import AppNavBar from './components/template/AppNavBar.vue';
import UsersList from './components/users/UsersList.vue';
import AppFooter from './components/template/AppFooter.vue';

const appNav = createApp({});
const appFooter = createApp({});
const app = createApp({});

appNav
  .component('app-navbar', AppNavBar)
appNav.mount("#app-nav-bar");

appFooter
   .component('app-footer', AppFooter)
appFooter.mount("#app-footer");

app
    .component('usersList', UsersList)
app.mount('#app');