import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import '@fortawesome/fontawesome-free/js/all.js';

import { createApp, h } from 'vue';
import { createInertiaApp,Head,Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createPinia } from 'pinia'


const pinia = createPinia();
const appName = window.document.getElementsByTagName('title')[0]?.innerText || env('APP_NAME', 'fallback_app_name');

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(pinia)
            .component('InertiaHead', Head)
            .component('inertia-link', Link)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
