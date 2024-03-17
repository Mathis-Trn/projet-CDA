import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
 
export default function useBooks() {
    const book = ref([])
    const books = ref([])
    const errors = ref('')
    const router = useRouter()

    const getBooks = async () => {
        let response = await axios.get('/api/')
        books.value = response.data.data
    }
 
    const getBook = async (id) => {
        let response = await axios.get(`/api/book/${id}`)
        book.value = response.data.data
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
 
    const updateBook = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/book/edit/${id}`, book.value)
            await router.push({ name: 'books.update' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }
 
    const deleteBook = async (id) => {
        try {
            await axios.delete(`/api/book/delete/${id}`)
            // After successful deletion, you may want to refresh the list of books
            await getBooks()
        } catch (error) {
            console.error('Error deleting book:', error)
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