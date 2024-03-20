<template>
    <div class="container mx-auto px-4">
      <div v-if="book">
        <div v-if="book.cover">
          <img :src="book.cover" alt="Book Cover" class="mb-4" style="max-width: 300px;">
        </div>
        <h1 class="text-2xl font-bold mb-4">{{ book.name }}</h1>
        <p class="mb-4">Auteur: {{ book.author?.name }}</p>
        <p class="mb-4">{{ book.description }}</p>
        <p class="mb-4">Date de parrution: {{ new Date(book.published_at).toLocaleDateString() }}</p>
        <div v-if="book.editor_id">
          <p class="mb-4">Editeur: {{ book.editor?.name }}</p>
        </div>
      </div>
      <div v-else>
        <p>Loading...</p>
      </div>
    </div>
  </template>
  
  <script>
  import { onMounted } from 'vue'
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