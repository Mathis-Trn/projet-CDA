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

    const storeEditor = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/editor/create', data)
            await router.push({ name: 'editors.create' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateEditor = async (id, data) => {
        errors.value = ''
        try {
            await axios.put(`/api/editor/edit/${id}`, data)
            await router.push({ name: 'editors.edit' })
        } catch (e) {
            if (e.response?.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
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
        storeEditor,
        updateEditor,
        deleteEditor,
    }
}
