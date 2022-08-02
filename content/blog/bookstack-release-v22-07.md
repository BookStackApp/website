+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.07"
date = 2022-07-28T13:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/library-chaojie-ni.jpg"
slug = "bookstack-release-v22-07"
draft = false
+++

For July we have what could be considered a "stepping-stone" release since it marks the start of some underlying 
permission system changes but it does bundle in a rich set of system enhancements & minor features. Let's jump right in.

* [Release video overview](https://youtu.be/m0iCq2MFynI)
* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.07)

### Permission System Performance Increase

A fair amount of time this release cycle went into reviewing and refactoring the permission system.
This is ahead of adding future planned permission features, as I thought it best to address performance 
before building upon our current system any further.

With a lot of performance profiling, some significant slow-code pain-points were addressed.
Upon these, one of the largest performance hindrances was the due to the vast amount of permission data BookStack 
was generating upon changes.

For context, within Bookstack role and content permissions are calculated and flattened for simpler and more performant database queries when searching & viewing content. These are generated upon certain permission-affecting actions (role creation, content creation, permission changes, book sorting, etc.). The number of pre-calculated permission could really add-up; On a full system basis the count of such permissions would roughly be:

```
(Number of roles) * (Count of shelves/books/chapters/pages) * (4-5 different permissions)
```

On a large system, the quantity of pre-calculated permissions could really stack up, and just the time to insert all of this data into the database could really slow things down.

In this release, this pre-calculation is now only done for 'view' permissions, removing create/update/delete permission handling as part of this. This change can often bring a 4x speed improvement for many system actions. It may also provide a slight boost in general system view-usage performance.

These changes have meant that some views have had to change slightly.
In some areas, such as the move-page view, we'd only display chapters and books that the user would have permission to move into.
Now, we'll show all visible chapters & books but add a warning where permission is lacking:

![Move page view with a parent book option showing a warning about lacking permission](/images/2022/07/move-permission-warning.png)

There's a high chance that the future desired permissions features will negatively impact performance so we'll continue to look for performance increasing opportunities to level out these impacts where possible.

### Shelf Book Management Improvements

A little attention has been given to shelf-edit/create view to slightly enhance management of assigned books.
Book list items now have nicer hover and cursor interaction styles, and a drag handle is shown to make it clearer
that the books can be dragged around and re-ordered as desired. 

![View of the books management UI for a shelf, with an active search in use](/images/2022/07/shelf-book-manage.png)

A search bar has been added to the available-books-list so you can quickly find a specific book, especially handy
in larger instances with many pre-existing books you'd have to filter through. This list is now sorted by name
to make it easier to read through, even without using the new search.

### WYSIWYG Code Editor Language Favourites

The WYSIWYG code editor received significant changes in the last feature release. 
Upon feedback, it was evident that usage efficiency may have been hindered when it comes to selecting the code language, 
especially when the desired language is in the latter part of the code list, and hence off-screen by default. 

To remedy this, and to hopefully achieve a more efficient experience than ever before, we've added the ability to
favourite code languages:

![Preview of the code editor with a filled-star symbol next to 5 code language options](/images/2022/07/code-editor-favourites.png)

Favourite languages will be automatically sorted to the top of the list, and these preferences will be stored against your BookStack user account so the favourites remain personal to you, and consistent across browsing devices.

### Sort a Book from the Chapter

Within our BookStack Discord server it was noticeably common for users to ask "How do I re-order pages within a chapter?". 
A past attempt was made to add a specific chapter-sort view but this never progressed to completion. 
As a user-experience-focused workaround, a "Sort Book" action will now show when viewing a chapter, where permission permits:

![Screenshot of a "Sort Book" button within a list of other actions](/images/2022/07/sort-book-from-chapter.png)

### Adjustable IP Address Storage Precision

BookStack stores IP addresses within its audit log to provide admins with visibility of where actions are taking place from.
In some use-cases, this may be considered as storing personal data of others, thus problematic from a privacy perspective.
To address such cases, you can now set an `IP_ADDRESS_PRECISION` option in your `.env` file.

This is a numeric option, defaulting to `4` (Show entire IP address), which effectively states how many octets of an IPv4 address should be shown, or how many pairs-of-chomps of an IPv6 address should show.
As an example, the audit log preview below reflects usage of `IP_ADDRESS_PRECISION=2`:

![Table view of activity, with an IP address column showing 127.0.x.x](/images/2022/07/audit-log-ip-masking.png)

### Editor List Shortcuts

A couple of new shortcuts have been added to both page editors:

- Bullet List - `Ctrl`+`P` (`Cmd`+`P` on Mac)
- Numbered List - `Ctrl`+`O` (`Cmd`+`O` on Mac)

The addition of these should provide less reason for needing to take your fingers off your keyboard and therefore remain in the writing flow.

### Tag-based CSS Customization

Tags are now much easier to use for design customization within BookStack.
Upon viewing of any item with tags, BookStack will format those tags into CSS classes applied to the `<body>` element
of the page. As an example, a tag name/value pair of `Priority: Critical` will apply the following classes to the body:

- tag-name-priority
- tag-value-critical
- tag-pair-priority-critical

This can then allow very easy content-level customization through the use of tags, with only the addition of some custom CSS in the "Custom HTML Head Content" setting. For example, you could apply a `Layout: dual` tag, along with a `.tag-pair-layout-dual .page-content p {columns: 2}` CSS rule to make paragraphs dual-column on those tagged pages.

Some normalization is applied to generate the classes. See our [docs section about tag classes](/docs/admin/hacking-bookstack/#tag-classes) for full details.

### New "Activity Logged" Logical Theme System Event

Our [Logical Theme System](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md), used to customize server-side functionality, has received a new `activity_logged` event. This allows you to run custom logic upon any system-logged event such as those visible in the audit log. 

This can be very powerful, as it provides a lot of visibility into system actions. As an example, the below customization would write out the HTML content of a page to the local filesystem, upon any update or create event:

```php
<?php

use BookStack\Actions\ActivityType;
use BookStack\Entities\Models\Page;
use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;

Theme::listen(ThemeEvents::ACTIVITY_LOGGED, function (string $activityType, $detail) {

    if (!$detail instanceof Page) {
        return;
    }

    $validTypes = [ActivityType::PAGE_UPDATE, ActivityType::PAGE_CREATE];
    if (!in_array($activityType, $validTypes)) {
        return;
    }

    $outPath = "/output/directory/{$detail->id}.html";
    file_put_contents($outPath, $detail->html);
});
```

### Underlying Library Updates

There have been some significant underlying updates done to libraries used in BookStack.
Hopefully these should have little impact to usage while providing some enhancements. Notably:

- TinyMCE (WYSIWYG Editor) was updated to version 6
- DomPDF (Default PDF render) was updated to version 2

### Translations

A usual shout-out again  to our wonderful wordsmiths of different languages that have provided translation content since the  original v22.06 release:

- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- pedromcsousa - *Portuguese*
- Vitaliy (gviabcua) - *Ukrainian*
- scureza - *Italian*
- SmokingCrop - *Dutch*
- 10935336 - *Chinese Simplified*
- Statium - *Russian*
- Éric Gaspar (erga) - *French*
- na3shkw - *Japanese*
- Marcus Silber (marcus.silber82) - *German*
- PellNet - *Croatian*
- Maciej Lebiest (Szwendacz) - *Polish*
- Ole Aldric (Swoy) - *Norwegian Bokmal*
- Winetradr - *German*
- Indrek Haav (IndrekHaav) - *Estonian*
- m0uch0 - *Spanish*
- Sebastian Klaus (sebklaus) - *German*
- Filip Antala (AntalaFilip) - *Slovak*
- nutsflag - *French*
- Nicolas Pawlak (Mikolajek) - *French*
- mcgong (GongMingCai) - *Chinese Simplified; Chinese Traditional*
- Nanang Setia Budi (sefidananang) - *Indonesian*
- Андрей Павлов (andrei.pavlov) - *Russian*
- @smartshogu - *German*


### Next Steps

For the next release I think I may take a detour to look at tracking cross-content links within BookStack for better referencing and url-change handling. This is after writing & discussing my [URL scheme proposal](https://github.com/BookStackApp/BookStack/issues/3520) which I think may be the wrong approach, so I'd like to explore a more direct and pragmatic option.

I'll continue to keep an eye on the permission system, and possibly perform another round of performance improvements there, before diving deeper into the new feature additions in that space.

### Full List of Changes

**Released in v22.07**

* Added 'Sort Book' action to chapters. ([#3598](https://github.com/BookStackApp/BookStack/pull/3598), [#2335](https://github.com/BookStackApp/BookStack/issues/2335))
* Added ability to favourite code languages in the WYSIWYG code editor. ([#3593](https://github.com/BookStackApp/BookStack/pull/3593), [#3542](https://github.com/BookStackApp/BookStack/issues/3542))
* Added option to set IP address storage precision. ([#3560](https://github.com/BookStackApp/BookStack/issues/3560))
* Added tag-based css classes to the HTML body tag for tag-based content CSS targeting. ([#3583](https://github.com/BookStackApp/BookStack/issues/3583))
* Added new Logical Theme System event, emitted upon any system activity event. ([#3572](https://github.com/BookStackApp/BookStack/issues/3572))
* Added editor shortcuts for bullet and numbered lists. ([#3599](https://github.com/BookStackApp/BookStack/pull/3599), [#1269](https://github.com/BookStackApp/BookStack/issues/1269))
* Updated shelf book management interface with better usability and book search bar. ([#3591](https://github.com/BookStackApp/BookStack/pull/3591), [#3266](https://github.com/BookStackApp/BookStack/issues/3266))
* Updated translations with latest changes from Crowdin. ([#3600](https://github.com/BookStackApp/BookStack/pull/3600), [#3545](https://github.com/BookStackApp/BookStack/pull/3545))
* Updated WYSIWYG editor to TinyMCE 6. ([#3580](https://github.com/BookStackApp/BookStack/pull/3580), [#3517](https://github.com/BookStackApp/BookStack/issues/3517))
* Updated DOMPDF, and other PHP dependencies. ([#3579](https://github.com/BookStackApp/BookStack/pull/3579))
* Updated permission system to only "cache" view-based permissions for better performance, and made many other performance improvements. ([#3569](https://github.com/BookStackApp/BookStack/pull/3569))
* Updated WYSIWYG color options to have no names, for better cross-language usage. ([#3530](https://github.com/BookStackApp/BookStack/issues/3530))
* Updated tests to use ssddanbrown/asserthtml library. ([#3519](https://github.com/BookStackApp/BookStack/issues/3519))
* Fixed comment count translation in Chinese translations. Thanks to [@GongMingCai](https://github.com/BookStackApp/BookStack/pull/3556). ([#3556](https://github.com/BookStackApp/BookStack/pull/3556))
* Fixed issue where `AVATAR_URL=false` would not properly disable Gravatar fetching. ([#1835](https://github.com/BookStackApp/BookStack/issues/1835))
* Fixed some German translation typos and grammar. Thanks to [@smartshogu](https://github.com/BookStackApp/BookStack/pull/3570). ([#3570](https://github.com/BookStackApp/BookStack/pull/3570))
* Fixed issue where WYSIWYG toolbar would remain when after inserting a drawing. ([#3597](https://github.com/BookStackApp/BookStack/issues/3597))

**Released in v22.06.2**

* Updated translations with latest CrowdIn changes. ([#3540](https://github.com/BookStackApp/BookStack/pull/3540), [#3531](https://github.com/BookStackApp/BookStack/pull/3531))
* Fixed bug causing LDAP/SAML2 group mapping to fail if the "External Auth Ids" role field contained upper case characters. ([#3535](https://github.com/BookStackApp/BookStack/issues/3535))
* Fixed differing behaviour, between select button and double-click, in the link selector popup. ([#3534](https://github.com/BookStackApp/BookStack/issues/3534))

**Released in v22.06.1**

* Updated entity-selector-popup to reset state upon successful selection. ([#3528](https://github.com/BookStackApp/BookStack/issues/3528))
* Updated translations with latest CrowdIn changes. ([#3526](https://github.com/BookStackApp/BookStack/pull/3526))
* Fixed non-translated settings category options. ([#3529](https://github.com/BookStackApp/BookStack/issues/3529))
* Fixed issue where tags would not be saved upon book update. ([#3527](https://github.com/BookStackApp/BookStack/issues/3527))
* Fixed long code in "Custom Head" setting breaking page layout. ([#3523](https://github.com/BookStackApp/BookStack/issues/3523))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@ncj51518?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Chaojie Ni</a> on <a href="https://unsplash.com/s/photos/books?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  </span></span>