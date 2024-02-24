+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v24.02"
date = 2024-02-29T12:10:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-sa-2/burnieside-steven-brown.jpg"
slug = "bookstack-release-v24-12"
draft = false
+++

Intro

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v24.02)

**Upgrade Notices**

- **Notice** - Text

TODO - Video
<!-- {{<pt 4gCUZhHumJDLTtSbGQzXzU>}} -->

### Simple WYSIWYG comment editor

TODO

### Default Page Templates for Chapters

TODO

Thanks to [@Man-in-Black](https://github.com/BookStackApp/BookStack/pull/4750).

### WYSIWYG Table Improvements

TODO

### Improved Video Attachment Support

TODO

### OIDC PKCE Support

TODO

### Auth Pre-Register Logical Theme Event

TODO

### Back-end changes

TODO

- Query changes
- Redirect handling

### Translations

TODO

- Name - *Language - x words*


*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

TODO

### Full List of Changes

**Released in v24.02**

* Added simple WYSIWYG comment editor inputs. ([#4815](https://github.com/BookStackApp/BookStack/pull/4815), [#3018](https://github.com/BookStackApp/BookStack/issues/3018))
* Added default page templates for chapters. Thanks to [@Man-in-Black](https://github.com/BookStackApp/BookStack/pull/4750). ([#4750](https://github.com/BookStackApp/BookStack/pull/4750), [#4764](https://github.com/BookStackApp/BookStack/issues/4764))
* Added PKCE support for OIDC. ([#4804](https://github.com/BookStackApp/BookStack/pull/4804), [#4734](https://github.com/BookStackApp/BookStack/issues/4734))
* Added "Clear table formatting" & "Resize to contents" WYSIWYG table options. ([#4845](https://github.com/BookStackApp/BookStack/issues/4845))
* Added "Toggle header row" button to table toolbar in WYSWIYG editor. ([#985](https://github.com/BookStackApp/BookStack/issues/985))
* Added attachment serving range request support. ([#4758](https://github.com/BookStackApp/BookStack/pull/4758), [#3274](https://github.com/BookStackApp/BookStack/issues/3274))
* Added new `AUTH_PRE_REGISTER` logical theme event. ([#4833](https://github.com/BookStackApp/BookStack/issues/4833))
* Updated app entity loading to be more efficient and avoid global addSelects. ([#4827](https://github.com/BookStackApp/BookStack/pull/4827), [#4823](https://github.com/BookStackApp/BookStack/issues/4823))
* Updated book/shelf cover image wording to make sizing in usage clearer. ([#4748](https://github.com/BookStackApp/BookStack/issues/4748))
* Updated PWA manifest to allow landscape use. Thanks to [@shashinma](https://github.com/BookStackApp/BookStack/pull/4828). ([#4828](https://github.com/BookStackApp/BookStack/pull/4828))
* Updated redirect handling to reduce chance of redirecting to images. ([#4863](https://github.com/BookStackApp/BookStack/issues/4863))
* Updated some EN text for consistency/readability. ([#4794](https://github.com/BookStackApp/BookStack/pull/4794))
* Updated WYSIWYG editor with improved cell selection formatting clearing. ([#4850](https://github.com/BookStackApp/BookStack/pull/4850))
* Updated WYSIWYG text direction & alignment controls to work more reliably on complex structures. ([#4843](https://github.com/BookStackApp/BookStack/issues/4843))
* Fixed breadcrumb dropdowns being partly out of view on mobile screen sizes. ([#4824](https://github.com/BookStackApp/BookStack/issues/4824))
* Fixed description WYSIWYG not respecting RTL text. ([#4810](https://github.com/BookStackApp/BookStack/issues/4810))
* Fixed header bar collapse on smaller screen sizes when when no name or logo is used. ([#4841](https://github.com/BookStackApp/BookStack/issues/4841))
* Fixed incorrect pagination display in RTL layout. ([#4808](https://github.com/BookStackApp/BookStack/issues/4808))
* Fixed JavaScript error logged on WYSIWYG editor load due to how custom styles were imported. ([#4814](https://github.com/BookStackApp/BookStack/issues/4814))
* Fixed scrollbars showing on WYSIWYG table cell range selection in some browsers. ([#4844](https://github.com/BookStackApp/BookStack/issues/4844))
* Fixed WYSIWYG code block text direction controls not being respected. ([#4809](https://github.com/BookStackApp/BookStack/issues/4809))

**Released in v23.12.3**

TODO

**Released in v23.12.2**

* Fixed attachment list ctrl-click not opening attachments inline. ([#4782](https://github.com/BookStackApp/BookStack/issues/4782))
* Updated translations with latest Crowdin changes. ([#4779](https://github.com/BookStackApp/BookStack/pull/4779))
* Fixed entity selector popup pre-fill not searching term as expected. ([#4778](https://github.com/BookStackApp/BookStack/issues/4778))

**Released in v23.12.1**

* Fixed chapter API missing expected "book_slug" field. ([#4765](https://github.com/BookStackApp/BookStack/issues/4765))
* Updated translations with latest Crowdin changes. ([#4747](https://github.com/BookStackApp/BookStack/pull/4747))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://www.geograph.org.uk/photo/7714511">Steven Brown (CC-BY-SA-2)</a> - Image Modified</span></span>