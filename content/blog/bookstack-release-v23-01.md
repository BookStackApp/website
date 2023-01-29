+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.01"
date = 2023-01-31T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/snow-doggo-tadeusz-lakota.jpg"
slug = "bookstack-release-v23-01"
draft = false
+++

TODO - Intro

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.01)

**Upgrade Notices**

- **Permission Changes** - There have been changes to the permission system which can affect how permissions apply and therefore could lead to changes in provided abilities upon update. This is only really relevant to complex permission scenarios that have only been possible since BookStack v22.10. Please see the [Permission System Changes](#permission-system-changes) section below for more details on this.
- **Database Upgrade Time** - Changes to the permission system have required permissions to be regenerated upon update. Due to this, the `php artisan migrate` upgrade step may take extra time to run, especially where there's a lot of content and/or roles in the system.

TODO - YouTube
<!-- {{<yt 9Oz6-YOeiuU>}} -->

### App Icon Control

TODO

### New Color Scheme Controls

TODO

### Book Sorting Experience Upgrades

TODO

### Code Block Additions

TODO - Scheme and SQL variants, twig/smarty in patch release

### OIDC Auth ID Configuration Option

TODO

### Permission System Changes

TODO

### Translations

TODO

- user - *language*

### Next Steps

TODO

### Full List of Changes

**Released in v23.01**

* Added ability to control app icon (favicon) via settings. ([#3994](https://github.com/BookStackApp/BookStack/pull/3994), [#3929](https://github.com/BookStackApp/BookStack/issues/3929), [#301](https://github.com/BookStackApp/BookStack/issues/301))
* Added ability to set separate colors for dark mode. ([#2314](https://github.com/BookStackApp/BookStack/issues/2314), [#4002](https://github.com/BookStackApp/BookStack/pull/4002))
* Added ability to set separate colors for primary color and links. ([#3910](https://github.com/BookStackApp/BookStack/issues/3910), [#4002](https://github.com/BookStackApp/BookStack/pull/4002))
* Added accessible controls to book sorting & improved user experience. ([#3999](https://github.com/BookStackApp/BookStack/pull/3999), [#3987](https://github.com/BookStackApp/BookStack/issues/3987))
* Added Scheme code highlight support. ([#3954](https://github.com/BookStackApp/BookStack/issues/3954))
* Added SQL variant code highlighting support. ([#3942](https://github.com/BookStackApp/BookStack/issues/3942))
* Added ability to configure an ID claim for OIDC. ([#3914](https://github.com/BookStackApp/BookStack/issues/3914))
* Updated permission handling to be better defined and predictable. ([#3986](https://github.com/BookStackApp/BookStack/pull/3986))
* Updated tag handling to show new row earlier. ([#3931](https://github.com/BookStackApp/BookStack/issues/3931))
* Updated translations with latest Crowdin changes. ([#3925](https://github.com/BookStackApp/BookStack/pull/3925))
* Updated codebase to address a range of PHP deprecations. ([#3969](https://github.com/BookStackApp/BookStack/issues/3969))
* Updated internal testing to run OIDC tests faster. ([#3985](https://github.com/BookStackApp/BookStack/issues/3985))
* Fixed header search results preview not being clickable in Safari. ([#3926](https://github.com/BookStackApp/BookStack/issues/3926))
* Fixed informal German not receiving correct pluralisation. ([#3976](https://github.com/BookStackApp/BookStack/issues/3976))
* Fixed lack of drawing access leading to infinite loading. ([#3955](https://github.com/BookStackApp/BookStack/issues/3955))
* Fixed user image id existing after user avatar removal. ([#3977](https://github.com/BookStackApp/BookStack/issues/3977))


**Released in v22.11.1**

* Added smarty and twig template code language support. Thanks to [@jhit](https://github.com/BookStackApp/BookStack/pull/3879). ([#3879](https://github.com/BookStackApp/BookStack/pull/3879))
* Updated translations with latest Crowdin changes. ([#3881](https://github.com/BookStackApp/BookStack/pull/3881))
* Fixed global search focus issue with arrow keys. ([#3920](https://github.com/BookStackApp/BookStack/issues/3920))
* Fixed lack of scroll in editor sidebar views. ([#2887](https://github.com/BookStackApp/BookStack/issues/2887))
* Fixed not being able to remove all user roles. ([#3922](https://github.com/BookStackApp/BookStack/issues/3922))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/de/@tadekl?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Tadeusz Lakota</a> on <a href="https://unsplash.com/photos/Xh4yVFNT5iw?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  </a>
  </span></span>