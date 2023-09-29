/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      spacing: {
        '128': '32rem',
      },
      gridTemplateColumns: {
        'weather' : '2fr 8fr 2fr',
      }
    },
  },
  plugins: [],
}

