<template>
    <flash-message></flash-message>
    <form
        method="POST"
        :action="route('realtors.listings.image.store', {listing: listing.id})"
        enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="$page.props.csrf_token">
            <input type="file" multiple name="images[]">
            <button type="submit" class="btn btn-primary">Send</button>
    </form>
</template>

<script setup>
    import {route} from "ziggy-js";
    import FlashMessage from "../../../Components/UI/FlashMessage.vue";
    const props = defineProps({
        listing: {type: Object}
    })
</script>
