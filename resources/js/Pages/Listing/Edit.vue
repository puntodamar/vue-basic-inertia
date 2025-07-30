<template>
    <listing-form :submit="edit" :listing="listing" :errors="errors" button="Edit"></listing-form>
</template>

<script setup>
    import ListingForm from "../../Components/ListingForm.vue";
    import {useForm} from "@inertiajs/vue3";
    import {computed} from "vue";

    const props = defineProps(['listing'])
    let form = useForm({...props.listing});
    const errors = computed(() => form.errors)

    const edit = (formData) => {
        Object.assign(form, formData)
        form.patch(`/listings/${props.listing.id}`)
    }
</script>
