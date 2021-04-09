+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v21.04"
date = 2021-04-09T20:20:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/spring-arno-smit.jpg"
slug = "bookstack-release-v21-04"
draft = false
+++

Today is the launch of BookStack v21.04 which is our next feature release after Beta v0.31.
For this release we're dropping the beta and changing our version scheme as detailed below. 
This release has no single major feature but is instead focused on a range of fixes, improvements and community contributions.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.04)


**Upgrade Notices**

- PHP 7.3 or greater is now required to run BookStack. If you previously installed BookStack using the 18.04 script, please see the details of this release in our [update notes](/docs/admin/updates/#updating-to-v2004-or-higher) for the commands that should help you upgrade to PHP 8.
- User profile pages, and user-based search filters, now use name-based "slugs" rather than being ID based. Any old links or instructions you may have for these elements may need to be updated.

### Dropping the Beta Status & Changing our Version Scheme

As mentioned above, after collecting [some feedback on GitHub](https://github.com/BookStackApp/BookStack/issues/2570), I'm dropping the beta status from any versions and release notes. 
In terms of stability and code, nothing really is changing.
BookStack has been fairly stable for a while now, and I've always attempted to ensure a stable upgrade path on releases.
My primary reason for keeping the beta status was really to omit a little extra liability, and I was hesitant to label any release as `v1.0` since I could not define a reasonable criteria for `v1.0` that I'd be happy with.
The beta status was causing issues for some people, where their hosting/platform would not provide any support due to the beta flag.


In terms of version numbers, we're jumping from Beta v0.31 to BookStack v21.04. 
As mentioned above, I couldn't really define a `v1.0` so we're skipping right over it and using the Ubuntu versioning system as inspiration.
BookStack versions will now be in the format of v`<2 DIGIT YEAR>`.`<2 DIGIT MONTH>`[.`<OPTIONAL PATCH DIGIT>`]. As an example:

- v21.06 _(June 2021 launched feature release)_
- v21.06.5 (Fifth patch of June 2021 release, even if released in a later month)
- v22.10 _(October 2022 launched feature release)_

That change is technically compatible with the old versioning, while now providing context about the release date within the version. 
This can be extremely useful when people reference their BookStack version as it'll instantly provide context of release date without needing to look that up.

### Support for Custom Footer Links

Some scenarios, such as those for GDPR compliance, require links to be shown on every page.
To support these cases, You can now add custom footer links to your BookStack instance via the settings page:

![BookStack Footer Settings Interface](/images/2021/04/footer_settings.png)

You can specify the URL and text for each link. The description of the setting details how you can use the BookStack translation system to automatically translate some common phrases such as "Privacy Policy" and "Terms of Service".

Once set, these will be shown at the bottom of almost every view including those that are public such as the login & register pages.

![BookStack Footer Display Example](/images/2021/04/footer_display.png)

Thanks to [@james-geiger](https://github.com/BookStackApp/BookStack/pull/1973) for pushing this forward and providing an initial implementation of this feature.

### Search Content by Owner

Within search inputs, and on the search page, it's now possible to search for content belonging to a specific owner:

![BookStack Owner Search Example View](/images/2021/04/search_owned_by.png)

Thanks to [@benediktvolke](https://github.com/BookStackApp/BookStack/pull/2561) for implementing this feature.

### Backend Theme System

Using the existing theme folder system, it's now possible to customize back-end PHP functionality without altering core project files.
To set this up you'd create a `functions.php` file within your theme folder, in which you can use specific events we expose. For example:

```js
<?php

use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;

Theme::listen(ThemeEvents::APP_BOOT, function($app) {
    \Log::info('BookStack was booted up!');
});
```

This system is documented within the project source itself, and can be [viewed on GitHub here](https://github.com/BookStackApp/BookStack/blob/release/dev/docs/logical-theme-system.md).

The intention of this system is provide a mechanism for people to implement back-end functionality that's not suited to be in the core project.

**Note:** This system is considered to be in beta for this release version as I'll be gathering feedback on this initial implementation to potentially make further changes if needed.

### Sort Control within Shelves

Sort options have been previously available within the books & shelves listings.
This update brings sort options for viewing books within a shelf.

![BookStack Shelf Sort Display Example](/images/2021/04/shelf_sort.png)

This defaults to the user-defined order, managed via editing a shelf, but this allows custom ordering by name, updated date or created date.
Sort ordering changes are saved to the current user session.

Thanks to [@guillaumehanotel](https://github.com/BookStackApp/BookStack/pull/2515) for providing the initial implementation for this feature.


### Audit Log User Filter

The audit log has been updated with the ability to search for activities created by a specific user in the system:

![BookStack Audit Log User Filter Preview](/images/2021/04/audit_log_filter.png)

### Healthcheck Endpoint

A healthcheck endpoint is now included in the system which can be useful in automated and high-availability scenarios.
This endpoint will perform some simple checks on the database, cache & session, then return the status of each as JSON:

```js
{"database":true,"cache":true,"session":true}
```

### LDAP TLS Support

Proper TLS support has now been added to BookStack. This can be enabled by adding `LDAP_START_TLS=true` to your `.env` file.
When enabled, BookStack will ensure a TLS connection is made. 
If the TLS connection fails for any reason then an error will be thrown.

Thanks to [@Body4](https://github.com/BookStackApp/BookStack/pull/2376) for pushing this forward with a contributed implementation.

### PHP 8.0 Support

PHP 8.0 is now supported by BookStack. This was a fair bit more involved than previous PHP 7.x support due to PHP 8.0 being a fairly big release
which included a fair few breaking changes. Due to dependency support, we've had to bump the minimum supported PHP version to PHP 7.3 from 7.2.5.

### Dark Mode by Default Option

It's now possible to set dark mode as the default visual option for an instance. This can be set by adding the following to your `.env` file:

```bash
APP_DEFAULT_DARK_MODE=true
```

Note that this may be overridden by any user's session or set preference.

### Translations

This release brings an additional 5 new language options for users to select. Note, Some of these are still in progress so may be somewhat incomplete. Massive thanks to the names listed here for their fantastic work:

- Bosnian - *Thanks to semirte on Crowdin*
- Catalan - *Thanks to [Ereza](https://github.com/BookStackApp/BookStack/pull/2536) on GitHub*
- Indonesian - *Thanks to Irfan Hukama Arsyad (IrfanArsyad) on Crowdin* 
- Latvian - *Thanks to aarchijs, Martins Pilsetnieks (pilsetnieks), Reinis Mednis (Mednis) and HenrijsS on Crowdin*
- Portuguese - *Thanks to Luís Tiago Favas (starkyller) on Crowdin*

In addition, we've also had a wonderfully large amount of translation updates since the original v0.31 release. Again, A thanks to all names listed below for their incredible efforts:

- [@geins](https://github.com/geins) - *German*
- [@benediktvolke](https://github.com/benediktvolke) - *German*
- [@Baptistou](https://github.com/Baptistou) - *French*
- [@arcoai](https://github.com/arcoai) - *Spanish*
- Jeff Huang (s8321414) - *Chinese Traditional*
- Yonatan Magier (yonatanmgr) - *Hebrew*
- Statium - *Russian*
- FastHogi - *German Informal; German*
- Mykola Ronik (Mantikor) - *Ukrainian*
- Ali Yasir Yılmaz (ayyilmaz) - *Turkish*
- Ole Anders (Swoy) - *Norwegian Bokmal*
- Atlochowski (atlochowski) - *Polish*
- 10935336 - *Chinese Simplified*
- Simon (DefaultSimon) - *Slovenian*
- nikservik - *Ukrainian; Russian; Polish*
- m0uch0 - *Spanish*
- Simsimpicpic - *French*
- jackaaa - *Chinese Traditional*
- Rodrigo Saczuk Niz (rodrigoniz) - *Portuguese, Brazilian*
- nutsflag - *French*
- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- Vuong Trung Hieu (fpooon) - *Vietnamese*
- cipi1965 - *Italian*
- Pascal R-B (pborgner) - *German*
- johnroyer - *Chinese Traditional*
- Boris (Ginfred) - *Russian*

### Full List of Changes

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
* Updated non-admin reference to users to be slug-based instead of id-based. ([#2626](https://github.com/BookStackApp/BookStack/pull/2626), [#2525](https://github.com/BookStackApp/BookStack/issues/2525))
* Updated file upload system to remove dots in the filename instead of simply preventing upload. Thanks to [@Hecke29](https://github.com/BookStackApp/BookStack/pull/2611). ([#2611](https://github.com/BookStackApp/BookStack/pull/2611), [#2217](https://github.com/BookStackApp/BookStack/issues/2217))
* Updated the versioning system used by the project. ([#2570](https://github.com/BookStackApp/BookStack/issues/2570))
* Updated export format to not include user and revision links in content meta details. ([#2526](https://github.com/BookStackApp/BookStack/issues/2526))
* Updated docker development environment to work with our php tests and to fix permissions with the node service. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/2522). ([#2522](https://github.com/BookStackApp/BookStack/pull/2522), [#2510](https://github.com/BookStackApp/BookStack/pull/2510))
* Updated the systems for loading code blocks to be quicker & more efficient, especially within the WYSIWYG editor. ([#2518](https://github.com/BookStackApp/BookStack/issues/2518))
* Updated libraries used for revision diffs to provide much better performance with large amounts of content. ([#2503](https://github.com/BookStackApp/BookStack/issues/2503))
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


### Next Steps

For the next release I want to continue to resolve some of the pending pull requests on GitHub.
For a few of these I've been waiting until I can build a back-end customization system, as done in this release, so some requests will be directed to use
that system instead of including changes in core, which should give the system a good initial test.
I hope to work through the outstanding SAML issues if I can get a working active directory set-up to replicate and test.

During this cycle I'll be starting to think about the next step on the roadmap, where we'll be reviewing the editors used in BookStack. There probably won't be any coding for the feature during this cycle but I'll be raising proposals and/or RFCs to plan this out.

MFA is an subject that would be good to takle soon but working on auth components can get tiresome, especially as this is an area where people often need configurability.

Since we've now bumped the minimum required PHP version to 7.3, I'll probably start upgrading the codebase from Laravel 6 to Laravel 8 so we gain some new features to play with.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@_entreprenerd?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Arno Smit</a> on <a href="https://unsplash.com/s/photos/spring?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>