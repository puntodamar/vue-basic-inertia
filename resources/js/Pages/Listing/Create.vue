<template>
    <listing-form :form="form" :errors="form.errors" @submit="create"></listing-form>
</template>

<script setup>
    import ListingForm from "../../Components/ListingForm.vue";
    import {useForm} from "@inertiajs/vue3";
    import {store} from "../../vuex.js";

    const listing = {
        owner_id: store.state.user.id,
        beds: null,
        baths: null,
        area: null,
        city: null,
        code: null,
        street: null,
        street_number: null,
        price: null
    }

    const form = useForm(listing);

    const create = () => {
        console.table(form.data())
        form.post('/listings')
    }

</script>

