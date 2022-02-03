// eslint-disable-next-line no-undef
module.exports = {
    env: {
        browser: true,
        es2021: true,
        amd: true,
        node: true,
    },

    parserOptions: {
        ecmaVersion: 13,
        sourceType: "module",
    },
    plugins: ["vue", "vuejs-accessibility", "prettier"],
    extends: [
        "eslint:recommended",
        "plugin:vue/vue3-recommended",
        "plugin:vuejs-accessibility/recommended",
        "plugin:prettier/recommended",
    ],
    rules: {},
};
