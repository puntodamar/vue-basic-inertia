<template>

    <header class="border-b border-gray-200  bg-white dark:border-gray-700 dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between text-lg font-medium">
                <div><the-link href="/">Homepage</the-link></div>
                <div><the-link href="/show">Show</the-link></div>
                <div><the-link :href="route('listings.index')">Listings</the-link></div>

                <div v-if="store.state.user" class="flex items-center gap-4">
                    <div class="text-sm text-gray-500">{{store.state.user.name}}</div>
                    <the-link :href="route('listings.create')" class="btn-primary">+ Create</the-link>
                    <button type="button" class="hover:cursor-pointer" @click="logout">Logout</button>
                </div>

                <div v-else class="flex items-center gap-4">
                    <the-link :href="route('listings.create')" class="btn-primary">+ Create</the-link>
                    <the-link :href="route('login')">Login</the-link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <p>Timer: {{counter}}</p>

        <slot>Default</slot>
    </main>



</template>

<script setup>
    import {computed, ref, watch} from "vue";
    import { Inertia } from '@inertiajs/inertia'
    import {router, usePage} from "@inertiajs/vue3"
    import {route} from "ziggy-js";
    import {store} from "../vuex.js";

    const page = usePage()
    const counter = ref(0)

    // const user = computed({
    //     get:  () => store.state.user,
    //     set:  (val) => store.commit('setUser', val),
    // })
    const logout = () => {
        store.commit("setUser", null)
        Inertia.visit(route('logout'), {
            method: 'delete',
            replace: true,
        })
    };

    watch(
        () => page.props.user,
        (user) => {
            store.commit('setUser', user)
        },
        { immediate: true }
    )

    setInterval(() => ref(counter.value++), 1000)
</script>
