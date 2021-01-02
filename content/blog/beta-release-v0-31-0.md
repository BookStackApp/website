+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.31.0"
date = 2021-01-03T19:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/winter-fox-birger-strahl.jpg"
description = "We begin 2021 with BookStack v0.31 which comes with recycle bin functionality, the page REST API endpoints and much more"
slug = "beta-release-v0-31-0"
draft = false
+++

We kick of this optimistic year with BookStack v0.31 which includes some great additions and updates to existing functionality including
a new recycle bin system, controllable item ownership, audit log changes, pages API and much more.


* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.31.0)


Just to note, There were a few security releases for v0.30. If you're not upgrading from v0.30.7 be sure to 
read through the version specific notes on the [updates page](https://www.bookstackapp.com/docs/admin/updates).


### Recycle Bin



### Item Ownership



### Audit Log Updates



### User List Changes



### New Revision Comparison System



### API Update - Pages



### Iframe & Cookie Security Updates



### Translations



### Full List of Changes

* Translation Updates. ([#2439](https://github.com/BookStackApp/BookStack/pull/2439), [#2327](https://github.com/BookStackApp/BookStack/pull/2327))
* Added recycle bin implementation. ([#2283](https://github.com/BookStackApp/BookStack/pull/2283), [#2183](https://github.com/BookStackApp/BookStack/issues/2183), [#280](https://github.com/BookStackApp/BookStack/issues/280))
* Added Norwegian translation to BookStack. Thanks to [@Swoy](https://github.com/BookStackApp/BookStack/pull/2336). ([#2336](https://github.com/BookStackApp/BookStack/pull/2336))
* Added ownership system for pages, chapters, books and shelves. ([#2436](https://github.com/BookStackApp/BookStack/pull/2436), [#2246](https://github.com/BookStackApp/BookStack/issues/2246))
* Added host iframe control with cookie security management. ([#2427](https://github.com/BookStackApp/BookStack/issues/2427), [#2207](https://github.com/BookStackApp/BookStack/issues/2207))
* Added API endpoints for pages. ([#2382](https://github.com/BookStackApp/BookStack/pull/2382))
* Added many more activity types to the audit-log. ([#2360](https://github.com/BookStackApp/BookStack/pull/2360), [#1243](https://github.com/BookStackApp/BookStack/issues/1243))
* Added a sortable "Latest Activity" column to the users list. ([#848](https://github.com/BookStackApp/BookStack/issues/848))
* Replaced revision diff library so that the php tidy extension is no longer required. ([#2347](https://github.com/BookStackApp/BookStack/issues/2347), [#1553](https://github.com/BookStackApp/BookStack/issues/1553))
* Updated GitLab authentication to use the `read_user` scope. ([#2359](https://github.com/BookStackApp/BookStack/issues/2359))
* Updated revision restore to add sensible default change summary text. Thanks to [@rondaa](https://github.com/BookStackApp/BookStack/pull/2353). ([#2353](https://github.com/BookStackApp/BookStack/pull/2353), [#2349](https://github.com/BookStackApp/BookStack/issues/2349))
* Updated "Cleanup Images" maintenance option wording for clarity. ([#2352](https://github.com/BookStackApp/BookStack/issues/2352))
* Updated dev docker setup to install composer dependencies in Docker entrypoint. Thanks to [@timoschwarzer](https://github.com/BookStackApp/BookStack/pull/2298). ([#2298](https://github.com/BookStackApp/BookStack/pull/2298))
* Updated chapter delete behaviour so pages are removed instead of being moved to the parent book. ([#2164](https://github.com/BookStackApp/BookStack/issues/2164))
* Updated grid-layout book/shelf item names to better fit into two lines. ([#1469](https://github.com/BookStackApp/BookStack/issues/1469))
* Fixed issue where the export dropdown may show cut-off with options hidden. Thanks to [@shubhamosmosys](https://github.com/BookStackApp/BookStack/pull/2416). ([#2416](https://github.com/BookStackApp/BookStack/pull/2416))


### Next Steps

Over the last few months we've had a good number of authentication-based pull requests, in addition to some others, which I've been somewhat ignoring so I'll
look to spend some time reviewing a few of those.

Now we have the core elements of the API integrated we'll now see what other features people may need. I'm imagining we'd add a few endpoints each future release for a while.

With the API base down and the activity system fleshed out, now may be a good time to implement an outbound webook system. I'll likely create an implementation proposal so I
can ensure we'd be covering the main use-cases required.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@bist31?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Birger Strahl</a> on <a href="https://unsplash.com/t/animals?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>
