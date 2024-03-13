import { createRouter, createWebHistory } from 'vue-router';


import Books from './components/Books.vue';
import BookDetails from './components/BookDetails.vue';
import AddBook from './components/AddBook.vue';
import EditBook from './components/EditBook.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';


const routes = [
{
path: '/',
name: 'Books',
component: Books,
meta: { public: false }
},
{
path: '/books/:id',
name: 'BookDetails',
component: BookDetails,
meta: { public: false }
},
{
path: '/add-book',
name: 'AddBook',
component: AddBook,
meta: { public: false }
},
{
path: '/edit-book/:id',
name: 'EditBook',
component: EditBook,
meta: { public: false }
},
{
path: '/connexion', 
name: 'Connexion',
component: Login,
meta: { public: true } 
},
{
path: '/inscription',
name: 'Inscription',
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