+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Bugfix Release v0.14.1"
date = 2017-01-23T22:34:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/alain-wong-bug.jpg"
description = "BookStack Bugfix v0.14.1 released to patch potential permission deletion bug"
slug = "beta-bugfix-release-v0-14-1"
draft = false
+++

This is a quick bugfix release for following single major bug:

* Possibility that all permissions could be deleted on book sort. ([#282](https://github.com/BookStackApp/BookStack/issues/282))

If this issue occurs in your BookStack instance permission can be regenerated via the command line using `php artisan permissions:regen` from your BookStack install folder.

Apologies if this issue caused you any problems.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.14.1)


----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@alainwong" target="_blank">Alain Wong</a></span>
