import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp, Head } from '@inertiajs/vue3'
import Layout from "./Layouts/Layout.vue";
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { Ziggy } from './ziggy';
// import MainAdminLte from "./Layouts/AdminLTE3/Main.vue";

createInertiaApp({
    title: (title) => `${title} | My App`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`];
        console.log(page);
        page.default.layout = page.default.layout || Layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue,Ziggy)
            // .use({
            //     install(app) {
            //     app.config.globalProperties.route = route;
            //     },
            // })
            .component('Head', Head)
            .mount(el)
    },
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        // delay: 250,
        // The color of the progress bar...
        color: '#fff',
        // Whether to include the default NProgress styles...
        includeCSS: true,
        // Whether the NProgress spinner will be shown...
        showSpinner: false,
    },
})