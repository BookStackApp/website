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

Today brings us BookStack v23.06 which aims to improve how comments are displayed & used,
while also providing a revamp to the image manager among many other fixes and improvements.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.06)


**Upgrade Notices**

- **Email Configuration** - If you've configured mail with `MAIL_ENCRYPTION=ssl` it's advised to test sending (via the button in "Settings > Maintenance") after updating to v23.06 since support for SSL has been dropped for email sending, but we instead now force TLS to be required when this option is set.
- **Font Customization** - The technique for customizing fonts has changed to be simpler, less fragile and more flexible. If customizing fonts it's advised to update to the new method as shown in our updated documentation on [changing fonts](/docs/admin/visual-customisation/#changing-fonts).
- **Guest User Account** - Previously custom roles could be given to the "Guest" user account but permissions for those roles would not fully apply. That's been changed in v23.06 so additional role permissions fully apply but, as a precaution to prevent unexpected additional
grant of permissions upon upgrade, any additional roles assigned to the "Guest" user will be removed upon update migration. If needed, simply re-assign any desired custom guest user roles after updating.

TODO - Video

### Comment Threading

For a long time BookStack comments have allowed replying to create linked chains of messages,
but comments were always displayed in a singular created-date-ordered list which would make
tracking any of those conversation chains particularly problematic.

As of this release, comments will now be shown in an organised thread-like manner to make conversations much easier to parse:

![A view of 6 comments between 3 users, nested at different depths, at 4 visual levels](/images/2023/06/comment-threads.png)

Up to four levels of depth will be visually shown, with comments at this depth & beyond including a 
"In reply to #id" linked marker to reflect what they're responding to.

You'll also find the design & form handling for comments has received updates to bring things up
to a modern standard and to work with the new threading changes, as well as improve mobile usage and accessibility.

### Comments in the Editor Sidebar

Within BookStack, the commenting system will often be used to provide hints, fixes and queries
on the documentation content being commented upon. These comments can be very useful when
editing your content, but this has required you to open a separate tab to view the page
 while keeping the editor open in another.

To help make comments easier to access, BookStack v23.06 makes comments accessible within the editor sidebar:

![The BookStack editor view with a "Comments" section showing on the right, containing multiple user comments](/images/2023/06/editor-comments.png)

Here you'll find a full list of comments as you would when viewing a page, with the above new threaded
capabilities included, although this is a read-only list so there's no controls to reply/edit/create comments. 
This may be something we expand upon in the future if there proves a need.

### Revamped Image Manager

While we've recently made a few changes to the BookStack image manager, the general structure has 
long remained the same which has been particularly problematic on mobile devices, since it was 
only really built for desktop-screen use.

In this release the design and underlying structure has been revamped to modernise things while
addressing a set of known existing issues:

![The BookStack image manager view, showing a grid of 12 images with one selected, with details showing for the selected image on the right](/images/2023/06/updated-image-manager.png)

The search bar and filters have been condensed to a single row by default, leaving more space for images.
The images now have no overlay by default until hovered or focused upon, which keeps things less busy.
The overlay text that does show has been simplified for easier reading.
When an image is selected some metadata regarding the image will now show in the sidebar, which includes
the uploader, uploaded date and what page it was originally uploaded to.

Most significantly, the layout is now mobile responsive, switching to a tabbed interface on mobile:

<img src="/images/2023/06/mobile-image-manager.png" alt='A mobile width view of the BookStack image manager, showing "Image List" and "Image Details" tabs at the top, and a two-column grid of images in the main content' width="300">

While making these changes I've paid attention to accessibility, and tested everything using a screen
reader, to ensure all reads sensibly and is navigable via keyboard.

As one extra bonus feature, it's now possible to replace an image:

![Cropped view of the BookStack image manager, focused on the "Replace Image" option](/images/2023/06/image-replacements.png)

This allows you to replace an existing image in the system, so that it'd update in all locations where that 
image is used which is particularly handy if an evolving image is shared across many pages.

### Accessible Page Content Popup

The page content popup in BookStack provides any easy way to link to certain page sections, 
or a way to edit starting at a certain section, or a means to grab the include syntax. Unfortunately this
did not work well for screen-reader and keyboard only usage due to the type of text selection 
required and the focus handling implemented in BookStack.

In v23.06, a new interaction method has been added to achieve accessible use of the content popup.
At the end of the page content sits a new "Enter section select mode" button, which is only
visible via focus. Selecting this button makes all content blocks within the page content
focusable, and focus will be placed on the page title.
You can then press "Enter" upon focus of any page content block, to show the popup for that section,
and focus will be placed into the popup for immediate usage.
The popup has been updated to be accessible friendly, with proper focus handling and labelling.
The popup will now also sit in the correct place in the document, so that it can be tabbed to/from between
blocks of content when showing.

![A popup box over a focused heading within BookStack page content](/images/2023/06/accessible-popup.png)

From my own testing, all abilities of the popup are now accessible but, not being a daily screen-reader
user myself, I appreciate if the implementation feels awkward so I'm open to feedback on this.

### System CLI Updates

Within the v23.05 patch releases, a host of updates were applied to the BookStack System CLI
which was new to v23.05. These updates fix a few restore bugs, improve CLI output
and add support for usage when symlinks are involved for BookStack content on the filesystem, 
which is particularly common in some docker-based environments.

To support usage of the CLI, I've recently added a [BookStack System CLI page](/docs/admin/system-cli/)
to our admin documentation to fully detail usage of this CLI.

### Updated Colors & Font Customization

A few parts of the underlying BookStack CSS styling code have been updated to use
CSS variables, particularly for status colors (info, success, failure/danger & warning states)
and for fonts. For fonts this simplifies how they are configured via "Custom HTML Head Content", 
with the overriding CSS now looking something like this:

```html
<style>
    body {
      --font-body: 'Noto Serif', serif;
      --font-heading: 'Roboto', sans-serif;
      --font-code: 'Source Code Pro', monospace;
    }
</style>
```

As shown, it's now possible to define a different font for headings if desired.
Our [documentation for this](/docs/admin/visual-customisation/#changing-fonts) has been updated to reflect
the new advised approach.

Additionally, dark mode now has different status colors by default, to make them better fit the dark theme:

![A warning notification in dark mode, showing a muted red highlight](/images/2023/06/warning-dark-mode.png)

### REST API Updates

The API has received a variety of enhancements in this release.
First up is that "Image Gallery - Update" endpoint now allows you to provide an image file in the request 
via an `image` parameter, which replaces the existing image file in use.
This change aligns with the newly added ability to replace an image within the BookStack image manager UI.

The "Pages - Read" endpoint will now include a `raw_html` parameter, containing the raw HTML stored in
the BookStack database, without pre-display processing. This is useful in cases you want original HTML
for editor usage, or the HTML without page content includes being parsed.

The descriptions of the endpoints in the API docs have been improved, with support for multi-paragraph 
descriptions, so more complex endpoints are now described with a bit more structure instead of being a 
long solid single paragraph.

Lastly, quite a few inconsistencies in API data, responses or documentation have been cleaned up in this release.
A particular thanks to [@devdot](https://github.com/devdot) who has helped in this area, in addition to making
a few PRs this release cycle to clean up a lot of my existing messy or inconsistent code.

### Translations

A new release means a new round of thanks to the below wise translators who work wonders with words.
Thanks to all listed below that have provided translations since the original v23.05 release.

- m4z - *German; German Informal*
- Patrick Dantas (pa-tiq) - *Portuguese, Brazilian*
- TheRazvy - *Romanian*
- Yossi Zilber (lortens) - *Hebrew; Uzbek*
- m0uch0 - *Spanish*
- scureza - *Italian*
- Le Van Chinh (Chino) (lvanchinh86) - *Vietnamese*
- SmokingCrop - *Dutch*
- Statium - *Russian*
- toras9000 - *Japanese*
- pedromcsousa - *Portuguese*
- Jøran Haugli (haugli92) - *Norwegian Bokmal*
- Indrek Haav (IndrekHaav) - *Estonian*
- Frédéric SENE (nothingfr) - *French*
- Maciej Lebiest (Szwendacz) - *Polish*
- Michal (michalgurcik) - *Slovak*
- Nepomacs - *German*
- desdinova - *French*
- Ingus Rūķis (ingus.rukis) - *Latvian*
- Eugene Pershin (SilentEugene) - *Russian*
- Frost-ZX - *Chinese Simplified*
- 10935336 - *Chinese Simplified*
- Alex (qianmengnet) - *Chinese Simplified*
- Rubens (rubenix) - *Catalan*
- 周盛道 (zhoushengdao) - *Chinese Simplified*

### Next Steps

Many of our most desired requests center around notifications. I think for this next release cycle
I need to force myself to sit down and properly plan this out to create a path forward that
I can then take to the community for feedback. Therefore I think most of my time should be on that, 
but since that may require more than a single release cycle, I'll likely do a smaller maintenance & performance
release of some kind to tide things over.

Next month we'll hit the 8 year mark for BookStack so I'll put together a blogpost much like
[the previous yearly posts](https://www.bookstackapp.com/blog/7-years-of-bookstack/) to track
the project progress and numbers.

### Other Updates

In this release cycle we've had a bunch of additions to [the hacks page](/hacks/) that are specifically
related to the WYSIWYG editor:

- [WYSIWYG Docx Import](https://www.bookstackapp.com/hacks/wysiwyg-docx-import/)
- [WYSIWYG Editor Autocomplete Suggestions](https://www.bookstackapp.com/hacks/wysiwyg-autocompleter/)
- [WYSIWYG Editor Footnotes](https://www.bookstackapp.com/hacks/wysiwyg-footnotes/)

I think that first one may be particularly useful to folks migrating from word-doc based content.
The import is in no-way complete or accurate, especially as BookStack itself can't support a large amount of the
formatting that the ".docx" format supports, but it does make a good attempt and can be significantly better compared to copy and paste.

### Full List of Changes

**Released in v23.06**

* Added visual comment threading. ([#4286](https://github.com/BookStackApp/BookStack/pull/4286), [#3400](https://github.com/BookStackApp/BookStack/issues/3400))
* Added read-only comments listing into page editor. ([#4322](https://github.com/BookStackApp/BookStack/pull/4322))
* Added methods for screen-reader/keyboard-only users to use the page section popup. ([#3975](https://github.com/BookStackApp/BookStack/issues/3975))
* Added option to delete the current page draft. ([#3927](https://github.com/BookStackApp/BookStack/issues/3927))
* Added text for each activity type so that webhooks always have readable text. ([#4216](https://github.com/BookStackApp/BookStack/issues/4216))
* Updated image manager with new design to be responsive and more accessible. ([#4265](https://github.com/BookStackApp/BookStack/pull/4265))
* Updated how fonts are defined for easier CSS customization. ([#4302](https://github.com/BookStackApp/BookStack/issues/4302), [#4307](https://github.com/BookStackApp/BookStack/issues/4307))
* Updated pages API to provide raw html in single page responses. ([#4310](https://github.com/BookStackApp/BookStack/issues/4310))
* Updated system status colors with dark variants and to be CSS variables for easier customization. ([#4301](https://github.com/BookStackApp/BookStack/pull/4301))
* Updated API docs with multi-paragraph descriptions for endpoints. ([#4332](https://github.com/BookStackApp/BookStack/pull/4332))
* Updated `ldap_connect` usage to avoid deprecated syntax. ([#4274](https://github.com/BookStackApp/BookStack/issues/4274))
* Updated `MAIL_ENCRYPTION` options & guidance for clarity. ([#4342](https://github.com/BookStackApp/BookStack/issues/4342))
* Updated command codebase to align logic. ([#4262](https://github.com/BookStackApp/BookStack/pull/4262), [#4225](https://github.com/BookStackApp/BookStack/issues/4225))
* Updated default page copy/move view to show the parent book of chapter targets. ([#4264](https://github.com/BookStackApp/BookStack/issues/4264))
* Updated export styles to remove rules redundant for HTML/PDF exports. ([#4303](https://github.com/BookStackApp/BookStack/issues/4303))
* Updated JsonDebugException to use the "Responsable" interface. Thanks to [@devdot](https://github.com/BookStackApp/BookStack/pull/4318). ([#4318](https://github.com/BookStackApp/BookStack/pull/4318))
* Updated shelf permissions view to not show the non-used "create" permission. ([#2690](https://github.com/BookStackApp/BookStack/issues/2690))
* Updated translations with latest Crowdin changes. ([#4256](https://github.com/BookStackApp/BookStack/pull/4256))
* Fixed API chapter update not using "book_id" parameter. ([#4272](https://github.com/BookStackApp/BookStack/issues/4272))
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