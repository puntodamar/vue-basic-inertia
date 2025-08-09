<template>
    <h1>{{text}}</h1>
    <listing :listings="listings.data"></listing>
</template>

<script setup>
    import Listing from "../../Components/Listing.vue";
    import {ref} from "vue";
    import MainLayout from "../../Layouts/MainLayout.vue";

    const text = ref("Hello from Listing")
    const props = defineProps({
        listings: {type: Object, required: true},
    })

    console.log(props.listings)
    defineOptions({
        layout: MainLayout
    })

</script>
