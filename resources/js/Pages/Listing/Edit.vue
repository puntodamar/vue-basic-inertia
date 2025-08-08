<template>
    <listing-form
        @submit="form.patch(`/listings/${props.listing.id}`)"
        :form="form"
        :errors="errors"
        button="Edit">
    </listing-form>
</template>

<script setup>
    import ListingForm from "../../Components/ListingForm.vue";
    import {useForm} from "@inertiajs/vue3";
    import {computed} from "vue";

    const props = defineProps(['listing'])
    let form = useForm({...props.listing});
    const errors = computed(() => form.errors)
</script>
