import { ref } from 'vue'
import axios from 'axios'

export default function useAuthors() {
    const authors = ref([])
    const author = ref({})
    const errors = ref('')

    const getAuthors = async () => {
        try {
            const response = await axios.get('/api/authors')
            authors.value = response.data.data
        } catch (error) {
            console.error('Error fetching authors:', error)
        }
    }

    const getAuthor = async (id) => {
        try {
            const response = await axios.get(`/api/author/${id}`)
            author.value = response.data.data
        } catch (error) {
            console.error('Error fetching author:', error)
        }
    }

    const storeAuthor = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/author/create', data)
            await router.push({ name: 'authors.create' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateAuthor = async (id, data) => {
        errors.value = ''
        try {
            await axios.put(`/api/author/edit/${id}`, data)
            await router.push({ name: 'authors.edit' })
        } catch (e) {
            if (e.response?.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const deleteAuthor = async (id) => {
        try {
            await axios.delete(`/api/author/delete/${id}`)
        } catch (error) {
            console.error('Error deleting author:', error)
            errors.value = error.response.data.message
        }
    }

    return {
        authors,
        author,
        errors,
        getAuthors,
        getAuthor,
        storeAuthor,
        updateAuthor,
        deleteAuthor,
    }
}
