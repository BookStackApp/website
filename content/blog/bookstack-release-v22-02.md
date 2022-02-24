+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.02"
date = 2022-02-24T17:21:57Z
author = "Dan Brown"
image = "/images/blog-cover-images/blossom-tegethoff.jpg"
slug = "bookstack-release-v22-02"
draft = false
+++

Intro TODO

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.02)


Important Notes
TODO PHP version change, 7.3 to 7.4
TODO composer version requirement change from v21.12.3
TODO v21.12.1 security release


### WYSIWYG Editor Updates


### Collapsible Content Block WYSIWYG Editor Support


TODO: Note about markdown syntax

### User Management API Endpoints

TODO

### Webhook Improvements

TODO v21.12.1 - Timeout and debugging statuses
TODO v21.12.1 - webhook_call_before logical theme system event

### Language Selection on User Creation

TODO - v21.12.4

### PDF Export Page Size Option

TODO - v21.12.4

### Enhancements to the "Recently Updated Pages" List

TODO v21.12.3 Updated-by, updated at details, Thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3177)
TODO v21.12.3 Parent context visibility

### Translations

TODO

### Development Branch Changes

TODO

### Full List of Changes

**Released in v22.02**

* Added collapsible content blocks support to the WYSIWYG editor. ([#78](https://github.com/BookStackApp/BookStack/issues/78), [#3260](https://github.com/BookStackApp/BookStack/pull/3260))
* Added translation support to the WYSIWYG editor. ([#1838](https://github.com/BookStackApp/BookStack/issues/1838))
* Added user management API endpoints. ([#3238](https://github.com/BookStackApp/BookStack/pull/3238), [#1363](https://github.com/BookStackApp/BookStack/issues/1363), [#2701](https://github.com/BookStackApp/BookStack/issues/2701))
* Changed minimum PHP version from 7.3 to 7.4. ([#3245](https://github.com/BookStackApp/BookStack/pull/3245), [#3152](https://github.com/BookStackApp/BookStack/issues/3152))
* Updated translations with latest Crowdin changes. ([#3258](https://github.com/BookStackApp/BookStack/pull/3258), [#3251](https://github.com/BookStackApp/BookStack/pull/3251))
* Updated Korean translations. Thanks to [@ististyle](https://github.com/BookStackApp/BookStack/pull/3256). ([#3256](https://github.com/BookStackApp/BookStack/pull/3256))
* Updated TinyMCE WYSIWYG editor to the latest version. ([#3247](https://github.com/BookStackApp/BookStack/pull/3247))
* Improved PDF export rendering of images within tables. ([#3190](https://github.com/BookStackApp/BookStack/issues/3190))
* Fixed potential web console error message when loading the editor. ([#2461](https://github.com/BookStackApp/BookStack/issues/2461))
* Fixed issue where OIDC token failures would not be shown to the user. ([#3264](https://github.com/BookStackApp/BookStack/issues/3264))

**Released in v21.12.1 through v21.12.5**

* Added timeout and debugging statuses to webhooks. ([#3139](https://github.com/BookStackApp/BookStack/pull/3139))
* Added new webhook_call_before logical theme system event hook. ([#3138](https://github.com/BookStackApp/BookStack/pull/3138))
* Added `--external-auth-id` option to the `bookstack:create-admin` command for use with LDAP/SAML2/OIDC instances. ([#3222](https://github.com/BookStackApp/BookStack/issues/3222))
* Added the ability select preferred language when creating a new user. ([#2408](https://github.com/BookStackApp/BookStack/issues/2408), [#2576](https://github.com/BookStackApp/BookStack/issues/2576))
* Added configuration option for PDF export page size. ([#995](https://github.com/BookStackApp/BookStack/issues/995))
* Added text for "file" validation messages to provide better responses in Attachment API validation failures. ([#3248](https://github.com/BookStackApp/BookStack/issues/3248))
* Improved handling of uploaded images when thumbnails fail to load. ([#3142](https://github.com/BookStackApp/BookStack/issues/3142))
* Updated support for APNG images to retain animation. ([#3136](https://github.com/BookStackApp/BookStack/issues/3136))
* Updated book sort and chapter move handling to enforce more permissions. ([#3134](https://github.com/BookStackApp/BookStack/issues/3134))
* Updated item-search/select box to autofocus on search field. ([#3127](https://github.com/BookStackApp/BookStack/issues/3127))
* Updated webhooks to not stop application on endpoint call failure. ([#3122](https://github.com/BookStackApp/BookStack/issues/3122))
* Updated translations with latest Crowdin changes. ([#3117](https://github.com/BookStackApp/BookStack/pull/3117),[#3148](https://github.com/BookStackApp/BookStack/pull/3148),[#3214](https://github.com/BookStackApp/BookStack/pull/3214),[#3225](https://github.com/BookStackApp/BookStack/pull/3225),[#3158](https://github.com/BookStackApp/BookStack/pull/3158))
* Updated development docker environment with xdebug support. Thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3193). ([#3193](https://github.com/BookStackApp/BookStack/pull/3193))
* Updated user creation flow to not persist the user on invitation sending failure. Thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3179). ([#3179](https://github.com/BookStackApp/BookStack/pull/3179), [#3174](https://github.com/BookStackApp/BookStack/issues/3174))
* Updated "Recently Updated Pages" view to show update author and date. Thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3177). ([#3177](https://github.com/BookStackApp/BookStack/pull/3177), [#3045](https://github.com/BookStackApp/BookStack/issues/3045))
* Updated PDF page export image display to help fix image sizing issues again. ([#3120](https://github.com/BookStackApp/BookStack/issues/3120))
* Updated "Recently Updated Pages" view to show parent context chain. ([#3183](https://github.com/BookStackApp/BookStack/issues/3183))
* Updated 503 error view to simplify and prevent thrown errors. Thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3210). ([#3210](https://github.com/BookStackApp/BookStack/pull/3210), [#3205](https://github.com/BookStackApp/BookStack/issues/3205))
* Fixed WYSIWYG editor code block creation across mulitple lines and block elements. Thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3246). ([#3246](https://github.com/BookStackApp/BookStack/pull/3246), [#3200](https://github.com/BookStackApp/BookStack/issues/3200))
* Fixed markdown image data URI extraction failing on large images due to regex match limits. ([#3249](https://github.com/BookStackApp/BookStack/issues/3249))
* Fixed mis-represented default registration role and allowed disabling of this option. ([#3220](https://github.com/BookStackApp/BookStack/issues/3220), [#2338](https://github.com/BookStackApp/BookStack/issues/2338))
* Fixed OIDC autodiscovery when keys are provided in a certain format, as provided by Azure. ([#3206](https://github.com/BookStackApp/BookStack/issues/3206))
* Fixed potential errors in revision diff view when multi-byte characters are used. ([#3170](https://github.com/BookStackApp/BookStack/issues/3170))
* Fixed duplicate display in image gallery when uploading multiple images at once. ([#3160](https://github.com/BookStackApp/BookStack/issues/3160))
* Fixed inaccurate markdown editor cursor position upon sidebar usage. ([#3186](https://github.com/BookStackApp/BookStack/issues/3186))
* Fixed issue where webhooks would error for specific recycle bin operations. ([#3154](https://github.com/BookStackApp/BookStack/issues/3154))
* Fixed Spanish invite email subject translation. Thanks to [@AitorMatxi](https://github.com/BookStackApp/BookStack/pull/3153). ([#3153](https://github.com/BookStackApp/BookStack/pull/3153))
* Fixed issue where custom homepage could cause strange deletion behavior and lead to errors. ([#3150](https://github.com/BookStackApp/BookStack/issues/3150))
* Fixed webhooks list view issue where columns would become to narrow. ([#3135](https://github.com/BookStackApp/BookStack/issues/3135))
* Fixed linked images showing small in PDF export. ([#3120](https://github.com/BookStackApp/BookStack/issues/3120))
* Fixed issue where pasting certain code blocks would cause erratic editor behavior. ([#3133](https://github.com/BookStackApp/BookStack/issues/3133))
* Development change: The default development branch name is now `development` instead of `master`. ([#3195](https://github.com/BookStackApp/BookStack/issues/3195))

### Next Steps

TODO

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@tegethoff?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Mark Tegethoff</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>