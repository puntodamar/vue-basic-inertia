<template>
    <div class="text-lgg">
        <span class="font-bold">{{listing.beds}}  </span> beds
        <span class="text-gray-400">|</span>&nbsp;
        <span class="font-bold">{{listing.baths}} </span>  baths
        <span class="text-gray-400">|</span>&nbsp;
        <span class="font-bold">{{listing.area}} </span> m2
    </div>
</template>

<script setup>
defineProps({listing: {type: Object, required: true}})
</script>
