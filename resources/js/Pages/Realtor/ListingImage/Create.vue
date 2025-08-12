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
            <input
                @input="addFiles"
                ref="inputImage"
                type="file"
                class="border rounded-md cursor-pointer pl-4 file:pr-4 file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 file:dark:text-gray-400 file:border-0 file:bg-gray-100 file:dark:bg-gray-800 file:font-medium file:hover:bg-gray-200 file:dark:hover:bg-gray-700"
            />

            <button type="submit" class="btn btn-primary disabled:opacity-25 ml-4" :disabled="!canUpload">Send</button>
            <button type="reset" class="btn btn-outline ml-2 disabled:opacity-25" @click="reset" :disabled="!canUpload" >Reset</button>
        </form>
    </the-box>
</template>

<script setup>
    import {route} from "ziggy-js";
    import FlashMessage from "../../../Components/UI/FlashMessage.vue";
    import TheBox from "../../../Components/UI/TheBox.vue";
    import {useForm} from "@inertiajs/vue3";
    import {computed, ref} from "vue";
    import {Inertia} from "@inertiajs/inertia";
    import NProgress from "lodash";
    const props = defineProps({
        listing: {type: Object}
    })

    const form = useForm({
        images: []
    });

    const inputImage = ref(null)

    const canUpload = computed(() => form.images.length !== 0 && props.listing.images_count < 5)
    console.log(form.images.length === 0)

    Inertia.on('progress', (event) => {
        if(event.detail.progress.percentage) {
            NProgress.set((event.detail.progress.percentage / 100) * 0.9)
        }
    })


    const upload = () => {
        console.log("upload called")
        form.post(
            route('realtors.listings.image.store', {listing: props.listing.id}), {
                forceFormData: true,
                onSuccess: (res) => {
                    reset()
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
        if (inputImage.value) {
            inputImage.value.value = ''  // clear actual <input type="file">
        }
    }


    let fakePercent = 0
    const interval = setInterval(() => {
        fakePercent += 10

        document.dispatchEvent(
            new CustomEvent('inertia:progress', {
                detail: {
                    progress: {
                        percentage: fakePercent
                    }
                }
            })
        )

        if (fakePercent >= 100) {
            clearInterval(interval)
        }
        console.log(fakePercent)
    }, 200)

</script>
