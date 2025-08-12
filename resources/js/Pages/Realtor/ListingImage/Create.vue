<template>
    <flash-message></flash-message>
    <the-box>
        <template #header>Upload New Images via POST Request</template>
        <form
            method="POST"
            :action="route('realtors.listings.image.store', {listing: listing.id})"
            enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="$page.props.csrf_token">
            <input type="file" multiple name="images[]">
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </the-box>

    <the-box>
        <template #header>Upload New Images via Inertia</template>
        <form @submit.prevent="upload">
            <input type="file" multiple name="images[]" @input="addFiles" ref="inputImage">
            <button type="submit" class="btn btn-primary">Send</button>
            <button type="reset" class="btn btn-outline ml-2" @click="reset" >Reset</button>
        </form>
    </the-box>
</template>

<script setup>
    import {route} from "ziggy-js";
    import FlashMessage from "../../../Components/UI/FlashMessage.vue";
    import TheBox from "../../../Components/UI/TheBox.vue";
    import {useForm} from "@inertiajs/vue3";
    import {ref} from "vue";
    const props = defineProps({
        listing: {type: Object}
    })

    const form = useForm({
        images: []
    });

    const inputImage = ref(null)

    const upload = () => {
        console.log("upload called")
        form.post(
            route('realtors.listings.image.store', {listing: props.listing.id}), {
                forceFormData: true,
                onSuccess: (res) => {
                    reset()
                    if (inputImage.value) {
                        inputImage.value.value = ''  // clear actual <input type="file">
                    }
                }
            }
        )
    }

    const addFiles = ($event) => {
        for(const image of $event.target.files) {
            form.images.push(image);
        }
    }

    const reset = () => {
        form.reset('images');
    }
</script>
