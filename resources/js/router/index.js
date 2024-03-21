import { createRouter, createWebHistory } from 'vue-router'

import BooksIndex from '@/components/book/BooksIndex.vue';
import ShowBook from '@/components/book/ShowBook.vue';
import CreateBook from '@/components/book/CreateBook.vue';
import EditBook from '@/components/book/EditBook.vue';
import ListEditors from '@/components/editor/ListEditors.vue';
import CreateEditor from '@/components/editor/CreateEditor.vue';
import EditEditor from '@/components/editor/EditEditor.vue';
import ListAuthors from '@/components/author/ListAuthors.vue';
import CreateAuthor from '@/components/author/CreateAuthor.vue';
import EditAuthor from '@/components/author/EditAuthor.vue';
import ListUsers from '@/components/users/ListUsers.vue';
import CreateUser from '@/components/users/CreateUser.vue';
import EditUser from '@/components/users/EditUser.vue';
import ListBooks from '@/components/book/ListBooks.vue';
 
const routes = [
    {
        path: '/',
        name: 'books.index',
        component: BooksIndex
    },
    {
        path: '/books',
        name: 'books.list',
        component: ListBooks
    },
    {
        path: '/book/:id',
        name: 'books.show',
        component: ShowBook
    },
    {
        path: '/book/create',
        name: 'books.create',
        component: CreateBook
    },
    {
        path: '/book/edit/:id',
        name: 'books.edit',
        component: EditBook
    },
    {
        path: '/editors',
        name: 'editors.index',
        component: ListEditors
    },
    {
        path: '/editor/create',
        name: 'editors.create',
        component: CreateEditor
    },
    {
        path: '/editor/edit/:id',
        name: 'editors.edit',
        component: EditEditor
    },
    {
        path: '/authors',
        name: 'authors.index',
        component: ListAuthors
    },
    {
        path: '/author/create',
        name: 'authors.create',
        component: CreateAuthor
    },
    {
        path: '/author/edit/:id',
        name: 'authors.edit',
        component: EditAuthor
    },
    {
        path: '/users',
        name: 'users.index',
        component: ListUsers
    },
    {
        path: '/user/create',
        name: 'users.create',
        component: CreateUser
    },
    {
        path: '/user/edit/:id',
        name: 'users.edit',
        component: EditUser
    }
];
 
export default createRouter({
    history: createWebHistory(),
    routes
})