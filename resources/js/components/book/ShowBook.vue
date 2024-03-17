<template>
    <div class="container mx-auto px-4">
      <div v-if="book">
        <div v-if="book.cover">
          <img :src="book.cover" alt="Book Cover" class="mb-4" style="max-width: 300px;">
        </div>
        <h1 class="text-2xl font-bold mb-4">{{ book.name }}</h1>
        <p class="mb-4">Auteur: {{ book.author_id }}</p>
        <p class="mb-4">{{ book.description }}</p>
        <p class="mb-4">Date de parrution: {{ book.published_at }}</p>
        <div v-if="book.editor_id">
          <p class="mb-4">Editeur: {{ book.editor_id }}</p>
        </div>
      </div>
      <div v-else>
        <p>Loading...</p>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue'
  import { useRoute } from 'vue-router'
  import useBooks from '@/composables/books'
  
  export default {
    setup() {
      const { book, getBook } = useBooks()
      const route = useRoute()
  
      onMounted(async () => {
        await getBook(route.params.id)
      })
  
      return {
        book
      }
    }
  }
  </script>