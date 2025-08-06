import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import MainLayout from "./Layouts/MainLayout.vue";
import {ZiggyVue } from 'ziggy-js';
import {Link} from "@inertiajs/vue3"


createInertiaApp({
    resolve: async name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        const page = await pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || MainLayout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin, ZiggyVue)
            .component('the-link', Link)
            .mount(el)

        // App.config.devtools = true
    },
})
