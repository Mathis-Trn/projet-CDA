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

    const storeUser = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/user/create', data)
            await router.push({ name: 'users.create' })
        } catch (e) {
            if (e.response?.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateUser = async (id, data) => {
        errors.value = ''
        try {
            await axios.put(`/api/user/edit/${id}`, data)
            await router.push({ name: 'users.edit' })
        } catch (e) {
            if (e.response?.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
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
        storeUser,
        updateUser,
        deleteUser,
    }
}
