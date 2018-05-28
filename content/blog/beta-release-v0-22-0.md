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

BookStack v0.22 is here with a much requested homepage option in addition to changes to the drawing system and improvements. Let's get into it: 


* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.22.0)


### Books Homepage Option

Setting the '/books' view as the homepage was the most-requested issue we had so [@Abijeet](https://github.com/BookStackApp/BookStack/pull/830) went ahead and built this in as a new setting. Just like the '/books' view a grid or list layout can be selected. This homepage view will still differ slightly in comparison to the '/books' page since the sidebar items will remain more focused on the user's activity rather than additional categories of books. The new setting can be found in the 'App Settings' section of BookStack under 'Application Homepage' as a toggle switch.

### Sidebar Design Changes

The sidebar when viewing pages was beginning to get a little crowded, Especially when the page had both tags assigned and permissions set. This has now been cleaned up to be much more compact with new tag styling. The permissions are now shown in a more efficient manner within the details panel. The difference in space-efficiency can be seen the comparison below:

![BookStack sidebar design changes](/images/2018/05/sidebar-updates.png)


### Ubuntu 18.04 Install Script

With the recent release of Ubuntu LTS 18.04, Bionic Beaver, A new install script has been put together. Details of the script and how to run it [can be found here](/docs/admin/installation/#ubuntu-1804).

In comparison to the Ubuntu 16.04 script, This version now installs PHP-7.2 instead of PHP-7.0 and Apache2 is used instead of Nginx. The change to apache was done in the hopes of ensuring that BookStack plays nicer with other web-based packages such as phpMyAdmin and Let’s Encrypt.

### Drawing Changes

Previously when updating a drawing the source file would be completely overwritten. In addition, there was no way to delete a drawing in the system.
This has now been changed so that new images are created upon updating instead of being overwritten. This ensures that drawing changes are now versioned correctly alongside page updates.

This change does mean that more image files will be created and stored by BookStack. For one-off drawing deletions, or re-naming, you can now access a 'Drawing Manager' from the drawing-icon dropdown in the WYSIWYG editor or by shift-clicking the 'Insert Drawing' action in the markdown editor. To handle bulk image cleanup a new action has been added in the new 'Maintenance' area: 

### Maintenance Area

A new maintenance area has been added to sit alongside settings. This area will expand to hold all common operations an admin might want to perform. Currently it only includes the ability to clean-up images:

![BookStack Maintenance Area](/images/2018/05/maintenance.png)

The clean-up images action provides a way to remove old, unused images from the system. It will search for uploaded gallery images and drawings that cannot be found within page content. It will also search within page revisions although you have the ability to ignore them to clean even more images.

### Language Support

This release includes updates to the German, Spanish and Swedish translations thanks respectively to [@vriic](https://github.com/BookStackApp/BookStack/pull/851), [@moucho](https://github.com/BookStackApp/BookStack/pull/846), [@marcusforsberg](https://github.com/BookStackApp/BookStack/pull/802).


### Full List of Changes

* Added setting to set the Books view as the homepage. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/830). ([#615](https://github.com/BookStackApp/BookStack/issues/615),[#830](https://github.com/BookStackApp/BookStack/pull/830))
* Updated German translations. Thanks to [@vriic](https://github.com/BookStackApp/BookStack/pull/851). ([#851](https://github.com/BookStackApp/BookStack/pull/851))
* Updated Spanish translations. Thanks to [@moucho](https://github.com/BookStackApp/BookStack/pull/846). ([#846](https://github.com/BookStackApp/BookStack/pull/846))
* Updated Swedish translations. Thanks to [@marcusforsberg](https://github.com/BookStackApp/BookStack/pull/802). ([#802](https://github.com/BookStackApp/BookStack/pull/802))
* Ubuntu 18.04 install script now available. ([#850](https://github.com/BookStackApp/BookStack/issues/850))
* Updated tag and details design in sidebar to be more compact and cleaner. ([#838](https://github.com/BookStackApp/BookStack/issues/838))
* Drawings now create new image records instead of overwriting existing content. ([#837](https://github.com/BookStackApp/BookStack/pull/837), [#770](https://github.com/BookStackApp/BookStack/issues/770))
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

For the next release I'll have another think about the best way to [remove Composer as a dependency](https://github.com/BookStackApp/BookStack/issues/161) for installs and updates. Ideally I want to ensure the process is as simple as possible while remaining secure. Additionally I may start to have a proper think about the best solution for [adding another level to the organisation hierarchy](https://github.com/BookStackApp/BookStack/issues/95) as that's currently highly-requested.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@svqmedia?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from John Michael Thomson"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">John Michael Thomson</span></a></span>
