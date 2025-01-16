import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp, Head } from '@inertiajs/vue3'
import Layout from "./Layouts/Layout.vue";
// import MainAdminLte from "./Layouts/AdminLTE3/Main.vue";

createInertiaApp({
    title: (title) => `My App ${title}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || Layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .mount(el)
    },
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        // delay: 250,
        // The color of the progress bar...
        color: '#f00',
        // Whether to include the default NProgress styles...
        includeCSS: true,
        // Whether the NProgress spinner will be shown...
        showSpinner: false,
    },
})