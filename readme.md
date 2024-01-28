# BookStack Site, Documentation & Blog

This project holds all the data for the https://www.bookstackapp.com/

This site is built using [Hugo](https://gohugo.io). Images are stored using `git-lfs`.
The "extended" version of hugo must be used (Has support for certain features like WebP resize).

### Data Locations

* Blog Posts - `content/posts`
* Docs - `content/docs`
* Theme - `themes/bookstack`

### Hacks

The website also contains a repository of customization hacks which can be found at [the /hacks](https://www.bookstackapp.com/hacks/) part of the site. 
These are managed via a [separate "Hacks" repo](https://github.com/BookStackApp/hacks) which is part of this repository as a git submodule. A symlink is then used to point the `content/hacks` directory to the `hacks/content` directory, where `hacks` is the submodule location.

### Theme

The theme is custom made with snippets taken from the [hugo capser theme](https://github.com/vjeantet/hugo-theme-casper).

SCSS is used for the styling. Install NPM dependencies via `npm install` or `yarn` then you can use `npm run build` to build the css and site once or `npm run dev` to watch for changes.

### Search

Search is performed using [webidx](https://github.com/gbxyz/webidx), which essentially builds a sqlite database search index, that is then loaded to browser upon search then queried locally in-browser via [sql.js](https://github.com/sql-js/sql.js).

This files required are all in this repo, and hacked to suit our use-case.
The script to build the index is located at `search/webidx.pl`, and can be ran via the npm script

```bash
npm run build:search
```

Note: you may need to install some dependencies to run the script see the `search/webidx.pl` for more information.

The above command will build the sqlite index database to `static/search.db`, intended to be deployed to production. In production use, this should be served with compression active to significantly reduce transfer size.

Much of the search UI handling logic can be found in our `themes/bookstack/static/js/scripts.js` file.