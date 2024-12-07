/** @type {import('tailwindcss').Config} */
module.exports = {
	darkMode: "media",
	content: ["./pages/*.{php,html,js}", "./node_modules/flowbite/**/*.js"],
	theme: {
		extend: {},
	},
	plugins: [require("flowbite/plugin")],
};
