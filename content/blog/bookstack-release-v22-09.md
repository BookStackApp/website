+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.09"
date = 2022-09-08T11:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/sheep-mountain-luke-ellis-craven.jpg"
slug = "bookstack-release-v22-09"
draft = false
+++

The BookStack September release is here with a variety of desired features that build upon,
and enhance, existing BookStack systems. As usual, it also includes language updates
and a bunch of tweaks & fixes.

* [Release video overview](https://youtu.be/nK2FqQCP-Ms)
* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.09)


**Upgrade Notices**

- **Security** - This release cycle contained a security release that added detail that's important to consider when BookStack content is used externally. See the [v22.07.3 post](/blog/bookstack-release-v22-07-3/) for more detail.
- **Revision Visibility** - This update fixes a permission disparity with revisions. Revision content has always been accessible to those with page-view permissions, but the links to the revisions list previously required page-edit permission to show. This has been aligned, which may mean page revision links may now show to those that did not previously see them.
- **Revision Limit Change** - The default, per-page, revision limit has been doubled from 50 to 100, to account for new system-content updates that may occur. If desired, you can [configure this to a custom value](/docs/admin/other-config/#revision-limit).
- **Reference Index** - New features have been added to track links between content in BookStack, which uses an internal reference index. Upon upgrade from an older BookStack version, this index will need to be rebuilt. This can be done with the ["Regenerate References" command](/docs/admin/commands/#regenerate-reference-index) or via the "Regenerate References" maintenance action within BookStack.

### Page Content References

When you edit and save pages within the system, BookStack will now attempt to identify links 
to other pages, chapters, books and shelves in the system.
A new element will show when viewing one of those items, reflecting a count of pages that link
to the currently viewed item:

![Text within a "Details" section showing "Referenced on 3 pages"](/images/2022/09/references_link.png)

When clicked, this will take you to a new "References" view which lists the all pages
leading to the this current item:

![Screenshot of a "References" view with a list of page items](/images/2022/09/references_view.png)

This new feature should help provide some insight to how content is interlinked within the system, 
while also providing an index that we can use within BookStack's systems to make some operations more efficient.

When upgrading an existing BookStack instance, no references will be indexed until you start saving content.
To index and detect existing cross-content links, you can use the new "Regenerate References"
admin maintenance action:

![A card within the interface showing a "Regenerate References" section and action button](/images/2022/09/regen_references_action.png)

Alternatively, this action has also been added as a terminal command which 
you can [find in our documentation here](/docs/admin/commands/#regenerate-reference-index).

### Auto Link Updating

Making use of our new reference indexing system, as detailed above, BookStack will now
auto-update internal page links to shelves, books, chapters and other pages when those 
items experience a change in URL.

BookStack already had a system to handle some changes, it would attempt to find pages using 
their old URLs by looking up against page revisions, but this would not work for books, chapters & shelves
or for pages if revisions were deleted.
Now, upon changes to an item's URL, BookStack will lookup pages referencing that item and auto-update
such links to be current. This will be done in a fully transparent manner, with a revision
being logged for the change with a "System auto-update of internal links" changelog message.
To support this addition, the default per-page revision limit has increased from 50 to 100 entries.

There may still be some logical gaps that will produce old links, such as restoring an old page revision, 
but this should handle most cases to ensure internal links stay current.

### OIDC Group Sync Support

OIDC authentication was added to BookStack almost a year ago, as part of v21.10.
Since then I've been [taking feedback](https://github.com/BookStackApp/BookStack/issues/3004)
to understand how group syncing would operate. Within v22.09 we're putting that feedback
into action with the addition of OIDC group sync support.

To work with BookStack, your OIDC system will need to provide groups within the OIDC ID token
it provides back to BookStack. To support this in BookStack, we've added options to
define custom authentication request scopes (Needed for groups in some scenarios)
while also supporting accessing nested properties in the ID token JSON data.

Read the new ["Group Sync" section](/docs/admin/oidc-auth/#group-sync) of our OIDC documentation for more details.

### New "Local (Secure - Restricted)" Image Storage Option

A long while ago we added a `local_secure` storage option for images which required user login
before serving an image, as a layer of access control.
This release takes this further with a `local_secure_restricted` storage option which
will check the user's permissions to access the item that an image was uploaded to.
This means that image file access for page images can be controlled by the page they're uploaded to, providing
a whole new layer of control for environments that need it.

This new option does have some caveats, mainly that it can introduce various logical scenarios
that cause image visibility anomalies, in cases where images are re-used across different permissions contexts.

[Find full details of this option in our docs](/docs/admin/upload-config/#local-secure---restricted).

### "Page Include Parse" Logical Theme Event

Our [logical theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md)
has received a new event to customise handling of the [page include system](/docs/user/reusing-page-content).
The page include system allows dynamic import of page content into the body of a page.
Using this event, you can now extensively customize the handling of page includes.

As an example, the below `functions.php` code would replace "dog" with "cat" in included content:

```php
<?php

use BookStack\Entities\Models\Page;
use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;

Theme::listen(ThemeEvents::PAGE_INCLUDE_PARSE, function(string $tagReference, string $replacementHTML, Page $currentPage, ?Page $referencedPage) {
    return str_replace('dog', 'cat', $replacementHTML);
});
```

Of course there are much more practical examples for this, such as defining fallback content or adding extra permission control.

Find the details of the event [in the source code here](https://github.com/BookStackApp/BookStack/blob/98aed794cc7272687720c4f4c42a4f540390c0af/app/Theming/ThemeEvents.php#L73-L86).

### Visual Theme System - Export Template Partials

As part of v22.07.2 we added a couple of export-specific template files
that could be used with the [visual theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/visual-theme-system.md), found at:

- `layouts/parts/export-body-start.blade.php`
- `layouts/parts/export-body-end.blade.php`

These can be used to add custom HTML code to the start & end of the HTML content used for
HTML and PDF exports within BookStack.

As a usage example I published a video on the BookStack YouTube channel showing 
how to leverage these new templates to add a custom header and footer
to PDF exports:

{{< yt 5bZ7zlNEphc >}}

### Translations

This release of BookStack adds Romanian as an available language. 
A massive thanks to Mihai Ochian (soulstorm19) on Crowdin for their amazing effort
of translating over 6k words in this release cycle to add this language.

As usual, a range of our existing languages have received updates from our terrific translators
since v22.07, so a big thanks to all listed below:

- Mihai Ochian (soulstorm19) - *Romanian*
- 10935336 - *Chinese Simplified*
- HeartCore - *German Informal; German*
- Ji-Hyeon Gim (PotatoGim) - *Korean*
- SmokingCrop - *Dutch*
- m0uch0 - *Spanish*
- scureza - *Italian*
- pedromcsousa - *Portuguese*
- Statium - *Russian*
- Maciej Lebiest (Szwendacz) - *Polish*
- Alex Navarro (alex.n.navarro) - *Portuguese, Brazilian*
- Douradinho - *Portuguese*
- na3shkw - *Japanese*
- Éric Gaspar (erga) - *French*
- mcgong (GongMingCai) - *Chinese Simplified; Chinese Traditional*
- okaeiz - *Persian*

### Next Steps

For the next release cycle I'll probably re-focus back on the permission system, to start
development of the features intended on the related road-map item, such as an overhaul of
item-level permission management to be more intuitive.

We're approaching a milestone of 10k GitHub stars so there may be a minor detour to 
celebrate that little achievement. 

### Full List of Changes

**Released in v22.09**

* Added cross-item link reference tracking & updating. ([#3656](https://github.com/BookStackApp/BookStack/pull/3656), [#3683](https://github.com/BookStackApp/BookStack/issues/3683), [#1969](https://github.com/BookStackApp/BookStack/issues/1969))
* Added OIDC group sync functionality. ([#3616](https://github.com/BookStackApp/BookStack/pull/3616), [#3004](https://github.com/BookStackApp/BookStack/issues/3004))
* Added reference view to shelves, chapters, books & pages. ([#2864](https://github.com/BookStackApp/BookStack/issues/2864))
* Added new `local_secure_restricted` image storage option. ([#3693](https://github.com/BookStackApp/BookStack/pull/3693))
* Added "page_include_parse" theme event. ([#3698](https://github.com/BookStackApp/BookStack/pull/3698))
* Updated API docs to add detail for the request format. ([#3652](https://github.com/BookStackApp/BookStack/issues/3652))
* Updated revision link visibility to show to users. ([#2946](https://github.com/BookStackApp/BookStack/issues/2946))
* Updated shelf naming to be consistent across system. ([#3553](https://github.com/BookStackApp/BookStack/issues/3553))
* Updated translations with latest Crowdin changes. ([#3643](https://github.com/BookStackApp/BookStack/pull/3643), [#3701](https://github.com/BookStackApp/BookStack/pull/3701))
* Updated role edit/create form with clarification upon image access permissions. ([#3688](https://github.com/BookStackApp/BookStack/issues/3688))
* Fixed dates not using the correct encoding on some systems. ([#3590](https://github.com/BookStackApp/BookStack/issues/3590))
* Fixed image delete button showing to those without permission to delete. ([#3697](https://github.com/BookStackApp/BookStack/issues/3697))
* Fixed incorrect comment counts on Chinese language options. ([#3554](https://github.com/BookStackApp/BookStack/issues/3554))
* Fixed list indentation when next to floated images. ([#3672](https://github.com/BookStackApp/BookStack/issues/3672))
* Fixed various RTL text interface issues. ([#3702](https://github.com/BookStackApp/BookStack/issues/3702))
* Fixed WYSIWYG drawing update not triggering draft save. ([#3682](https://github.com/BookStackApp/BookStack/issues/3682))
* Fixed some additional SVG-based script cases not being filtered. ([#3705](https://github.com/BookStackApp/BookStack/issues/3705))

**Released in v22.07.3**

* Added API documentation section to advise of content security. ([#3636](https://github.com/BookStackApp/BookStack/issues/3636))
* Updated Persian translations. Thanks to [@samadha56](https://github.com/BookStackApp/BookStack/pull/3639). ([#3639](https://github.com/BookStackApp/BookStack/pull/3639))
* Updated code block rendering to help prevent blank blocks on fresh cache. ([#3637](https://github.com/BookStackApp/BookStack/issues/3637))
* Updated HTML filtering to prevent SVG animate case. ([#3636](https://github.com/BookStackApp/BookStack/issues/3636))
* Updated translations with latest changes from Crowdin. ([#3635](https://github.com/BookStackApp/BookStack/pull/3635))
* Updated revision list view to help prevent system memory exhaustion. ([#3633](https://github.com/BookStackApp/BookStack/issues/3633))
* Fixed issue with permission checking prevent certain actions where permission should have allowed. ([#3632](https://github.com/BookStackApp/BookStack/pull/3632))

**Released in v22.07.2**

* Added body-start/end partials to export template, for easier export customization via the visual theme system. ([#3630](https://github.com/BookStackApp/BookStack/pull/3630))
* Added activity recording for revision delete/restore. ([#3628](https://github.com/BookStackApp/BookStack/issues/3628))
* Updated translations with latest changes from Crowdin. ([#3625](https://github.com/BookStackApp/BookStack/pull/3625))
* Updated user validation with sensible limit to name input. ([#3614](https://github.com/BookStackApp/BookStack/issues/3614))
* Fixed issue where activity type could not be selected in the audit log. ([#3623](https://github.com/BookStackApp/BookStack/issues/3623))
* Fixed possibility of breaking page load due to bad user language input. ([#3615](https://github.com/BookStackApp/BookStack/issues/3615))

**Released in v22.07.1**

* Fixed issue where old WYSIWYG editor code would be cached, preventing the editor from showing. ([#3611](https://github.com/BookStackApp/BookStack/issues/3611))
* Updated translations with latest Crowdin changes. ([#3605](https://github.com/BookStackApp/BookStack/pull/3605))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@lukeelliscraven?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Luke Ellis-Craven</a> on <a href="https://unsplash.com/s/photos/sheep?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>