<template>
  <div class="container mx-auto px-4">
    <div v-if="book">
      <div v-if="book.cover">
        <img :src="book.cover" alt="Book Cover" class="mb-4" style="max-width: 300px;">
      </div>
      <h1 class="text-2xl font-bold mb-4">{{ book.name }}</h1>
      <p class="mb-4">Auteur: {{ book.author?.name }}</p>
      <p class="mb-4">{{ book.description }}</p>
      <p class="mb-4">Date de parution: {{ new Date(book.published_at).toLocaleDateString() }}</p>
      <div v-if="book.editor_id">
        <p class="mb-4">Editeur: {{ book.editor?.name }}</p>
      </div>
      <!-- Modify and Delete Buttons -->
      <div class="flex">
        <button @click="editBook" class="custom-button-edit bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 mr-2">
          Modifier
        </button>
        <button @click="confirmDelete" class="custom-button-delete bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mt-4">
          Supprimer
        </button>
      </div>
    </div>
    <div v-else>
      <p>Loading...</p>
    </div>
  </div>
</template>

<script>
import { onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import useBooks from '@/composables/books'

export default {
  setup() {
    const { book, getBook, deleteBook } = useBooks()
    const route = useRoute()
    const router = useRouter()

    onMounted(async () => {
      await getBook(route.params.id)
    })

    const confirmDelete = async () => {
      if (confirm("Êtes-vous sûr de vouloir supprimer ce livre?")) {
        try {
          await deleteBook(route.params.id)
          await router.push({ name: 'books.index' })
        } catch (error) {
          console.error('Error deleting book:', error)
        }
      }
    }

    const editBook = async () => {
      // Redirect to the edit page for this book
      await router.push({ name: 'books.edit', params: { id: route.params.id } })
    }

    return {
      book,
      confirmDelete,
      editBook
    }
  }
}
</script>

<style scoped>
.custom-button-edit {
  border: none;
  outline: none;
  cursor: pointer;
  border-radius: 8px;
  background-color: lightskyblue;
}

.custom-button-delete {
  border: none;
  outline: none;
  cursor: pointer;
  border-radius: 8px;
  background-color: indianred;
}

.custom-button:hover {
  opacity: 0.8;
}
</style>