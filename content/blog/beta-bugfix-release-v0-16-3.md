+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Bugfix Releases v0.16.2 and v0.16.3"
date = 2017-06-04T16:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/moth-aaron-burden.jpg"
description = "BookStack Bugfix v0.16.3 released to fix subscript text, user thumbnails and possible visibility issues"
slug = "beta-bugfix-release-v0-16-3"
draft = false
+++

Just a quick update on some bugfix point releases. Last month v0.16.2 was released. This fixes issues in the permission system when using the non-native php-mysql driver. More information can be found [in the issue thread here](https://github.com/BookStackApp/BookStack/issues/383).

Today an issue with role permissions was picked up. Permissions removed from a role would not take effect. Version 0.16.3 has been released to cover this issue. **If you use the permission system and have removed permissions from roles at any point I'd recommend running the command `php artisan bookstack:regenerate-permissions` from your BookStack install folder to ensure all permissions are set correctly.**

---

- [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
- [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.16.3)

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@aaronburden" target="_blank">Aaron Burden</a></span>
