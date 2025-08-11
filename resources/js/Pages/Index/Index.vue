<template>
    <div style="color:red">Pages/Index {{text}}</div>
    <p>Message: {{message}}</p>
    <p>{{page.props.user?.name}}</p>
</template>

<script setup>
    import {ref} from "vue";
    import MainLayout from "../../Layouts/MainLayout.vue";
    import {usePage} from "@inertiajs/vue3";


    const page = usePage();


    const text = ref("Hello")
    const props = defineProps({
        message: {type: String}
    })



    defineOptions({
        layout: MainLayout
    })

</script>
