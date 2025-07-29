<template>
    <div>
        <ul>
            <li v-for="list in listings" :key="list.id">
                <Link :href="route('listings.show', list.id)">{{list.street}}</Link>&nbsp; <Link :href="route('listings.destroy', list.id)" method="delete">DELETE</Link>
            </li>
        </ul>
    </div>
</template>
<script setup>
    import {Link} from "@inertiajs/vue3";
    import { route } from 'ziggy-js';

    const props = defineProps({
        listings: {type: Array, required: true},
    })
</script>
