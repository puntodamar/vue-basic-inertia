<template>
    <div class="grid gap-4 grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
        <the-box v-for="list in listings" :key="list.id">
            <Link :href="route('listings.show', list.id)">
                <listing-item :listing="list"></listing-item>
            </Link>
            <br/>
            <div class="flex space-x-2">
                <Link :href="route('listings.edit', list.id)" method="get">
                    <div class="mt-1 text-white p-2 rounded-md">Edit</div>
                </Link>
                <Link :href="route('listings.destroy', list.id)" method="delete">
                    <div class="mt-1 text-white bg-red-800 p-2 rounded-md">Delete</div>
                </Link>
            </div>


        </the-box>
    </div>


<!--    <div>-->
<!--        <ul>-->
<!--            <li v-for="list in listings" :key="list.id">-->
<!--                <Link :href="route('listings.show', list.id)">{{list.street}}</Link>&nbsp; <Link :href="route('listings.destroy', list.id)" method="delete">DELETE</Link>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
</template>
<script setup>
    import {Link} from "@inertiajs/vue3";
    import { route } from 'ziggy-js';
    import TheBox from "./UI/TheBox.vue";

    import ListingItem from "./ListingItem.vue";

    const props = defineProps({
        listings: {type: Array, required: true},
    })
</script>
