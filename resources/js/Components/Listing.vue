<template>
    <flash-message></flash-message>
    <div class="grid gap-4 grid-cols-1 md:grid-cols-2 xl:grid-cols-3">

        <the-box v-for="list in listings" :key="list.id">
            <the-link :href="route('listings.show', list.id)">
                <listing-item :listing="list"></listing-item>
            </the-link>
            <br/>

            <div v-if="eligibleToAlter(list.owner_id)">
                <div class="flex space-x-2">
                    <the-link :href="route('listings.edit', list.id)" method="get" class="mt-1 text-white p-2 rounded-md">
                        Edit
                    </the-link>
                    <the-link :href="route('listings.destroy', list.id)" method="delete" class="mt-1 text-white bg-red-800 p-2 rounded-md hover:cursor-pointer">
                        Delete
                    </the-link>
                </div>
            </div>

        </the-box>
    </div>
</template>
<script setup>

    import { route } from 'ziggy-js';
    import TheBox from "./UI/TheBox.vue";

    import ListingItem from "./ListingItem.vue";
    import FlashMessage from "./UI/FlashMessage.vue";
    import {store} from "../vuex.js";
    import {computed} from "vue";

    const props = defineProps({
        listings: {type: Array, required: true},
    })

    const eligibleToAlter  = (owner_id) => owner_id === store.state.user?.id || store.state.user?.is_admin
</script>
