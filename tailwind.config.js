/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./*.{php}",
    "./main.js",
    "./style.css",
    "./**/*.php",
    "./**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['system-ui', 'Avenir', 'Helvetica', 'Arial', 'sans-serif'],
        'test': ['var(--font-test)'],
        'iranyekanx': ['var(--font-iranyekanx)'],
      },
      colors: {
        primary: 'var(--color-primary)',
        secondary: 'var(--color-secondary)',
        accent: 'var(--color-accent)',
        tertiary: 'var(--color-tertiary)',
        quaternary: 'var(--color-quaternary)',
        neutral: 'var(--color-neutral)',
      },
    },
  },
  plugins: [],
} 