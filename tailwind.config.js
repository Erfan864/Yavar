/** @type {import('tailwindcss').Config} */
export default {
  content: ["./*.{php}", "./main.js", "./style.css", "./**/*.php", "./**/*.js"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["system-ui", "Avenir", "Helvetica", "Arial", "sans-serif"],
        test: ["var(--font-test)"],
        iranyekanx: ["var(--font-iranyekanx)"],
      },
      colors: {
        primary: "var(--color-primary)",
        secondary: "var(--color-secondary)",
        accent: "var(--color-accent)",
        tertiary: "var(--color-tertiary)",
        quaternary: "var(--color-quaternary)",
        neutral: "var(--color-neutral)",
        avocado: {
          100: "var(--color-avocado-100)",
          200: "var(--color-avocado-200)",
          300: "var(--color-avocado-300)",
          400: "var(--color-avocado-400)",
        },
        sea: {
          100: "var(--color-sea-100)",
          200: "var(--color-sea-200)",
          300: "var(--color-sea-300)",
          400: "var(--color-sea-400)",
          500: "var(--color-sea-500)",
          600: "var(--color-sea-600)",
          700: "var(--color-sea-700)",
        },
        beige: {
          100: "var(--color-beige-100)",
          200: "var(--color-beige-200)",
          300: "var(--color-beige-300)",
        },
        carrot: {
          100: "var(--color-carrot-100)",
          200: "var(--color-carrot-200)",
          300: "var(--color-carrot-300)",
        },
      },
    },
  },
  plugins: [],
};
