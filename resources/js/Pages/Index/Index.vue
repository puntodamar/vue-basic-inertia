<template>
    <div style="color:red">Pages/Index {{text}}</div>
    <p>Message: {{message}}</p>
</template>

<script setup>
    import {ref} from "vue";
    import MainLayout from "../../Layouts/MainLayout.vue";

    const text = ref("Hello")
    const props = defineProps({
        message: {type: String}
    })

    defineOptions({
        layout: MainLayout
    })

</script>
