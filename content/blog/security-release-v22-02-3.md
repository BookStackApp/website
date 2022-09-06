+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v22.02.3"
date = 2022-03-07T15:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/fence-birds-yudi-m.jpg"
slug = "bookstack-release-v22-02-3"
draft = false
+++

BookStack v22.02.3 has been released.
This is a security release that adds better protections against embedded content
that could be used in malicious ways. This effectively restricts embedded iframe
content in an allow-list approach. 

A new `ALLOWED_IFRAME_SOURCES` option has been added to provide configuration of 
allowed embed/iframe sources within BookStack pages, and this defaults to a couple
of popular services such as YouTube and Vimeo.

Please see this link for more detail regarding this option:
- https://www.bookstackapp.com/docs/admin/security/#iframe-source-control
  - ("Iframe Source Control" section)

It's advised to upgrade as soon as possible if untrusted users can create or update 
pages within your BookStack instance.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.02.3)

Thanks to @416e6e61 (Anna) for discovering and reporting this vulnerability via huntr.dev.

### Full List of Changes

* Added iframe allow-list control to prevent a range of malicious uses of untrusted iframe sources. ([#3314](https://github.com/BookStackApp/BookStack/issues/3314))
* Updated translations with latest Crowdin changes. ([#3312](https://github.com/BookStackApp/BookStack/pull/3312))


### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@yudi_m?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Yudi M</a> on <a href="https://unsplash.com/s/photos/fence?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>