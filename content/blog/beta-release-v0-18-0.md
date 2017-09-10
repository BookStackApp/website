+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.18.0"
date = 2017-09-10T18:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/bookshelf-chuttersnap.jpg"
description = "BookStack v0.18 released with an updated design, more customization options and a commenting system"
slug = "beta-release-v0-18-0"
draft = false
+++

We're now over two years into the life of BookStack and to celebrate we have a new release, v0.18. This release unexpectedly grew in scope during
development but it brings a good bunch of highly-requested features along with the biggest design change since October 2015.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.18.0)



### Design Changes

As features have built up the existing design was becoming cluttered. There was little visual separation between different sections and
a lack of consistency in how pages were laid out. In this release the design has evolved to tackle these issues. Here's a before and after of the page view:

**Before**

![Page Design Old](/images/2017/09/page_design_old.png)

**After**

![Page Design New](/images/2017/09/page_design_new.png)

As you can see, The new design visually separates the page content and the page meta data. The sidebar has been moved to the left to prevent scrolling issues
and the content within is now clearly labelled and spaced. When scrolling on a page, the sidebar will now not jump around as much such preventing visual distraction.

The header bar height has been reduced to put more focus on the content. The action overflow menu is now labelled to be clearer.
The old default font has been replaced with system fonts which provide a more native feel and also help to reduce load times. 

On mobile, The sidebar will now remain to the side but be hidden and expandable rather than just jumping below the page content:

<video src="/images/2017/09/bookstack_mobile_sidebar.mp4" controls/>

Overall I'm hoping the design changes will be welcome but if they cause any issues please let me know by [creating an issue on GitHub](https://github.com/BookStackApp/BookStack/issues).

### Commenting System

Feedback is crucial to writing good documentation. Since the start of the year [@Abijeet](https://github.com/BookStackApp/BookStack/pull/261) has been doing some great work on adding comments to BookStack.
You can now find comments at the bottom of pages. Comments are displayed chronologically and are given an ID which can be used as a reference and allows comments to be directly linked to.

Depending on permissions you can add, delete, edit and even reply to comments. Markdown is supported within comments to allow more advanced formatting.

![BookStack Comment System](/images/2017/09/comments.png)

Upon update ensure you update role permissions to allow users to work with comments.

### Custom Homepage

The option to change the homepage has become a highly requested feature so, with the design changes taking place, it seemed like a good idea to add in this feature.
In the settings area you can now select any page to show as the homepage. Once set, The existing lists on the homepage will move into a sidebar.
This homepage will show to all users regardless of permissions set.

<div style='position:relative;padding-bottom:73%'><iframe src='https://gfycat.com/ifr/WetOblongCamel?autoplay=0' frameborder='0' scrolling='no' width='100%' height='100%' style='position:absolute;top:0;left:0;' allowfullscreen></iframe></div>

&nbsp;

In addition, The default homepage has been cleaned up a little by extending the 'Recently Updated Pages' list and removing the 'Recently Created' list as they 
usually had a lot of overlap. 

### Language Updates 🇮🇹 🇩🇪 🇯🇵

With this release we have more content translated thanks, yet again, to awesome people on GitHub.
[Thanks to @cipi1965](https://github.com/BookStackApp/BookStack/pull/501) Italian is now a language option.
Improvements & updates to German and Japanese translations have been made by [@timoschwarzer](https://github.com/BookStackApp/BookStack/pull/474) and [@msaus](https://github.com/BookStackApp/BookStack/pull/483).

### Full List of Changes


* Added commenting system (Thanks to [@Abijeet, #261](https://github.com/BookStackApp/BookStack/pull/261), [#47](https://github.com/BookStackApp/BookStack/issues/47)).
* Large project-wide design revamp ([#480](https://github.com/BookStackApp/BookStack/issues/480)).
* Switch all fonts to use system fonts ([#423](https://github.com/BookStackApp/BookStack/issues/423)).
* Added Italian Translations ([#501, Thanks to @cipi1965](https://github.com/BookStackApp/BookStack/pull/501)).
* Updated German Translations ([#474, Thanks to @timoschwarzer](https://github.com/BookStackApp/BookStack/pull/474)).
* Updated Japanese Translations ([#483, Thanks to @msaus](https://github.com/BookStackApp/BookStack/pull/483)).
* Improved customization options:
  * Added setting for a custom homepage to be set ([#372](https://github.com/BookStackApp/BookStack/issues/372), [#126](https://github.com/BookStackApp/BookStack/issues/126)).
  * Made it possible to override codemirror (Code block) theme ([#455](https://github.com/BookStackApp/BookStack/issues/455)).
  * Added docs instructions for overriding BookStack fonts ([#423](https://github.com/BookStackApp/BookStack/issues/423)).
* Converted most of the angular code to Vue.JS or vanilla JS.
* Updated some views to support better cross-language pluralization ([#417](https://github.com/BookStackApp/BookStack/issues/417)).
* Fixed design bug with long attachment names ([#460](https://github.com/BookStackApp/BookStack/issues/460)).
* Fixed issue with markdown callout shortcut producing bad HTML ([#470](https://github.com/BookStackApp/BookStack/issues/470)).
* Fixed broken quick-save shortcut in WYSIWYG editor ([#467](https://github.com/BookStackApp/BookStack/issues/467)).

### Next Steps

As part of v0.18 a fair bit of time was dedicated to migrating a lot of the AngularJS code.
For v0.19 the aim is to remove angular completely which will achieve a large reduction in the production JS file size and keep the codebase consistent.

Since comments were added I think notifications will start to become more requested since it's difficult to know when someone has replied to your comment.
Therefore this may be further developed or at least planned out during the next release cycle. It's a challenging feature to implement though
as care will need to be take in regards to performance and installation complexity.

[Some great work](https://github.com/BookStackApp/BookStack/pull/494) has been going on to add book cover art and a grid display option so I'll be looking to merge
that in for the next release.

Laravel, the PHP framework BookStack is built on, has released version 5.5 recently so we'll look to upgrade to this soon. This will mean a PHP version requirement change to PHP7.
It's advised to move to PHP7 now if you have not already, even just for the performance benefits.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@chuttersnap?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title></title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">chuttersnap</span></a></span>
