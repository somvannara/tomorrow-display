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
        'weather' : '1fr 9fr 2fr',
        'extra' : '2fr 18fr',
      }
    },
  },
  plugins: [],
}

