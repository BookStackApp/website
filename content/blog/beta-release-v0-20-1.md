+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.20.1"
date = 2018-03-25T16:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/books-maarten-van-den-heuvel.jpg"
description = "Release v0.20.1 is here with a great number of fixes, updates and improvements as well as a good deal of change behind the scenes"
slug = "beta-release-v0-20-1"
draft = false
+++

Today we release BookStack v0.20.1. Although this update does not include any major new features it bundles up some big behind-the-scenes changes along with a great deal of fixes and updates. 

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.20.1)

### Image Improvements

Previously you could upload GIF images but, due to resizing, they would not remain in their animated state once in the page. [Abijeet](https://github.com/BookStackApp/BookStack/pull/755) has now fixed this so you can go ahead and litter your pages with animated cat GIFs.

In addition to the Gifs, [Abijeet](https://github.com/BookStackApp/BookStack/pull/754) has also fixed many image manager upload issues, in both function and design, to make the image management experience better.

### Icon Overhaul

Previously BookStack used an icon font, thanks to the [material design iconic font](http://zavoloklom.github.io/material-design-iconic-font/icons.html), which worked nice for quick development. Unfortunately though an icon font is hard to customise and limits the icons available to use.

We have now migrated to fully using SVG icons. Things will generally look the same since we're using the same Google Material Design icon set but thanks to being SVG they should now appear sharper, pages will load quicker and the icons will no longer 'flash' into the view. They can also be easily overridden on an individual basis via [theming](/blog/beta-release-v0-20-0/#groundwork-for-theming).

### Updated Translations

Thanks to [@msaus](https://github.com/BookStackApp/BookStack/pull/761), [@Alwaysin](https://github.com/BookStackApp/BookStack/pull/753), [@cipi1965](https://github.com/BookStackApp/BookStack/pull/743), [@artur-trzesiok](https://github.com/BookStackApp/BookStack/pull/718) and [@leomartinez](https://github.com/BookStackApp/BookStack/pull/709) we now have updated, more complete translations for Japanese, French, Italian, Polish & Spanish Argentinian.  

### Full List of Changes

* GIF images now animate as expected. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/755). ([#755](https://github.com/BookStackApp/BookStack/pull/755),[#223](https://github.com/BookStackApp/BookStack/issues/223))
* Improved image manager uploader user-experience with many fixes and tweaks. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/754). ([#754](https://github.com/BookStackApp/BookStack/pull/754),[#741](https://github.com/BookStackApp/BookStack/issues/741))
* Added toggle-able JavaScript escaping on page render. ([#575](https://github.com/BookStackApp/BookStack/issues/575))
* Updated book/page/chapter create urls to prevent conflicting with entity names. ([#758](https://github.com/BookStackApp/BookStack/issues/758))
* Updated all icons to SVG in a way that can be override via theming. ([#704](https://github.com/BookStackApp/BookStack/pull/704))
* Updated dependencies so the project works correcting after installing with composer install --no-dev. ([#742](https://github.com/BookStackApp/BookStack/issues/742))
* Update to Japanese translations. Thanks to [@msaus](https://github.com/BookStackApp/BookStack/pull/761). ([#761](https://github.com/BookStackApp/BookStack/pull/761))
* Update to French translations. Thanks to [@Alwaysin](https://github.com/BookStackApp/BookStack/pull/753). ([#753](https://github.com/BookStackApp/BookStack/pull/753),[#752](https://github.com/BookStackApp/BookStack/pull/752))
* Update to Italian translations. Thanks to [@cipi1965](https://github.com/BookStackApp/BookStack/pull/743). ([#743](https://github.com/BookStackApp/BookStack/pull/743))
* Update to Polish translations. Thanks to [@artur-trzesiok](https://github.com/BookStackApp/BookStack/pull/718). ([#718](https://github.com/BookStackApp/BookStack/pull/718))
* Update to 'Spanish Argentina' translations. Thanks to [@leomartinez](https://github.com/BookStackApp/BookStack/pull/709). ([#709](https://github.com/BookStackApp/BookStack/pull/709))
* Added ability to configure email sender name. Thanks to [@duncanbarnes](https://github.com/BookStackApp/BookStack/pull/711). ([#711](https://github.com/BookStackApp/BookStack/pull/711))
* Added CACHE_PREFIX to the .env.example file. Thanks to [@pataar](https://github.com/BookStackApp/BookStack/pull/714). ([#714](https://github.com/BookStackApp/BookStack/pull/714))
* Updated form styling to be little cleaner.
* Improved search efficiency, by reducing required DB queries, and tweak search scoring to weight entities. Books > Chapters > Pages 
* Converted CSS/JS build system to webpack.
* Fixed page preview text showing whitespace causing a lot of wasted space in listings. ([#739](https://github.com/BookStackApp/BookStack/issues/739))
* Fixed issue where app logo would not load when using secure local images. ([#725](https://github.com/BookStackApp/BookStack/issues/725))
* Fixed incorrect cursor position after pasting an image in the Markdown editor. ([#751](https://github.com/BookStackApp/BookStack/issues/751))
* Fixed markdown editor resizing with long strings. Thanks to [@BackwardSpy](https://github.com/BookStackApp/BookStack/pull/716). ([#716](https://github.com/BookStackApp/BookStack/pull/716),[#715](https://github.com/BookStackApp/BookStack/issues/715))
* Fixed error that could occur due to search results clashing with Vue syntax. 

----

<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@mvdheuvel?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Maarten van den Heuvel"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">Maarten van den Heuvel</span></a>
