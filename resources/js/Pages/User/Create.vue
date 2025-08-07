<template>
    <form @submit.prevent="register">

        <div class="w-1/4 mx-auto">
            <div class="mt-5">
                <label for="name">Name</label>
                <input id="name" type="text" class="input-field" v-model="form.name">
                <div v-if="errors.name" class="input-error">{{errors.name}}</div>
            </div>
            <div class="mt-5">
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
                <label for="password_confirmation">Password Confirmation</label>
                <input id="password_confirmation" type="password" class="input-field" v-model="form.password_confirmation">
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

    const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    })

    const errors = computed(() => form.errors)

    const register = () => {
        form.post(route('users.store'))
    }


</script>
