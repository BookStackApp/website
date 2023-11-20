+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v23.10.3"
date = 2023-11-20T14:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/unsplash/fence-squirrel-mitchell-orr.jpg"
slug = "bookstack-release-v23-10-3"
draft = false
+++

BookStack v23.10.3 has been released.
This is a security release that addresses a vulnerability in image handling which could be
exploited to perform server-side requests or read the contents of files on the server system.
Additionally, this update addresses a lack of permission check in some image creation actions.

Upgrade is strongly advised where untrusted users have permission to create/edit/update page
content in your instance.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.10.3)

Thanks to [Carlos Bello](https://www.linkedin.com/in/carlos-andres-bello/) from the 
[Fluid Attacks](https://fluidattacks.com/) Research Team for discovering and reporting
this vulnerability.

### Full List of Changes

* Updated thumbnail handling to for use of content as image data. ([#4681](https://github.com/BookStackApp/BookStack/pull/4681))

### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@mitchorr?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Mitchell Orr</a> on <a href="https://unsplash.com/photos/squirrel-on-wooden-fence-42ApCULIolY?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></span></span>