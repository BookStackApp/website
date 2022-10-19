# BookStack Site, Documentation & Blog

This project holds all the data for the https://www.bookstackapp.com/

This site is built using [Hugo](https://gohugo.io). Images are stored using `git-lfs`.
The "extended" version of hugo must be used (Has support for certain features like WebP resize).

### Data Locations

* Blog Posts - `content/posts`
* Docs - `content/docs`
* Theme - `themes/bookstack`

### Theme

The theme is custom made with snippets taken from the [hugo capser theme](https://github.com/vjeantet/hugo-theme-casper).

SCSS is used for the styling. Install NPM dependencies via `npm install` or `yarn` then you can use `npm run build` to build the css and site once or `npm run dev` to watch for changes.
