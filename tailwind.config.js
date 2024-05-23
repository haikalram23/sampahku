/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#047045",
            },
            backgroundImage: {
                "auth-bg": "url('/public/images/banner.png')",
            },
        },
        fontFamily: {
            display: ["Poppins", "sans-serif"],
        },
    },
    plugins: [],
};
