<template>

    <header class="border-b border-gray-200  bg-white dark:border-gray-700 dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between text-lg font-medium">
                <div><Link href="/">Homepage</Link></div>
                <div><Link href="/show">Show</Link></div>
                <div><Link :href="route('listings.index')">Listings</Link></div>
                <div class="bg-indigo-600 hover:bg-indigo-500 text-white p-2 rounded-md"><Link :href="route('listings.create')">+ Create</Link></div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <p>Timer: {{counter}}</p>
        <br/>
        <div v-if="flash" class="mb-4 border rounded-md shadow-sm border-green-200 dark:green-800 bg-green-50 dark:bg-green-900 p-2">
            {{flash}}
        </div>
        <br/>
        <slot>Default</slot>
    </main>



</template>

<script setup>
    import {computed, ref} from "vue";
    import {Link, usePage} from "@inertiajs/vue3"
    import {route} from "ziggy-js";

    const counter = ref(0)
    const page = usePage()
    const flash = computed(() => page.props.flash.success)

    setInterval(() => ref(counter.value++), 1000)
</script>
