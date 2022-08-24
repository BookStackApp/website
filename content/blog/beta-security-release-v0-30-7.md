+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Security Release v0.30.7"
date = 2020-12-18T14:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-aubrey-odom.jpg"
description = "In continuation of the patches in v0.30.6, BookStack v0.30.7 has been released to address an issue that could lead to restricted page content being made visible in exports."
slug = "beta-release-v0-30-7"
draft = false
+++


In continuation of the patches in v0.30.6, BookStack v0.30.7 has been released to address an issue that could lead to restricted page content being made visible in exports.
As with the last release, You should upgrade to this released as soon as possible if you make use of page-level permissions at all. Apologies for the frequency of security releases.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.7)


### Impact

The content of pages made non-viewable to a user via permissions, within a visible parent, could be seen via the plaintext export option. Before v0.30.6 this would have applied only to scenarios where all pages within the chapter were made non-visible. In v0.30.6 this would make all pages within the chapter visible.

### Patches

This has been patched in v0.30.7.

### Workarounds

Please update. As a temporary workaround you could make parent chapters/books non accessible.

### References

* [BookStack Beta v0.30.7](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.7)
* [GitHub Issue #2414](https://github.com/BookStackApp/BookStack/issues/2414)

### Attribution

A big thanks again to [@cdrfun](https://github.com/cdrfun) for [discovering and reporting](https://github.com/BookStackApp/BookStack/issues/2414) this issue.

### For more information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack Security Advice](https://github.com/BookStackApp/BookStack#-security) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@octoberroses?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Aubrey Odom</a> on <a href="https://unsplash.com/s/photos/lock?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>
