+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.21.0"
date = 2018-04-22T17:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/bookshelf-giammarco-boscaro.jpg"
description = "Beta Release v0.21 is here with video embed support, better tags and the ability to copy pages. There's also a new official BookStack team member!"
slug = "beta-release-v0-21-0"
draft = false
+++

A new version of BookStack is here. Version 0.21 improves upon a number of existing features in addition to bringing its own new capabilities to BookStack. If you are updating to this release from v0.20.0 or before it's also worth reviewing the [hefty update v0.20.1](/blog/beta-release-v0-20-1/) which included a good number of fixes and improvements itself.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.21.0)

### New Team Member

Before we dive into the depths of the new features in this release I'd like to announce that BookStack team has grown a little bit. [Abijeet](https://github.com/Abijeet) is now an official maintainer of BookStack. Abijeet has contributed on a good number of features now and pretty much every recent release includes features or improvements provided by Abieet. In addition, he frequently helps with GitHub issues.

By being an official maintainer he now has the ability to contribute quicker and to manage issues easier without me jumping in. Welcome Abijeet.  

### Media Embed Support

For this release Abijeet has added media embedding to the WYSIWYG editor. This makes it really easy to include videos and media from other websites in your pages. Here's a quick preview of how easy embedding a YouTube video is: 

<video src="/images/2018/04/insert-video.mp4" controls></video>

For those that prefer the Markdown editor, You already have the ability to insert HTML directly in the editor so you can directly insert any embed code from external sources.

### Page Copying

It's now possible to directly copy a page. You can find a new 'Copy' option in the 'More' menu at the top-right when viewing a page. When copying you'll have the option to change the name and alter the destination of the copied page. To be able to copy a page the user will need 'create' permissions for the book or chapter the page is to be copied into.

### Tag System Update

Previously you could only apply tags to pages but this has now been rolled out to books and chapters. This can be found in the edit view of both. These tags can be searched upon just as you currently can with pages.

### Configurable Robots.txt

The `robots.txt` file of a website tells web crawlers, such as Google's page indexer, whether your site should be crawled and indexed. Previously in BookStack this was set to always allow web crawlers. This file has now been made dynamic and will change depending on the "Allow public viewing?" setting.

Alternatively you can force the value of the `robots.txt` by setting `ALLOW_ROBOTS=false`, or `ALLOW_ROBOTS=true`, in the `.env` file. This will take priority over the "Allow public viewing?" setting. 

If you want to customise the contents of this file you are able to do this, without editing BookStack source files, via the theme override system.

### Language Support

Thanks to [@jasoncheng7115](https://github.com/BookStackApp/BookStack/pull/780) we now have traditional Chinese as a language option in BookStack. Upon this addition, the following languages have been updated:

* Spanish - Thanks to [@moucho](https://github.com/BookStackApp/BookStack/pull/783).
* 'Spanish Argentina' - Thanks to [@leomartinez](https://github.com/BookStackApp/BookStack/pull/806).
* German - Thanks to [@abno85](https://github.com/BookStackApp/BookStack/pull/798).
* Japanese - Thanks to [@msaus](https://github.com/BookStackApp/BookStack/pull/767).

### Full List of Changes

* Added the ability to insert videos via the WYSIWYG editor. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/768). ([#768](https://github.com/BookStackApp/BookStack/pull/768)[#266](https://github.com/BookStackApp/BookStack/issues/266)
* Added the ability to copy a page. ([#673](https://github.com/BookStackApp/BookStack/issues/673))
* Rolled out tag system to chapters and books. ([#121](https://github.com/BookStackApp/BookStack/issues/121))
* Updated export image processing to include images when using "local_secure" option. ([#786](https://github.com/BookStackApp/BookStack/issues/786))
* Robots.txt file is now dynamic and configurable. ([#779](https://github.com/BookStackApp/BookStack/issues/779))
* Added traditional Chinese translations. Thanks to [@jasoncheng7115](https://github.com/BookStackApp/BookStack/pull/780). ([#780](https://github.com/BookStackApp/BookStack/pull/780))
* Updated Spanish translations. Thanks to [@moucho](https://github.com/BookStackApp/BookStack/pull/783). ([#783](https://github.com/BookStackApp/BookStack/pull/783))
* Updated 'Spanish Argentina' translations. Thanks to [@leomartinez](https://github.com/BookStackApp/BookStack/pull/806). ([#806](https://github.com/BookStackApp/BookStack/pull/806))
* Updated German translations. Thanks to [@abno85](https://github.com/BookStackApp/BookStack/pull/798). ([#798](https://github.com/BookStackApp/BookStack/pull/798))
* Updated Japanese translations. Thanks to [@msaus](https://github.com/BookStackApp/BookStack/pull/767). ([#767](https://github.com/BookStackApp/BookStack/pull/767))
* Updated 'Reset Password' flow with newer design ([#800](https://github.com/BookStackApp/BookStack/issues/800))
* Fixed issue where old books would not update with cover image on save. ([#773](https://github.com/BookStackApp/BookStack/issues/773))
* Added proper permission checking when moving pages and chapters ([cdb1c7ef](https://github.com/BookStackApp/BookStack/commit/cdb1c7ef88a0054c46ba9eb040464bdea274b095))

### Next Steps

For this release I was hoping to bring in proper revision control for drawings to finish that feature off but I did not find the time so that will be my focus for the next release. I believe Abijeet may be looking to add the 'All Books' listing as a homepage option.

For other features please ensure you add a 'Thumbs-up' reaction on the parent post of any GitHub issue for desired features as it's a really helpful way to identify the most requested features.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@giamboscaro?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Giammarco Boscaro"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">Giammarco Boscaro</span></a></span>
