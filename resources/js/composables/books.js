import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useBooks() {
    const book = ref([])
    const books = ref([])
    const errors = ref('')
    const router = useRouter()

    const getBooks = async () => {
        try {
            let response = await axios.get('/api/books')
            books.value = response.data.data
        } catch (error) {
            console.error('Error fetching books:', error)
        }
    }

    const getBook = async (id) => {
        try {
            let response = await axios.get(`/api/book/${id}`)
            book.value = response.data.data

            response = await axios.get("/api/author/" + book.value.author_id);
            book.value.author = response.data.data

            response = await axios.get("/api/editor/" + book.value.editor_id);
            book.value.editor = response.data.data


        } catch (error) {
            console.error('Error fetching book:', error)
        }
    }

    const storeBook = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/book/create', data)
            await router.push({ name: 'books.create' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateBook = async (id, data) => {
        errors.value = ''
        try {
            await axios.put(`/api/book/edit/${id}`, data)
            await router.push({ name: 'books.edit' })
        } catch (e) {
            if (e.response?.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const deleteBook = async (id) => {
        try {
            await axios.delete(`/api/book/delete/${id}`)
        } catch (error) {
            console.error('Error deleting book:', error)
            errors.value = error.response.data.message
        }
    }

    return {
        errors,
        book,
        books,
        getBook,
        getBooks,
        storeBook,
        updateBook,
        deleteBook
    }
}