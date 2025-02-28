import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

import Main from "./Layouts/Main.vue";
import { lightsOff } from "./theme";

import vuetify from "./vuetify"; // Ensure Vuetify is properly imported

createInertiaApp({
    title: (title) => `My App ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        
        page.default.layout = page.default.layout || Main;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify) // Make sure Vuetify is added here
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        color: "#fff",
        showSpinner: true,
    },
});

lightsOff();
