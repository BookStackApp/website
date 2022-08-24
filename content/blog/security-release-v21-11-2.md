+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v21.11.2"
date = 2021-11-30T14:15:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-gina-neri.jpg"
slug = "bookstack-release-v21-11-2"
draft = false
+++

BookStack v21.11.2 has been released.
This is a security release that address a couple of vulnerabilities relating to API access
and page draft related content visibility:

- If the "Public" role was provided API access then the API could be accessed, in certain scenarios,
  by non-authenticated users even if the "Allow public access" setting was disabled.
- In some specific scenarios, content related to page drafts (Such as attachments) could be visible
  to non-owners (Whom would have permission to view the page if saved  as a non-draft at that point).

It's advised to upgrade as soon as possible if the API has been enabled for roles within your instance
or if draft page content visibility could be a security concern for you.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.11.2)


### Full List of Changes

* Fixed issue with greater-than-expected visibility on page-draft-related items. Thanks @haxatron for reporting. ([#3086](https://github.com/BookStackApp/BookStack/issues/3086))
* Fixed issue where public API access was not limited by system public control in certain conditions. ([#3091](https://github.com/BookStackApp/BookStack/issues/3091))
* Updated translations from latest Crowdin changes. ([#3076](https://github.com/BookStackApp/BookStack/pull/3076))

### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@gneri1713?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Gina Neri</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>