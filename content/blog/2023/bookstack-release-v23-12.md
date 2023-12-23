+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.12"
date = 2023-12-28T11:43:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-sa-4/mountains-milan-bališin.jpg"
slug = "bookstack-release-v23-12"
draft = false
+++

As a little Christmas-time treat we have BookStack v23.12 slipping in as the last
release of the year. This release focuses on providing a simple WYSIWYG editor 
for description inputs and default page templates within books, among some other additional gifts.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.12)

**Upgrade Notices**

- **Page Includes** - The way page include content is fetched & merged has changed significantly in this release,
   which may in some cases alter how included content appears on the page.
- **Prior Security Release** - Prior version v23.10.3 was a security release. If you missed this before, further details about that [can be found here](/blog/bookstack-release-v23-10-3/).

Video - TODO
<!-- {{<pt 4YtVndveEVE6GuuGPV3Yn1>}} -->

### WYSIWYG Description Field Editor

TODO

### Default Template For New Book Pages

TODO
Thanks to [@lennertdaniels](https://github.com/BookStackApp/BookStack/pull/3918).

### OIDC RP-Initated Logout

TODO
Thanks to [@joancyho](https://github.com/BookStackApp/BookStack/pull/4467)

### Page Context in Email Notifications

TODO
Thanks to [@Man-in-Black](https://github.com/BookStackApp/BookStack/pull/4629).

### Friendlier Buttons

TODO

### Logical Theme System Event to Register Routes

TODO

### Rebuilt Page Include Engine

TODO

### Translations

TODO

- User - *Language - x words*

*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

TODO

### Full List of Changes

**Released in v23.12**

* Added simple WYSIWYG for description fields. ([#4729](https://github.com/BookStackApp/BookStack/pull/4729), [#2354](https://github.com/BookStackApp/BookStack/issues/2354), [#2203](https://github.com/BookStackApp/BookStack/issues/2203))
* Added default template option for books. Thanks to [@lennertdaniels](https://github.com/BookStackApp/BookStack/pull/3918). ([#4721](https://github.com/BookStackApp/BookStack/pull/4721), [#3918](https://github.com/BookStackApp/BookStack/pull/3918), [#1803](https://github.com/BookStackApp/BookStack/issues/1803))
* Added OIDC RP-initiated logout. Thanks to [@joancyho](https://github.com/BookStackApp/BookStack/pull/4467). ([#4714](https://github.com/BookStackApp/BookStack/pull/4714), [#4467](https://github.com/BookStackApp/BookStack/pull/4467), [#3715](https://github.com/BookStackApp/BookStack/issues/3715))
* Added new Logical Theme System event to register web routes. ([#4663](https://github.com/BookStackApp/BookStack/issues/4663))
* Updated email notifications to include the page parent chapter/book. Thanks to [@Man-in-Black](https://github.com/BookStackApp/BookStack/pull/4629). ([#4629](https://github.com/BookStackApp/BookStack/pull/4629))
* Updated and standardised DOM handling in the codebase. ([#4673](https://github.com/BookStackApp/BookStack/pull/4673))
* Updated back redirection handling to not rely on referrer headers. ([#4656](https://github.com/BookStackApp/BookStack/issues/4656))
* Updated book/chapter/shelf description character limit. ([#4085](https://github.com/BookStackApp/BookStack/issues/4085))
* Updated design of buttons to be a bit friendlier. ([#4728](https://github.com/BookStackApp/BookStack/pull/4728))
* Updated HTML exporting with better RTL handling. ([#4645](https://github.com/BookStackApp/BookStack/issues/4645))
* Updated include tag handling to be structure/DOM aware. ([#4688](https://github.com/BookStackApp/BookStack/pull/4688))
* Updated SAML2 dump debug option to include group parsing details. ([#4706](https://github.com/BookStackApp/BookStack/issues/4706))
* Updated translations with latest Crowdin changes. ([#4658](https://github.com/BookStackApp/BookStack/pull/4658))
* Updated WYSIWYG editor to allow video/embed alignment controls. ([#4727](https://github.com/BookStackApp/BookStack/pull/4727), [#3378](https://github.com/BookStackApp/BookStack/issues/3378))
* Updated WYSIWYG library TinyMCE from 6.5.1 to 6.7.2. ([#4661](https://github.com/BookStackApp/BookStack/pull/4661))
* Fixed extra paragraphs & invalid syntax when using page includes. ([#3385](https://github.com/BookStackApp/BookStack/issues/3385))
* Fixed lack of user invite via the API in certain cases. ([#4720](https://github.com/BookStackApp/BookStack/issues/4720))
* Fixed page includes leading to duplicate IDs. ([#3982](https://github.com/BookStackApp/BookStack/issues/3982))
* Fixed permission generation failure with large amounts of content. ([#4695](https://github.com/BookStackApp/BookStack/issues/4695))
* Fixed PHP mbstring deprecation warnings. ([#4638](https://github.com/BookStackApp/BookStack/issues/4638))
* Fixed SAML2 Single Logout (SLO) not invalidating session at point defined by the spec. ([#4713](https://github.com/BookStackApp/BookStack/issues/4713))

**Released in v23.10.4**

This was simply a follow-up of v23.10.3 to fix the app version number.

**Released in v23.10.3**

* Updated thumbnail handling to fix use of content as image data. ([#4681](https://github.com/BookStackApp/BookStack/pull/4681))

**Released in v23.10.2**

* Fixed incorrect audit log dropdown behaviour. ([#4652](https://github.com/BookStackApp/BookStack/issues/4652))
* Fixed redirects to the manfiest endpoint in some environments. ([#4649](https://github.com/BookStackApp/BookStack/issues/4649))
* Updated translations with latest Crowdin changes. ([#4643](https://github.com/BookStackApp/BookStack/pull/4643))

**Released in v23.10.1**

* Added "Norwegian Nynorsk" to user language options.
* Added JavaScript public event for customizing codemirror instances. ([#4639](https://github.com/BookStackApp/BookStack/issues/4639))
* Added handling to allow jumping to headers/sections within collapsible sections. ([#4637](https://github.com/BookStackApp/BookStack/issues/4637))
* Added PHP 8.3 support. ([#4633](https://github.com/BookStackApp/BookStack/issues/4633))
* Updated translations with latest Crowdin changes. ([#4631](https://github.com/BookStackApp/BookStack/pull/4631))
* Fixed header bar peeking through on markdown editor fullscreen mode. ([#4641](https://github.com/BookStackApp/BookStack/issues/4641))
* Fixed incorrect color usage for editor toolbox active tabs. ([#4630](https://github.com/BookStackApp/BookStack/issues/4630))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://commons.wikimedia.org/wiki/File:Min%C4%8Dol_(vrch_v_%C4%8Cergove)_08.JPG">Milan Bališin (CC-BY-SA-4)</a> - Image Modified</span></span>