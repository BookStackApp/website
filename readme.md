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

Search is handled via [Meilisearch](https://www.meilisearch.com/). A nightly scrape runs to index the site pages for search.
This is all docker-based, and the configuration used can be found in the `search/` directory of this repo.
Note, for localhost usage with a port, `"allowed_domains": ["localhost"],` should be added to the scraper config.json. [[ref](https://github.com/meilisearch/docs-scraper/issues/103#issuecomment-810736674)].

Relevant Projects:

- [Meilisearch](https://github.com/meilisearch/meilisearch) - The search engine used.
- [docs-scraper](https://github.com/meilisearch/docs-scraper) - Used to scrape the site to index.
- [docs-searchbar.js](https://github.com/meilisearch/docs-searchbar.js) - The JS implementation used for the site search bar.
  - I copy in the latest CDN dist files into this project.
  - I edit the JS file to remove the "Powered by Meilisearch" logo to prevent external requests.