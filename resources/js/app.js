import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';  
import router from './router'

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
 
createApp({
    components: {
        BooksIndex,
        ShowBook,
        CreateBook,
        EditBook,
        ListEditors,
        CreateEditor,
        EditEditor,
        ListAuthors,
        CreateAuthor,
        EditAuthor,
        ListUsers,
        CreateUser,
        EditUser
    }
}).use(router).mount('#app') 