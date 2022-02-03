<template>
    <component
        :is="url ? 'Link' : `${as}`"
        :as="as"
        :class="`link relative ${isMenuItem ? 'menuItem' : ''}`"
        :href="url"
        :method="method"
    >
        <span
            v-if="active && isMenuItem"
            aria-hidden="true"
            class="absolute left-0 h-full w-2 rounded-r-full bg-primary-200"
        ></span>
        <div
            :class="{
                'button-outlined': isOutlined,
                'button-link': !isOutlined && !isSolid,
                'menu-button': true,
            }"
            style="padding: 0"
        >
            <div
                :class="{
                    active,
                    icon: !!$slots.icon,
                }"
            >
                <slot name="icon"></slot>
                <span class="align-middle">
                    <slot>{{ text }}</slot>
                </span>
            </div>
        </div>
    </component>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "LinkButton",
    components: {
        Link,
    },
    props: {
        as: {
            type: String,
            default: "li",
        },
        isMenuItem: {
            type: Boolean,
            default: false,
        },
        text: {
            type: String,
            default: "",
        },
        url: {
            type: String,
            default: null,
        },
        method: {
            type: String,
            default: "GET",
            required: false,
        },
        isActiveThroughComponent: {
            type: String,
            default: undefined,
            required: false,
        },
        isOutlined: {
            type: Boolean,
            default: false,
            required: false,
        },
        isSolid: {
            type: Boolean,
            default: false,
            required: false,
        },
        isActiveThroughStartOComponent: {
            type: String,
            default: undefined,
            required: false,
        },
        isActiveThroughURL: {
            type: String,
            default: undefined,
            required: false,
        },
        isActiveThroughStartOfURL: {
            type: String,
            default: undefined,
            required: false,
        },
    },
    computed: {
        active() {
            if (!this.url) {
                return false;
            }

            if (this.isActiveThroughStartOComponent) {
                return this.$page.component.startsWith(
                    this.isActiveThroughComponent
                );
            }
            if (this.isActiveThroughComponent) {
                return this.$page.component === this.isActiveThroughComponent;
            }

            if (this.isActiveThroughStartOfURL) {
                return this.$page.url.startsWith(
                    this.isActiveThroughStartOfURL
                );
            }
            if (this.isActiveThroughURL) {
                return this.$page.url === this.isActiveThroughURL;
            }

            let path = new URL(this.url).pathname;
            if (path === "" || path === "/") {
                return false;
            }
            return this.$page.url.startsWith(path);
        },
    },
};
</script>
