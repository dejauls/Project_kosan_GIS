/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",        // Semua file PHP di root
    "./**/*.php"   // Semua file PHP di subfolder
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
