<template>
    <div class="card">
        <div class="card-meta">
            <slot name="meta">
                <span class="meta-text">{{ meta }}</span>
            </slot>
            <slot name="meta-action"></slot>
        </div>

        <div class="mt-2">
            <slot name="card-title">
                <a class="card-title" href="#">{{ cardTitle }}</a>
            </slot>
            <p class="card-body">
                <slot />
            </p>
        </div>

        <div class="card-footer">
            <slot name="footer"></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: {
        cardTitle: {
            type: String,
            default: null,
            required: false,
        },
        meta: {
            type: String,
            default: null,
            required: false,
        },
    },
};
</script>

<style lang="scss" scoped></style>
