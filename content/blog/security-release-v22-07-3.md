+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v22.07.3"
date = 2022-08-11T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/fence-birds-bonnie-kittle.jpg"
slug = "bookstack-release-v22-07-3"
draft = false
+++

BookStack v22.07.3 has been released.
This is a security release that adds additional filtering to page content to prevent
certain cross-site-scripting techniques. These cross-site-scripting techniques would be
already by blocked by BookStack's usage of Content-Security-Policy, but this change will help
scenarios where BookStack content is used externally.

In addition, the API documentation has been updated with a section focused on content security
to explain the security techniques BookStack uses by default, and to relay considerations for using
BookStack content in an external system. The security page of our documentation has also been 
updated with such considerations: 

https://www.bookstackapp.com/docs/admin/security/#using-bookstack-content-externally

Upgrade is advised where BookStack content, accessible to edit by untrusted users, is used externally.
Those using BookStack content externally (API-based app developers) should read the new documentation
 and add any advised protections as necessary.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.07.3)

Thanks to the "JPCERT/CC Vulnerability Coordination Group" contact and the original reporter,
Kenichi Okuno of Mitsui Bussan Secure Directions, Inc, for disclosing their report of the relevant vulnerability scenarios.

### Full List of Changes

* Added API documentation section to advise of content security. ([#3636](https://github.com/BookStackApp/BookStack/issues/3636))
* Updated Persian translations. Thanks to [@samadha56](https://github.com/BookStackApp/BookStack/pull/3639). ([#3639](https://github.com/BookStackApp/BookStack/pull/3639))
* Updated code block rendering to help prevent blank blocks on fresh cache. ([#3637](https://github.com/BookStackApp/BookStack/issues/3637))
* Updated HTML filtering to prevent SVG animate case. ([#3636](https://github.com/BookStackApp/BookStack/issues/3636))
* Updated translations with latest changes from Crowdin. ([#3635](https://github.com/BookStackApp/BookStack/pull/3635))
* Updated revision list view to help prevent system memory exhaustion. ([#3633](https://github.com/BookStackApp/BookStack/issues/3633))
* Fixed issue with permission checking prevent certain actions where permission should have allowed. ([#3632](https://github.com/BookStackApp/BookStack/pull/3632))

### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@bonniekdesign?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Bonnie Kittle</a> on <a href="https://unsplash.com/s/photos/fence?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  </span></span>