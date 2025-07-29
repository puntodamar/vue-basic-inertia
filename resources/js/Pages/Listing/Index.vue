<template>
    <h1>{{text}}</h1>
    <listing-address :listings="listings"></listing-address>
</template>

<script setup>
    import ListingAddress from "../../Components/ListingAddress.vue";
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
