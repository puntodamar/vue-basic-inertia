<template>
    <div class="grid gap-4 grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
        <the-box v-for="list in listings" :key="list.id">
            <the-link :href="route('listings.show', list.id)">
                <listing-item :listing="list"></listing-item>
            </the-link>
            <br/>
            <div class="flex space-x-2">
                <the-link :href="route('listings.edit', list.id)" method="get">
                    <div class="mt-1 text-white p-2 rounded-md">Edit</div>
                </the-link>
                <the-link :href="route('listings.destroy', list.id)" method="delete">
                    <div class="mt-1 text-white bg-red-800 p-2 rounded-md">Delete</div>
                </the-link>
            </div>


        </the-box>
    </div>


<!--    <div>-->
<!--        <ul>-->
<!--            <li v-for="list in listings" :key="list.id">-->
<!--                <the-link :href="route('listings.show', list.id)">{{list.street}}</the-link>&nbsp; <the-link :href="route('listings.destroy', list.id)" method="delete">DELETE</the-link>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
</template>
<script setup>

    import { route } from 'ziggy-js';
    import TheBox from "./UI/TheBox.vue";

    import ListingItem from "./ListingItem.vue";

    const props = defineProps({
        listings: {type: Array, required: true},
    })
</script>
