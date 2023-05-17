const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                tb: {
                    DEFAULT: "rgba(var(--color-base), <alpha-value>)",
                    active: "rgba(var(--color-base-active), <alpha-value>)",
                    second: "rgba(var(--color-base-second), <alpha-value>)",
                    red: "rgba(var(--color-base-red), <alpha-value>)",
                    purple: "rgba(var(--color-base-purple), <alpha-value>)",
                },
                lvl: {
                    0: "rgba(var(--color-lvl-zero), <alpha-value>)",
                    1: "rgba(var(--color-lvl-first), <alpha-value>)",
                    2: "rgba(var(--color-lvl-second), <alpha-value>)",
                    3: "rgba(var(--color-lvl-thirth), <alpha-value>)",
                    4: "rgba(var(--color-lvl-fourth), <alpha-value>)",
                    5: "rgba(var(--color-lvl-fifth), <alpha-value>)",
                    6: "rgba(var(--color-lvl-sixth), <alpha-value>)",
                    7: "rgba(var(--color-lvl-seventh), <alpha-value>)",
                },
            },
            gridTemplateRows: {
                8: "repeat(8, minmax(0, 1fr))",
            },
            gridTemplateColumns: {
                test: "120px 360px",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
