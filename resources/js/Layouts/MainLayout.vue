<template>
    <Link href="/">Homepage</Link>&nbsp;
    <Link href="/show">Show</Link>&nbsp;
    <Link :href="route('listings.index')">Listings</Link>&nbsp;
    <Link :href="route('listings.create')">Create</Link>
    <p>Timer: {{counter}}</p>
    <br/>
    <div v-if="flash" class="flash-success">
        {{flash}}
    </div>
    <br/>
    <slot>Default</slot>

</template>

<style scoped>
    .flash-success {
        background-color: #5cb85c;
        color: white;
    }
</style>

<script setup>
    import {computed, ref} from "vue";
    import {Link, usePage} from "@inertiajs/vue3"
    import {route} from "ziggy-js";

    const counter = ref(0)
    const page = usePage()
    const flash = computed(() => page.props.flash.success)

    setInterval(() => ref(counter.value++), 1000)
</script>
