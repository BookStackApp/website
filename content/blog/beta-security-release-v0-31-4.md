+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Security Release v0.31.4"
date = 2021-01-16T18:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/gate-masaaki-komori.jpg"
slug = "beta-release-v0-31-4"
draft = false
+++

BookStack v0.31.4 has been released. This security release updates the [Laravel framework version](https://blog.laravel.com/security-laravel-62012-7303-released), due to a vulnerability that could occur if request data was crafted and then used in a certain way. While it is not known if such a case exists in BookStack, this release updates the framework as a pre-emptive measure.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.31.4)

### Markdown editing in v0.31

In addition to this security release, A range of patch releases (v0.31.1, v0.31.2 & v0.31.3) have been made available recently
which largely covers issues in how markdown content is rendered upon save. In BookStack v0.31 I changed the way we render
markdown content so it's done server-side upon save. This was done so that markdown could be used via the API and to prepare for future changes. These patch releases have worked to better align the abilities of the new back-end renderer and the existing front-end renderer, that you see as a preview when editing a page.

### For more information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack Security Advice](https://github.com/BookStackApp/BookStack#-security) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@gaspanik?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Masaaki Komori</a> on <a href="https://unsplash.com/s/photos/gate?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>
