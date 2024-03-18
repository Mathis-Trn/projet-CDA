import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';  
import router from './router'

import BooksIndex from '@/components/book/BooksIndex.vue';
import ShowBook from '@/components/book/ShowBook.vue';
import CreateBook from '@/components/book/CreateBook.vue';
 
createApp({
    components: {
        BooksIndex,
        ShowBook,
        CreateBook
    }
}).use(router).mount('#app') 