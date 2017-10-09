+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Bugfix Releases v0.17.1 to v0.17.4"
date = 2017-07-28T14:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/mahdi-shakhesi-bug.jpg"
description = "BookStack Bugfix v0.17.4 released to fix subscript text, user thumbnails and possible visibility issues"
slug = "beta-bugfix-release-v0-17-4"
draft = false
+++

Since the v0.17 feature release at the start of the month a good bunch of fixes
and feature tweaks have made their way into BookStack.
After 4 bugfix release we're now at version v0.17.4.
Here are some details on the changes made over the last month:

### UTF8mb4 / Emoji Support

As part of v0.17 a database change was included to add support for Emoji.
To achieve this the encoding used in the database was changed upon upgrade.
This upgrade caused issues for many users so has therefore now been removed. This can instead
be done manually by [following the documentation here](/docs/admin/ut8mb4-support/).

### Editor Shortcut Updates

The shortcuts available in both page editors have now been updated with wider format support.
Thanks to changes to the Markdown editor in v0.17 we've now
added some format shortcuts to align the Markdown editor with the WYSIWYG editor.
Documentation pages have been created with details of all currently supported shortcuts:

* [WYSIWYG Editor](/docs/user/wysiwyg-editor/)
* [Markdown Editor](/docs/user/markdown-editor/)

### Translation Updates 🇵🇱🇫🇷

BookStack now has Polish translations thanks to user [JachuPL](https://github.com/BookStackApp/BookStack/pull/435).

Additional French translations have been added and some existing translations have
been cleaned up thanks to work done by [Joorem](https://github.com/BookStackApp/BookStack/pull/446).

### Full Change List

Here's a list of all changes in these bugfix releases:

* Added breadcrumbs to pages in entity select dialog. ([#391](https://github.com/BookStackApp/BookStack/issues/391))
* Fixed redirect issues in search system. (Thanks [@10bass](https://github.com/BookStackApp/BookStack/pull/448)) ([#448](https://github.com/BookStackApp/BookStack/issues/448))
* Improved French translations. (Thanks [@Joorem](https://github.com/BookStackApp/BookStack/pull/446)) ([#446](https://github.com/BookStackApp/BookStack/issues/446))
* Added newline support in chapter and book descriptions. (Thanks [@Claymm](https://github.com/BookStackApp/BookStack/pull/438)) ([#438](https://github.com/BookStackApp/BookStack/issues/438))
* Added Polish translations. (Thanks [@JachuPL](https://github.com/BookStackApp/BookStack/pull/435)) ([#435](https://github.com/BookStackApp/BookStack/issues/435))
* Updated and expanded editor keyboard shortcuts. ([#85](https://github.com/BookStackApp/BookStack/issues/85))
* Fixed use of base LDAP domain when using with AD. ([#317](https://github.com/BookStackApp/BookStack/issues/317))
* Fixed bug causing text to not be copied from markdown editor. ([#424](https://github.com/BookStackApp/BookStack/issues/424))
* Made UTF8mb4 upgrade manual with command. Details here. ([#425](https://github.com/BookStackApp/BookStack/issues/425))
* Improved responsiveness of breadcrumbs. ([#426](https://github.com/BookStackApp/BookStack/issues/426))
* Fixed code blocks when exporting as PDF and using DOMPDF. ([#427](https://github.com/BookStackApp/BookStack/issues/427))
* Updated page preview snippets to show included content. ([#442](https://github.com/BookStackApp/BookStack/issues/442))
* Updated dropdowns to hide upon option click. ([#429](https://github.com/BookStackApp/BookStack/issues/429))
* Updated LDAP testing and improved JS/CSS development build speed.

---

- [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
- [v0.17.4 GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.17.4)
- [v0.17.3 GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.17.3)
- [v0.17.2 GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.17.2)
- [v0.17.1 GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.17.1)

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@mahdishakhesi?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Mahdi Shakhesi"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title></title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">Mahdi Shakhesi</span></a></span>
