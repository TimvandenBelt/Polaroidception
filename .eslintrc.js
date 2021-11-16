// eslint-disable-next-line no-undef
module.exports = {
    env: {
        browser: true,
        es2021: true,
    },
    extends: [
        "eslint:recommended",
        "plugin:vue/vue3-essential",
        "plugin:prettier/recommended",
    ],
    parserOptions: {
        ecmaVersion: 13,
        sourceType: "module",
    },
    plugins: ["vue"],
    rules: {},
};
