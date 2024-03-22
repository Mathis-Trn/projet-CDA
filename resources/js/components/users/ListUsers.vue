<template>
    <div>
      <button @click="createNewUser" class="custom-button-create">Créer un nouvel utilisateur</button>
      <table class="custom-table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.name }}</td>
            <td>{{ user.address }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.role_id }}</td>
            <td>
              <button @click="editUser(user.id)" class="custom-button-edit">Modifier</button>
              <button @click="confirmDelete(user.id)" class="custom-button-delete">Supprimer</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue'
  import { useRouter } from 'vue-router'
  import useUsers from '@/composables/users'
  
  export default {
    setup() {
      const { users, getUsers, deleteUser } = useUsers()
      const router = useRouter()
  
      onMounted(getUsers)

      const confirmDelete = async (id) => {

        if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur?")) {
            try {
                await deleteUser(id)
                // Recharger la liste des livres après la suppression
                await getUsers()
            } catch (error) {
                console.error('Error deleting editor:', error)
            }
        }
      }

  
      const editUser = async (id) => {
        // Rediriger vers la page d'édition de cet éditeur
        await router.push({ name: 'users.edit', params: { id } })
      }
  
      const createNewUser = async () => {
        // Rediriger vers la page de création d'un nouvel éditeur
        await router.push({ name: 'users.create' })
      }
  
      return {
        users,
        editUser,
        createNewUser,
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
  