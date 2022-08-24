+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v21.08.2"
date = 2021-09-04T14:12:36Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-hudsoncrafted.jpg"
slug = "bookstack-release-v21-08-2"
draft = false
+++

BookStack v21.08.2 has been released. This security release is intended to cover a couple of XSS
vulnerabilities, where a malicious user with page edit access could enter script that would execute
upon page view. You should update as soon as possible if you allow untrusted users to edit content
in your instance.

In addition, this releases expands the [CSP headers](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP)
set by BookStack to help avoid any similar vulnerabilities from being effective going forward.
If you've performed some more advanced customizations on your instance, they may need to be altered
to work with the built-in CSP system. Feel free to contact me via the channels listed below for any assistance 
on this.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.08.2)


### For more information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack Security Advice](https://github.com/BookStackApp/BookStack#-security) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@hudsoncrafted?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Debby Hudson</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>