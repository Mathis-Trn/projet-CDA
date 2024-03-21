<template>
    <div style="background-color: white; padding: 8rem; @apply isolate bg-white px-6 py-24 sm:py-32 lg:px-8;">
        <div style="position: absolute; inset-inline-start: 0; inset-inline-end: 0; top: -10rem; z-index: -10; transform: translateZ(0); overflow: hidden; filter: blur(1.5rem); top: -20rem; @apply absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem];" aria-hidden="true">
            <!-- Background element -->
            <div style="position: relative; left: 50%; z-index: -10; aspect-ratio: 1155 / 678; width: 36.125rem; max-width: none; transform: translateX(-50%) rotate(30deg); background-image: linear-gradient(to top right, #ff80b5, #9089fc); opacity: 0.3; clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%); @apply relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem];"></div>
        </div>
        <div style="margin-inline-start: auto; margin-inline-end: auto; max-width: 2xl; text-align: center; @apply mx-auto max-w-2xl text-center;">
            <h2 style="font-size: 1.875rem; line-height: 2.25rem; font-weight: 700; letter-spacing: -0.025em; color: #374151; @apply text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl;">Modifier l'Utilisateur</h2>
            <p style="margin-top: 0.5rem; font-size: 1.125rem; line-height: 1.75rem; color: #4b5563; @apply mt-2 text-lg leading-8 text-gray-600;">Remplissez les champs pour modifier l'Utilisateur</p>
        </div>
        <form @submit.prevent="updateUserData" style="margin-inline-start: auto; margin-inline-end: auto; margin-top: 4rem; max-width: xl; @apply mx-auto mt-16 max-w-xl sm:mt-20;">
            <div style="display: grid; grid-template-columns: 1fr; gap: 0.75rem 2rem; @apply grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2;">
                <div>
                    <label for="name" style="font-size: 0.875rem; font-weight: 600; line-height: 1.25rem; color: #374151; @apply block text-sm font-semibold leading-6 text-gray-900;">Nom</label>
                    <div style="margin-top: 0.625rem; @apply mt-2.5;">
                        <input type="text" id="name" style="width: 100%; border-radius: 0.375rem; border-width: 0; padding-inline: 0.875rem; padding-block: 0.5rem; color: #374151; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05); border-color: #d1d5db; placeholder-color: #9ca3af; outline-width: 0; outline-offset: 0; outline-style: auto; outline-color: initial; outline-width: 2px; outline-style: inset; outline-color: #2563eb; @apply block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6;">
                    </div>
                </div>
                <div>
                    <label for="email" style="font-size: 0.875rem; font-weight: 600; line-height: 1.25rem; color: #374151; @apply block text-sm font-semibold leading-6 text-gray-900;">E-mail</label>
                    <div style="margin-top: 0.625rem; @apply mt-2.5;">
                        <input type="text" id="email" style="width: 100%; border-radius: 0.375rem; border-width: 0; padding-inline: 0.875rem; padding-block: 0.5rem; color: #374151; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05); border-color: #d1d5db; placeholder-color: #9ca3af; outline-width: 0; outline-offset: 0; outline-style: auto; outline-color: initial; outline-width: 2px; outline-style: inset; outline-color: #2563eb; @apply block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6;">
                    </div>
                </div>
                <div>
                    <label for="address" style="font-size: 0.875rem; font-weight: 600; line-height: 1.25rem; color: #374151; @apply block text-sm font-semibold leading-6 text-gray-900;">Adresse</label>
                    <div style="margin-top: 0.625rem; @apply mt-2.5;">
                        <input type="text" id="address" style="width: 100%; border-radius: 0.375rem; border-width: 0; padding-inline: 0.875rem; padding-block: 0.5rem; color: #374151; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05); border-color: #d1d5db; placeholder-color: #9ca3af; outline-width: 0; outline-offset: 0; outline-style: auto; outline-color: initial; outline-width: 2px; outline-style: inset; outline-color: #2563eb; @apply block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6;">
                    </div>
                </div>
                <div>
                    <label for="password" style="font-size: 0.875rem; font-weight: 600; line-height: 1.25rem; color: #374151; @apply block text-sm font-semibold leading-6 text-gray-900;">Mot de passe</label>
                    <div style="margin-top: 0.625rem; @apply mt-2.5;">
                        <input type="text-area" id="password" style="width: 100%; border-radius: 0.375rem; border-width: 0; padding-inline: 0.875rem; padding-block: 0.5rem; color: #374151; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05); border-color: #d1d5db; placeholder-color: #9ca3af; outline-width: 0; outline-offset: 0; outline-style: auto; outline-color: initial; outline-width: 2px; outline-style: inset; outline-color: #2563eb; @apply block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6;">
                    </div>
                </div>
                <div>
                    <label for="role_id" style="font-size: 0.875rem; font-weight: 600; line-height: 1.25rem; color: #374151; @apply block text-sm font-semibold leading-6 text-gray-900;">Role</label>
                    <div style="margin-top: 0.625rem; @apply mt-2.5;">
                        <input type="text-area" id="role_id" style="width: 100%; border-radius: 0.375rem; border-width: 0; padding-inline: 0.875rem; padding-block: 0.5rem; color: #374151; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05); border-color: #d1d5db; placeholder-color: #9ca3af; outline-width: 0; outline-offset: 0; outline-style: auto; outline-color: initial; outline-width: 2px; outline-style: inset; outline-color: #2563eb; @apply block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6;">
                    </div>
                </div>
            </div>
            <div style="margin-top: 2.5rem; @apply mt-10;">
                <button type="submit" style="display: block; width: 100%; border-radius: 0.375rem; background-color: #4f46e5; padding-inline: 0.875rem; padding-block: 0.625rem; color: #fff; font-weight: 600; box-shadow: 0 0.125rem 0.25rem rgba(79, 70, 229, 0.5); @apply block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600;">Modifier l'Utilisateur</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { useRouter } from 'vue-router'; // Import useRouter
import useUsers from '@/composables/users';

const router = useRouter(); // Use useRouter to get the router instance
const { updateUser, getUser } = useUsers();

const id = router.currentRoute.value.params.id;

const updateUserData = async () => {
  console.log(id);

  // Get form data
    const name = document.getElementById('name').value;
    const password = document.getElementById('password').value;
    const address = document.getElementById('address').value;
    const email = document.getElementById('email').value;
    const role_id = document.getElementById('role_id').value;

  // Call updateUser function with id and form data
  await updateUser(id, {
    name,
    email,
    address,
    password,
    role_id
  });
}

onMounted(getUser(id));
</script>