+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.02"
date = 2022-02-26T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/blossom-tegethoff.jpg"
slug = "bookstack-release-v22-02"
draft = false
+++

Today we announce the first BookStack feature release of 2022.
This brings updates & features to the WYSIWYG editor, user management API endpoints and much more. In this post we cover features added in this release
in addition to some notable changes in the v21.12 patch releases.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.02)


**Upgrade Notices**

- **PHP Requirements Change** - The minimum required version of PHP has changed from 7.3 to 7.4.
- **Composer Requirements Change** - As of release v21.12.3 composer version 2.0 or greater is required. See our [v21.12.3 update notes](/docs/admin/updates/#updating-to-v21123-or-higher) for details on upgrading this.
- **Security Releases** - During this last release cycle there was a security update. See the [v21.12.1 blog post](/blog/bookstack-release-v21-12-1/) for more detail.

### WYSIWYG Editor Updates

The main work for this release has been focused on the WYSIWYG editor.
The library used by BookStack, TinyMCE, has been updated to a much newer version and we've reorganized the connected BookStack codebase.

In terms of usage, everything should remain familiar. The most apparent changes are to the toolbar:

![New Editor Toolbar Styling](/images/2022/02/editor-toolbar.png)

The styling and size of the buttons has changed to be a little more modern and easier to use. The location of some buttons have been moved, with lesser-used controls being placed behind overflow menus to keep the default toolbar focused & simple. Code formatting options have been moved out from the block formats dropdown to instead be inline & insert options. A new help "(?)" toolbar button has been added to show editor license information in addition providing a handy list of available shortcuts.

For those using BookStack in a language other than English, the editor is now linked to our translation system meaning that, where language files have been updated, controls within the editor should now be in your preferred language:

![Example of editor controls in French](/images/2022/02/editor-translations.png)

You'll probably notice other usability and speed improvements gained by the more modern underlying library, otherwise all existing features and abilities should remain the same.

Within this release cycle I did spend some time exploring alternative options but [I found](https://github.com/BookStackApp/BookStack/issues/2738#issuecomment-1022683101) that moving away from TinyMCE would be quite a painful process for us so instead I chose a more stable path for now.

### Collapsible Content Block WYSIWYG Editor Support

For the first time in while we've added a new content type to the WYSIWYG editor: The collapsible content block. These blocks allow the grouping of multiple other blocks of content into a container that can be toggled open by the reader. 

<video loading="lazy" controls="true" src="/images/2022/02/collapsible-blocks.mp4" muted></video>

These blocks are open within the editor and closed when viewed on a page. They can be toggled closed within the editor for cleaner editing or previewing purposes. The label used on the toggle bar can be edited as desired. When page content is exported these sections are still represented although in an open state so that content is visible. 

Behind the scenes these blocks use the HTML standard `<details>`/`<summary>` elements as described on [MDN here](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details). Markdown users have been able to use these within BookStack, using the HTML representation, but the inclusion in the WYSIWYG editor helps align abilities. 

The addition of these blocks adds some great potential use-cases to empower your documentation; From cleaning up large detailed sections or code-blocks, to being able to provide spoiler-free question and answer style content:

![Question and Answers using collapsible blocks](/images/2022/02/collapse-blocks-qa.png)


### User Management API Endpoints

In this release the API receives another set of abilities. There are new endpoints for 
user listing, creation, updating and deletion. 
All of these actions require "Manage Users" role permissions by the API client user.

![Preview of user API docs](/images/2022/02/api-user-endpoints.png)

These new endpoints unlock a whole new avenue for automated and programmatic user management 
in addition to allowing bulk operations to be script-able. Need to migrate thousands
of users into BookStack? Now it's possible!

You can find more detail for these endpoints via our [demo site API docs](https://demo.bookstackapp.com/api/docs#users-list).

### Webhook Improvements

BookStack v21.12 added support for outgoing webhooks. In v.21.12.1 this system was enhanced with the following additions/changes:

- Webhook network errors will now be caught as to not break next page loading.
- Webhook "Last Called" time, "Last Errored" time and "Last Error" messages are now recorded against the webhook and shown in the webhook edit page for easier debugging.
- The HTTP webhook call timeout is now configurable per-webhook.

![Example of webhook debug details](/images/2022/02/webhook-debug-help.png)

These changes should greatly improve the debugging process, if needed, when setting up webhooks while allowing them to be used in a much more reliable manner.

### Language Selection on User Creation

As of v21.12.4 you can now select a preferred language when creating a new user in the system:

![New user language select control](/images/2022/02/user-create-language.png)

Upon showing the correct language upon first login, this means that the new user can now receive the invitation email in the most suitable language, instead of it being based on the language of the admin creating the user, which was not very intuitive. 

### PDF Export Page Size Option

A new `.env` option was added in v21.12.4 to provide control over PDF export page size.
By default Bookstack will use an A4 page size but this can be changed to "US Letter" size by
adding the following to your `.env` file:

```bash
# US Letter PDF export size
EXPORT_PAGE_SIZE=letter
```

### Enhancements to the "Recently Updated Pages" List

In BookStack v21.12.3 the "Recently Updated Pages" view, accessed via the homepage card of the same name,
was enhanced with some additional context-specific details:

- Last update author and last update time are now shown.
- The parent book/chapter chain are displayed for each item.

![Preview of "Recently updated pages" list](/images/2022/02/recently-updated-enhancements.png)

Special thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3177) for helping to evolve this area of the application.

### Translations

As is common, our remarkable translators have continued their great work to keep the language strings up to date. 
This release added a bulk-load of new terms, for use within the editor, so a particularly big thanks from me to those that have translated all those extra terms since inclusion. The contributors and their updates made, since the initial v21.12 release, are as follows:

- Saeed (saeed205) - *Persian*
- SmokingCrop - *Dutch*
- Dan Brown (ssddanbrown) - *Korean*
- Indrek Haav (IndrekHaav) - *Estonian*
- Maciej Lebiest (Szwendacz) - *Polish*
- DiscordDigital - *German; German Informal*
- 10935336 - *Chinese Simplified*
- scureza - *Italian*
- Gábor Marton (dodver) - *Hungarian*
- Jasell - *Swedish*
- Tomáš Batelka (Vofy) - *Czech*
- Martins Pilsetnieks (pilsetnieks) - *Latvian*
- na3shkw - *Japanese*
- m0uch0 - *Spanish*
- Mundo Racional (ismael.mesquita) - *Portuguese, Brazilian*
- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- Zarik (3apuk) - *Russian*
- nutsflag - *French*
- Ravid Shachar (ravidshachar) - *Hebrew*
- Helga Guchshenskaya (guchshenskaya) - *Russian*
- Gerwin de Keijzer (gdekeijzer) - *German Informal; Dutch*
- daniel chou (chou0214) - *Chinese Traditional*
- Julesdevops - *French*
- Nicolas Pawlak (Mikolajek) - *French*
- ChacMaster - *Portuguese, Brazilian*
- Manolis PATRIARCHE (m.patriarche) - *French*
- Mohammed Haboubi (haboubi92) - *Arabic*
- peter cerny (posli.to.semka) - *Slovak*
- roncallyt - *Portuguese, Brazilian*
- goegol - *Dutch*
- Pavel Karlin (pavelkarlin) - *Russian*
- Khroners - *French*
- msevgen - *Turkish*
- Ali Shaatani (a.shaatani) - *Arabic*
- @ististyle - *Korean*

### Development Git Branch Changes

For those closer to the BookStack code, within the last release we've changed the default development branch name from `master` to `development`. This was to add clarity to the branch's purpose while avoiding any potential concerns of offence.

If you have any existing links or branch references, GitHub should redirect and/or warn about this change upon interaction.

### Full List of Changes

**Released in v22.02**

* Added collapsible content blocks support to the WYSIWYG editor. ([#78](https://github.com/BookStackApp/BookStack/issues/78), [#3260](https://github.com/BookStackApp/BookStack/pull/3260))
* Added translation support to the WYSIWYG editor. ([#1838](https://github.com/BookStackApp/BookStack/issues/1838))
* Added user management API endpoints. ([#3238](https://github.com/BookStackApp/BookStack/pull/3238), [#1363](https://github.com/BookStackApp/BookStack/issues/1363), [#2701](https://github.com/BookStackApp/BookStack/issues/2701))
* Changed minimum PHP version from 7.3 to 7.4. ([#3245](https://github.com/BookStackApp/BookStack/pull/3245), [#3152](https://github.com/BookStackApp/BookStack/issues/3152))
* Updated translations with latest Crowdin changes. ([#3258](https://github.com/BookStackApp/BookStack/pull/3258), [#3251](https://github.com/BookStackApp/BookStack/pull/3251), [#3259](https://github.com/BookStackApp/BookStack/pull/3259))
* Updated Korean translations. Thanks to [@ististyle](https://github.com/BookStackApp/BookStack/pull/3256). ([#3256](https://github.com/BookStackApp/BookStack/pull/3256))
* Updated TinyMCE WYSIWYG editor to the latest version. ([#3247](https://github.com/BookStackApp/BookStack/pull/3247))
* Improved PDF export rendering of images within tables. ([#3190](https://github.com/BookStackApp/BookStack/issues/3190))
* Fixed potential web console error message when loading the editor. ([#2461](https://github.com/BookStackApp/BookStack/issues/2461))
* Fixed issue where OIDC token failures would not be shown to the user. ([#3264](https://github.com/BookStackApp/BookStack/issues/3264))
* Fixed issue where the editor could jump-scroll to the top after format change on FireFox ([#2692](https://github.com/BookStackApp/BookStack/issues/2692))

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

This release was the first in working upon our "Editor Alignment & Review" [road-map](https://github.com/BookStackApp/BookStack#%EF%B8%8F-road-map) item. 
For this next feature release I'll be looking to get deeper into this road-map item to align markdown & wysiwyg feature-sets and potentially offer easier traversal between these editor options.

With the updates made to the WYSIWYG editor I think it's likely we'll have a flurry of patch releases to enhance features and patch issues that pop up from wider usage.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@tegethoff?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Mark Tegethoff</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>