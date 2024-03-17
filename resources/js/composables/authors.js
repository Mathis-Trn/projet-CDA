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

    const createAuthor = async (data) => {
        try {
            await axios.post('/api/author/create', data)
        } catch (error) {
            console.error('Error creating author:', error)
            errors.value = error.response.data.message
        }
    }

    const updateAuthor = async (id, data) => {
        try {
            await axios.patch(`/api/author/edit/${id}`, data)
        } catch (error) {
            console.error('Error updating author:', error)
            errors.value = error.response.data.message
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
        createAuthor,
        updateAuthor,
        deleteAuthor,
    }
}