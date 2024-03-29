// Taken from https://github.com/gbxyz/webidx/tree/main
// BSD 3-Clause License
// Copyright (c) 2024, Gavin Brown
// Full license: https://github.com/gbxyz/webidx/blob/a28a984d38fd546d1bec4d6a4a5a47ab86cb08f8/LICENSE
// Note: File has been modified since originally copied.

window.webidx = {};
const webidx = window.webidx;

webidx.search = async function (params) {
  if (!webidx.sql) {
    //
    // initialise sql.js
    //
    webidx.sql = await window.initSqlJs({locateFile: file => `/libs/${file}`});
  }

  if (webidx.hasOwnProperty('db')) {
    return webidx.query(params.query);
  } else if (webidx.loadingPromise) {
    await webidx.loadingPromise;
    await new Promise((res, rej) => setTimeout(res, 10));
    return webidx.query(params.query);
  } else {
    webidx.loadingPromise = webidx.loadDB(params);

    webidx.loadingPromise.then(() => {
      webidx.loadingPromise = null;
    });

    return webidx.loadingPromise
  }
};

webidx.loadDB = function (params) {
  return new Promise((res, rej) => {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', params.dbfile);
    xhr.timeout = params.timeout ?? 5000;
    xhr.responseType = 'arraybuffer';

    xhr.ontimeout = function() {
      rej('Unable to load index, please refresh the page.');
    };

    xhr.onload = function() {
      webidx.initializeDB(this.response);
      const results = webidx.query(params.query);
      res(results);
    };

    xhr.send();
  });
};

webidx.initializeDB = function (arrayBuffer) {
  webidx.db = new webidx.sql.Database(new Uint8Array(arrayBuffer));

  //
  // prepare statements
  //
  webidx.wordQuery  = webidx.db.prepare("SELECT `id` FROM `words` WHERE (`word`=:word)");
  webidx.idxQuery   = webidx.db.prepare("SELECT `page_id` FROM `index` WHERE (`word`=:word)");
  webidx.pageQuery  = webidx.db.prepare("SELECT `url`,`title` FROM `pages` WHERE (`id`=:id)");
};

webidx.getWordID = function (word) {
  webidx.wordQuery.bind([word]);
  webidx.wordQuery.step();
  var word_id = webidx.wordQuery.get().shift();

  webidx.wordQuery.reset();

  return word_id;
};

webidx.getPagesHavingWord = function (word_id) {
  var pages = [];

  webidx.idxQuery.bind([word_id]);

  while (webidx.idxQuery.step()) {
    pages.push(webidx.idxQuery.get().shift());
  }

  webidx.idxQuery.reset();

  return pages;
};

webidx.getPage = function (page_id) {
  webidx.pageQuery.bind([page_id]);

  webidx.pageQuery.step();

  var page = webidx.pageQuery.getAsObject();

  webidx.pageQuery.reset();

  return page;
};

webidx.query = function (query) {
  //
  // split the search term into words
  //
  var words = query.toLowerCase().split(" ");

  //
  // this array maps page ID to rank
  //
  var pageRank = [];

  //
  // iterate over each word
  //
  while (words.length > 0) {
    var word = words.shift();

    var invert = false;
    if (0 == word.indexOf("-")) {
      invert = true;
      word = word.substring(1);
    }

    var word_id = webidx.getWordID(word);

    //
    // if the word isn't present, ignore it
    //
    if (word_id) {
      var pages = webidx.getPagesHavingWord(word_id);

      pages.forEach(function (page_id) {
        if (invert) {
          if (pageRank[page_id]) {
            pageRank[page_id] -= 65535;

          } else {
            pageRank[page_id] = -65535;
            
          }

        } else {
          if (pageRank[page_id]) {
            pageRank[page_id]++;

          } else {
            pageRank[page_id] = 1;

          }
        }
      });
    }
  }

  //
  // transform the results into a format that can be sorted
  //
  var sortedPages = [];

  pageRank.forEach(function (rank, page_id) {
    if (rank > 0) {
      sortedPages.push({rank: rank, page_id: page_id});
    }
  })

  //
  // sort the results in descending rank order
  //
  sortedPages.sort(function(a, b) {
    return b.rank - a.rank;
  });

  //
  // this will be populated with the actual pages
  //
  var pages = [];

  //
  // get page data for each result
  //
  sortedPages.forEach(function(result) {
    pages.push(webidx.getPage(result.page_id));
  });

  return pages;
};

webidx.regExpQuote = function (str) {
  return str.replace(/[/\-\\^$*+?.()|[\]{}]/g, '\\$&');
};