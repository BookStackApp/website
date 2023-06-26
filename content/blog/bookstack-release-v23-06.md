+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.06"
date = 2023-06-26T18:26:51Z
author = "Dan Brown"
image = "/images/blog-cover-images/cows-field-loriane-magnenat.webp"
slug = "bookstack-release-v23-06"
draft = false
+++

Intro TODO

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.06)


**Upgrade Notices**

TODO

- **Title** - Detail

TODO - Video

### New Feature A

TODO

### Translations

TODO

- Username - *Language*

### Next Steps

TODO

### Other Updates

TODO?

### Full List of Changes

**Released in v23.06**

TODO - Below have not yet been cleaned

* Make MAIL_ENCRYPTION variable less confusing. ([#4342](https://github.com/BookStackApp/BookStack/issues/4342))
* Sorting by name in the shelf is case sensitive. ([#4341](https://github.com/BookStackApp/BookStack/issues/4341))
* API Docs: Allowed multi-paragraph descriptions. ([#4332](https://github.com/BookStackApp/BookStack/pull/4332))
* Creation date/time retrieved by Users-LIST API is incorrect. ([#4325](https://github.com/BookStackApp/BookStack/issues/4325))
* Content-Permissions API parameter combination behavior. ([#4323](https://github.com/BookStackApp/BookStack/issues/4323))
* Added read-only comments listing into page editor. ([#4322](https://github.com/BookStackApp/BookStack/pull/4322))
* Change JsonDebugException to Responsable interface. Thanks to [@devdot](https://github.com/BookStackApp/BookStack/pull/4318). ([#4318](https://github.com/BookStackApp/BookStack/pull/4318))
* Add a field to the API endpoint /api/pages/{id} to get the raw html. ([#4310](https://github.com/BookStackApp/BookStack/issues/4310))
* Monospace font customization. ([#4307](https://github.com/BookStackApp/BookStack/issues/4307))
* CSS: Clean up page-content and export style files. ([#4303](https://github.com/BookStackApp/BookStack/issues/4303))
* CSS: Extract fonts to CSS variables. ([#4302](https://github.com/BookStackApp/BookStack/issues/4302))
* CSS: Updated status colors to be CSS variables, Added dark variants. ([#4301](https://github.com/BookStackApp/BookStack/pull/4301))
* Time is not displayed for the Romanian language. ([#4297](https://github.com/BookStackApp/BookStack/issues/4297))
* The format of the date and time returned by the Image Gallery API is different from other APIs. ([#4294](https://github.com/BookStackApp/BookStack/issues/4294))
* API returns HTTP 500 instead of 404 on not found. ([#4290](https://github.com/BookStackApp/BookStack/issues/4290))
* Comment threads. ([#4286](https://github.com/BookStackApp/BookStack/pull/4286))
* Update `ldap_connect` usage to avoid deprecated syntax. ([#4274](https://github.com/BookStackApp/BookStack/issues/4274))
* API updating book_id on chapter not working. ([#4272](https://github.com/BookStackApp/BookStack/issues/4272))
* Enhanced Responsive Image Manager. ([#4265](https://github.com/BookStackApp/BookStack/pull/4265))
* Display parent of container when moving an object. ([#4264](https://github.com/BookStackApp/BookStack/issues/4264))
* Command cleanup & alignment. ([#4262](https://github.com/BookStackApp/BookStack/pull/4262))
* Updated translations with latest Crowdin changes. ([#4256](https://github.com/BookStackApp/BookStack/pull/4256))
* Clean up command classes. ([#4225](https://github.com/BookStackApp/BookStack/issues/4225))
* Translatation is missing for specific notifications in webhooks. ([#4216](https://github.com/BookStackApp/BookStack/issues/4216))
* Provide a way for blind users to retrieve a page permalink. ([#3975](https://github.com/BookStackApp/BookStack/issues/3975))
* Discard Draft does not delete draft. ([#3927](https://github.com/BookStackApp/BookStack/issues/3927))
* Thread-like comment. ([#3400](https://github.com/BookStackApp/BookStack/issues/3400))
* Unexpected behaviour with shelf create permissions. ([#2690](https://github.com/BookStackApp/BookStack/issues/2690))
* Guest only accepts custom permissions from role Public. ([#1229](https://github.com/BookStackApp/BookStack/issues/1229))

**Released in v23.05.2**

* Updated view-only code block line highlighting to only show on focus. ([#4254](https://github.com/BookStackApp/BookStack/pull/4254))
* Updated System CLI. ([#4252](https://github.com/BookStackApp/BookStack/pull/4252))
  * Fixed issues regarding symlinked folders for backup and restore.
  * Fixed incorrect app directory searching.
* Updated image/attachment file upload buttons to allow selection of multiple files. ([#4241](https://github.com/BookStackApp/BookStack/issues/4241))
* Updated translations with latest Crowdin changes. ([#4239](https://github.com/BookStackApp/BookStack/pull/4239))
* Updated attachment drag handling so they can be dragged via their name/link. ([#591](https://github.com/BookStackApp/BookStack/issues/591))

**Released in v23.05.1**


* Updated system CLI. ([#4229](https://github.com/BookStackApp/BookStack/pull/4229))
    - Fixed wrong env details being used on restore.
    - Updated update-url on restore to actually work.
    - Added better support for symlink-ed locations.
    - Added warning against updating in docker-like (non git controlled) environments.
* Updated "update-url" command to allow running non-interactively. ([#4223](https://github.com/BookStackApp/BookStack/issues/4223))
* Updated translations with latest Crowdin changes. ([#4211](https://github.com/BookStackApp/BookStack/pull/4211))
* Updated WYSWIYG code editor focus handling to more accurately return to editor. ([#4109](https://github.com/BookStackApp/BookStack/issues/4109))
* Fixed code block formatting in print/export views. ([#4215](https://github.com/BookStackApp/BookStack/issues/4215))
* Fixed extra spacing being added around horizontal rules within collapsible blocks within the WYSIWYG editor. ([#3963](https://github.com/BookStackApp/BookStack/issues/3963))
* Fixed "Custom HTML Head Content" style blocks not being used for code blocks within the WYSWIYG editor. ([#4228](https://github.com/BookStackApp/BookStack/issues/4228))
* Fixed UI shortcuts being incorrectly active within code blocks. ([#4227](https://github.com/BookStackApp/BookStack/issues/4227))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@loriane_photography?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Loriane Magnenat</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>