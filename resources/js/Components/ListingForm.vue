<template>
    <form @submit.prevent="props.submit({...form})">
        <div>
            <div v-if="errors">
                <ul>
                    <li v-for="err in errors" :key="err">{{err}}</li>
                </ul>
            </div>
            <div>
                <label>Beds</label>
                <input v-model.number="form.beds" type="number" />
            </div>

            <div>
                <label>Baths</label>
                <input v-model.number="form.baths" type="number" />
            </div>

            <div>
                <label>Area</label>
                <input v-model.number="form.area" type="number" />
            </div>

            <div>
                <label>City</label>
                <input v-model="form.city" type="text" />
            </div>

            <div>
                <label>Post Code</label>
                <input v-model.trim="form.code" type="text" />
            </div>

            <div>
                <label>Street</label>
                <input v-model="form.street" type="text" />
            </div>

            <div>
                <label>Street Number</label>
                <input v-model.number="form.street_number" type="number" />
            </div>

            <div>
                <label>Price</label>
                <input v-model.number="form.price" type="number" />
            </div>

            <div>
                <button type="submit" style="color: red">{{button || "Create"}}</button>
            </div>
        </div>
    </form>
</template>


<script setup>
    import {useForm} from "@inertiajs/vue3";

    const props =  defineProps({
        errors: {
            type: Object,
            required: false,
        },
        listing: {
            type: Object,
            required: true,
        },
        submit: {
            type: Function,
            required: true
        },
        button: {
            type: String,
            required: false
        }
    })

    const form = useForm(props.listing)

</script>
