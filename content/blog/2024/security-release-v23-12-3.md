+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v23.12.3"
date = 2024-02-26T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/unsplash/fence-duong-chung.jpg"
slug = "bookstack-release-v23-12-3"
draft = false
+++

BookStack v23.12.3 has been released.
This is a security release that addresses a vulnerability in PDF generation
that could be exploited to perform blind server-side-request forgery.

Upgrade is advised where untrusted users have permission to create/edit/update page
content in your instance.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.12.3)

### Full List of Changes

* Updated PHP dependencies, primarily to update php-svg-lib package.

### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@chungharu?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">duong chung</a> on <a href="https://unsplash.com/photos/selective-focus-photography-of-wooden-fence-3QDe3kGZjXY?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></span></span>