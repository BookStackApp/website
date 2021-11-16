+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v21.11"
date = 2021-11-16T10:04:45Z
author = "Dan Brown"
image = "/images/blog-cover-images/autumn-road-sebastian_unrau.jpg"
slug = "bookstack-release-v21-11"
draft = false
+++

Today we release BookStack v21.11 which focuses on a couple of areas that have gone
untouched for a while; Those areas being tags and the site-wide search system. These changes
sit upon more substantial framework upgrade work that has occurred this release cycle.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.11)


**Upgrade Notices**

- **Security Releases** - There were some security vulnerabilities found during the life of 
  v21.10. See the [v21.10.1](/blog/bookstack-release-v21-10-1/), [v21.10.2](/blog/bookstack-release-v21-10-2/) and
  [v21.10.3](/blog/bookstack-release-v21-10-3/) posts for more details.
- **API Changes** - As of v21.11 any dates in API responses will be formatted as per ISO-8601, with `2019-12-02T20:01:00.283041Z` reflecting an example of this format. You may need to review any of your scripts that utilise dates from API responses.
- **Upload Limit** - System file upload limits are now configured using a `FILE_UPLOAD_SIZE_LIMIT` option in your 
  `.env` file. This value is specified as an integer and represents the max upload size in MegaBytes. This defaults to 50MB. This replaces the old `window.uploadLimit` HTML head option that could be set.
- **Search Index Changes** - As detailed below, there have been search indexing and scoring changes in v21.11. 
  It's recommended to run `php artisan bookstack:regenerate-search` to ensure a consistent search experience and take
  advantage of these changes.
- **Logout Endpoints** - Logout endpoints have now changed to be CSRF protected POST endpoints instead of GET endpoints. If you were using these for any external purposes you may now need to implement an alternative workflow.


### New Tags Overview

A listing of used tags can now be found within BookStack. This view initially shows all used
tag names along with counts of usage, broken down by item type (Total, page, chapter, book, shelf):

![Tags Overview Page Preview](/images/2021/11/tags-page.png)

Clicking the tag name, or the counts, will start a search for that particular tag and item type.
Shown on the right is the count of unique values used against the tag name. Clicking this will take
you to a similar view for that specific tag name, displaying all the values used for that tag.

This view can be accessed via the actions menu when viewing all books or shelves in the system.

### Search System Enhancements

During this release cycle I decided to pay special attention to the search system.
The most obvious change is an improvement in how search results are displayed.
Item names, descriptions and tags will reflect the searched terms and show them in bold
with some surrounding context:

![Search Enhancements Preview](/images/2021/11/search-results.png)

Upon this aesthetic change, which should help visual parsing of results, the following
improvements have been made to the search indexing and scoring system:

- Terms searched will now have their scores relatively adjusted based upon frequency
  in the database. This should help prevent common, smaller terms causing so much noise in results.
- Page content is now parsed so that a score boost is given to terms within content headings.
- The score boost for terms in item titles has been significantly increased.
- Standard terms will now match against the names and values of tags.
- Search terms that had issues, due to containing certain delimiters (For example IP addresses), will
  now be auto-converted to become an "exact" search term.
- The regenerate-search command will now report some level of progress to the user as it runs.

Put together, these changes should result in a big overall improvement to the search system and provide
much more accurate results in a format that's easier to read.

### Search API Endpoints

As is common, the API has received new functionality. A "Search" endpoint has been added which allows
you to run queries against items within BookStack using [the same filters and options](/docs/user/searching/)
available when using the main search bar within the interface. 

![Search API Preview](/images/2021/11/search-api.png)

The behavior of this endpoint is a bit quirky compared to others so ensure you
read the documentation carefully if intending to use this.

### Framework Upgrades

As an early part of this release I worked to upgrade our framework from Laravel 6 to Laravel 8.
To help this upgrade I used [Laravel shift](https://laravelshift.com/) to automate much of the busy 
work. Moving to Laravel 8 puts us on the latest release for the first time in quite a while, and means
that we can take advantage of the latest framework features where needed. There won't really be a
noticeable impact to users but it should make development more pleasant while setting us up
to eventually move to the next Laravel long-term-support release.

A big thanks to the Laravel team, especially for their support on the LTS releases which has allowed
us to retain a steady and feasible upgrade path for users in terms of system requirements.

### Translations

Thanks once again to our transcendent translating team. Since the last feature release the 
below members have been doing fantastic work on Crowdin to keep text translated and up-to-date:

- jozefrebjak - *Slovak*
- Indrek Haav (IndrekHaav) - *Estonian*
- Martins Pilsetnieks (pilsetnieks) - *Latvian*
- na3shkw - *Japanese*
- Gerwin de Keijzer (gdekeijzer) - *Dutch*
- m0uch0 - *Spanish*
- nutsflag - *French*
- sulfo - *Danish*
- Michał Lipok (mLipok) - *Polish*
- Raukze - *German*
- Nicolas Pawlak (Mikolajek) - *French; German; Polish*
- zygimantus - *Lithuanian*
- aarchijs - *Latvian*


### Official Twitter & YouTube Channel

Over the last month I've spent a bit of time focusing on some of the higher-level project elements.
As part of this I've set-up an official Twitter account for BookStack: [@bookstack_app](https://twitter.com/bookstack_app). This means you can follow project updates and progress without having to also scroll 
past pictures of my cat.

I've also created a [BookStack YouTube channel](https://www.youtube.com/channel/UCH66RFWfw6CSm2T1EM4ik1g). I mentioned wanting to record some project videos in the "[A Year of BookStack](/blog/1-year-of-bookstack/)" blogpost; 5 years later I've finally started on these.
Currently there's just two videos to guide installation options but more should be coming with improved audio quality.

<iframe width="560" height="315" src="https://www.youtube.com/embed/ShqUjt33uOs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>

<iframe width="560" height="315" src="https://www.youtube.com/embed/dbDzPIv8Cf8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>

### Full List of Changes

**Released in v21.11**

* Added a new tag view. ([#3042](https://github.com/BookStackApp/BookStack/pull/3042), [#738](https://github.com/BookStackApp/BookStack/issues/738))
* Added a wide series of improvements to the search system, including: ([#3043](https://github.com/BookStackApp/BookStack/pull/3043), [#2840](https://github.com/BookStackApp/BookStack/issues/2840))
  * Added highlighting of search terms in search results. ([#1891](https://github.com/BookStackApp/BookStack/issues/1891), [#997](https://github.com/BookStackApp/BookStack/issues/997))
  * Added matching of tag names and values through normal search terms. ([#1577](https://github.com/BookStackApp/BookStack/issues/1577))
* Added search API endpoints. ([#909](https://github.com/BookStackApp/BookStack/issues/909))
* Added new `.env` option to limit file uploads. ([#3033](https://github.com/BookStackApp/BookStack/issues/3033))
* Updated the used Laravel framework from version 6 to version 8. Thanks to @laravel-shift for accelerating this. ([#3012](https://github.com/BookStackApp/BookStack/pull/3012), [#3011](https://github.com/BookStackApp/BookStack/pull/3011))
* Implemented initial use of static analysis for PHP code. ([#3039](https://github.com/BookStackApp/BookStack/pull/3039))
* Updated Slack and Facebook logos to be current. Thanks to [@na3shkw](https://github.com/BookStackApp/BookStack/pull/3032). ([#3032](https://github.com/BookStackApp/BookStack/pull/3032))
* Updated user invite/email-confirmation journeys to help prevent potential malicious user manipulation. Thanks again to @haxatron for reporting.  ([#3050](https://github.com/BookStackApp/BookStack/issues/3050))
* Updated logout endpoints to be POST to prevent potential CSRF concerns. Thanks to @hdvinnie for reporting. ([#3047](https://github.com/BookStackApp/BookStack/issues/3047))
* Updated page include system to retain the `pre` tags when including a code block. ([#2406](https://github.com/BookStackApp/BookStack/issues/2406))
* Updated translations with latest changes from Crowdin. ([#3040](https://github.com/BookStackApp/BookStack/pull/3040))
* Fixed issue where using the back button in the page editor could lead you to the same page. ([#2834](https://github.com/BookStackApp/BookStack/issues/2834))
* Fixed issue where setting new search filters could remove existing created_by & updated_by filters. ([#2736](https://github.com/BookStackApp/BookStack/issues/2736))
* Fixed issue where markdown draft pages could convert to HTML. ([#3054](https://github.com/BookStackApp/BookStack/issues/3054))
* Fixed issue where "Skip to content" link could be visible on print views. ([#3051](https://github.com/BookStackApp/BookStack/issues/3051))

**Released in v21.10.1 through v21.10.3**

* Fixed image upload vulnerability. Thanks to @haxatron ([#3010](https://github.com/BookStackApp/BookStack/issues/3010))
* Fixed capitalization for Estonian language option. Thanks to [@IndrekHaav](https://github.com/BookStackApp/BookStack/pull/3008). ([#3008](https://github.com/BookStackApp/BookStack/pull/3008))
* Updated PHP packages to prevent abandoned warning. ([#3007](https://github.com/BookStackApp/BookStack/issues/3007))
* Updated translations with latest changes from Crowdin. ([#3006](https://github.com/BookStackApp/BookStack/pull/3006), [#3023](https://github.com/BookStackApp/BookStack/pull/3023), [#3014](https://github.com/BookStackApp/BookStack/pull/3014))
* Made further fixes to address image upload vulnerability. Thanks again to @haxatron ([#3019](https://github.com/BookStackApp/BookStack/issues/3019))
* Updated AzureAD login library to work with the new Microsoft Graph API. ([#3028](https://github.com/BookStackApp/BookStack/issues/3028))
* Fixed path image file path traversal vulnerability. Thanks @theworstcomrade for reporting. ([#3030](https://github.com/BookStackApp/BookStack/issues/3030))
* Prevented HTML attachments being served inline. Thanks @theworstcomrade for reporting. ([#3027](https://github.com/BookStackApp/BookStack/issues/3027))

### Next Steps

Within the latter stage of the v21.11 I went through some of the older issues in the project
to address them if still relevant. I'll probably continue that work to produce a few 
patch releases.

As mentioned above I'm intending to produce more videos for [the BookStack YouTube channel](https://www.youtube.com/channel/UCH66RFWfw6CSm2T1EM4ik1g).
Will work on these in times when I want to do something a bit more creative.

In terms of larger features, I'll start getting deeper into
[assessing a new page editor](https://github.com/BookStackApp/BookStack/issues/2738)
which takes us to the next major project roadmap milestone.


----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@sebastian_unrau?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Sebastian Unrau</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>