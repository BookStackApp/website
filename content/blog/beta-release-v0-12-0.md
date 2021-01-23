+++
tags = ["Releases"]
image = "/images/2016/09/books-bg-syd-wachs.jpg"
draft = false
title = "Beta Release v0.12.0"
date = 2016-09-05T21:00:46Z
author = "Dan Brown"
categories = ["Releases"]
description = ""
slug = "beta-release-v0-12-0"

+++

BookStack v0.12.0 has now been released bringing a range of new features and bug fixes. Let's get to it:

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.12.0)

### Edit Summaries

When editing a page you can now add a one-liner to summarise the changes you've made. This allows you to build a changelog of a page to assist with looking over revisions. The option to set a changelog summary can be found next to the save button when editing a page:

![BookStack edit summary](/images/2016/09/bookstack-blog-edit-summary.gif)

These summaries can then be seen on the revisions view for a page providing a full changelog that can be used to assist finding the right revision.

![BookStack Summary Changelog](/images/2016/09/BookStack-summary-changelog.png)

Adding a changelog is optional so if you don't want the hassle of setting a summary on every edit you don't have to but you won't get the benefits it brings.

### Link Selector

If you ever find yourself wanting to link to another Book, Chapter or Page and then have to open a new tab to find the URL for that page you will love this new link selector. Found on both editors, WYSIWYG & Markdown, the link selector displays in a popup and allows you to search for your Book, Chapter or Page without opening a new tab or window.  The link selector can be found at the top of the markdown editor (or by pressing `Ctrl+Shift+K`). On the WYSIWYG editor you can access the link selector by clicking the browse icon in the insert/edit link menu:

![BookStack WYSIWYG link selector](/images/2016/09/bookstack-link-selector-wysiwyg.png)

Clicking the button will display a searchable listing of Books, Chapters & Pages. Find your item in this dialog then double click it or select it then press the 'Select' button. The URL and title of the link will be populated with the url and name of the entity you selected.

![BookStack Entity Select Dialog](/images/2016/09/bookstack-entity-select-dialog.png)

### Page Save Indicator

Just want to note another little nice UI change, When a page draft is saved an indicator will now display to provide feedback of a successful save. Before, When saving within the same minute no feedback was given. This just adds a little bit of assurance your content has saved without displaying a large, distracting notification.

![Draft Save Indicator](/images/2016/09/bookstack-save-indicator.gif)

### Other Features, Changes & Bugfixes

* Added image paste and image file dropping to the markdown editor. 
* Added the following shortcuts to the WYSIWYG editor:
    * **Ctrl+1 ... Ctrl+5** Heading 1 ... Heading 5
    * **Ctrl+q** Blockquote
    * **Ctrl+d** Paragraph
    * **Ctrl+e** Pre (Code Block)
* S3 uploads are now made public during upload process. Thanks @younes0 
* S3 uploads will use a shorter URL if the bucket name does not contain a period. Thanks @younes0 
* Fixed erratic back-to-top button behaviour on FireFox.
* Removed critical page content animations to ensure viewable in all browsers.
* Fixed quoted search terms when they only contain a single word.
* Improved sort and permission system efficiency by over a factor of 10.
* Updated the design of the image manager popup to be cleaner and more consistent with the ui.
* Added draft save indicator which animates on page save to provide success feedback to the user.
* Fixed cross-browser flexbox styling issues.
* Changed the way image and link references are put in pages, They now contain the full url, rather than being relative to the current domain.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@videmusart" target="_blank">Syd Wachs</a></span>
