+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.22.0"
date = 2018-05-28T10:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/bookshop-john-michael-thomson.jpg"
description = "BookStack v0.22 brings a new homepage option in addition to changes to the drawing system and general design tweaks."
slug = "beta-release-v0-22-0"
draft = false
+++



* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.22.0)


### Books Homepage Option

### Ubuntu 18.04 Install Script

### Drawing Changes

### Language Support


### Full List of Changes

* Added setting to set the Books view as the homepage. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/830). ([#615](https://github.com/BookStackApp/BookStack/issues/615),[#830](https://github.com/BookStackApp/BookStack/pull/830))
* Updated German translations. Thanks to [@vriic](https://github.com/BookStackApp/BookStack/pull/851). ([#851](https://github.com/BookStackApp/BookStack/pull/851))
* Updated Spanish translations. Thanks to [@moucho](https://github.com/BookStackApp/BookStack/pull/846). ([#846](https://github.com/BookStackApp/BookStack/pull/846))
* Updated Swedish translations. Thanks to [@marcusforsberg](https://github.com/BookStackApp/BookStack/pull/802). ([#802](https://github.com/BookStackApp/BookStack/pull/802))
* Ubuntu 18.04 install script now available. ([#850](https://github.com/BookStackApp/BookStack/issues/850))
* Updated tag and details design in sidebar to be more compact and cleaner. ([#838](https://github.com/BookStackApp/BookStack/issues/838), [#770](https://github.com/BookStackApp/BookStack/issues/770))
* Drawings now create new image records instead of overwriting existing content. ([#837](https://github.com/BookStackApp/BookStack/pull/837))
* Added new 'Maintenance' area to settings with option to clean-up images. ([#837](https://github.com/BookStackApp/BookStack/pull/837))
* Updated design of image manager and fixed search-cancel button to not always clear all images shown. ([#837](https://github.com/BookStackApp/BookStack/pull/837))
* Updated back-to-top button to not show on not scrollable pages such as the edit view. ([#824](https://github.com/BookStackApp/BookStack/issues/824))
* Added `.env` option to set Secure/HTTPS only cookies. ([#817](https://github.com/BookStackApp/BookStack/issues/817))
* Updated link attaching to allow any link types, Not only links matching a set pattern. ([#812](https://github.com/BookStackApp/BookStack/issues/812))
* Updated `Secure Images` setting to not alter names of uploaded images, Only their paths.
* Fixed relative CSS references causing WKHTML PDF exports to fail. Now callout icons will show in exports. ([#796](https://github.com/BookStackApp/BookStack/issues/796))
* Fixed issue with c-like languages not highlighting correctly in code blocks. ([#849](https://github.com/BookStackApp/BookStack/issues/849))
* Fixed design bug causing search icon to overlap input in header. ([#859](https://github.com/BookStackApp/BookStack/issues/859))

### Next Steps



----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@svqmedia?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from John Michael Thomson"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">John Michael Thomson</span></a></span>
