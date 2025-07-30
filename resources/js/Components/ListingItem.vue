<template>
    <div class="flex item-center gap-1">
        <the-price :price="listing.price" class="text-lg"></the-price>
        <div class="text-xs text-gray-500">
            <the-price :price="monthlyPayment" class="text-xs"></the-price> / month
        </div>
    </div>

    <listing-space :listing="listing"></listing-space>
    <div class="text-xs text-gray-400">{{listing.street}}</div>
</template>

<script setup>
    import ListingSpace from "./UI/ListingSpace.vue";
    import ThePrice from "./UI/ThePrice.vue";
    import {useMonthlyPayment} from "../Composables/useMonthlyPayment";

    const props = defineProps({
        listing: {
            type: Object,
            required: true,
        }
    })

    const {monthlyPayment} = useMonthlyPayment(props.listing.price, 2.5, 25);


</script>
