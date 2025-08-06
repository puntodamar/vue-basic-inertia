<template>
    <form @submit.prevent="login">

        <div class="w-1/4 mx-auto">
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" class="input-field" v-model="form.email">
                <div v-if="errors.email" class="input-error">{{errors.email}}</div>
            </div>

            <div class="mt-5">
                <label for="password">Password</label>
                <input id="password" type="password" class="input-field" v-model="form.password">
                <div v-if="errors.password" class="input-error">{{errors.password}}</div>
            </div>

            <div class="mt-5">
                <button class="btn-primary w-full" type="submit">Login</button>
            </div>

        </div>
    </form>
</template>
<script setup>

     import {useForm} from "@inertiajs/vue3";
     import {route} from "ziggy-js";
     import {computed} from "vue";
     import FlashMessage from "../../Components/UI/FlashMessage.vue";

     const form = useForm({
         email: null,
         password: null,
     })

     const login = () =>  form.post(route('login.store'))

     const errors = computed(() => form.errors)
</script>
