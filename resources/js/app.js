import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import LinkButton from "@/Components/LinkButton";

import("./bootstrap");
let route = window.route;

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText ||
    "Polaroidception";

window.appName = appName;

// eslint-disable-next-line no-unused-vars
let app = createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component("LinkButton", LinkButton)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: "#4B5563" });
