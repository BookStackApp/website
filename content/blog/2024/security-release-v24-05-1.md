+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v24.05.1"
date = 2024-05-21T11:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-sa-4/padlocks-dietmar-rabich.jpg"
slug = "bookstack-release-v24-05-1"
draft = false
+++

BookStack v24.05.1 has been released.
This is a security release that adds extra rate-limiting to some forms that are accessible without authentication, while also implementing changes to prevent methods that could be used to indicate if specific user emails exist in the system.

Upgrade is advised for instances accessible on the public web.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v24.05.1)

### Full List of Changes

* Updated PHP dependencies.
* Updated routes with IP-based rate limiting. ([#4993](https://github.com/BookStackApp/BookStack/issues/4993))
* Updated email confirmation flow to not require email submission form.
* Updated translations with latest Crowdin changes. ([#4994](https://github.com/BookStackApp/BookStack/pull/4994))
* Updated WYSIWYG alignment handling to also consider table `align` attributes. ([#5011](https://github.com/BookStackApp/BookStack/issues/5011))
* Fixed attachment upload validation errors appearing as JSON. ([#4996](https://github.com/BookStackApp/BookStack/issues/4996))
* Fixed incorrect notification preferences URL in email. Thanks to [@KiDxS](https://github.com/BookStackApp/BookStack/pull/5008). ([#5008](https://github.com/BookStackApp/BookStack/pull/5008), [#5005](https://github.com/BookStackApp/BookStack/issues/5005))
* Fixed non-visible MFA setup titles in dark mode. ([#5018](https://github.com/BookStackApp/BookStack/issues/5018))
* Fixed outdated path in visual theme system guidance. ([#4998](https://github.com/BookStackApp/BookStack/issues/4998))
* Fixed potential cache permission issues by reverting cache location. ([#4999](https://github.com/BookStackApp/BookStack/issues/4999))

### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://commons.wikimedia.org/wiki/File:San_Francisco_(CA,_USA),_Fisherman%27s_Wharf,_Liebesschl%C3%B6sser_--_2022_--_2873.jpg">Dietmar Rabich (CC-BY-SA 4.0)</a> - Image Modified</span></span>