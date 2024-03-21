<template>
    <div>
      <button @click="createNewBook" class="custom-button-create">Créer un nouveau livre</button>
      <table class="custom-table">
        <thead>
          <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Auteur</th>
            <th>Editeur</th>
            <th>Stock</th>
            <th>Couverture</th>
            <th>Date de parution</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in books" :key="book.id">
            <td>{{ book.name }}</td>
            <td>{{ book.description }}</td>
            <td>{{ book.author_id }}</td>
            <td>{{ book.editor_id }}</td>
            <td>{{ book.stock }}</td>
            <td><img :src="book.cover"></td>
            <td>{{ book.published_at }}</td>
            <td>
              <button @click="editBook(book.id)" class="custom-button-edit">Modifier</button>
              <button @click="confirmDelete(book.id)" class="custom-button-delete">Supprimer</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue'
  import { useRouter } from 'vue-router'
  import useBooks from '@/composables/books'
  
  export default {
    setup() {
      const { books, getBooks, deleteBook } = useBooks()
      const router = useRouter()

      onMounted(getBooks)

      const confirmDelete = async (id) => {

        if (confirm("Êtes-vous sûr de vouloir supprimer ce livre?")) {
            try {
                await deleteBook(id)
                // Recharger la liste des livres après la suppression
                await getBooks()
            } catch (error) {
                console.error('Error deleting editor:', error)
            }
        }
      }
        
      const editBook = async (id) => {
        // Rediriger vers la page d'édition de ce livre
        await router.push({ name: 'books.edit', params: { id } })
      }
  
      const createNewBook = async () => {
        // Rediriger vers la page de création d'un nouveau livre
        await router.push({ name: 'books.create' })
      }
  
      return {
        books,
        editBook,
        createNewBook,
        confirmDelete
      }
    }
  }
  </script>
  
  <style scoped>
  .custom-table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .custom-table th,
  .custom-table td {
    padding: 10px;
    border: 1px solid #ddd;
  }
  
  .custom-button-create {
    border: none;
    outline: none;
    cursor: pointer;
    border-radius: 8px;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    margin-bottom: 10px;
  }
  
  .custom-button-edit {
    border: none;
    outline: none;
    cursor: pointer;
    border-radius: 8px;
    background-color: lightskyblue;
    color: white;
    padding: 6px 12px;
    margin-right: 5px;
  }

  .custom-button-delete {
  border: none;
  outline: none;
  cursor: pointer;
  border-radius: 8px;
  background-color: indianred;
  color: white;
  padding: 6px 12px;
}
  
  .custom-button:hover {
    opacity: 0.8;
  }
  </style>
  