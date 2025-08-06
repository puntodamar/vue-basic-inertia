<template>
    <form @submit.prevent="props.submit({...form})">
        <flash-message></flash-message>
<!--        <div v-if="errors">-->
<!--            <ul>-->
<!--                <li v-for="err in errors" :key="err">{{err}}</li>-->
<!--            </ul>-->
<!--        </div>-->
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label  :class="errors.beds ? 'form-label-error' : ''">Beds</label>
                <input v-model.number="form.beds" type="number" :class="errors.beds ? 'input-field-error' : 'input-field'" />
                <div v-if="errors.beds" class="input-error">
                    {{errors.beds}}
                </div>
            </div>

            <div class="col-span-2">
                <label  :class="errors.baths ? 'form-label-error' : ''">Baths</label>
                <input v-model.number="form.baths" type="number" :class="errors.baths ? 'input-field-error' : 'input-field'" />
                <div v-if="errors.baths" class="input-error">
                    {{errors.baths}}
                </div>
            </div>

            <div class="col-span-2">
                <label  :class="errors.area ? 'form-label-error' : ''">Area</label>
                <input v-model.number="form.area" type="number" :class="errors.area ? 'input-field-error' : 'input-field'" />
                <div v-if="errors.area" class="input-error">
                    {{errors.area}}
                </div>
            </div>

            <div class="col-span-4">
                <label :class="errors.city ? 'form-label-error' : ''">City</label>
                <input v-model="form.city" type="text" :class="errors.city ? 'input-field-error' : 'input-field'">
                <div v-if="errors.city" class="input-error">
                    {{errors.city}}
                </div>
            </div>

            <div class="col-span-2">
                <label  :class="errors.code ? 'form-label-error' : ''">Post Code</label>
                <input v-model.trim="form.code" type="text" :class="errors.code ? 'input-field-error' : 'input-field'" />
                <div v-if="errors.code" class="input-error">
                    {{errors.code}}
                </div>
            </div>

            <div class="col-span-4">
                <label :class="errors.street ? 'form-label-error' : ''">Street</label>
                <input v-model="form.street" type="text" :class="errors.street ? 'input-field-error' : 'input-field'" />
                <div v-if="errors.street" class="input-error">
                    {{errors.street}}
                </div>
            </div>

            <div class="col-span-2">
                <label :class="errors.street_number ? 'form-label-error' : ''">Street Number</label>
                <div class="dark">
                    <input v-model.number="form.street_number" type="number" :class="errors.street_number ? 'input-field-error' : 'input-field'" />
                </div>
                <div v-if="errors.street_number" class="input-error">
                    {{errors.street_number}}
                </div>
            </div>

            <div class="col-span-6">
                <label :class="errors.price ? 'form-label-error' : ''">Price</label>
                <input v-model.number="form.price" type="number" :class="errors.price ? 'input-field-error' : 'input-field'"  />
                <div v-if="errors.price" class="input-error">
                    {{errors.price}}
                </div>
            </div>

            <div class="col-span-6">
                <button type="submit" class="btn-primary">{{button || "Create"}}</button>
            </div>
        </div>
    </form>
</template>


<script setup>
    import {useForm} from "@inertiajs/vue3";
    import FlashMessage from "./UI/FlashMessage.vue";

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

