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

This October maintenance release brings with it more than originally planned, 
with a significant revamp of user self-management in addition to an updated editor design,
along with many other additions & improvements.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.10)

TODO - Regen translation list, order by word count

**Upgrade Notices**

- **User Detail/Preference Changes** - Many of the URLs, paths and interfaces for user-self management have changed in this release. You may need to update any documentation or user guidance you may have surrounding users updating their own details or preferences.

{{<pt 4YtVndveEVE6GuuGPV3Yn1>}}

### My Account Area

With the added options over the years, user self-management was getting rather fractured within the 
user interface with some options within "Preferences", but with many other options (including some which could be considered preferences)
part of the "Edit Profile" view. 
Additionally that "Edit Profile" form was located in the application users settings acted dual-purpose for admin & end-user usage.

To address this, in this release there's a new central "My Account" area accessed via the header user dropdown menu:

![View of a "My Account > Profile Details" view with various user detail inputs, while also showing the user profile dropdown menu in the top right with the "My Account" option selected](/images/2023/10/user_my_account_view.png)

The "My Account" area combines the pre-existing preference views, with end-user specific "Profile Details" and "Access & Security" views
to contain all user self-management within one neatly organised area.
The "Access & Security" view bundles the existing password, MFA and API token controls:

![View of my account > Access and Security view with change password, MFA, and API Tokens sections](/images/2023/10/access_security_view.png)

These changes should now provide a much more intuitive end-user experience when it comes to finding account options.

### Admin User Form Changes

With the above addition of a "My Account" area, we can now focus the pre-existing "Settings > Users > Edit" view 
to be targeted on admin use. 
Access to these views is now limited to just those with role permission to "Manage Users", since all other required end-user
abilities can now be managed via "My Account".

When third-party/social login options are in use, admin users will now be able to see what external
accounts users have connected to their BookStack profile. This was previously only visible to the user which they applied to.

![View of the social accounts for a user, showing GitHub as connected, and Slack as Disconnected](/images/2023/10/user_social_accounts.png)

Lastly, the "External Authentication ID" field will now always display on this form, even if using the standard email & password authentication.
This is to make it easier to manage and set-up external authentication accounts when required, negating the awkward need to swap
active system authentication system  when attempting to set this up.

!["Edit User" form focused on a "External Authentication ID" section and form field](/images/2023/10/user_external_auth_field.png)

### Editor Design Update

During this release cycle I started making some minor improvements to the editor UI, but this soon
turned into a much more significant design update:

![The BookStack WYSIWYG page editor interface, built into white "card" style background with a fixed width, with a smaller thin toolbar on the right in a similar card style with a vertical list of icons](/images/2023/10/editor_design_update.png)

The new design is now closer aligned to the page display view, to be less jarring when switching
between viewing & editing, and to provide a more consistent experience.
The existence of the editor sidebar toolbox is now more obvious.
Care has been taken to ensure these design changes don't reduce usability or access to existing options.
On the smallest mobile sizes you'll actually now have more space for editing.

Of course these changes also apply when using the markdown editor. 
Here's a view of the markdown editor, with the sidebar toolbox open:

![BookStack markdown editor interface with the sidebar toolbox open displaying various comments for the current page](/images/2023/10/markdown_editor_design.png)

### Refresh Avatar Command

We have a new [command](/docs/admin/commands/) for this release.
This one allows the refreshing of user avatar images from the configured avatar
service ([Gravatar](https://gravatar.com/) by default).
There are options to do this for a single user, for all users, or just for users without avatars assigned:


```bash
# Refresh avatars for all users without avatars already assigned
php artisan bookstack:refresh-avatar --users-without-avatars
```

You can find more details about [this command in our docs here](/docs/admin/commands/#refresh-user-avatars).
A thanks to [@MarcHagen](https://github.com/BookStackApp/BookStack/pull/4560) for submitting the code for this functionality.

### Basic PWA Support

This version of BookStack introduces basic PWA (Progressive Web App) functionality through the use of an added PWA manifest endpoint.
In practice, this will allow the easier usage of BookStack as a "contained" application on some platforms, with the correct name and icon set.

<img alt="A screenshot of a Safari browser window with no standard browser controls, with the titlebar color matching the BookStack UI" src="/images/2023/10/pwa_example.png" width="420">

Thanks to [@GamerClassN7](https://github.com/BookStackApp/BookStack/pull/4430) for working to provide the code for this functionality.

### Visual Theme System Header Partials

When it comes to customising your BookStack instance, the header bar can be a popular target for tweaks and additions.
Previously the template code was mostly stored in a single large template file, requiring a lot to override and support for minor changes
using our [visual theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/visual-theme-system.md).
As of v23.10, the header bar has been split out into more specific template files, to allow more targeted tweaking.
The main links, logo, search-box, and user dropdown menu are now each their own template.

Additionally, we've added a blank `layouts/parts/header-links-start.blade.php` template that can specifically be used to 
add extra links to the header, since this was a common customization desire.
As an example, adding a `<theme_folder>/layouts/parts/header-links-start.blade.php` of:

```php
<a href="{{ url('/tags') }}">@icon('tag')<span>Tags</span></a>
```

Would result in:

![A view of the BookStack header bar with an added "Tags" link placed before "Shelves"](/images/2023/10/header_customization_example.png)

### Editor Entity Search Prefill

This is a relatively minor feature but an example of a neat user experience optimisation,
[recommended by @aswgxf](https://github.com/BookStackApp/BookStack/issues/4571).
In the editor, when linking to another item in the system via the selector (commonly accessed using the `Ctrl+Shift+K` shortcut)
we'll now pre-fill the search box with the text that was selected (if any) in the editor:

<video src="/images/2023/10/editor_link_selector_prefill.webm" controls muted></video>

### Logical Theme System Error Handling

Within the v23.06 release I made a lot of changes to the location and paths of classes within the BookStack codebase.
These changes caused many usages of the logical theme system to break, which is expected, but many of those issues were
not clear to users, leading to unknown errors and many raised support queries.

To help in such scenarios, extra error handling has been added to help indicate when logical theme system
code fails to load.

![The BookStack debug view with the message "Failed loading theme functions file at "functions.php" with error: Class "BookStack\Biscuit" not found](/images/2023/10/custom_theme_error_handling.png)

This won't catch all error scenarios of code within your `functions.php`, but it should help indicate issues
in the most common of scenarios upon changes from BookStack updates.

### Image Upload Error Handling Improvements

Image uploads are a common source of potential issues for a system like BookStack.
Various limits and software configurations can lead to images failing to upload.
Previously in BookStack we didn't always handle these in the best way. 
Failed uploads could respond with vague error messages, while potentially preventing the gallery from loading afterwards.

In this release cycle, I've spent a good while emulating and testing common cases so we can better address them.
Here's an extreme example to demonstrate the new messaging that can appear:

![The BookStack image gallery view showing an three different types of errors. One within the image gallery list. One for a failed upload. And one for a specific selected image.](/images/2023/10/image_upload_handling.png)

In particular, the tricky issue to handle here has been handling memory-limit events. 
When these are triggered, the application goes straight into a shutdown-like mode which makes it difficult to catch
these errors in a typical error handling manner. Instead we have to reserve some extra memory, 
then hook into that shutdown handling event so we can customise the application response with something friendlier.

### Fixes & Cleanup

Much of the focus of this release cycle was upon code-cleanup and bug-fixing.
I've been going back over parts of the codebase and addressing inconsistencies that have been on my mind for a while.
If interested, examples include:

- [Language handling cleanup](https://github.com/BookStackApp/BookStack/pull/4555/files)
- [Guest user handling cleanup](https://github.com/BookStackApp/BookStack/pull/4554/files)
- [HTTP calling cleanup](https://github.com/BookStackApp/BookStack/pull/4525/files)
- [Mixed-entity endpoint alignment](https://github.com/BookStackApp/BookStack/commit/2fbf5527c70d5d3eadb2767ca5301ad05f7f28c8)

See the [full list of changes below](/blog/bookstack-release-v23-10/#full-list-of-changes) for a complete view of all the changes made.

### Translations

A new language enters with this BookStack release. The new addition is Uzbek!
Thanks to [@mrmuminov](https://github.com/BookStackApp/BookStack/pull/4527) for contributing this language addition.

Upon the new language, once again a massive thanks to all the phenomenal polylingual professionals below
that have contributed translation text since the last feature release:

- Jan Mitrof (jan.kachlik) - *Czech - 474 words*
- Indrek Haav (IndrekHaav) - *Estonian - 347 words*
- m0uch0 - *Spanish - 456 words*
- scureza - *Italian - 427 words*
- link1183 - *French - 448 words*
- Maciej Lebiest (Szwendacz) - *Polish - 370 words*
- sdhadi - *Persian - 468 words*
- toras9000 - *Japanese - 930 words*
- Sascha (Man-in-Black) - *German - 318 words*
- Matthias Mai (schnapsidee) - *German Informal - 326 words*
- 10935336 - *Chinese Simplified - 618 words*
- Éric Gaspar (erga) - *French - 424 words*
- Tomislav Kraljević (tomislav.kraljevic) - *Croatian - 329 words*
- Martin Sebek (sebekmartin) - *Czech - 135 words*
- Mohammadreza Madadi (madadi.efl) - *Persian - 165 words*
- Renan (rfpe) - *Portuguese, Brazilian - 135 words*
- SmokingCrop - *Dutch - 110 words*
- Marco (cdrfun) - *German Informal; German - 72 words*
- Guttorm Hveem (guttormhveem) - *Norwegian Nynorsk - 70 words*
- David Bauer (davbauer) - *German - 64 words*
- H.-H. Peng (Hsins) - *Chinese Traditional - 109 words*
- Igor V Belousov (biv) - *Russian - 27 words*
- ZZnOB (zznobzz) - *Russian - 36 words*
- rupus - *Swedish - 22 words*
- Jøran Haugli (haugli92) - *Norwegian Bokmal - 7 words*
- TWME - *Chinese Traditional - 14 words*
- developernecsys - *Norwegian Nynorsk - 4 words*
- xuan LI (xuanli233) - *Chinese Simplified - 8 words*
- Konstantin Kovacheli (kkovacheli) - *Ukrainian - 2 words*

*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

As mentioned in the last "Next Steps", my focus now will be on how we handle free-text inputs within the system.
Specifically these relate to comments and descriptions for shelves, books and pages.
It's been long requested to have a few more formatting options and features within descriptions, whereas we've always
had markdown support in comments but hasn't been clear to users. 
I'd be assessing the use of a simplistic WYSIWYG solution to unify these inputs, and attempting to find a balance and fit of options to include.

Beyond that, there's a pending pull request to add OIDC RP-initiated logout, so I'll likely dive into that for the next release.
On the subject of auth, there have been more requests for hardware tokens for MFA usage. I'd quite like to dig into this to gain
experience of the WebAuthN spec, although I'm not too sure how, or if, the growing popularity of passkeys fit into this picture.
If that's your area of expertise, I'd love to hear your input in response [to my comment here](https://github.com/BookStackApp/BookStack/issues/3912#issuecomment-1781212350).

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