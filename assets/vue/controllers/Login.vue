// assets/vue/controllers/Login.vue
<template>
    <!-- <div class="text-white">Esto es una prueba para el {{ name }}</div> -->
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row justify-content-center">
            <div class="col-md-6 w-100">
                <h1 class="text-center text-white">{{ companyName }}</h1>
                <div class="card border shadow p-3 mb-5 bg-dark rounded">
                    <div class="card-body bg-dark">
                        <form method="post">
                            <h2 class="text-center text-white">{{ loginTitle }}</h2>
                            <p v-if="error" class="alert alert-danger">{{ error }}</p>
                            <div class="form-group">
                                <label for="_username" class="text-white">{{ loginUser }}</label>
                                <input type="text" v-bind:value=" error ? lastUsername : ''" name="_username" class="form-control" placeholder="User" required v-bind:autofocus="!error">
                            </div>
                            <div class="form-group">
                                <label for="_password" class="text-white">{{ loginPass }}</label>
                                <input type="password" name="_password" class="form-control" placeholder="Password" v-bind:autofocus="error">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-outline-secondary btn-block w-100">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    defineProps({
        companyName: String,
        loginTitle: String,
        loginUser: String,
        loginPass: String,
        error: String,
        lastUsername: String
    });
</script>