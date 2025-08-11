<template>
    <h1>{{text}}</h1>
    <filters :filters="props.filters"></filters>
    <listing :listings="listings.data"></listing>
    <div v-if="props.listings.data.length" class="w-full flex justify-center mt-4 mb-4" >
        <pagination :links="props.listings.links"></pagination>
    </div>
</template>

<script setup>
    import Listing from "../../Components/Listing.vue";
    import {ref} from "vue";
    import MainLayout from "../../Layouts/MainLayout.vue";
    import Pagination from "../../Components/UI/Pagination.vue";
    import Filters from "../../Components/UI/Filters.vue";

    const text = ref("Hello from Listing")
    const props = defineProps({
        listings: {type: Object, required: true},
        filters: {type: Object, required: true},
    })

    defineOptions({
        layout: MainLayout
    })

</script>
