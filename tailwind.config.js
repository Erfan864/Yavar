/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./*.{php}",
    "./main.js",
    "./src/style.css",
    "./**/*.php",
    "./**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['system-ui', 'Avenir', 'Helvetica', 'Arial', 'sans-serif'],
        'pahlavan': ['var(--font-pahlavan)'],
        'iranyekanx': ['var(--font-iranyekanx)'],
      },
      colors: {
        primary: 'var(--color-primary)',
        secondary: 'var(--color-secondary)',
        tertiary: 'var(--color-tertiary)',
        quaternary: 'var(--color-quaternary)',
      },
    },
  },
  plugins: [],
} 