+++
categories = ["Releases", "News"]
tags = ["Releases", "News"]
title = "1000 Stars and Beta Release v0.19"
date = 2017-12-10T17:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/stars-kristopher-roller.jpg"
description = "Another BookStack milestone with 1000 GitHub stars. In addition we have v0.19 bringing Book cover images along with other nice additions"
draft = false
+++

Before 2017 is up we have managed to hit [1000 stars](https://github.com/BookStackApp/BookStack/stargazers) on GitHub! This reflects the continued growing momentum that the project has experienced over time considering the 500 star milestone was only passed in March of this year.

Throughout 2017 there's been a growing amount of community contributions to the project in various forms which includes making pull requests, creating issues and supporting on existing issues. A massive thanks to everyone that's made such a contribution since it's great to see people that care about a project like this. A special thanks in particular to [@Abijeet](https://github.com/Abijeet) and [@lommes](https://github.com/lommes) who have both been very active in responding to issues and making contributions.

As always, I like to keep project information as open as possible. Here's a graph showing website activity since Jan 2016, When the website was first set up:

![Google Analytics 2017 Website Growth](/images/2017/12/analytics-growth-2017.png)

Through the second half of this year we've seen a good degree of growth which I hope to see continue through 2018. A dynamic public dashboard of these stats can [be found here](https://datastudio.google.com/reporting/0B_agEsqREhl6T1BiMV9PTlhzblU) if you want to have a deeper look.

## Beta Release v0.19 

As an early winter holiday gift we bring you BookStack v0.19. The main features of this release have primarily been from community pull requests which is fantastic. Here are the handy links for updating: 

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.19.0)

If you haven't updated since v0.18.0 it's worth reading the bugfix notes from [the last post here](/blog/beta-security-release-v0-18-5/) since there are some important changes to take notice of.

For those that did update to v0.18.5 please note that I accidentially did not merge changes for that release so any updates that were meant to be in v0.18.5 won't actually take effect until you update to v0.19.0. Apologies for that. 

#### Requirements Change

For this release we've updated the framework that BookStack is built upon, Laravel, to version 5.5 which requires PHP 7. Therefore BookStack now requires PHP 7.0 or greater. If you are on PHP 5 then you won't be able to run or install the new version of BookStack and will need to upgrade to a newer PHP version before you update BookStack. PHP 7 brings great speed enhancements over PHP 5 as well as many new features to improve development and maintenance.

#### Book Cover Art and Grid Display

It's now possible to assign cover art for your books. To display this new art a grid view has been added to the Books view:

![Books Grid View](/images/2017/12/book-grid-view.png)

This provides a much more visual experience that can allow you to quickly identify different Books. A setting is available in your user preferences to change view type. Depending on feedback we could look to roll this out to other entity types (Chapters/Pages) if found to be useful. 

A big thanks to [@bharadwajag](https://github.com/bharadwajag), [@nileshdeepak](https://github.com/nileshdeepak) and [@AbijeetP](https://github.com/AbijeetP) for their combined work to achieve this great result.

#### Comment Disabling

Comments were added to v0.18 which is great where an extra, BookStack specific, layer of communication is required but there are many instances where communication would be done outside of the system or even instances where it's only used by a single person.
To support those scenarios an option to disable comments has been added to the settings view. This will completely hide all parts of the commenting system. Thanks once again to [@AbijeetP](https://github.com/AbijeetP) for implementing this feature.

#### Okta Authentication

For companies that use Okta to manage authentication, You can now set up Okta sign-in on BookStack. Details on setting this up can be found at the [bottom of this page](/docs/admin/third-party-auth/#okta). Thanks you [@lommes](https://github.com/lommes) for adding this functionality.

#### Page Navigation Indicator

Just want to highlight a new subtle UI feature added in this release. When scrolling within a page the page navigation menu will highlight any headers within view to make it easier to track your position when reading a page:

<video src="/images/2017/12/progress-indicator.mp4" controls></video>

Thanks you once more to [@AbijeetP](https://github.com/AbijeetP) for implementing this feature.

#### Full List of Changes

* Added book cover art and grid display view. Thanks to [@bharadwajag, @nileshdeepak and @AbijeetP](https://github.com/BookStackApp/BookStack/pull/494). ([#181](https://github.com/BookStackApp/BookStack/issues/181), [#494](https://github.com/BookStackApp/BookStack/pull/494))
* Added ability to disable comments. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/593). ([#593](https://github.com/BookStackApp/BookStack/pull/593), [#541](https://github.com/BookStackApp/BookStack/issues/541)) 
* Added Okta authentication option. Thanks to [@lommes](https://github.com/BookStackApp/BookStack/pull/598). ([#598](https://github.com/BookStackApp/BookStack/pull/598))
* Added page navigation highlighting on page scroll. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/580). ([#580](https://github.com/BookStackApp/BookStack/pull/580), [#466](https://github.com/BookStackApp/BookStack/issues/466))
* Updated Laravel framework to 5.5. ([#590](https://github.com/BookStackApp/BookStack/issues/590))
* Added `CTRL+Enter` shortcut to "Save and continue" when editing a page. ([#604](https://github.com/BookStackApp/BookStack/issues/604))
* Fixed WYSIWYG rendering issues when in fullscreen mode. ([#605](https://github.com/BookStackApp/BookStack/issues/605))
* Updated custom head content to also function within the WYSIWYG editor. ([#562](https://github.com/BookStackApp/BookStack/issues/562))
* Set up a simple tool to assist with translation management. ([#373](https://github.com/BookStackApp/BookStack/issues/373))
* Added way to specify trusted proxies. ([#146](https://github.com/BookStackApp/BookStack/issues/146))


### Next Steps

To be honest, I've not yet chosen the next set of features for the next release. I'm planning to revamp the icon system soon to be fully svg based which will hopefully lead to faster loading, sharper rendering and better icons. This idea is part of providing wider customisation enhancement. I'd also like to continue improving upon some of the design changes from the last release.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@krisroller?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Kristopher Roller"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">Kristopher Roller</span></a></span>
