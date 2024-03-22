<template>
  <div>
    <button @click="createNewAuthor" class="custom-button-create">Créer un nouvel auteur</button>
    <table class="custom-table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Adresse</th>
          <th>Description</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="author in authors" :key="author.id">
          <td>{{ author.name }}</td>
          <td>{{ author.address }}</td>
          <td>{{ author.description }}</td>
          <td>{{ author.email }}</td>
          <td>
            <button @click="editAuthor(author.id)" class="custom-button-edit">Modifier</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import useAuthors from '@/composables/authors'

export default {
  setup() {
    const { authors, getAuthors } = useAuthors()
    const router = useRouter()

    onMounted(getAuthors)

    const editAuthor = async (id) => {
      // Rediriger vers la page d'édition de cet éditeur
      await router.push({ name: 'authors.edit', params: { id } })
    }

    const createNewAuthor = async () => {
      // Rediriger vers la page de création d'un nouvel éditeur
      await router.push({ name: 'authors.create' })
    }

    return {
      authors,
      editAuthor,
      createNewAuthor
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

.custom-button:hover {
  opacity: 0.8;
}
</style>
