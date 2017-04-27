+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.16.0"
date = 2017-04-23T21:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/old-books-jan-mellstrom.jpg"
description = "BookStack v0.16 released with revamped search, spellcheck and more"
slug = "beta-release-v0-16-0"
draft = false
+++

Another BookStack release is upon us. Since the last release work has been put into
spring-cleaning the search system which is detailed below. Community contributions
have gained some momentum bringing in some fantastic new features and fixes.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.16.0)

### New Search System

The old search system had some issues. It was based on MySQL fulltext indexes which
allowed the search to be efficient but smaller search terms would be ignored or
non-english characters would not be matched. It also meant that BookStack relied on MySQL.

The search system has been re-written with a custom, more basic, solution that
should provide a better experience for most users. The search index is now built
on a standard database table and all text content on a page is indexed. Search terms
are checked against this index in a prefix-match like manner. This means that
the search term only needs to match the start of an indexed 'word'.

In addition to the back-end system being re-written the main search interface
has had an update:

![New Search System](/images/2017/04/new-search-interface.png)

The result list is now simpler, With chapters, books and pages all in the same
list, ranked by how much they match the given search terms. On the right hand side
options have been added to expose inputs to allow more advanced searches.
Exact match terms and tag searches, which were in previous releases, are now
easier to use since you can add them in this sidebar without having to remember
the exact search syntax.

New to the search system is a collection of advanced search filter options. These
allow you to refine your search better than ever with options such as finding
items 'Created by me' and a range of date filters.

Full details of the search system as well as a list of available filters can be
found on [this new documentation page](/docs/user/searching).

### Spellchecker

A spellchecker has been quite an important omission for a text-heavy based platform
such as BookStack but I'm pleased to say that spellchecking support is now enabled
on pages. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/issues/354) whom
enabled this feature within BookStack.

![Spellchecking support](/images/2017/04/spellchecking.png)

BookStack uses the native browser spell checking functionality to achieve this which ensures
the correct settings, such as language, will be correct and any custom-saved words
will be taken into account.

### Translation Updates

With this release comes another round of updates to the translations.
The Spanish translations have had an update to be much more complete
[thanks again to @diegoseso](https://github.com/BookStackApp/BookStack/pull/357)
and now Slovak translations are available [thanks to @jendrol](https://github.com/BookStackApp/BookStack/pull/358).

### Page Revision Counts

The number of updates is now recorded
and displayed at the bottom of the page. Along with this count, A revision number
can now been seen when viewing the list of revisions to a page. This enables you
to uniquely reference each revision individually which can be essential in strict
record keeping environments.

### Full List of Changes

* New search system with new search filter system.
  * New UI for searching content.
  * Fixes issues with search terms that are short or contain accents.
* Added spell checker support to WYSIYG page editor. (Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/issues/354)).
* Page revision ID/Count system added.
* Slovak translations added. (Thanks to [@jendrol](https://github.com/BookStackApp/BookStack/pull/358)).
* Spanish translations updated. (Thanks to [@diegoseso](https://github.com/BookStackApp/BookStack/pull/357)).
* The page navigation highlighting will now fade out.
* Option to configure logging method added. (Thanks to [@solidnerd](https://github.com/BookStackApp/BookStack/pull/363)).
* Switched out markdown renderer library to [markdown-it](https://github.com/markdown-it/markdown-it):
  * Fixes ability to have brackets in markdown urls.
  * Allows backslash escaping in markdown tables.
* Updated permission system with ability to hide parent items and have the child be visible.
* Confirmation emails may now be queued (Thanks to [@DaneEveritt](https://github.com/BookStackApp/BookStack/pull/362)).

### Next Steps

I'm thinking that the next chunk of work for BookStack may be more refinement
and maintenance rather than big new features. A few areas, such as the test suite
and JavaScript framework, need an update to be aligned. With the change to the
search system we can also look at supporting other database types.

Notifications are becoming more requested, For which an initial discussion of
using webhooks [can be found here](https://github.com/BookStackApp/BookStack/issues/147)
although I have some concerns about keeping BookStack performant at scale when
notification come into play.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@mrjane" target="_blank">Jan Mellström</a></span>
