+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v21.04"
date = 2021-03-28T13:26:53Z
author = "Dan Brown"
image = "/images/blog-cover-images/rabbit-grass-irisba.jpg"
slug = "bookstack-release-v21-04"
draft = true
+++

This easter brings us BookStack v21.04. This is our next feature release after Beta v0.31.
For this release we're dropping the beta and changing our version scheme as detailed below. 
This feature release has no single major feature but is instead focused on a range of fixes and community contributions.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.04)


**Upgrade Notices**

- PHP 7.3 or greater is now required to run BookStack. If you previously installed BookStack using the 18.04 script, please see the details of this release in our [update notes](/docs/admin/updates/) for the commands that should help you upgrade to PHP 8.
- User profile pages, and user-based search filters, now use name-based "slugs" rather than being ID based. Any old links or instuctions you may have for these elements may need to be updated.

### Dropping the Beta Status & Changing our Versioning

As mentioned above, after collecting [some feedback on GitHub](https://github.com/BookStackApp/BookStack/issues/2570), I'm dropping the beta status from any versions and release notes. 
In terms of stability and code, nothing really is changing.
BookStack has been fairly stable for a while now, and I've always attempted to ensure a stable upgrade path on releases.
My primary reason for keeping the beta status was really to omit a little extra liability, and since I was hesitant to label any release as `v1.0` since I could not define a reasonable criteria for `v1.0` that I'd be happy with.
The beta status was causing issues for some people, where their hosting/platform would not provide any support due to the beta flag.


In terms of version numbers, we're jumping from Beta v0.31 to BookStack v21.04. 
As mentioned above, I couldn't really define a `v1.0` so we're skipping right over it and using the Ubuntu versioning system as inspiration.
BookStack versions will now be in the format of v`<2 DIGIT YEAR>`.`<2 DIGIT MONTH>`[.`<OPTIONAL PATCH DIGIT>`]. As an example:

- v21.06 _(June 2021 launched feature release)_
- v21.06.5 (Fifth patch of June 2021 release, even if released in a later month)
- v22.10 _(October 2022 launched feature release)_

That change is technically compatible with the old versioning, while now providing context about the release date within the version. 
This can be extremely useful when people reference their BookStack version as it'll instantly provide context of release date without needing to look that up.

### Footer Links Support



### Search by Owner



### Backend Theme System

Using the existing theme folder system, it's now possible to customize back-end PHP functionailty without altering core project files.
To set this up you'd create a `functions.php` file with your theme folder, in which you can use specific events we expose. For example:

```js
<?php

use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;

Theme::listen(ThemeEvents::APP_BOOT, function($app) {
    \Log::info('BookStack was booted up!');
});
```

This system is documented withing the project source itself, and can be [viewed on GitHub here](https://github.com/BookStackApp/BookStack/blob/release/dev/docs/logical-theme-system.md).

The intention of this system is provide a mechanism to people to implement back-end functionality that's not suited to be in the core project.

**Note:** This system is considered to be in beta for this release version as I'm be gathering feedback on this inital implementation to potentially make further changes if needed.

### Sort Control within Shelves



### User Filter in Audit Log



### Healthcheck Endpoint

A healthcheck endpoint is now included in the system which can be useful in automated and high-availability scenarios.
This endpoint will perform some simple checks on the database, cache & session, then return the status of each as JSON:

```js
{"database":true,"cache":true,"session":true}
```

### LDAP TLS Support



### PHP 8.0 Support

PHP 8.0 is now supported by BookStack. This was a fair bit more involved than previous PHP 7.x support due to PHP 8.0 being a fairly big release
which included a fair few breaking changes. Due to dependancy support, we've had to bump the minimum supported PHP version to PHP 7.3 from 7.2.5.

### Translations



### Full List of Changes

This release contains the following fixes and changes:

* Added back-end theme system. ([#2639](https://github.com/BookStackApp/BookStack/pull/2639))
* Added `APP_VIEWS_BOOKSHELF` .env option to set default view type within a shelf. Thanks to [@philjak](https://github.com/BookStackApp/BookStack/pull/2591). ([#2591](https://github.com/BookStackApp/BookStack/pull/2591))
* Added `owned_by` search filter. Thanks to [@benediktvolke](https://github.com/BookStackApp/BookStack/pull/2561). ([#2561](https://github.com/BookStackApp/BookStack/pull/2561))
* Added sorting for Books within Shelves. Thanks to [@guillaumehanotel](https://github.com/BookStackApp/BookStack/pull/2515). ([#2515](https://github.com/BookStackApp/BookStack/pull/2515), [#1742](https://github.com/BookStackApp/BookStack/issues/1742))
* Added user filter to the Audit Log. ([#2472](https://github.com/BookStackApp/BookStack/issues/2472))
* Added a healthcheck endpoint. ([#2467](https://github.com/BookStackApp/BookStack/issues/2467))
* Added TLS support to the LDAP system. Thanks to [@Body4](https://github.com/BookStackApp/BookStack/pull/2376). ([#2376](https://github.com/BookStackApp/BookStack/pull/2376))
* Added .env variable to set default system light/dark mode option. ([#2081](https://github.com/BookStackApp/BookStack/issues/2081))
* Added the ability to configure custom footer links via the settings screen. Thanks to [@james-geiger](https://github.com/BookStackApp/BookStack/pull/1973). ([#1973](https://github.com/BookStackApp/BookStack/pull/1973))
* Added create buttons to the books and shelves homepage view options. Thanks to [@philjak](https://github.com/BookStackApp/BookStack/pull/1756). ([#1756](https://github.com/BookStackApp/BookStack/pull/1756))
* Updated minimum required PHP version to 7.3 and added PHP 8.0 support. ([#2648](https://github.com/BookStackApp/BookStack/issues/2648), [#2388](https://github.com/BookStackApp/BookStack/issues/2388))
* Updated non-admin reference to userse to be slug-based instead of id-based. ([#2626](https://github.com/BookStackApp/BookStack/pull/2626), [#2525](https://github.com/BookStackApp/BookStack/issues/2525))
* Updated file upload system to remove dots in the filename instead of simplying preventing upload. Thanks to [@Hecke29](https://github.com/BookStackApp/BookStack/pull/2611). ([#2611](https://github.com/BookStackApp/BookStack/pull/2611), [#2217](https://github.com/BookStackApp/BookStack/issues/2217))
* Updated the versioning system used by the project. ([#2570](https://github.com/BookStackApp/BookStack/issues/2570))
* Updated export format to not include user and revision links in content meta details. ([#2526](https://github.com/BookStackApp/BookStack/issues/2526))
* Updated docker development environment to work with our php tests and to fix permissions with the node service. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/2522). ([#2522](https://github.com/BookStackApp/BookStack/pull/2522), [#2510](https://github.com/BookStackApp/BookStack/pull/2510))
* Updated the systems for loading code blocks to be quicker & more efficient, especially within the WYSIWYG editor. ([#2518](https://github.com/BookStackApp/BookStack/issues/2518))
* Updated libraries used for revision diffs to provide much better peformance with large amounts of content. ([#2503](https://github.com/BookStackApp/BookStack/issues/2503))
* Updated user profile password fields to disable autocomplete. Thanks to [@l1n](https://github.com/BookStackApp/BookStack/pull/2484). ([#2484](https://github.com/BookStackApp/BookStack/pull/2484))
* Updated header so search is more commonly centered. ([#2310](https://github.com/BookStackApp/BookStack/issues/2310))
* Updated "Move Page" interface to allow efficient keyboard navigation. ([#2064](https://github.com/BookStackApp/BookStack/issues/2064))
* Updated our test-case files so they are less likely to trigger virus scan systems. ([#1571](https://github.com/BookStackApp/BookStack/issues/1571))
* Updated WYSIWYG editor to include some bottom padding for readability. ([#1075](https://github.com/BookStackApp/BookStack/issues/1075))
* Fixed issue where code blocks would not appear when within `<details>` HTML elements, added via the markdown editor. ([#781](https://github.com/BookStackApp/BookStack/issues/781))
* Fixed issue where the `bookstack:update-url` would not change the URL used for a custom header logo image. ([#2546](https://github.com/BookStackApp/BookStack/issues/2546))
* Fixed issue where saving without any changes would still result in revisions being created. ([#1846](https://github.com/BookStackApp/BookStack/issues/1846), [#1737](https://github.com/BookStackApp/BookStack/issues/1737))
* Optimized and cleaned some core permission system components. ([#2633](https://github.com/BookStackApp/BookStack/issues/2633))
* Removed mentions of unavailable `mail` mail driver from our files. ([#2657](https://github.com/BookStackApp/BookStack/issues/2657))

---

* New Crowdin updates. ([#2501](https://github.com/BookStackApp/BookStack/pull/2501))
* New Crowdin updates. ([#2620](https://github.com/BookStackApp/BookStack/pull/2620))
* New Crowdin updates. ([#2618](https://github.com/BookStackApp/BookStack/pull/2618))
* Fixed german formal translation. Thanks to [@geins](https://github.com/BookStackApp/BookStack/pull/2616). ([#2616](https://github.com/BookStackApp/BookStack/pull/2616))
* Add Catalan translation. Thanks to [@Ereza](https://github.com/BookStackApp/BookStack/pull/2536). ([#2536](https://github.com/BookStackApp/BookStack/pull/2536))
* Fix German translation string. Thanks to [@benediktvolke](https://github.com/BookStackApp/BookStack/pull/2533). ([#2533](https://github.com/BookStackApp/BookStack/pull/2533))
* Typo in spanish translation at user invite email subject. ([#2608](https://github.com/BookStackApp/BookStack/issues/2608))
* Please add Portuguese (European). ([#2593](https://github.com/BookStackApp/BookStack/issues/2593))
* Fix French translations. Thanks to [@Baptistou](https://github.com/BookStackApp/BookStack/pull/2513). ([#2513](https://github.com/BookStackApp/BookStack/pull/2513))
* Hope you add more language. ([#2560](https://github.com/BookStackApp/BookStack/issues/2560))
* Fixed user invite email subject in spanish translation (#2608). Thanks to [@arcoai](https://github.com/BookStackApp/BookStack/pull/2609). ([#2609](https://github.com/BookStackApp/BookStack/pull/2609))

### Next Steps

For the next release I want to continue to resolve some of the pending pull requests on GitHub.
For a few of these I've been waiting until I can build a back-end customization system, as done in this release, so some requests will be directed to use
that system instead of including changes in core, which should give the system a good initial test.
I hope to work through the outstanding SAML issues if I can get a working active directory setup to replicate and test.

During this cycle I'll be starting to think about the next step on the roadmap, where we'll be reviewing the editors used in BookStack. There probably won't be any coding for this during this cycle but I'll be raising proposals and/or RFCs to plan this out. 

MFA is an subject that would be good to takle soon but working on auth components can get tiresome, especially as this is an area where people often need configurability.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@irisba?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Irina Babina</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>