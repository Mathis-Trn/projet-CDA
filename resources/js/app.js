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
 
createApp({
    components: {
        BooksIndex,
        ShowBook,
        CreateBook,
        EditBook
    }
}).use(router).mount('#app') 