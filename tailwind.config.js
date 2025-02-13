module.exports = {
  content: [
    'node_modules/daisyui/**/*',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    screens: {
      sm: { max: "639px" },

      md: { max: "767px" },

      lg: { max: "1023px" },

      xl: { max: "1279px" },
    },
    extend: {},
  },
  plugins: [
    require('daisyui'),
  ],
}
