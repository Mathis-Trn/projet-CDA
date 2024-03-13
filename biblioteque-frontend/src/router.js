import { createRouter, createWebHistory } from 'vue-router';



import CreateBook from './components/book/CreateBook.vue';
import ShowBook from './components/book/ShowBook.vue';
import Login from './components/user/Login.vue';
import Register from './components/user/Register.vue';
import EditBook from './components/book/EditBook.vue';
import Books from './components/templates/Books.vue';


const routes = [
{
path: '/',
name: 'Books',
component: Books,
meta: { public: false }
},
{
path: '/book/:id',
name: 'ShowBook',
component: ShowBook,
meta: { public: false }
},
{
path: '/create-book',
name: 'CreateBook',
component: CreateBook,
meta: { public: false }
},
{
path: '/edit-book/:id',
name: 'EditBook',
component: EditBook,
meta: { public: false }
},
{
path: '/login', 
name: 'Login',
component: Login,
meta: { public: true } 
},
{
path: '/register',
name: 'Register',
component: Register,
meta: { public: true }
}
];


const router = createRouter({
history: createWebHistory(),
routes,
});



router.beforeEach((to, from, next) => {
const isAuthenticated = !!localStorage.getItem('token');


if (!to.meta.public && !isAuthenticated) {
next({ name: 'Connexion' });
} else {
next();
}
});


export default router;