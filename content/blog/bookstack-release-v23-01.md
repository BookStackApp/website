+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.01"
date = 2023-01-31T11:45:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/snow-doggo-tadeusz-lakota.jpg"
slug = "bookstack-release-v23-01"
draft = false
+++

To start off our releases for the year we have BookStack v23.01 which adds many user experience enhancements &
options while also making subtle further back-end changes to permissions.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.01)

**Upgrade Notices**

- **Permission Changes** - There have been changes to the permission system which can affect how permissions apply and therefore could lead to changes in provided abilities upon upgrade. This is only really relevant to complex permission scenarios that have only been possible since BookStack v22.10. Please see the [Permission System Changes](#permission-system-changes) section below for more details on this.
- **Database Upgrade Time** - Changes to the permission system have required permissions to be regenerated upon upgrade. Due to this, the `php artisan migrate` upgrade step may take extra time to run, especially where there are a lot of content and/or roles in the system.

{{<yt W7I2Hlcj1QA>}}

### App Icon Control

We have a new customization setting!
This addition allows the upload and easy use of a custom application icon that will be utilized
by browsers as the tab icon, or often by mobile devices to use as an "App" icon when creating a
webpage shortcut.

![Screenshot of an "Application Icon" setting with a preview image showing a cat](/images/2023/01/app_icon_setting.png)

This is a separate option to the application logo since they're used in different areas in different ways,
and the icon is expected to be a fixed-square size whereas the logo may vary in aspect ratio.
Upon upload BookStack resizes the provided image into a range of sizes for good general compatibility
across different browsers, devices and platforms. 

![A row of mobile app icons, with a BookStack-labelled cat icon in the centre](/images/2023/01/mobile_app_icon.webp)

While you could already hack-in a custom icon via various means, this should make it much easier and accessible
to those that don't want to hack about with code or web-servers.

### New Color Scheme Controls

Continuing the theme of customization settings, the provided color options have had a significant revamp.
The main addition is that different controls are now available for light and dark mode, meaning you can
set different colors to best suit the mode and theme.

![View of a "Application Color Scheme" panel with color controls and separate dark & light mode sections](/images/2023/01/app_color_scheme.png)

To support choosing good colors, the interface will jump between light or dark mode as you select the relevant tabs.
It was always tricky to select colors that worked well cross-theme, while ensuring good contrast and legibility,
so hopefully this will be quite a welcome addition to address that concern.

A more subtle addition to the color controls is a new "Default Link Color" option.
Links and actions within the interface would previously use the primary color, but this could be problematic
since the primary color was also used for many non-text focused use-cases such as the header banner and other decorations
which made choosing a color, which worked well across all these areas, difficult to achieve.
Splitting these out now provides a little more control to get the right look with great usability.

![Screenshot of a page view in BookStack, showing different colors between the actions sidebar and header banner](/images/2023/01/app_link_color_usage.png)

BookStack has set new defaults for the dark-mode colors, but those upgrading will find their color settings 
auto-copied across to ensure minimal change upon system update, although you can just then change these settings thereafter.


### Book Sorting Experience Upgrades

The book sort interface has received a fair bit of attention to make the experience more pleasant than ever.
The changes here were primarily to ensure usability via screen-reader and keyboard-only-use, but such changes can
have a positive impact to all. Changes include:

- Sort items will now show up & down buttons to allow quick sorting without drag+drop.
- A new menu on sort-items provides a range contextual actions such as "Move to Next Book" or "Move to Previous Chapter".
- Multi-select and drag, once previously available but since broken, has now been fixed.
- The "Other books" sidebar is now sticky on desktop, meaning you don't need to scroll back up to find this box when sorting long books.
- The "book" sort boxes are now collapsible, which is useful when sorting multiple large books. 
- Sort items show drag-handles to make it clear you're able to drag & drop.
- Some intro text has been added to help guide users. 

![Screenshot of the BookStack sort view for a book, featuring a collapsed book and a dropdown menu providing move actions for a page](/images/2023/01/book_sort.png)

### Code Language Additions

Since the original v22.11 release a few new code languages have been added for code-highlighting and code-editor support:

- Scheme
- SQL variants: MySQL, MSSQL, PostgreSQL, SQLite
- Twig (PHP Templating Engine)
- Smarty (PHP Templating Engine)

![Screenshot of the BookStack code editor, showing "Twig" templating code being correctly highlighted](/images/2023/01/twig_code.png)

### OIDC Auth ID Configuration Option

When Open ID Connect (OIDC) is used BookStack will store the unique ID of a user for later BookStack-to-identity-provider
user matching. It would do this using the `sub` ID Token claim as per the OIDC standards.
OIDC is a pretty good, modern, and well-defined standard, so this works absolutely fine for the majority of use-cases.

Unfortunately, as I have learnt from our other auth systems, Active Directory never likes to make life simple.
By default AzureAD will use a `sub` claim value that's per-application-per-user unique, which makes it hard to predict
ahead-of-use by admins that may want to manually connect up existing users.
That said, AzureAD will also provide a `upn` claim that's just per-user unique, but this is a non-standard claim.

To support such  a scenario, we've added an option to set the claim name to be used as the ID:

```bash
OIDC_EXTERNAL_ID_CLAIM=upn
```

A [section has been added](/docs/admin/oidc-auth/#using-a-different-id-claim) to the docs to detail its use.


### Permission System Changes

A large amount of time over the last two months was spent on revamping permissions in an effort to allow user-specific content permissions.
Unfortunately, this hit some performance & complexity blockers so is not something to be included at this time but it did lead me to discover
a range of complex permission scenarios for which the logic was inconsistent or could be based on assumption.
Such problematic scenarios were primarily [introduced as of BookStack v22.10](/blog/bookstack-release-v22-10/#redesigned-content-permission-control)
since this added the ability to combine role permissions with other permission controls.

Diving into this, I decided to spend time defining exactly how permissions should interplay to ensure consistency.
This was developed alongside a range of [scenario definitions](https://github.com/BookStackApp/BookStack/blob/8367a94e90e5e1bf7d06defe30d570ade2f00599/dev/docs/permission-scenario-testing.md), 
each of which is backed by automated functional application tests of our permission systems.

Our "Roles and Permissions" documentation page has been updated with [a new section](/docs/user/roles-and-permissions/#advanced-permission-logic) 
to provide a functional overview of how permissions are applied in more complex cases.

These changes do mean that, upon upgrade, permissions resolution for content may differ to that of previous versions of BookStack
although this should only be in very complex cases that have only been possible since BookStack v22.10.
I very much don't like to introduce changes to permissions & existing access control, since providing a stable upgrade path is very important to me,
but the changes here were required due to current inconsistent handling.

### Translations

A humongous heap of thanks once again to all the below people that have helped translate BookStack 
text since the original v22.11 release:

- RandomUser0815 - *German Informal*
- Matthias Mai (schnapsidee) - *German; German Informal*
- 10935336 - *Chinese Simplified*
- Naoto Ishikawa (na3shkw) - *Japanese*
- Maciej Lebiest (Szwendacz) - *Polish*
- m0uch0 - *Spanish*
- Pafzedog - *French*
- Angelos Chouvardas (achouvardas) - *Greek*
- Xabi (xabikip) - *Basque*
- David Furman (thefourCraft) - *Hebrew*
- Indrek Haav (IndrekHaav) - *Estonian*
- Jan Mitrof (jan.kachlik) - *Czech*
- Martin Sebek (sebekmartin) - *Czech*
- Adrian Ocneanu (aocneanu) - *Romanian*
- sdhadi - *Persian*
- scureza - *Italian*
- SmokingCrop - *Dutch*
- rndrss - *Portuguese, Brazilian*
- Eduardo Castanho (EduardoCastanho) - *Portuguese*
- VIET NAM VPS (vietnamvps) - *Vietnamese*
- rirac294 - *Russian*
- m4tthi4s - *French*

### Next Steps

The next release will be relatively boring. I'm dedicating the slightly shorter month to updating our framework 
and some libraries used so we're not falling too far behind. 
As part of this, the minimum version of PHP will be increased to PHP 8.0, so some work will be going into supporting
our main installation routes & scripts with upgrade path guidance.

As touched upon in the v22.11 release post, I've started building a "Hacks" area of the site to centrally store and share 
various customizations that I've provided using the theme systems and other methods. 
I'll likely soon write another blogpost to specific detail this once ready.

### BookStack on Mastodon

On a somewhat unrelated note, I recently set-up an official Mastodon account for BookStack
which can be found at [@bookstack@fosstodon.org](https://fosstodon.org/@bookstack).

I was originally quite stubborn on setting this up, after users requested we move from Twitter, since I was instead hoping that Twitter would at least meet its downfall first
so it wouldn't add yet another social channel to manage.
After begrudgingly setting up the account, i've quickly become quite fond of Mastodon due to the user control provided
and lack of algorithm so have since also [personally moved across](https://fosstodon.org/@danb).
The BookStack Twitter account will remain active and used, at least for now.

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