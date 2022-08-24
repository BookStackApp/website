+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Security Release v21.12.1"
date = 2022-01-06T11:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-jornada-produtora.jpg"
slug = "bookstack-release-v21-12-1"
draft = false
+++

BookStack v21.12.1 has been released.
This is a security release that better enforces permissions on book-sort & 
chapter-move operations to address scenarios where content could be moved to
non-permissible locations.

It's advised to upgrade as soon as possible if untrusted users can update books 
or chapters in your BookStack instance.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.12.1)

Thanks again to @haxatron for discovering and reporting this vulnerability via huntr.dev.

### Full List of Changes

* Added timeout and debugging statuses to webhooks. ([#3139](https://github.com/BookStackApp/BookStack/pull/3139))
* Added new webhook_call_before logical theme system event hook. ([#3138](https://github.com/BookStackApp/BookStack/pull/3138))
* Updated support for APNG images to retain animation. ([#3136](https://github.com/BookStackApp/BookStack/issues/3136))
* Updated book sort and chapter move handling to enforce more permissions. ([#3134](https://github.com/BookStackApp/BookStack/issues/3134))
* Updated item-search/select box to autofocus on search field. ([#3127](https://github.com/BookStackApp/BookStack/issues/3127))
* Updated webhooks to not stop application on endpoint call failure. ([#3122](https://github.com/BookStackApp/BookStack/issues/3122))
* Updated translations with latest Crowdin changes. ([#3117](https://github.com/BookStackApp/BookStack/pull/3117))
* Fixed webhooks list view issue where columns would become to narrow. ([#3135](https://github.com/BookStackApp/BookStack/issues/3135))
* Fixed linked images showing small in PDF export. ([#3120](https://github.com/BookStackApp/BookStack/issues/3120))
* Fixed issue where pasting certain code blocks would cause erratic editor behavior. ([#3133](https://github.com/BookStackApp/BookStack/issues/3133))

### For More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack security policy](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@jornadaprodutora?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Jornada Produtora</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>