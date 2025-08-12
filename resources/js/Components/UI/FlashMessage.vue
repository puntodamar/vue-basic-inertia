<template>
    <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:green-800 bg-green-50 dark:bg-green-900 p-2">
        {{flashSuccess}}
    </div>
    <div v-if="flashError" class="mb-4 border rounded-md shadow-sm border-red-200 dark:red-800 bg-red-50 dark:bg-red-900 p-2">
        {{flashError}}
    </div>

    <div v-if="validationErrors" class="mb-4 border rounded-md shadow-sm border-red-200 dark:red-800 bg-red-50 dark:bg-red-900 p-2">
        <span v-for="err in validationErrors">{{err}}</span>
    </div>
</template>

<script setup>
    import {usePage} from "@inertiajs/vue3";
    import {computed} from "vue";

    const page = usePage()
    const flashSuccess = computed(() => page.props.flash.success)
    const flashError = computed(() => page.props.flash.error)
    const validationErrors = computed(() => page.props.errors)

    console.log(page.props.errors)
</script>
