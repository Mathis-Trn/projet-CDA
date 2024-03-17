import { ref } from 'vue'
import axios from 'axios'

export default function useEditors() {
    const editors = ref([])
    const editor = ref({})
    const errors = ref('')

    const getEditors = async () => {
        try {
            const response = await axios.get('/api/editors')
            editors.value = response.data.data
        } catch (error) {
            console.error('Error fetching editors:', error)
        }
    }

    const getEditor = async (id) => {
        try {
            const response = await axios.get(`/api/editor/${id}`)
            editor.value = response.data.data
        } catch (error) {
            console.error('Error fetching editor:', error)
        }
    }

    const createEditor = async (data) => {
        try {
            await axios.post('/api/editor/create', data)
        } catch (error) {
            console.error('Error creating editor:', error)
            errors.value = error.response.data.message
        }
    }

    const updateEditor = async (id, data) => {
        try {
            await axios.patch(`/api/editor/edit/${id}`, data)
        } catch (error) {
            console.error('Error updating editor:', error)
            errors.value = error.response.data.message
        }
    }

    const deleteEditor = async (id) => {
        try {
            await axios.delete(`/api/editor/delete/${id}`)
        } catch (error) {
            console.error('Error deleting editor:', error)
            errors.value = error.response.data.message
        }
    }

    return {
        editors,
        editor,
        errors,
        getEditors,
        getEditor,
        createEditor,
        updateEditor,
        deleteEditor,
    }
}
