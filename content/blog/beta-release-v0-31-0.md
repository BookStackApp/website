+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.31.0"
date = 2021-01-03T21:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/winter-fox-birger-strahl.jpg"
description = "We begin 2021 with BookStack v0.31 which comes with recycle bin functionality, the page REST API endpoints and much more"
slug = "beta-release-v0-31-0"
draft = false
+++

We kick of this optimistic year with BookStack v0.31 which includes some great additions & updates to existing functionality including
a new recycle bin system, controllable item ownership, audit log changes, page API endpoints and much more.


* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.31.0)


Just to note, There were a few security releases for v0.30. If you're not upgrading from v0.30.7 be sure to 
read through the version specific notes on the [updates page](https://www.bookstackapp.com/docs/admin/updates).


### Recycle Bin

Ever had an accidental deletion in your instance that you needed to undo? Now you can,
without having to restore a database backup, using the new recycle bin system. 
When you delete a shelf, book, chapter or page they'll now be sent to the recycle bin:


![Recycle Bin Listing](/images/2021/01/recycle_bin.png)


On each item you can choose to restore or permanently delete it as required. By default, Items deleted
over 30 days ago may be automatically permanently deleted from the recycle bin.

The recycle bin can be accessed via the maintenance page where you'll also be provided with an overview of what is 
currently in the bin:

![Recycle Bin Maintenance Overview](/images/2021/01/recycle_bin_maintenance.png)

The inclusion of the recycle bin also introduces a change into how chapter deletion works. Previously deleting
a chapter would cause all child pages to be moved to the parent book. From v0.31, deleting a chapter will send
the chapter and all child pages to the recycle bin. This aligns with the deletion behaviour of books.


### Item Ownership

Since March in 2016 BookStack has had permissions available that permit the owner of content to make certain actions, For scenarios
such as "user is able to create pages within their own books". While potentially useful, these permissions were hard to 
use in practice since the owner would always simply be the creator.

In v0.31 the owner is now a separately tracked user, defaulting to the creator. The owner can be changed
on the permissions view of a shelf, book, chapter or page as shown below:

![Page OwnerShip Change](/images/2021/01/ownership_change.png)

When you delete a user, you'll now be given the option to transfer ownership to another user if required.

These changes should make it much easier to setup scenarios where you have user-owned books where
they can only create, edit and delete within their own book.

### Audit Log Updates

With the last feature release introducing the audit log, time has been spent this release cycle on expanding the tracked activities
to include many more events such as logins, user-management actions and settings update actions.

![New Audit Log Activities](/images/2021/01/audit_log_updates.png)

### User List Changes

A common requirement when managing users is to see who's inactive and therefore might need to be removed from the system.
This was previously tricky to do without direct database queries or careful manual monitoring but now in v0.31
the latest activity will now be shown on the users list within a sortable column:

![User List with Latest Activity](/images/2021/01/user_list_activity.png)

Since you can sort by this column you can quickly find inactive users. Note, the latest activity date
reflected is based on the activity tracked in the audit-log, so does not include view/read only events but should 
include anything that counts as a modification. Activities made before v0.31 may not be reflected.

### New Revision Changes System

When viewing a revision you have the option to preview pages.
This was done through the [gathercontent/htmldiff](https://github.com/gathercontent/htmldiff) which was great
but had not been supported in a while and required the PHP Tidy extension which could be tricky to locate and 
install on some systems. 

In v0.31 we've now switched to [ssddanbrown/htmldiff](https://github.com/ssddanbrown/htmldiff/) which I ported
from a [c# implementation found here](https://github.com/Rohland/htmldiff.net) which is a port of a [ruby implementation found here](https://github.com/myobie/htmldiff).  Major credit to [@Rohland](https://github.com/Rohland) and [@myobie](https://github.com/myobie) for their original work which I
have simply ported.

![Revision Changes View](/images/2021/01/changes_view.png)

This new library does not have the PHP Tidy extension requirement so should make installation & maintenance
easier for some. From my testing this new library has appeared to work without issue but we will have to see
how it performs in wider use. 

### API Update - Pages

This release brings page endpoints to the REST API. This completes the initial phase
of the API now that we have CRUD endpoints for shelves, books, chapters and pages.

![Pages API Documentation](/images/2021/01/pages_api.png)

Now the core content parts are in place, I'm open to GitHub issues being created to request
specific features or endpoints so further actions can be performed. 

To support usage of the API, I've setup a new BookStack api-scripts repository on GitHub:
https://github.com/BookStackApp/api-scripts. This will be a collection of useful scripts I,
or others, create as examples or for specific tasks. These can be used directly, or as a base/guide to
create other scripts.


### Iframe & Cookie Security Updates

Over the last 6 months some of the mainstream browsers have added additional protections for cookies,
restricting the default usage within a third-party context. For BookStack, this meant that access
through an iframe may not fully work due to cookies being blocked.

In v0.31, we've added additional controls to prevent usage within an iframe. [CSP frame-ancestors](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-ancestors) headers will now be set, and used by modern browsers, to ensure it will only load within an iframe 
where the parent page is on the same host as BookStack. 

A new `ALLOWED_IFRAME_HOSTS` option, to be used in the `.env` file, can be used to allow iframe access for certain hosts. This can be used like so:

```bash
# Adding a single host
ALLOWED_IFRAME_HOSTS="https://example.com"

# Mulitple hosts can be separated with a space
ALLOWED_IFRAME_HOSTS="https://a.example.com https://b.example.com"
```

Setting this option will also adjust cookie security so that they can be set in a third-party context, and hence work when inside an iframe.

Details of this have been added to the [security page of the docs](/docs/admin/security/#iframe-control).


### Translations

Big thanks to [@Swoy](https://github.com/BookStackApp/BookStack/pull/2336) who as provided Norwegian translations to BookStack for this release.
In addition, the below list shows the fantastic translators that have made changes since v0.30 and the languages they've updated:

* [@Swoy](https://github.com/BookStackApp/BookStack/pull/2336) - *Norwegian*
* Andrej Močan (andrejm) - *Slovenian*
* gilane9_ - *Arabic*
* Jakub Bouček (jakubboucek) - *Czech*
* Raed alnahdi (raednahdi) - *Arabic*
* rcy - *Swedish*
* Mykola Ronik (Mantikor) - *Ukrainian*
* m0uch0 - *Spanish*
* Xiphoseer - *German*
* 10935336 - *Chinese Simplified*
* MerlinSVK (merlinsvk) - *Slovak*
* nutsflag - *French*
* Kauê Sena (kaue.sena.ks) - *Portuguese, Brazilian*
* Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
* Vuong Trung Hieu (fpooon) - *Vietnamese*
* milesteg - *Hungarian*
* Statium - *Russian*
* Ghost_chu (dbguichu) - *Chinese Simplified*
* Ikhwan Koo (Ikhwan.Koo) - *Korean*
* Marco (cdrfun) - *German*
* MatthieuParis - *French*
* Douradinho - *Portuguese, Brazilian*
* Lowkey (v587ygq) - *Chinese Simplified*
* Beenbag - *German*
* ReadySystems - *Arabic*
* Gaku Yaguchi (tama11) - *Japanese*
* 孟繁阳 (FanyangMeng) - *Chinese Simplified*



### Full List of Changes

* Added recycle bin implementation. ([#2283](https://github.com/BookStackApp/BookStack/pull/2283), [#2183](https://github.com/BookStackApp/BookStack/issues/2183), [#280](https://github.com/BookStackApp/BookStack/issues/280))
* Added Norwegian translations to BookStack. Thanks to [@Swoy](https://github.com/BookStackApp/BookStack/pull/2336). ([#2336](https://github.com/BookStackApp/BookStack/pull/2336))
* Added ownership system for pages, chapters, books and shelves. ([#2436](https://github.com/BookStackApp/BookStack/pull/2436), [#2246](https://github.com/BookStackApp/BookStack/issues/2246))
* Added host iframe control with cookie security management. ([#2427](https://github.com/BookStackApp/BookStack/issues/2427), [#2207](https://github.com/BookStackApp/BookStack/issues/2207))
* Added API endpoints for pages. ([#2382](https://github.com/BookStackApp/BookStack/pull/2382))
* Added many more activity types to the audit-log. ([#2360](https://github.com/BookStackApp/BookStack/pull/2360), [#1243](https://github.com/BookStackApp/BookStack/issues/1243))
* Added a sortable "Latest Activity" column to the users list. ([#848](https://github.com/BookStackApp/BookStack/issues/848))
* Replaced revision diff library so that the php tidy extension is no longer required. ([#2347](https://github.com/BookStackApp/BookStack/issues/2347), [#1553](https://github.com/BookStackApp/BookStack/issues/1553))
* Updated GitLab authentication to use the `read_user` scope. ([#2359](https://github.com/BookStackApp/BookStack/issues/2359))
* Updated revision restore to add sensible default change summary text. Thanks to [@rondaa](https://github.com/BookStackApp/BookStack/pull/2353). ([#2353](https://github.com/BookStackApp/BookStack/pull/2353), [#2349](https://github.com/BookStackApp/BookStack/issues/2349))
* Updated the "Cleanup Images" maintenance option wording for clarity. ([#2352](https://github.com/BookStackApp/BookStack/issues/2352))
* Updated dev docker setup to install composer dependencies in Docker entrypoint. Thanks to [@timoschwarzer](https://github.com/BookStackApp/BookStack/pull/2298). ([#2298](https://github.com/BookStackApp/BookStack/pull/2298))
* Updated chapter delete behaviour so pages are removed instead of being moved to the parent book. ([#2164](https://github.com/BookStackApp/BookStack/issues/2164))
* Updated grid-layout book/shelf item names to better fit into two lines. ([#1469](https://github.com/BookStackApp/BookStack/issues/1469))
* Updated translations. ([#2439](https://github.com/BookStackApp/BookStack/pull/2439), [#2327](https://github.com/BookStackApp/BookStack/pull/2327))
* Fixed issue where the export dropdown may show cut-off with options hidden. Thanks to [@shubhamosmosys](https://github.com/BookStackApp/BookStack/pull/2416). ([#2416](https://github.com/BookStackApp/BookStack/pull/2416))


### Next Steps

Over the last few months we've had a good number of authentication-based pull requests, in addition to some others, which I've been somewhat ignoring so I'll
look to spend some time reviewing a few of those.

Now we have the core elements of the API integrated we'll now see what other features people may need. I'm imagining we'd add a few endpoints each future release for a while.

With the API base down and the activity system fleshed out, now may be a good time to implement an outbound web-hook system.
I'll likely create an implementation proposal so I can ensure we'd be covering the main use-cases required.

PHP 8 support is another thing I'll look to work on over the next release cycle. Some work has been put into this but, due to 
scale of changes in PHP 8 and the rate that some required packages move at, it's a trickier process than previous new PHP versions.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@bist31?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Birger Strahl</a> on <a href="https://unsplash.com/t/animals?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>
