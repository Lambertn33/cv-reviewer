import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { OhVueIcon, addIcons } from "oh-vue-icons";
import { IoChevronDownOutline, IoChevronUpOutline } from "oh-vue-icons/icons";

import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

import MainLayout from "./pages/MainLayout.vue";

addIcons(IoChevronDownOutline, IoChevronUpOutline);

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./pages/**/*.vue", { eager: true });
        let page = pages[`./pages/${name}.vue`];
        page.default.layout = page.default.layout || MainLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("v-icon", OhVueIcon)
            .mount(el);
    },
});
