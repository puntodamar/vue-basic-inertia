<template>
    <div class="flex flex-col md:grid grid-cols-12 gap-4">
        <the-box class="col-span-12 md:col-span-4">
            <img src="https://www.agentadvice.com/wp-content/uploads/2020/12/shutterstock_1247473441-scaled.jpg" alt="image">
        </the-box>
        <div class="col-span-12 md:col-span-8 flex flex-col space-y-1">
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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, cupiditate eius! Aliquid amet doloremque, doloribus dolorum earum id laboriosam minus nesciunt obcaecati possimus qui sed soluta suscipit veritatis vitae. Et!
            </the-box>
        </div>



    </div>

</template>

<script setup>
  import ListingSpace from "../../Components/UI/ListingSpace.vue";
  import ThePrice from "../../Components/UI/ThePrice.vue";
  import TheBox from "../../Components/UI/TheBox.vue";

  const props = defineProps(['listing'])
</script>
