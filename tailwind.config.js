/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.{html,php}', 'index.php'],
  theme: {
    extend: {
      fontFamily: {
        'jb': ['JetBrains Mono', 'monospace'],
        'inter': ['Inter', 'sans-serif'],
        'cousine': ['Cousine', 'monospace'],
      }
    },
  },
  plugins: [],
}

