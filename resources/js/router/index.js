import { createRouter, createWebHistory } from 'vue-router'

import BooksIndex from '@/components/book/BooksIndex.vue';
import ShowBook from '@/components/book/ShowBook.vue';
 
const routes = [
    {
        path: '/',
        name: 'books.index',
        component: BooksIndex
    },
    {
        path: '/book/:id',
        name: 'books.show',
        component: ShowBook
    }
];
 
export default createRouter({
    history: createWebHistory(),
    routes
})