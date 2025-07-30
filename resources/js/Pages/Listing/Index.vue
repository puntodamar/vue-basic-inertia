<template>
    <h1>{{text}}</h1>
    <listing :listings="listings"></listing>
</template>

<script setup>
    import Listing from "../../Components/Listing.vue";
    import {ref} from "vue";
    import MainLayout from "../../Layouts/MainLayout.vue";
    import {Link} from "@inertiajs/vue3";

    const text = ref("Hello from Listing")
    const props = defineProps({
        listings: {type: Array, required: true},
    })
    defineOptions({
        layout: MainLayout
    })

</script>
