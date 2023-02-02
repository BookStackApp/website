+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v23.01.1"
date = 2023-02-02T12:25:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/fence-bird-james-wainscoat.jpg"
slug = "bookstack-release-v23-01-1"
draft = false
+++

BookStack v23.01.1 has been released.
This is a security release that addresses a potential vulnerability in PDF generation that could 
be used to make server-side requests or run potential other PHP code.

Upgrade is advised where untrusted users have permission to create page content in your instance.

From testing, it appears that successful exploitation of this would require either the disabling
of BookStack default security options, or access to the host machine system, but out of caution
we're advising upgrade in any environment as specified above.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.01.1)


### Full List of Changes

* Updated pdf library to address vulnerability. ([#4010](https://github.com/BookStackApp/BookStack/pull/4010))
* Updated translations with latest Crowdin changes. ([#4008](https://github.com/BookStackApp/BookStack/pull/4008))
* Fixed missing default 180px icon. ([#4006](https://github.com/BookStackApp/BookStack/issues/4006))

### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/es/@tumbao1949?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">James Wainscoat</a> on <a href="https://unsplash.com/photos/FrO3s74-3Nk?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  </span></span>