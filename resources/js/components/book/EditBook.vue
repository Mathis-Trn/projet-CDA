<template>
    <div style="background-color: white; padding: 8rem; @apply isolate bg-white px-6 py-24 sm:py-32 lg:px-8;">
        <div style="position: absolute; inset-inline-start: 0; inset-inline-end: 0; top: -10rem; z-index: -10; transform: translateZ(0); overflow: hidden; filter: blur(1.5rem); top: -20rem; @apply absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem];" aria-hidden="true">
            <!-- Background element -->
            <div style="position: relative; left: 50%; z-index: -10; aspect-ratio: 1155 / 678; width: 36.125rem; max-width: none; transform: translateX(-50%) rotate(30deg); background-image: linear-gradient(to top right, #ff80b5, #9089fc); opacity: 0.3; clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%); @apply relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem];"></div>
        </div>
        <div style="margin-inline-start: auto; margin-inline-end: auto; max-width: 2xl; text-align: center; @apply mx-auto max-w-2xl text-center;">
            <h2 style="font-size: 1.875rem; line-height: 2.25rem; font-weight: 700; letter-spacing: -0.025em; color: #374151; @apply text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl;">Modifier le livre</h2>
            <p style="margin-top: 0.5rem; font-size: 1.125rem; line-height: 1.75rem; color: #4b5563; @apply mt-2 text-lg leading-8 text-gray-600;">Remplissez les champs pour modifier le livre</p>
        </div>
        <form @submit.prevent="updateBookData" style="margin-inline-start: auto; margin-inline-end: auto; margin-top: 4rem; max-width: xl; @apply mx-auto mt-16 max-w-xl sm:mt-20;">
            <div style="display: grid; grid-template-columns: 1fr; gap: 0.75rem 2rem; @apply grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2;">
                <!-- Titre -->
                <div>
                    <label for="name" class="form-label">Titre</label>
                    <input type="text" id="name" class="form-input">
                </div>
                <!-- Auteur -->
                <div>
                    <label for="author_id" class="form-label">Auteur</label>
                    <input type="text" id="author_id" class="form-input">
                </div>
                <!-- Éditeur -->
                <div>
                    <label for="editor_id" class="form-label">Éditeur</label>
                    <input type="text" id="editor_id" class="form-input">
                </div>
                <!-- Couverture -->
                <div>
                    <label for="cover" class="form-label">Couverture</label>
                    <input type="text" id="cover" class="form-input">
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" class="form-input"></textarea>
                </div>
                <!-- Stock -->
                <div>
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" id="stock" class="form-input">
                </div>
                <!-- Date de parution -->
                <div>
                    <label for="published_at" class="form-label">Date de parution</label>
                    <input type="text" id="published_at" class="form-input">
                </div>
            </div>
            <div style="margin-top: 2.5rem; @apply mt-10;">
                <button type="submit" class="btn-submit">Ajouter le livre</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router'; // Import useRouter
import useBooks from '@/composables/books';

const router = useRouter(); // Use useRouter to get the router instance
const { updateBook } = useBooks();

const updateBookData = async () => {
  // Get the route params using router.currentRoute.value.params
  const id = router.currentRoute.value.params.id;

  console.log(id);

  // Get form data
  const name = document.getElementById('name').value;
  const description = document.getElementById('description').value;
  const cover = document.getElementById('cover').value;
  const author_id = document.getElementById('author_id').value;
  const editor_id = document.getElementById('editor_id').value;
  const stock = document.getElementById('stock').value;
  const published_at = document.getElementById('published_at').value;

  // Call updateBook function with id and form data
  await updateBook(id, {
    name,
    description,
    cover,
    author_id,
    editor_id,
    stock,
    published_at,
  });
}
</script>

<style scoped>
/* Style personnalisé pour le formulaire */
.form-label {
    font-size: 0.875rem;
    font-weight: 600;
    line-height: 1.25rem;
    color: #374151;
}

.form-input {
    width: 100%;
    border-radius: 0.375rem;
    border-width: 0;
    padding-inline: 0.875rem;
    padding-block: 0.5rem;
    color: #374151;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05);
    border-color: #d1d5db;
    placeholder-color: #9ca3af;
    outline-width: 0;
    outline-offset: 0;
    outline-style: auto;
    outline-color: initial;
    outline-width: 2px;
    outline-style: inset;
    outline-color: #2563eb;
}

.btn-submit {
    display: block;
    width: 100%;
    border-radius: 0.375rem;
    background-color: #4f46e5;
    padding-inline: 0.875rem;
    padding-block: 0.625rem;
    color: #fff;
    font-weight: 600;
    box-shadow: 0 0.125rem 0.25rem rgba(79, 70, 229, 0.5);
}

.btn-submit:hover {
    background-color: #4338ca;
}
</style>
