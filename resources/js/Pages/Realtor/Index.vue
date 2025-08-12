<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <flash-message></flash-message>

    <section class="mb-8">
        <realtor-filter :form="form" @filterChanged="filterChanged"></realtor-filter>
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <the-box v-for="list in listings.data" :key="list.id" :class="{'border-dashed': list.deleted_at}">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div :class="{'opacity-25': list.deleted_at}">
                    <div class="xl:flex items-center gap-2">
                        <the-price :price="list.price" class="text-2xl font-medium"></the-price>
                        <listing-space :listing="list"></listing-space>
                        <div class="text-xs text-gray-400">{{list.street}}</div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                        <the-link :href="route('listings.show', list.id)" class="btn-outline text-xs font-medium">Preview</the-link>
                        <the-link v-if="!list.deleted_at" :href="route('listings.edit', list.id)" class="btn-outline text-xs font-medium">Edit</the-link>

                        <the-link v-if="!list.deleted_at" :href="route('listings.destroy', list.id)" method="delete" class="btn-outline text-xs font-medium">Delete</the-link>
                        <the-link v-else :href="route('realtors.listings.restore', list.id)" method="put" class="btn-outline text-xs font-medium">Restore</the-link>
                    </div>
                    <div class="flex items-center">
                        <the-link :href="route('realtors.listings.image.create', list.id)" class="btn-outline text-xs font-medium w-full text-center">{{imageCounter(list)}}</the-link>
                    </div>

                </div>
            </div>


        </the-box>
    </section>


    <div v-if="props.listings.data.length" class="w-full flex justify-center mt-4 mb-4" >
        <pagination :links="props.listings.links"></pagination>
    </div>

</template>

<script setup>
    import TheBox from "../../Components/UI/TheBox.vue";
    import ThePrice from "../../Components/UI/ThePrice.vue";
    import ListingSpace from "../../Components/UI/ListingSpace.vue";
    import {Link as TheLink, router, useForm} from "@inertiajs/vue3";
    import {route} from "ziggy-js";
    import FlashMessage from "../../Components/UI/FlashMessage.vue";
    import RealtorFilter from "../../Components/UI/RealtorFilter.vue";
    import {reactive} from "vue";
    import Pagination from "../../Components/UI/Pagination.vue";


    const form = reactive({
        deleted: route().params.deleted === 'true', // true if exactly "true"
        draft: route().params.draft === 'true'
    })

    const props = defineProps({
        listings: Object,
    })

    const imageCounter = (list) => {
        if (list.images_count > 0) {
            return "Images (" + list.images_count + ")";
        } else {
            return "Images"
        }
    }

    const filterChanged = (filter) => {
        console.log(filter)
        router.get(route('realtors.listings.index'), filter, {
            replace: true,          // update URL without adding history entry
            preserveScroll: true,   // no jump
            preserveState: true,    // keep local component state
            only: ['listings'],     // only refetch this prop (adjust to yours)
        })
    }





</script>
