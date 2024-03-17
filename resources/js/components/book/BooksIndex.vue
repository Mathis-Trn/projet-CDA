<template>
    <div style="background-color: #ffffff;">
        <div style="padding: auto 2rem; max-width: 100%; padding: 4rem 1rem;">

            <h2 class="sr-only">Livres</h2>

            <div style="display: flex; flex-wrap: wrap; justify-content: center; margin: -1rem;">
            <template v-for="(item, index) in books" :key="item.id">
                <div style="width: 15%; margin: 1rem;">
                <a :href="'/book/' + item.id" class="group" style="display: block; text-decoration: none; color: inherit;">
                    <div style=" overflow: hidden; border-radius: 0.5rem; background-color: #edf2f7;">
                        <img :src="item.cover" alt="Couverture du livre" style="object-fit: cover; width: 100%; height: 100%; transition: opacity 0.2s ease-in-out;">
                    </div>
                    <h3 style="margin-top: 0.25rem; font-size: 1.125rem; line-height: 1.75rem; font-weight: 500; color: #4a5568;">{{ item.name }}</h3>
                </a>
                </div>
                <!-- Ligne suivante après chaque 5ème livre -->
                <div v-if="(index + 1) % 5 === 0" style="width: 100%;"></div>
            </template>
            </div>
        </div>
    </div>
    <div style="display: flex; justify-content: center; margin-top: 2rem;">
        <ul class="pagination">
            <li v-if="books.prev_page_url">
                <a @click.prevent="fetchPage(books.current_page - 1)" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="page in books.last_page" :key="page" :class="{ 'active': page === books.current_page }">
                <a @click.prevent="fetchPage(page)" href="#">{{ page }}</a>
            </li>
            <li v-if="books.next_page_url">
                <a @click.prevent="fetchPage(books.current_page + 1)" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
</template>
 
<script setup>
import useBooks from '@/composables/books'
import { onMounted } from 'vue';
 
const { books, getBooks } = useBooks()
 
onMounted(getBooks)
</script>