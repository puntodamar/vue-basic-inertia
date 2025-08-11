<template>
    <div>
        <form class="w-full" @submit.prevent="submitFilter">
            <div class="mb-8 mt-4 flex flex-wrap gap-2 sm:gap-3">
                <div class="flex flex-wrap sm:flex-nowrap items-center w-full gap-2">

                    <input
                        v-model.number="form.priceFrom"
                        type="number"
                        class="input-field input-filter-l w-full sm:w-28 h-10"
                        placeholder="Price from"
                    />
                    <input
                        v-model.number="form.priceTo"
                        type="number"
                        class="input-field input-filter-r w-full sm:w-28 h-10"
                        placeholder="Price to"
                    />

                    <select v-model="form.beds" class="w-full sm:w-20 h-10 px-2 border rounded">
                        <option value="" selected>Beds</option>
                        <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                        <option value="6+">6+</option>
                    </select>

                    <select v-model="form.baths"  class="w-full sm:w-20 h-10 px-2 border rounded">
                        <option value="" selected>Baths</option>
                        <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                        <option value="6+">6+</option>
                    </select>

                    <input
                        v-model.number="form.areaFrom"
                        type="number"
                        class="input-field input-filter-l w-full sm:w-28 h-10"
                        placeholder="Area from"
                    />
                    <input
                        v-model.number="form.areaTo"
                        type="number"
                        class="input-field input-filter-r w-full sm:w-28 h-10"
                        placeholder="Area to">

                    <button
                        type="submit"
                        class="btn-normal w-full sm:w-auto sm:ml-2 h-10 px-4">
                        Filter
                    </button>
                    <button
                        type="reset"
                        class="w-full sm:w-auto sm:ml-2 h-10 px-4 border rounded"
                        @click="reset">
                        Reset
                    </button>
                </div>
            </div>
        </form>


    </div>
</template>
<script setup>
import {router, useForm} from "@inertiajs/vue3";
    import {route} from "ziggy-js";
    import {Inertia} from "@inertiajs/inertia";

    const props = defineProps({
        filters: {
            type: Object, required: true
        }
    })

    const form = useForm({
        priceFrom: props.filters?.priceFrom,
        priceTo: props.filters?.priceTo,
        beds: props.filters?.beds || '',
        baths: props.filters?.baths || '',
        areaFrom: props.filters?.areaFrom,
        areaTo: props.filters?.areaTo,
    })

    const submitFilter = (reset = false) => {
        form.get(route("listings.index"),  {preserveState: true, preserveScroll: true});


    };

    const reset = () => {
        form.reset();
        router.get(route('listings.index'), {}, {
            replace: true,          // update URL without adding history entry
            preserveScroll: true,   // no jump
            preserveState: true,    // keep local component state
            only: ['listings'],     // only refetch this prop (adjust to yours)
        })
    }

</script>
