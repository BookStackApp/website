+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.05"
date = 2023-05-02T11:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/bird-ray-hennessy.jpg"
slug = "bookstack-release-v23-05"
draft = false
+++

BookStack v23.05 releases today, sneaking into the start of May with a
bunch of additions, updates and changes including a new command line tool
to help with admin operations. 

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.05)

**Upgrade Notices**

- **TODO** - TODO

TODO - Video Link

### New System CLI (Early Alpha)

TODO

### New File Upload Handling

TODO

### Code Block Updating to CodeMirror 6

TODO

### API Updates - Image Gallery & Content Permissions

TODO

### Nested Include Tags

TODO

### Clojure Code Syntax Highlighting

TODO

### OIDC ID Token Logical Theme Event

TODO

### JavaScript Codebase & Public (Editor) Events

TODO - Formatting and public events doc

### Disable SMTP SSL Verification Option

TODO

### Translations

TODO

- Name - *Lang*


### Next Steps

TODO

### Full List of Changes

**Released in v23.05**

* Added system CLI for admin operations. ([#4206](https://github.com/BookStackApp/BookStack/pull/4206), [#3149](https://github.com/BookStackApp/BookStack/issues/3149))
* Added image gallery API Endpoints. ([#4103](https://github.com/BookStackApp/BookStack/pull/4103))
* Added content permission API endpoints. ([#2702](https://github.com/BookStackApp/BookStack/issues/2702), [#4099](https://github.com/BookStackApp/BookStack/pull/4099))
* Added new logical theme event to customize OIDC ID token data. ([#4200](https://github.com/BookStackApp/BookStack/issues/4200))
* Added Clojure syntax highlighting for code blocks. ([#4112](https://github.com/BookStackApp/BookStack/issues/4112))
* Added option to disable SSL verification with SMTP email sending. Thanks to [@vincentbernat](https://github.com/BookStackApp/BookStack/pull/4126). ([#4126](https://github.com/BookStackApp/BookStack/pull/4126), [#3166](https://github.com/BookStackApp/BookStack/issues/3166))
* Added support for three-levels of nested include tags. Thanks to [@jasonF1000](https://github.com/BookStackApp/BookStack/pull/4192). ([#4192](https://github.com/BookStackApp/BookStack/pull/4192), [#2845](https://github.com/BookStackApp/BookStack/issues/2845))
* Added detailed documentation for public JS events. ([#4179](https://github.com/BookStackApp/BookStack/issues/4179))
* Added standard JS codebase formatting via ESLint. ([#4181](https://github.com/BookStackApp/BookStack/pull/4181), [#4180](https://github.com/BookStackApp/BookStack/issues/4180))
* Updated code blocks & markdown editor to CodeMirror 6. ([#3617](https://github.com/BookStackApp/BookStack/pull/3617), https://github.com/BookStackApp/BookStack/issues/3518))
* Updated file upload handling for images and attachments. ([#4193](https://github.com/BookStackApp/BookStack/pull/4193))
* Updated SAML2 SLO requests to include a session index. ([#3936](https://github.com/BookStackApp/BookStack/issues/3936))
* Updated translations with latest Crowdin changes. ([#4163](https://github.com/BookStackApp/BookStack/pull/4163))
* Fixed audit log type filter leading to wrong location. ([#4201](https://github.com/BookStackApp/BookStack/issues/4201))
* Fixed large videos within content escaping content area. Thanks to [@chopin2712](https://github.com/BookStackApp/BookStack/pull/4204). ([#4204](https://github.com/BookStackApp/BookStack/pull/4204))
* Fixed missing WKHTMLTOPDF in .env.example.complete file. Thanks to [@7nohe](https://github.com/BookStackApp/BookStack/pull/4145). ([#4145](https://github.com/BookStackApp/BookStack/pull/4145))
* Fixed not being able to search for terms containing backslashes . Thanks to [@esakkiraja100116](https://github.com/BookStackApp/BookStack/pull/4202). ([#4202](https://github.com/BookStackApp/BookStack/pull/4202), [#4175](https://github.com/BookStackApp/BookStack/issues/4175))
* Fixed timestamp in API docs example chapter response. Thanks to [@tigsikram](https://github.com/BookStackApp/BookStack/pull/4191). ([#4191](https://github.com/BookStackApp/BookStack/pull/4191))

**Released in v23.02.3**

* Fixed issue where user delete fails when no "migration" user is selected. ([#4162](https://github.com/BookStackApp/BookStack/issues/4162))
* Fixed tag selection via mouse on Safari. ([#4139](https://github.com/BookStackApp/BookStack/issues/4139))
* Updated translations with latest Crowdin changes. ([#4131](https://github.com/BookStackApp/BookStack/pull/4131))

**Released in v23.02.2**

* Fixed role deletion failing when submitting with empty migration role. ([#4128](https://github.com/BookStackApp/BookStack/issues/4128))
* Fixed ownership migration upon user delete not working. ([#4124](https://github.com/BookStackApp/BookStack/issues/4124))
* Updated translations with latest Crowdin changes. ([#4074](https://github.com/BookStackApp/BookStack/pull/4074))

**Released in v23.02.1**

* Fixed an issue with language loading in certain scenarios. ([#4068](https://github.com/BookStackApp/BookStack/issues/4068))
* Updated translations with latest Crowdin changes. ([#4066](https://github.com/BookStackApp/BookStack/pull/4066))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@rayhennessy?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Ray Hennessy</a> on <a href="https://unsplash.com/photos/Hk6W46UGWRg?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>