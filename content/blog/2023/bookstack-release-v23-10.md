+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.10"
date = 2023-10-30T11:43:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-2/peter-trimming-squirrel.jpg"
slug = "bookstack-release-v23-10"
draft = false
+++

This October maintenance release brings with it a little more than originally planned, 
with a significant revamp of user self-management in addition to an updated editor design,
along with many other additions & improvements.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.10)


**Upgrade Notices**

- **URL Changes** - Many of the URLs related to user details & preferences have changed in this release with the addition of the "My Account" area. If you have documented these links you may need to update your documentation.

TODO - Video
<!-- {{<pt oMVSWxsayhfL7rjtzJLqNF>}} -->

### My Account Area

With the added options over the years, user self-management was getting rather fractured within the 
user interface with some options within "Preferences", but with many other options (including some which could be considered preferences)
within the "Edit Profile" view. 
Additionally that "Edit Profile" was located in the application users settings which was acting dual-purpose for admin and end-user usage.

To address this, in this release there's a new central "My Account" area accessed via the header user dropdown menu:

TODO - Screenshot of my account area, with dropdown in view

The "My Account" area combines the pre-existing preference views, with end-user specific "Profile Details" and "Access & Security" views
to contain all user self-management within one neatly organised area.
The "Access & Security" view bundles the existing password, MFA and API token controls:

TODO - Screenshot of "Access & Security" area

These changes should now provide a much more intuitive end-user experience when it comes to finding account options.

### Admin User Form Changes

With the above addition of a "My Account" area, we can now focus the pre-existing "Settings > Users > Edit" view 
to be targeted on admin use. 
Access to these views is now limited to just those with role permission to "Manage Users", since all other required end-user
abilities can now be managed via "My Account".

When third-party/social login options are in use, admin users will not be able to see what external
accounts users have connected to their BookStack profile. This was previously only visible to the user which they applied to.

TODO - Image of social acccounts for non-current user

Lastly, the "External Authentication ID" field will now always display on this form, even if using just normal email & password authentication.
This is to make it easier to manage and set-up external authentication accounts when required, negating the awkward need to swap
active system authentication system  when attempting to set this up.

TODO - Image of external auth id field

### Editor Design Update

TODO

### Refresh Avatar Command

TODO

Thanks to [@MarcHagen](https://github.com/BookStackApp/BookStack/pull/4560)

[Command in docs](/docs/admin/commands/#refresh-user-avatars)


### Basic PWA Support

TODO

Thanks to [@GamerClassN7](https://github.com/BookStackApp/BookStack/pull/4430)

### Visual Theme System Header Partials

TODO

### Editor Entity Search Prefill

TODO

### Fixes & Cleanup

TODO

### Translations

TODO

Added Uzbek

- Name - *Language - x words*


*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

TODO

### Full List of Changes

**Released in v23.10**

* Added new "My Account" area. ([#4615](https://github.com/BookStackApp/BookStack/pull/4615))
* Added Uzbek language translations. Thanks to [@mrmuminov](https://github.com/BookStackApp/BookStack/pull/4527). ([#4527](https://github.com/BookStackApp/BookStack/pull/4527))
* Added artisan command for re-fetching existing user avatar images. Thanks to [@MarcHagen](https://github.com/BookStackApp/BookStack/pull/4560). ([#4560](https://github.com/BookStackApp/BookStack/pull/4560), [#1893](https://github.com/BookStackApp/BookStack/issues/1893))
* Added basic PWA support. Thanks to [@GamerClassN7](https://github.com/BookStackApp/BookStack/pull/4430). ([#4430](https://github.com/BookStackApp/BookStack/pull/4430), [#1253](https://github.com/BookStackApp/BookStack/issues/1253))
* Added new header bar partials for easier customization. ([#4564](https://github.com/BookStackApp/BookStack/issues/4564))
* Added "View Tags" button to non-default homepage views. ([#4558](https://github.com/BookStackApp/BookStack/issues/4558))
* Updated page editor interface with a new design. ([#4604](https://github.com/BookStackApp/BookStack/pull/4604))
* Updated app caching behaviour to avoid expiry scenarios. ([#4600](https://github.com/BookStackApp/BookStack/issues/4600))
* Updated cleanup-images command to allow non-interactive running. ([#4541](https://github.com/BookStackApp/BookStack/issues/4541))
* Updated comment notification options to only show if comments active. Thanks to [@tusharnain4578](https://github.com/BookStackApp/BookStack/pull/4552). ([#4552](https://github.com/BookStackApp/BookStack/pull/4552), [#4508](https://github.com/BookStackApp/BookStack/issues/4508))
* Updated editor entity selector to pre-fill with selected text. ([#4571](https://github.com/BookStackApp/BookStack/issues/4571))
* Updated file & image upload handling for better indication of issues. ([#4578](https://github.com/BookStackApp/BookStack/pull/4578), [#4454](https://github.com/BookStackApp/BookStack/issues/4454))
* Updated guest user logic to reduce complexity and overlapping methods. ([#4554](https://github.com/BookStackApp/BookStack/pull/4554), [#4448](https://github.com/BookStackApp/BookStack/issues/4448))
* Updated HTTP calling in the codebase to align all handling. ([#4525](https://github.com/BookStackApp/BookStack/pull/4525))
* Updated icon handling to remove unneeded global helper. ([#4553](https://github.com/BookStackApp/BookStack/issues/4553))
* Updated language handling to reduce complexity and duplicated logic. ([#4555](https://github.com/BookStackApp/BookStack/pull/4555), [#4501](https://github.com/BookStackApp/BookStack/issues/4501))
* Updated logical theme system to capture load errors for better reporting & debugging. ([#4504](https://github.com/BookStackApp/BookStack/issues/4504))
* Updated mixed entity endpoints to share and align logic. ([#4444](https://github.com/BookStackApp/BookStack/issues/4444))
* Updated OIDC config handling to move logic out of config file. ([#4494](https://github.com/BookStackApp/BookStack/issues/4494))
* Updated OIDC request timeout to 5 seconds. ([#4397](https://github.com/BookStackApp/BookStack/issues/4397))
* Updated older notifications codebase to align with newer code organisation. ([#4500](https://github.com/BookStackApp/BookStack/issues/4500))
* Updated print view to ignore extra elements. ([#4594](https://github.com/BookStackApp/BookStack/issues/4594))
* Updated Slack authentication to use official Laravel implementation. ([#4464](https://github.com/BookStackApp/BookStack/issues/4464))
* Updated the default email settings to use example domain. ([#4518](https://github.com/BookStackApp/BookStack/issues/4518))
* Updated translations with latest Crowdin changes. ([#4523](https://github.com/BookStackApp/BookStack/pull/4523))
* Updated username truncation to always show some part of the name. Thanks to [@Bajszi97](https://github.com/BookStackApp/BookStack/pull/4533). ([#4533](https://github.com/BookStackApp/BookStack/pull/4533), [#4489](https://github.com/BookStackApp/BookStack/issues/4489))
* Updated security docs to remove huntr references. Thanks to [@radiantwave](https://github.com/BookStackApp/BookStack/pull/4618). ([#4616](https://github.com/BookStackApp/BookStack/issues/4616), [#4618](https://github.com/BookStackApp/BookStack/pull/4618))
* Fixed awkward sidebar scroll behaviour at mid-level screen sizes. Thanks to [@LawssssCat](https://github.com/BookStackApp/BookStack/pull/4562). ([#4562](https://github.com/BookStackApp/BookStack/pull/4562))
* Fixed buggy dark/light mode button when dark mode is the default. ([#4543](https://github.com/BookStackApp/BookStack/issues/4543))
* Fixed enter press incorrectly clearing tag input field. ([#4570](https://github.com/BookStackApp/BookStack/issues/4570))
* Fixed issue where "?" would show shortcuts when typing in an input. ([#4606](https://github.com/BookStackApp/BookStack/issues/4606))
* Fixed lack of content in plaintext export options. ([#4557](https://github.com/BookStackApp/BookStack/issues/4557))
* Fixed missing notification text in German-language emails. ([#4567](https://github.com/BookStackApp/BookStack/issues/4567))
* Fixed odd default homepage layout at iPad-like width. ([#4596](https://github.com/BookStackApp/BookStack/issues/4596))
* Fixed un-aligned text across elements when they show their empty states. ([#4563](https://github.com/BookStackApp/BookStack/issues/4563))
* Enabled Albanian translations for BookStack on Crowdin. ([#4065](https://github.com/BookStackApp/BookStack/issues/4065))
* Enabled Finnish translations for BookStack on Crowdin. ([#4614](https://github.com/BookStackApp/BookStack/issues/4614))
* Enabled Norwegian Nynorsk translations for BookStack on Crowdin. ([#4447](https://github.com/BookStackApp/BookStack/issues/4447))

**Released in v23.08.3**

* Fixed comment reply notifications not being sent to the correct/expected user. ([#4548](https://github.com/BookStackApp/BookStack/issues/4548))
* Fixed JavaScript error that could appear when not having comment permissions. ([#4531](https://github.com/BookStackApp/BookStack/issues/4531))
* Fixed wrong French translation in notification preferences. ([#4511](https://github.com/BookStackApp/BookStack/issues/4511))
* Updated translations with latest Crowdin changes. ([#4512](https://github.com/BookStackApp/BookStack/pull/4512))

**Released in v23.08.2**

* Fixed WYSIWYG filtering issue, introduced in v23.08.1, which breaks page editing and drawing use when certain elements exist in page content. ([#4510](https://github.com/BookStackApp/BookStack/issues/4510), [#4509](https://github.com/BookStackApp/BookStack/issues/4509))
* Updated translations with latest Crowdin changes. ([#4506](https://github.com/BookStackApp/BookStack/pull/4506))

**Released in v23.08.1**

* Updated preferences view styles to better respond to content and screen sizes to prevent wrapping buttons. ([#4502](https://github.com/BookStackApp/BookStack/issues/4502))
* Updated WYSIWYG editor filtering to help prevent page pointer being pasted into pages. ([#4474](https://github.com/BookStackApp/BookStack/issues/4474))
* Updated translations with latest Crowdin changes. ([#4481](https://github.com/BookStackApp/BookStack/pull/4481))
* Fixed a range of typos in our dev docs. Thanks to [@omahs](https://github.com/BookStackApp/BookStack/pull/4484). ([#4484](https://github.com/BookStackApp/BookStack/pull/4484))
* Fixed deleted watched books/chapters/pages breaking notification preferences view from loading. ([#4499](https://github.com/BookStackApp/BookStack/issues/4499))
* Fixed notifications not being sent in receiver language preference. ([#4497](https://github.com/BookStackApp/BookStack/pull/4497), [#4480](https://github.com/BookStackApp/BookStack/issues/4480))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://www.flickr.com/photos/peter-trimming/31839968058/">Peter Trimming (CC-BY-2)</a> - Image Modified</span></span>