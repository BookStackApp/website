+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.29.0"
date = 2020-04-12T22:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/easter-victor-larracuente.jpg"
description = "This Easter BookStack release focuses on bringing a range user-experience improvements, with features such as dark mode and improved RTL textsupport, in addition to a bunch of fixes and enhancements."
slug = "beta-release-v0-29-0"
draft = false
+++

This Easter BookStack release focuses on bringing a range user-experience improvements, with 
features such as dark mode and improved RTL text support, in addition to a bunch
of fixes and enhancements. 

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.29.0)


### Dark Mode

BookStack now has a built-in dark mode:

[![Dark Mode](/images/2020/04/bookstack-dark-mode.png)](/images/2020/04/bookstack-dark-mode.png)

The dark mode covers all areas of the system including both the WYSIWYG and markdown editors. 
Where possible, page content such as tables and code blocks will react and change to be suitable dark alternatives.
Vibrant theme-color elements, such as the header bar, will be automatically dimmed and de-saturated 
as to not stand-out or be overly-bright on an otherwise dark page.

The option is user-selectable, from either the home-screen on via the top-right profile menu:


![Dark Mode Toggle](/images/2020/04/bookstack-dark-mode-toggle.png)

This can be toggled at any point and the current preference will be saved to the user.
For non-logged-in users, their preference will be saved to their browsing session.

A massive thanks to [@domainzero on GitHub](https://github.com/domainzero) for tiding-over the BookStack
community with a well-supported dark theme for the last few years.


### Custom Draw.io Option

Previously in BookStack the URL for draw.io, [now diagrams.net](https://www.diagrams.net/blog/move-diagrams-net), 
was hard-coded within the BookStack code. This has now been exposed and can be customized as an `.env` option
meaning you can tweak the embed behaviour or even use your own self-hosted draw.io instance.

[Details for using this option can be found here](/docs/admin/other-config/#custom-drawio-url)

### Shelf Grid View

When viewing a single shelf, it's now possible to toggle between grid & list view
for the books within:

![Shelf Grid View](/images/2020/04/bookstack-shelf-grid.png)

This aligns the shelf page with the view options selectable on the "Books" page.
A big thanks to [@philjak](https://github.com/BookStackApp/BookStack/pull/1755) for contributing 
this feature.

### List of Shelves for Books

Previously in BookStack it was not easy to see what shelves a book is assigned to. 
In this release, A list of assigned shelves can now be seen when viewing a book:

![Book shelves list](/images/2020/04/bookstack-book-shelves-list.png)

Big thanks to [@cw1998](https://github.com/BookStackApp/BookStack/pull/1688) for contributing
this feature to BookStack.


### API Updates

The API has been expanded upon with the ability to perform CRUD operations on shelves in the system.
In addition, books have recieved endpoints for exporting their contents as HTML, PDF or PlainText.
You'll be able to find details of these when accessing the API docs in your instance, after updating.

![API Endpoint Updates](/images/2020/04/bookstack-api-endpoints.png)

### Instance URL Update Command


### Improved RTL System UI Support



### Translations



### Full List of Changes

* Added a user-selectable dark-mode option. ([#2022](https://github.com/BookStackApp/BookStack/pull/2022), [#1234](https://github.com/BookStackApp/BookStack/issues/1234))
* Added the ability to define a custom draw.io URL and therefore use a custom instance if preferred. ([#826](https://github.com/BookStackApp/BookStack/issues/826))
* Added grid-view support, with toggle, to the shelf view. Thanks to [@philjak](https://github.com/BookStackApp/BookStack/pull/1755). ([#1755](https://github.com/BookStackApp/BookStack/pull/1755), [#1221](https://github.com/BookStackApp/BookStack/issues/1221))
* Added a list of bookshelves that a book belongs when viewing a book. Thanks to [@cw1998](https://github.com/BookStackApp/BookStack/pull/1688). ([#1688](https://github.com/BookStackApp/BookStack/pull/1688), [#1598](https://github.com/BookStackApp/BookStack/issues/1598))
* Added a new command to update your BookStack URL in the database. ([#1225](https://github.com/BookStackApp/BookStack/issues/1225))
* Added shelf API endpoints. Thanks to [@osmansorkar](https://github.com/BookStackApp/BookStack/pull/1908). ([#1908](https://github.com/BookStackApp/BookStack/pull/1908))
* Added book-export API endpoints.
* Updated password reset flows to avoid indicating if a email is in use within the system. ([#2016](https://github.com/BookStackApp/BookStack/issues/2016))
* Updated WYSIWYG entity-link-insert to set link text to entity name, if input is empty. ([#2014](https://github.com/BookStackApp/BookStack/issues/2014))
* Updated styles with better RTL support through the use of CSS logical properties/values. ([#2003](https://github.com/BookStackApp/BookStack/pull/2003))
* Updated the name of saved drawings to not include the user's name, to prevent issues with non-standard characters. ([#1993](https://github.com/BookStackApp/BookStack/issues/1993))
* Removed BMP and TIFF from the list of allows image upload types since these could not be resized properly. ([#1990](https://github.com/BookStackApp/BookStack/issues/1990))
* Updated code-block insert to handle focus, so code blocks can be inserted smoothly via keyboard alone. ([#1972](https://github.com/BookStackApp/BookStack/issues/1972))
* Updated namespacing used in tests to avoid warnings on recent versions of composer. ([#1924](https://github.com/BookStackApp/BookStack/issues/1924))
* Updated Chinese translations. Thanks to [@jzoy](https://github.com/BookStackApp/BookStack/pull/2023). ([#2023](https://github.com/BookStackApp/BookStack/pull/2023))
* Updated default .htaccess to allow Authorization header for API usage. Thanks to [@osmansorkar](https://github.com/BookStackApp/BookStack/pull/1908). ([#1908](https://github.com/BookStackApp/BookStack/pull/1908))
* Updated GitHub authorization library to avoid use of deprecated auth methods. ([#1879](https://github.com/BookStackApp/BookStack/issues/1879))
* Fixed issue where ordered list numbers could be cut-off. This was most apparant on Safari.([#1978](https://github.com/BookStackApp/BookStack/issues/1978))


### Next Steps

For the next release I'll look to continue to add to the API endpoints. Would be nice to get the core chapter & page actions done.
As per my "v0.28 next steps", I'll look to align how activity is tracked. The first steps will likely be to expand the range of
tracked actions then expose everything within the admin area in a filterable interface.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@victorbrd?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Victor Larracuente"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Victor Larracuente</span></a></span>
