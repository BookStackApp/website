+++
tags = ["Releases"]
image = "/images/2016/08/michel-bosma-bug.jpg"
description = ""
slug = "beta-bugfix-release-v0-11-1"
draft = false
title = "Beta Bugfix Release v0.11.1"
date = 2016-08-14T22:45:28Z
categories = ["Releases"]
author = "Dan Brown"

+++

A new BookStack bug-fix release has now been released to resolve a few issues found over the last month. Here are the fixes and updates:

* Updated all URL references to allow BookStack to be placed at a non-root location on a domain.
* Fixed no borders on table heading rows.
* Fixed creation of books/chapters/pages with only punctuation titles.
* Fixed issues with double braces in both editors.
* Fixed safari rendering of page tag manager. Also updated page editor to ensure it spans full page height.

Update instructions can be found in the links below. If you're having issues running the update commands you may have to run `composer dump-autoload` followed by `php artisan clear-compiled` from the root BookStack directory.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.11.1)

#### BookStack in a URL 'Sub-directory'

Due to the changes to links within BookStack the application can now be placed on a non-root location of a URL. This means, For example, you could have a BookStack instance with a homepage of  `www.example.com/docs/`.

Due to the many potentially sensitive application files & scripts within a BookStack instance's folder it should not be installed traditionally in an actual folder subdirectory of another website due to many security concerns. Instead the web server should proxy requests to a BookStack instance.

This will be documented soon but if you're eager to set this up and you have some Nginx knowledge you can follow the posts on [the issue request](https://github.com/BookStackApp/BookStack/issues/40#issuecomment-238538445) to get going.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@michelbosma" target="_blank">Michel Bosma</a></span>
