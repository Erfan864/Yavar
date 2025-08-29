/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.php",
    "./front-page.php",
    "./header.php", 
    "./footer.php",
    "./main.js",
    "./src/style.css",
    "./**/*.php",
    "./**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['system-ui', 'Avenir', 'Helvetica', 'Arial', 'sans-serif'],
      },
    },
  },
  plugins: [],
} 