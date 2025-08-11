<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section class="mb-8">
        Filters
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <the-box v-for="list in listings" :key="list.id">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div>
                    <div class="xl:flex items-center gap-2">
                        <the-price :price="list.price" class="text-2xl font-medium"></the-price>
                        <listing-space :listing="list"></listing-space>
                        <div class="text-xs text-gray-400">{{list.street}}</div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                        <the-link :href="list.url" class="btn-outline text-xs font-medium">Preview</the-link>
                        <the-link :href="list.url" class="btn-outline text-xs font-medium">Edit</the-link>
                        <the-link :href="list.url" class="btn-outline text-xs font-medium">Delete</the-link>
                    </div>
                </div>
            </div>
        </the-box>
    </section>
</template>

<script setup>
    import TheBox from "../../Components/UI/TheBox.vue";
    import ThePrice from "../../Components/UI/ThePrice.vue";

    import ListingSpace from "../../Components/UI/ListingSpace.vue";
    import ListingItem from "../../Components/ListingItem.vue";
    import {Link as TheLink} from "@inertiajs/vue3";

    const props = defineProps({
        listings: Array,
    })
</script>
