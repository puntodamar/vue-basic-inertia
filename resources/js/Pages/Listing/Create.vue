<template>
    <listing-form :listing="{}" :submit="create" :errors="errors"></listing-form>
</template>

<script setup>
    import ListingForm from "../../Components/ListingForm.vue";
    import {useForm} from "@inertiajs/vue3";
    import {computed} from "vue";

    let form = useForm({});
    const errors = computed(() => form.errors)

    const create = (formData) => {
        console.log('submit called on parent')
        form.value = formData.value
        form.post('/listings')
        console.log(form.errors)
    }
</script>

