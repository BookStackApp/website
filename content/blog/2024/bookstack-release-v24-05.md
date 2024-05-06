+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v24.05"
date = 2024-05-10T13:36:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-sa-3/seven-sisters-cliffs-david-iliff.jpg"
slug = "bookstack-release-v24-05"
draft = false
+++

Todo

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v24.05)

**Upgrade Notices**

Todo

- **Item** - Note

TODO - Video
<!-- {{<pt 8w3F4aWqH3MProMwyQBf2d>}} -->

### Feature

TODO


### Translations

TODO

- Name - *LAng - x words*

*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

Todo

### Full List of Changes

**Released in v24.05**

* Updated app framework from Laravel 9 to 10. ([#4903](https://github.com/BookStackApp/BookStack/pull/4903))
* Added new command-based PDF export option. ([#4969](https://github.com/BookStackApp/BookStack/pull/4969), [#4732](https://github.com/BookStackApp/BookStack/issues/4732))
* Added Audit Log API list endpoint. ([#4987](https://github.com/BookStackApp/BookStack/pull/4987), [#4316](https://github.com/BookStackApp/BookStack/issues/4316))
* Added LDAP option to provide a custom CA cert. Thanks to [@mmoore2012](https://github.com/BookStackApp/BookStack/pull/4913). ([#4985](https://github.com/BookStackApp/BookStack/pull/4985), [#4913](https://github.com/BookStackApp/BookStack/pull/4913))
* Added OIDC userinfo endpoint support. Thanks to [@LukeShu](https://github.com/BookStackApp/BookStack/pull/4726). ([#4955](https://github.com/BookStackApp/BookStack/pull/4955), [#4726](https://github.com/BookStackApp/BookStack/pull/4726), [#3873](https://github.com/BookStackApp/BookStack/issues/3873))
* Added simple registration form honeypot. Thanks to [@nesges](https://github.com/BookStackApp/BookStack/pull/4970). ([#4970](https://github.com/BookStackApp/BookStack/pull/4970))
* Added Scala to list of supported languages in code blocks. ([#4953](https://github.com/BookStackApp/BookStack/issues/4953))
* Updated content links to be underlined by default for accessibility. ([#4939](https://github.com/BookStackApp/BookStack/issues/4939))
* Updated dev Dockerfile with improvements. Thanks to [@C0rn3j](https://github.com/BookStackApp/BookStack/pull/4895). ([#4895](https://github.com/BookStackApp/BookStack/pull/4895))
* Updated included images with extra compression to save data. Thanks to [@C0rn3j](https://github.com/BookStackApp/BookStack/pull/4904). ([#4904](https://github.com/BookStackApp/BookStack/pull/4904))
* Updated JS build system to split markdown-focused packages to own file. ([#4930](https://github.com/BookStackApp/BookStack/pull/4930), [#4858](https://github.com/BookStackApp/BookStack/issues/4858))
* Updated LDAP user filter option to support new placeholder format. ([#4967](https://github.com/BookStackApp/BookStack/issues/4967))
* Updated minimum required PHP version from 8.0 to 8.1. ([#4894](https://github.com/BookStackApp/BookStack/pull/4894), [#4893](https://github.com/BookStackApp/BookStack/issues/4893))
* Updated translations with latest Crowdin changes. ([#4890](https://github.com/BookStackApp/BookStack/pull/4890))
* Fixed code direction in WYSWIYG editor lacking direction support in code editor. ([#4943](https://github.com/BookStackApp/BookStack/issues/4943))
* Fixed difference of line-heights for paragraphs in tables between editor and page view. ([#4960](https://github.com/BookStackApp/BookStack/issues/4960))
* Fixed extra space at the beginning of a translation. Thanks to [@johnroyer](https://github.com/BookStackApp/BookStack/pull/4972). ([#4972](https://github.com/BookStackApp/BookStack/pull/4972))
* Fixed failing drag and drop of attachments into editor on Chrome. ([#4975](https://github.com/BookStackApp/BookStack/issues/4975))
* Fixed incorrect tag counts when tagged items are in the recycle bin. ([#4892](https://github.com/BookStackApp/BookStack/issues/4892))
* Fixed WYSIWYG object embeds in the editor showing image toolbar button. ([#4974](https://github.com/BookStackApp/BookStack/issues/4974))
* Fixed WYSIWYG table cell format handling which could clear styles unexpectedly. ([#4964](https://github.com/BookStackApp/BookStack/issues/4964))

**Released in v24.02.3**

* Fixed non-working "Open Link In..." option for description editors. ([#4925](https://github.com/BookStackApp/BookStack/issues/4925))
* Fixed failed reference loading when references are from recycle bin items. ([#4918](https://github.com/BookStackApp/BookStack/issues/4918))
* Fixed failed code block rendering when a code language was not set. ([#4917](https://github.com/BookStackApp/BookStack/issues/4917))
* Updated page editor max content widths to align with page display.  ([#4916](https://github.com/BookStackApp/BookStack/issues/4916))

**Released in v24.02.2**

* New version to address missed version and asset changes in v24.02.1. ([#4889](https://github.com/BookStackApp/BookStack/issues/4889))

**Released in v24.02.1**

* Updated translations with latest Crowdin changes. ([#4877](https://github.com/BookStackApp/BookStack/pull/4877))
* Updated breadcrumb book & shelf lists to be name-ordered. ([#4876](https://github.com/BookStackApp/BookStack/issues/4876))
* Updated MFA inputs to avoid auto-complete. Thanks to [@ImMattic](https://github.com/BookStackApp/BookStack/pull/4849). ([#4849](https://github.com/BookStackApp/BookStack/pull/4849))
* Fixed non-breaking spaces causing combined words in page navigation. ([#4836](https://github.com/BookStackApp/BookStack/issues/4836))
* Fixed page navigation click not jumping to headers in nested collapsible blocks. ([#4878](https://github.com/BookStackApp/BookStack/issues/4878))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://commons.wikimedia.org/wiki/File:Seven_Sisters_Panorama,_East_Sussex,_England_-_May_2009.jpg">David Iliff (CC-BY-SA-3)</a> - Image Modified</span></span>