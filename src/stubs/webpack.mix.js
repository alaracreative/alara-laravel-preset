const { mix } = require('laravel-mix')
const precss = require('precss')
const atImport = require('postcss-import')
require('laravel-mix-purgecss')
require('laravel-mix-tailwind')

mix.postCss('resources/assets/css/app.css', 'css', [
  atImport(),
  precss(),
]).tailwind()

mix.copy('resources/assets/images', 'images', false)

mix.js('resources/assets/js/app.js', 'js')

mix.extract(['vue', 'axios'])

if (mix.inProduction()) {
  mix.purgeCss()
}
