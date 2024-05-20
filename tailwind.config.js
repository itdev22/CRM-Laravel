/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        pagination: theme => ({
            // Customize the color only. (optional)
            color: theme('colors.teal.600'),

            // Customize styling using @apply. (optional)
            wrapper: 'flex justify-center list-reset',

            // Customize styling using CSS-in-JS. (optional)
            wrapper: {
                'display': 'flex',
                'justify-items': 'center',
                '@apply list-reset': {},
            },
        }),
        extend: {},
    },
    plugins: [
        require("daisyui"),
        require("tailwindcss-plugins/pagination"),
    ],
    daisyui: {
        themes: ["emerald"],
    },
};
