import("./bootstrap");

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText ||
    "Polaroidception";

// eslint-disable-next-line no-unused-vars
let app = createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    // eslint-disable-next-line no-undef
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return (
            createApp({ render: () => h(app, props) })
                .use(plugin)
                // eslint-disable-next-line no-undef
                .mixin({ methods: { route } })
                .mount(el)
        );
    },
});

InertiaProgress.init({ color: "#4B5563" });
