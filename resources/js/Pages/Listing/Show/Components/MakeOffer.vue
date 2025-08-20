<template>
    <the-box>
        <template #header>Make an Offer</template>
        <div>
            <form @submit.prevent="submit">
                <input  v-model.number="form.amount" type="text" class="input-field" placeholder="Enter Your Offer">
                <input
                    v-model.number="form.amount"
                    id="duration"
                    type="range"
                    :min="minOffer"
                    :max="maxOffer"
                    step="1000"
                    class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 mt-2"
                />
                <button type="submit" class="btn btn-primary w-full mt-2 text-sm">Make an Offer</button>
            </form>
        </div>

        <div class="flex justify-between text-gray-500 mt-2">
            <span>Difference</span>
            <the-price :price="difference"></the-price>
        </div>
    </the-box>
</template>
<script setup>
    import TheBox from "../../../../Components/UI/TheBox.vue";
    import ThePrice from "../../../../Components/UI/ThePrice.vue";
    import {useForm} from "@inertiajs/vue3";
    import {computed} from "vue";
    import {route} from "ziggy-js";


    const props = defineProps({
        listingId: {type: Number, required: true},
        price: {type: Number, required: true},
    })

    const form = useForm({
        amount: props.price
    })

    const difference = computed(() => form.amount - props.price)

    const minOffer = computed(() => Math.round(props.price/2))
    const maxOffer = computed(() => Math.round(props.price*2))

    const submit = () => {
        form.post(route('listings.offers.store', {listing: props.listingId}), {
            preserveState: true,
            onSuccess: (_) => {
                const target = document.getElementById('flash')
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' })
                }
            }
        })
    }
</script>

