<template>
    <form @submit.prevent>
        <div class="mb-4 mt-4  flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center gap-2">
                <input id="deleted" v-model="form.deleted" type="checkbox" class="h-4 w-4 rounder border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="deleted" class="ml-2">Deleted</label>
            </div>

            <div class="flex flex-nowrap items-center gap-2">
                <input id="draft" v-model="form.draft" type="checkbox" class="h-4 w-4 rounder border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="draft" class="ml-2">Draft</label>
            </div>
        </div>
    </form>
</template>
<script setup>
    import debounce from "lodash/debounce.js";
    import {toRefs, watch} from "vue";

    const props = defineProps({
        form: {type: Object, required: true},
    })


    const emit = defineEmits(["filterChanged"]);
    const formRefs = toRefs(props.form);

    watch(
        Object.values(formRefs),
        debounce(() => {
            emit("filterChanged", props.form);
        }, 500),
        { deep: true }
    );

</script>
