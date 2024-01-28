
// Mobile menu

const menuButton = document.getElementById('menu-button');
const menuDropDown = document.querySelector('#header .main-nav');

menuButton.addEventListener('click', function(event) {
  menuDropDown.classList.toggle('showing');
  event.stopPropagation();
});

document.body.addEventListener('click', function(event) {
  const isShown = menuDropDown.classList.contains('showing');
  if (isShown) {
    menuDropDown.classList.remove('showing');
    event.stopPropagation();  
  }
});


// Handle video click to play
const videos = document.querySelectorAll('video');
for (let i = 0; i < videos.length; i++) {
    videos[i].addEventListener('click', videoClick)
}

function videoClick() {
    if (typeof InstallTrigger !== 'undefined') return;
    this.paused ? this.play() : this.pause();
}

// Header double click URL reference
document.body.addEventListener('dblclick', event => {
  const isHeader = event.target.matches('h1, h2, h3, h4, h5, h6');
  if (isHeader && event.target.id) {
    window.location.hash = event.target.id;
  }
});

function el(tag, attributes = {}, children = []) {
  const elem = document.createElement(tag);
  for (const attr of Object.keys(attributes)) {
    elem.setAttribute(attr, attributes[attr]);
  }
  for (let child of children) {
    if (typeof child === 'string') {
      child = new Text(child);
    }
    elem.append(child);
  }
  return elem;
}

// Site search
const searchForm = document.getElementById('site-search-form');
const searchInput = document.getElementById('site-search-input');
const searchDialog = searchForm.querySelector('dialog');

async function runSearch() {
  const searchTerm = searchInput.value.toLowerCase();

  let pages = [];
  try {
    pages = await window.webidx.search({
      dbfile:'/search.db',
      query: searchTerm,
    });
  } catch (error) {
    searchDialog.innerHTML = '<strong class="search-category-title">Failed to load search results</strong>';
    console.error(error);
    return;
  }

  // Sort pages to prioritise those with word in title
  pages.sort((a, b) => {
    const aScore = (a.url.includes(searchTerm) || a.title.toLowerCase().includes(searchTerm)) ? 1 : 0;
    const bScore = (b.url.includes(searchTerm) || b.title.toLowerCase().includes(searchTerm)) ? 1 : 0;
    return bScore - aScore;
  });

  // Categorizes pages to display
  const categorised = {
    docs: {title: 'Documentation', filter: '/docs/', pages: []},
    hacks: {title: 'Hacks', filter: '/hacks/', pages: []}, 
    blog: {title: 'From the blog', filter: '/blog/', pages: []}, 
    other: {title: 'Site Pages', filter: '', pages: []},
  };
  const categoryNames = Object.keys(categorised);

  for (const page of pages) {
    for (const categoryName of categoryNames) {
      const category = categorised[categoryName];
      if (page.url.includes(category.filter)) {
        category.pages.push(page);
        break;
      }
    }
  }

  const categoryResults = categoryNames.map(name => {
    const category = categorised[name];
    if (category.pages.length === 0) {
      return null;
    }
    return el('div', {}, [
      el('strong', {class: 'search-category-title'}, [category.title]),
      el('div', {}, category.pages.slice(0, 5).map(page => {
        return el('a', {href: page.url}, [page.title]);
      })),
    ]);
  }).filter(Boolean);

  const emptyResult = el('strong', {class: 'search-category-title'}, [el('em', {}, 'No results found')]);
  const resultList = categoryResults.length ? categoryResults : [emptyResult];
  const results = el('div', {}, resultList);

  for (const child of searchDialog.children) {
    child.remove();
  }
  
  searchDialog.append(results);
  showSearchDialog();
}

function showSearchDialog() {
  if (searchDialog.open) {
    return;
  }
  searchDialog.show();
  searchInput.focus();
  
  const clickListener = e => {
    if(!e.target.closest('dialog')) {
      closeListener();
    }
  };

  const escListener = e => {
    if (e.key === 'Escape') {
        closeListener();
    }
  };

  const mouseLeaveListener = e => {
    closeListener();
  }

  const closeListener = () => {
    searchDialog.close();
    document.removeEventListener('click', clickListener);
    document.removeEventListener('keydown', escListener);
    searchForm.removeEventListener('mouseleave', mouseLeaveListener);
  };

  document.addEventListener('click', clickListener);
  document.addEventListener('keydown', escListener);
  searchForm.addEventListener('mouseleave', mouseLeaveListener);
}

function showSearchLoading() {
  searchDialog.innerHTML = `<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>`;
  showSearchDialog();
}

searchForm.addEventListener('submit', event => {
  event.preventDefault();
  showSearchLoading();
  runSearch();
});

searchInput.addEventListener('input', event => {
  const termLength = searchInput.value.length;
  if (termLength === 0) {
    searchDialog.close();
  } else if (termLength > 2) {
    showSearchLoading();
    runSearch();
  }
})