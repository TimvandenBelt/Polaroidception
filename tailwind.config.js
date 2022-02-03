const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            colors: {
                gray: {
                    50: "#fbfbfb",
                },
                primary: {
                    0: "#fafcff",
                    50: "#E6EEFF",
                    100: "#dbe4ff",
                    200: "#c6d7ff",
                    300: "#a1b2f9",
                    400: "#718eff",
                    500: "#4355ed",
                    600: "#2632e3",
                    700: "#2025d9",
                    800: "#1213cd",
                    900: "#0606bc",
                },
                secondary: {
                    50: "#FFEAE6",
                    100: "#FEC7B9",
                    200: "#FCA98C",
                    300: "#FA966C",
                    400: "#F8864C",
                    500: "#EF7726",
                    600: "#E06D11",
                    700: "#C46006",
                    800: "#9A4C01",
                    900: "#663300",
                },
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/line-clamp"),
    ],
};
