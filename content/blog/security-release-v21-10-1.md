+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v21.10.1"
date = 2021-10-27T11:30:08Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-muhammad-zaqy-al-fattah.jpg"
slug = "bookstack-release-v21-10-1"
draft = false
+++

BookStack v21.10.1 has been released. This is a security release that covers a vulnerability
which would allow malicious users, who have permission to update or create pages, to upload
content that could then be utilized for phishing or other general malicious intent.

If you allow untrusted users to edit page content you should update as soon as possible.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.10.1)

Thanks to @haxatron on [huntr.dev](https://huntr.dev/) for the discovery and reporting of this issue.

### Full List of Changes

* Fixed image upload vulnerability. Thanks to @haxatron ([#3010](https://github.com/BookStackApp/BookStack/issues/3010))
* Fixed capitalization for Estonian language option. Thanks to [@IndrekHaav](https://github.com/BookStackApp/BookStack/pull/3008). ([#3008](https://github.com/BookStackApp/BookStack/pull/3008))
* Updated PHP packages to prevent abandoned warning. ([#3007](https://github.com/BookStackApp/BookStack/issues/3007))
* Updated translations with latest changes from Crowdin. ([#3006](https://github.com/BookStackApp/BookStack/pull/3006))


### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@dizzydizz?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Muhammad Zaqy Al Fattah</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>