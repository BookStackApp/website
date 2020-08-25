+++
slug = "beta-release-v0-11-0"
draft = false
title = "Beta Release v0.11.0"
date = 2016-07-03T05:50:36Z
author = "Dan Brown"
categories = ["Releases"]
tags = ["Releases"]
description = ""

+++

BookStack v0.11 has now been released. This version is a cleanup and bugfix release with a few new handy features to make nicer pages and to help organise books easier. Here are the useful links for this release:

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.11.0)

#### Editor Updates
###### Callouts

The WYSIWYG editor now supports callouts. These are styled blocks that can be used to highlight or alert specific bits of information. These are ideal for catching the attention of the user for snippets of text that are important. Here's a preview of how these look:

![BookStack Callouts](/images/2016/07/bookstack-callouts.png)

As you can see there are a few different types. There are success, info, danger & warning options. Callouts are created in the same way as headers and code blocks, Simply open the 'Formats' list on the editor toolbar and at the bottom is a new 'Callouts' menu. Open that and you will see the four options available. 

Callouts are not natively supported in the markdown editor but you can simply paste in the HTML for a callout since the markdown editor parses any HTML content. Here's the HTML for the various callout options:

```html
<p class="callout success">This is a success message</p>
<p class="callout danger">This is a danger message</p>
<p class="callout info">This is an info message</p>
<p class="callout warning">This is a warning message</p>
```

###### Markdown Scroll Syncing

A small update has been made to the markdown editor to enable scroll-syncing. Now when you scroll your edit content the preview will also scroll to the same approximate location. This is done simply on scroll position and could be thrown off by many large images. The preview can still be scrolled independently for when manual control is needed.

#### Page and Chapter Move Interfaces

Pages and Chapters have now been given a proper move interface so it's easier to change the location of a single item. Before, the only way to change the location of a page or chapter was to go to the book and go through the sort interface but that could be a bit tedious to move a single chapter or page. Now, in the toolbar dropdown menu when viewing a chapter or page, you can find a 'Move' action (As long as you have edit permissions). This will show a page where you can select a new book/chapter to move the current item to. Here's what it looks like when moving a page:

![BookStack Move Page Interface](/images/2016/07/bookstack-move-page.png)

By default popular books and chapters are shown otherwise you can search for a particular item. Moving a chapter will also move all pages within that chapter. 

#### Other Updates & Bugfixes

* Added Ctrl+S shortcut to editor for forcing a draft save.
* Added some level of MySQL 5.5 support and fixed saving bug for `mysql` php plugin users.
* Updated tag auto-suggestions to be smarter depending on current input.
* Updated tag auto-suggestions to show on empty input.
* Updated tag auto-suggestion shortcuts so tab can be used to select.
* Tightened up some list styles and made homepage empty list messages a bit friendlier.
* Made homepage queries a little more efficient.
* Fixed theme colors not showing on fresh instances.
* Fixed bug with new chapters having an incorrect initial list priority/ordering set.
* Fixed page sidebar not reacting to window resize.
* Fixed bug preventing images from being deleted.
* Fixed activity list bug causing too many hidden activities.
