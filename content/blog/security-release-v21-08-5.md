+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v21.08.5"
date = 2021-10-08T20:53:08Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-calina.jpg"
slug = "bookstack-release-v21-08-5"
draft = false
+++

BookStack v21.08.5 has been released. This is a security release that covers a vulnerability
which would allow malicious users, who have permission to update or create pages, to load content
from files stored within the `storage/` or `public/` directories (Such as application logs) via the
page HTML export system.

If you allow untrusted users to edit page content you should update as soon as possible.

This release also changes the way browser response caching is performed, while logged in, 
to help prevent navigating back to confidential content after logout.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.08.5)

### Additional Changes

- Added concurrent page editing warnings upon draft save events. Thanks to [@MatthieuParis](https://github.com/BookStackApp/BookStack/pull/2877) ([#2877](https://github.com/BookStackApp/BookStack/pull/2877))
- Updated translations with the latest changes from Crowdin. ([#2953](https://github.com/BookStackApp/BookStack/pull/2953))

### For more information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack Security Advice](https://github.com/BookStackApp/BookStack#-security) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@calina?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Georg Bommeli</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>