+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v21.10.3"
date = 2021-11-01T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/path-ugne-vasyliute.jpg"
slug = "bookstack-release-v21-10-3"
draft = false
+++

BookStack v21.10.3 has been released.
This is a security release that address a couple of vulnerabilities within the attachment and image
serving mechanisms. The attachment vulnerability could result in users uploading content to be served
in a way that can be utilized for phishing. The image serving vulnerability could result in unintended
file access within your BookStack storage folder.

If you allow untrusted users to login or upload attachments you should update as soon as possible.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.10.3)


### Full List of Changes

* Updated AzureAD login library to work with the new Microsoft Graph API. ([#3028](https://github.com/BookStackApp/BookStack/issues/3028))
* Fixed path image file path traversal vulnerability. Thanks @theworstcomrade for reporting. ([#3030](https://github.com/BookStackApp/BookStack/issues/3030))
* Prevented HTML attachments being served inline. Thanks @theworstcomrade for reporting. ([#3027](https://github.com/BookStackApp/BookStack/issues/3027))
* Updated translations from latest Crowdin changes. ([#3023](https://github.com/BookStackApp/BookStack/pull/3023))

### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@ugnehenriko?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Ugne Vasyliute</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>