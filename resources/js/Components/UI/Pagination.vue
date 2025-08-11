<template>
    <div class="flex gap-1">
        <the-link
            v-for="(link, index) in props.links" :key="index"
            class="py-2 px-4 rounded-md" :href="link.url || ''"
            :class="{'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active }"
            v-html="link.label">
        </the-link>
    </div>
</template>

<script setup>
    import {Link as TheLink} from "@inertiajs/vue3";

    const  props = defineProps({
        links: Array,
    })
</script>
