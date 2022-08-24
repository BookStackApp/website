+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v21.11.3"
date = 2021-12-15T13:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/door-lock-lucas-santos.jpg"
slug = "bookstack-release-v21-11-3"
draft = false
+++

BookStack v21.11.3 has been released.
This is a security release that helps prevent potential discovery and harvesting of user
details including name and email address.

It's advised to upgrade as soon as possible if your BookStack instance is public or
is used by untrusted members.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.11.3)

Thanks to @haxatron for discovering and reporting this vulnerability via huntr.dev.

### Full List of Changes

* Helped prevent discovery and harvesting of user information. Thanks @haxatron for reporting. ([#3108](https://github.com/BookStackApp/BookStack/issues/3108))
* Updated search API results to include the highlighted preview content. ([#3096](https://github.com/BookStackApp/BookStack/issues/3096))
* Updated search API results to include item URL. ([#3080](https://github.com/BookStackApp/BookStack/issues/3080))
* Updated translations with latest Crowdin changes. ([#3093](https://github.com/BookStackApp/BookStack/pull/3093))


### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@_staticvoid?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Lucas Santos</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>