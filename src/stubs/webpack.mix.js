const { mix } = require('laravel-mix')
const precss = require('precss')
const tailwindcss = require('tailwindcss')
const atImport = require('postcss-import')
require('laravel-mix-purgecss')

mix.postCss('resources/assets/css/app.css', 'public/css', [
  atImport(),
  precss(),
  tailwindcss('./tailwind.js')
])

// mix.copy('resources/assets/images', 'images', false)

mix.js('resources/assets/js/app.js', 'js')
  .extract(['vue', 'axios'])

if (mix.inProduction()) {
  mix.purgeCss()
}
