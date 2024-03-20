import { ref } from 'vue'
import axios from 'axios'

export default function useUsers() {
    const users = ref([])
    const user = ref({})
    const errors = ref('')

    const getUsers = async () => {
        try {
            const response = await axios.get('/api/users')
            users.value = response.data.data
        } catch (error) {
            console.error('Error fetching users:', error)
        }
    }

    const getUser = async (id) => {
        try {
            const response = await axios.get(`/api/user/${id}`)
            user.value = response.data.data
        } catch (error) {
            console.error('Error fetching user:', error)
        }
    }

    const createUser = async (data) => {
        try {
            await axios.post('/api/user/create', data)
        } catch (error) {
            console.error('Error creating user:', error)
            errors.value = error.response.data.message
        }
    }

    const updateUser = async (id, data) => {
        try {
            await axios.patch(`/api/user/edit/${id}`, data)
        } catch (error) {
            console.error('Error updating user:', error)
            errors.value = error.response.data.message
        }
    }

    const deleteUser = async (id) => {
        try {
            await axios.delete(`/api/user/delete/${id}`)
        } catch (error) {
            console.error('Error deleting user:', error)
            errors.value = error.response.data.message
        }
    }

    return {
        users,
        user,
        errors,
        getUsers,
        getUser,
        createUser,
        updateUser,
        deleteUser,
    }
}
