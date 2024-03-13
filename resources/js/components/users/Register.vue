<template>

    <div class="form-container">
        <form @submit.prevent="register" class="register-form">

            <input type="text" v-model="name" placeholder="Nom - Prénom" required />
            <input type="email" v-model="email" placeholder="Email" required />
            <input type="password" v-model="password" placeholder="Mot de passe" required />
            <button type="submit">M'inscrire</button>

        </form>
    </div>
</template>


<script>
import axios from '@/axios';


export default {
    data() {
        return {
            // Data model for the form inputs
            name: "",
            email: "",
            password: ""
        };
    },
    methods: {
        async register() {
            try {
                // Making POST request to "/register" endpoint with name, email, and password as data
                const response = await axios.post("/inscription", {
                    name: this.name,
                    email: this.email,
                    password: this.password
                });
                // Here you could handle the response, for example, store the received token,
                // update the 'isLoggedIn' state, and redirect to the dashboard or any other page
            }
            catch (error) {
                console.error("An error occurred:", error);
                if (error.response) {
                    console.error('Error details:', error.response.data);
                }
            }
        }
    }
};
</script>



<style scoped>
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
}


.register-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 300px;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.register-form input,
.register-form button {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
}


.register-form button {
    background-color: #007BFF;
    color: white;
    cursor: pointer;
}
</style>