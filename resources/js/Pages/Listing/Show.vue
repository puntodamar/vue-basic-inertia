<template>
    <div class="flex flex-col md:grid grid-cols-12 gap-4">
        <the-box class="col-span-12 md:col-span-6">
            <img src="https://www.agentadvice.com/wp-content/uploads/2020/12/shutterstock_1247473441-scaled.jpg" alt="image">
        </the-box>
        <div class="col-span-12 md:col-span-6 flex flex-col space-y-1">
            <the-box>
                <template #header>
                    Basic Info
                </template>
                <the-price :price="listing.price" class="text-lg"></the-price>
                <listing-space :listing="listing"></listing-space>
                <div class="text-xs text-gray-400">{{ listing.street }}</div>
            </the-box>

            <the-box>
                <template #header>
                    Make an Offer
                </template>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, cupiditate eius! Aliquid amet doloremque, doloribus dolorum earum id laboriosam minus nesciunt obcaecati possimus qui sed soluta suscipit veritatis vitae. Et!</p>
            </the-box>

            <the-box>
                <template #header>
                    Monthly Payment
                </template>
                <div class="flex flex-col space-y-1">
                    <label for="interestRate">Interest Rate ({{interestRate}}%)</label>
                    <input
                        v-model.number="interestRate"
                        id="interestRate"
                        type="range"
                        min="0.1"
                        max="30"
                        step="0.1"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />
                </div>

                <div class="flex flex-col space-y-1 mt-4">
                    <label for="duration">Duration ({{duration}} years)</label>
                    <input
                        v-model.number="duration"
                        id="duration"
                        type="range"
                        min="3"
                        max="35"
                        step="1"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />
                </div>

                <div class="text-gray-600 dark:text-gray-300 mt-2">
                    <div class="text-gray-400">Your monthly payment</div>
                    <the-price :price="monthlyPayment" class="text-3xl"></the-price>
                </div>

                <div class="mt-2 text-gray-500">
                    <div class="flex justify-between">
                        <div>Total Paid</div>
                        <div><the-price :price="totalPaid"></the-price></div>
                    </div>
                    <div class="flex justify-between">
                        <div>Total Principle</div>
                        <div><the-price :price="listing.price"></the-price></div>
                    </div>
                    <div class="flex justify-between">
                        <div>Total Interest</div>
                        <div><the-price :price="totalInterest"></the-price></div>
                    </div>
                </div>
            </the-box>
        </div>



    </div>

</template>

<script setup>
    import ListingSpace from "../../Components/UI/ListingSpace.vue";
    import ThePrice from "../../Components/UI/ThePrice.vue";
    import TheBox from "../../Components/UI/TheBox.vue";
    import {ref} from "vue";
    import {useMonthlyPayment} from "../../Composables/useMonthlyPayment";
    const props = defineProps(['listing'])

    const interestRate = ref(2.5)
    const duration = ref(25)

    const {monthlyPayment, totalPaid, totalInterest} = useMonthlyPayment(props.listing.price, interestRate, duration)


</script>
