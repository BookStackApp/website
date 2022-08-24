+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Security Release v0.30.6"
date = 2020-12-17T21:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-door-waldemar-brandt.jpg"
description = "BookStack v0.30.6 has been released to address an issue that could lead to restricted page content being visible in certain circumstances."
slug = "beta-release-v0-30-6"
draft = false
+++


BookStack v0.30.6 has been released to address an issue that could lead to restricted page content being visible in certain circumstances.
You should upgrade to this released as soon as possible if you make use of page-level permissions at all.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.6)


### Impact

If a chapter was visible to a user, but all of it's pages were made not visible, then the details of these pages could be visible. Within the BookStack interface, the names of the pages and preview content could be seen. If the parent book was exported then this would include the content of the pages that had been restricted.

### Patches

This has been patched in v0.30.6.

### Workarounds

Please update. As a temporary workaround you could ensure that there is at least one other page within a chapter that's visible to users. 

### References

* [BookStack Beta v0.30.6](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.6)
* [GitHub Issue #2414](https://github.com/BookStackApp/BookStack/issues/2414)

### Attribution

A big thanks to [@cdrfun](https://github.com/cdrfun) for [discovering and reporting](https://github.com/BookStackApp/BookStack/issues/2414) this issue.

### For more information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack Security Advice](https://github.com/BookStackApp/BookStack#-security) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@waldemarbrandt67w?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Waldemar Brandt</a> on <a href="https://unsplash.com/s/photos/lock?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>
