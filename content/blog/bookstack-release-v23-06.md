+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.06"
date = 2023-06-26T18:26:51Z
author = "Dan Brown"
image = "/images/blog-cover-images/cows-field-loriane-magnenat.webp"
slug = "bookstack-release-v23-06"
draft = false
+++

Today we have BookStack v23.06 which aims to improve how comments are displayed & used,
while bringing us a revamp to the image manager among many other fixes and improvements.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.06)


**Upgrade Notices**

TODO

- **Title** - Detail

TODO - Video

### Comment Threading

For a long time, BookStack comments have allowed replying to create linked chains of messages,
but comments were always displayed in a singular created-date-ordered list which would make
tracking any of those conversations chains particularly problematic.

As of this release, comments will now be shown in an organised thread-like manner to make conversations much easier to read:

TOOD - Image of threading

Up to four levels of depth will be visually shown, with comments at this depth and beyond including an 
"In reply to #id" linked marker to reflect what they're responding to.

You'll also find the design and update/creation handling for comments has been updated to bring things up
to a modern standard and to work with the new threading changes, as well as improve mobile usage and accessibility.

### Comments in the Editor Sidebar

Within BookStack, the commenting system will often be used to provide hints, fixes and queries
on the documentation content being commented upon. These comments can then be very useful when
editing your content, but this has required you to open a separate tab to view the page while editing.

To help make comments easier to access, v23.06 makes comments accessible via the editor sidebar:

TOOD - Image of comments in editor

Here you'll find a full list of comments as you would when viewing a page, with the above new threaded
capabilities included, although this is a read-only list so there's no controls to reply/edit/create comments. 
This may be something we expand upon in the future there proves a need.

### Revamped Image Manager

TODO

### Accessible Page Content Popup

TODO

### System CLI Updates

TODO

### Updated Colors & Font Customization

TODO

### API Updates

TODO - raw Page HTML
TODO - Descriptions
TODO - Fixed inconsitencies including response codes , Thanks to devdot (in addition to other bits).

### Translations

TODO

- Username - *Language*

### Next Steps

Many of our most desired requests center around notifications. I think for this next release cycle
I need to force myself to sit down and properly plan this out to create a path forward that
I can take to the community for feedback. Therefore I think most of my time should be on that, 
but since that require more than a single release cycle, I may do a smaller maintenance & performance
release of some kind to tide things over.

Next month we'll hit the project's 8 year mark so I'll put together a blogpost much like
[the previous yearly posts](https://www.bookstackapp.com/blog/7-years-of-bookstack/) to track
the project's progress.

### Other Updates

In this release cycle we've had a bunch of additions to [the hacks page](/hacks/) that are specifically
related to the WYSIWYG editor:

- [WYSIWYG Docx Import](https://www.bookstackapp.com/hacks/wysiwyg-docx-import/)
- [WYSIWYG Editor Autocomplete Suggestions](https://www.bookstackapp.com/hacks/wysiwyg-autocompleter/)
- [WYSIWYG Editor Footnotes](https://www.bookstackapp.com/hacks/wysiwyg-footnotes/)

I think that first one may be particularly useful to folks migrating from word-doc based content.
The import is in no-way complete or accurate, especially as BookStack itself can't support a large amount of what
Word does, but it does make a good attempt and can be significantly better compared to copy and paste.

### Full List of Changes

**Released in v23.06**

* Added visual comment threading. ([#4286](https://github.com/BookStackApp/BookStack/pull/4286), [#3400](https://github.com/BookStackApp/BookStack/issues/3400))
* Added read-only comments listing into page editor. ([#4322](https://github.com/BookStackApp/BookStack/pull/4322))
* Added methods for screen-reader/keyboard-only users to use the page section popup. ([#3975](https://github.com/BookStackApp/BookStack/issues/3975))
* Added option to delete the current page draft. ([#3927](https://github.com/BookStackApp/BookStack/issues/3927))
* Added text for each activity type so that webhooks always have readable text. ([#4216](https://github.com/BookStackApp/BookStack/issues/4216))
* Updated Image Manager with new design to be responsive and more accessible. ([#4265](https://github.com/BookStackApp/BookStack/pull/4265))
* Updated how fonts are defined for easier CSS customization. ([#4302](https://github.com/BookStackApp/BookStack/issues/4302), [#4307](https://github.com/BookStackApp/BookStack/issues/4307))
* Updated pages API to provide raw html in single page responses. ([#4310](https://github.com/BookStackApp/BookStack/issues/4310))
* Updated system status colors with dark variants and to be CSS variables for easier customization. ([#4301](https://github.com/BookStackApp/BookStack/pull/4301))
* Updated API docs with multi-paragraph descriptions for endpoints. ([#4332](https://github.com/BookStackApp/BookStack/pull/4332))
* Updated `ldap_connect` usage to avoid deprecated syntax. ([#4274](https://github.com/BookStackApp/BookStack/issues/4274))
* Updated `MAIL_ENCRYPTION` options and guidance for clarity. ([#4342](https://github.com/BookStackApp/BookStack/issues/4342))
* Updated codebase for commands to align classes. ([#4262](https://github.com/BookStackApp/BookStack/pull/4262), [#4225](https://github.com/BookStackApp/BookStack/issues/4225))
* Updated default page copy/move view to show the parent book of chapter targets. ([#4264](https://github.com/BookStackApp/BookStack/issues/4264))
* Updated export styles to remove redundant styles for HTML/PDF exports. ([#4303](https://github.com/BookStackApp/BookStack/issues/4303))
* Updated JsonDebugException to use the Responsable interface. Thanks to [@devdot](https://github.com/BookStackApp/BookStack/pull/4318). ([#4318](https://github.com/BookStackApp/BookStack/pull/4318))
* Updated shelf permissions view to not show the non-used "create" permission. ([#2690](https://github.com/BookStackApp/BookStack/issues/2690))
* Updated translations with latest Crowdin changes. ([#4256](https://github.com/BookStackApp/BookStack/pull/4256))
* Fixed API chapter update not using book_id parameter. ([#4272](https://github.com/BookStackApp/BookStack/issues/4272))
* Fixed API returns responses to return 404 instead of 500 on not found. Thanks to [@devdot](https://github.com/BookStackApp/BookStack/pull/4921). ([#4290](https://github.com/BookStackApp/BookStack/issues/4290), [#4291](https://github.com/BookStackApp/BookStack/issues/4291))
* Fixed created/updated times not showing using the Romanian language. ([#4297](https://github.com/BookStackApp/BookStack/issues/4297))
* Fixed guest user role handling so they can accept custom permissions from other roles. ([#1229](https://github.com/BookStackApp/BookStack/issues/1229))
* Fixed inaction when certain parameters were combined using the content-permissions API. ([#4323](https://github.com/BookStackApp/BookStack/issues/4323))
* Fixed incorrect times in Users list API. ([#4325](https://github.com/BookStackApp/BookStack/issues/4325))
* Fixed misaligned case-sensitive sorting in shelves. ([#4341](https://github.com/BookStackApp/BookStack/issues/4341))
* Fixed misaligned date and time format returned by the image gallery API. ([#4294](https://github.com/BookStackApp/BookStack/issues/4294))

**Released in v23.05.2**

* Updated view-only code block line highlighting to only show on focus. ([#4254](https://github.com/BookStackApp/BookStack/pull/4254))
* Updated System CLI. ([#4252](https://github.com/BookStackApp/BookStack/pull/4252))
  * Fixed issues regarding symlinked folders for backup and restore.
  * Fixed incorrect app directory searching.
* Updated image/attachment file upload buttons to allow selection of multiple files. ([#4241](https://github.com/BookStackApp/BookStack/issues/4241))
* Updated translations with latest Crowdin changes. ([#4239](https://github.com/BookStackApp/BookStack/pull/4239))
* Updated attachment drag handling so they can be dragged via their name/link. ([#591](https://github.com/BookStackApp/BookStack/issues/591))

**Released in v23.05.1**

* Updated system CLI. ([#4229](https://github.com/BookStackApp/BookStack/pull/4229))
    - Fixed wrong env details being used on restore.
    - Updated update-url on restore to actually work.
    - Added better support for symlink-ed locations.
    - Added warning against updating in docker-like (non git controlled) environments.
* Updated "update-url" command to allow running non-interactively. ([#4223](https://github.com/BookStackApp/BookStack/issues/4223))
* Updated translations with latest Crowdin changes. ([#4211](https://github.com/BookStackApp/BookStack/pull/4211))
* Updated WYSWIYG code editor focus handling to more accurately return to editor. ([#4109](https://github.com/BookStackApp/BookStack/issues/4109))
* Fixed code block formatting in print/export views. ([#4215](https://github.com/BookStackApp/BookStack/issues/4215))
* Fixed extra spacing being added around horizontal rules within collapsible blocks within the WYSIWYG editor. ([#3963](https://github.com/BookStackApp/BookStack/issues/3963))
* Fixed "Custom HTML Head Content" style blocks not being used for code blocks within the WYSWIYG editor. ([#4228](https://github.com/BookStackApp/BookStack/issues/4228))
* Fixed UI shortcuts being incorrectly active within code blocks. ([#4227](https://github.com/BookStackApp/BookStack/issues/4227))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@loriane_photography?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Loriane Magnenat</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>