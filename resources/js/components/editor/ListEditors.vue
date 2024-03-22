<template>
  <div>
    <button @click="createNewEditor" class="custom-button-create">Créer un nouvel éditeur</button>
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
        <tr v-for="editor in editors" :key="editor.id">
          <td>{{ editor.name }}</td>
          <td>{{ editor.address }}</td>
          <td>{{ editor.description }}</td>
          <td>{{ editor.email }}</td>
          <td>
            <button @click="editEditor(editor.id)" class="custom-button-edit">Modifier</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import useEditors from '@/composables/editors'

export default {
  setup() {
    const { editors, getEditors } = useEditors()
    const router = useRouter()

    onMounted(getEditors)

    const editEditor = async (id) => {
      // Rediriger vers la page d'édition de cet éditeur
      await router.push({ name: 'editors.edit', params: { id } })
    }

    const createNewEditor = async () => {
      // Rediriger vers la page de création d'un nouvel éditeur
      await router.push({ name: 'editors.create' })
    }

    return {
      editors,
      editEditor,
      createNewEditor
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
