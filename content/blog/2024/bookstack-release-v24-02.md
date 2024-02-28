+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v24.02"
date = 2024-02-28T12:45:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-sa-2/burnieside-steven-brown.jpg"
slug = "bookstack-release-v24-02"
draft = false
+++

For our first feature release of 2024 we have a variety enhancements to enjoy!
Many of these build upon the work from the previous release, while many others address some 
common pain-points in BookStack.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v24.02)

**Upgrade Notices**

- **Security** - The v23.12 branch of BookStack recently had a security release, which you can find details of in our [v23.12.3 blogpost](/blog/bookstack-release-v23-12-3/).
- **Comments** - The ability to use markdown content in comments has been removed in this release, replaced by a WYSIWYG editor. Markdown in comments was a fairly hidden feature though so was not commonly utilised. Existing markdown comments will remain although formatting may be lost if old markdown comments are edited.
- **Commands** - The "Regenerate Comment Content" command has been removed in this release since this action is now redundant.
- **OIDC Authentication** - Proof Key for Code Exchange (PKCE) support has been added to BookStack OIDC authentication. This should not affect existing OIDC use but you may want to enforce PKCE to be required for BookStack on your authentication system, if supported, for extra security.

{{<pt 8w3F4aWqH3MProMwyQBf2d>}}

### Simple WYSIWYG comment editor

Last feature release [we added](https://www.bookstackapp.com/blog/bookstack-release-v23-12/#wysiwyg-editor-for-descriptions)
a simple WYSIWYG editor for shelf, book & chapter descriptions.
In this release we bring this new editor to comments:

![View of the "New Comment" section shown when viewing a page, with a simple WYSIWYG editor that includes 5 formatting buttons, and within that is some example text reflecting bold, italic and linked text.](/images/2024/02/comment-wysiwyg-input.png)

Formatting in comments was previously possible via markdown but this was little known and not really
intuitive for the mixed-skill environment we target, so this should make things much more accessible.
This does mean some previously supported markdown formats can now longer be used, but those old comments 
will still retain their formatting, unless edited in which case they might lose unsupported formatting 
when loaded into the editor.

### Default Page Templates for Chapters

Building on the default page template option we added to books [in the last release](/blog/bookstack-release-v23-12/#default-template-for-new-book-pages),
the same functionality has now been carried across for chapters,
so it's now possible to set a default page template at the chapter level which
will be used as the default content for new pages, when a page is created
within that specific chapter:

![View of the "Edit Chapter" page in BookStack, focused on a "Default Page Template" section containing an input that shows the value "#92, Cat Profile Template"](/images/2024/02/chapter-default-page-template.png)

New pages will use the chapter-level template if set, or otherwise look to
use the book-level template if set there.

A shout-out to [@Man-in-Black](https://github.com/BookStackApp/BookStack/pull/4750) for developing
out the implementation for this feature.

### WYSIWYG Table Improvements

Tables are a fairly complex type of content supported by our WYSIWYG editor, especially
with all the options and variations that can apply to them. It's easy for sizing & formatting
to go wrong, or become somewhat "stuck", while it's difficult to reset these kinds of options.
In this release, we've focused on a whole range of improvements to make it easier to handle 
these kinds of scenarios.

![View of the "table" toolbar button dropdown with new "Clear table formatting" and "Resize to contents" actions shown](/images/2024/02/table-added-actions.png)

Within the table toolbar menu, there are now a couple of extra options: A "Clear table formatting" option
makes it easy to reset all sizing and formatting across the whole table in a single click.
A "Resize to contents" option resets all fixed sizes across the tables, allowing it to automatically scale 
back to the contents. 

Multi-table-cell selection has been enhanced, so that clear-formatting & text-direction controls
will now properly apply across the whole selection range. We've also addressed an issue with
scrollbars clogging up the view when such selections are performed in certain browsers.

Lastly, enabling a header row has been made easier. Previously, this required navigating multiple
levels of menus but instead you'll now see a "Toggle header row" button in the table toolbar
when focused within the first table row:

![View of the BookStack page WYSIWYG editor. A table has been added describing various cats. The table is selected with a toolbar shown above it. The cursor is hovering over a "Row header" button which is currently active, reflecting the different shading of the top row of the table](/images/2024/02/table-header-row-toggle.png)

### Improved Video Attachment Support

While we don't have video-specific media management in BookStack, some users would upload videos
via attachments then embed them into the page, which had the advantage that access to videos would
be controlled by access to the page they're uploaded to. 
While this could work, video ideally needs to be served in a way that can be streamed, otherwise
the browser would attempt to download the whole video in one go, and things like timeline scrubbing
would not work. 

In this release we've added "Range request" support that allows browsers to fetch video in a 
stream-supporting manner, while still being behind BookStack's permission control management.
Going further, to help the process of embedding, adding an attachment link 
(or drag and dropping the attachment into the editor) for a video will directly insert that as a
video embed rather than a standard link:

<video muted controls src="/images/2024/02/bookstack-video-attachment-drag-drop.mp4"></video>

*Note: Stream support can depend on configured storage. When S3 storage is used, attachments will be streamed from BookStack to the user, but BookStack may still need to download the whole attachment file from the upstream storage system on request.*

### OIDC Authentication PKCE Support

Proof Key for Code Exchange (PKCE) is a mechanism that can be added to the OAuth/OIDC authentication flow
to help protect against a range of potential attacks via an extra layer of checks upon the credentials
gained & used by a client application like BookStack.

In v24.02 we now support PKCE for the the OIDC authentication flow. This is active by default, and will be used
on all OIDC login flows without any additional BookStack configuration needed.
OIDC authentication systems that support PKCE will be able to detect and use this for extra security.
Some authentication systems also provide the option to make PKCE mandatory, which if provided you may
want to enable to harden security further in this area.

### Auth Pre-Register Logical Theme Event

A new `AUTH_PRE_REGISTER` event is now available for use via the
[logical theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md).
This event runs just before a user is created through any self-registration events
(including auto-registration events for third-party/saml/ldap/oidc authentication)
and its return value can be used to indicate if the registration should be allowed.
A `false` return value will stop the registration, and return the user to the login screen.
Here's an example use of this logical theme event:

```php
<?php

use BookStack\Theming\ThemeEvents;
use BookStack\Facades\Theme;

Theme::listen(ThemeEvents::AUTH_PRE_REGISTER, function (string $authSystem, array $userData) {
    return str_starts_with($userData['email'], 'barry');
});
```

This arbitrary example will only allow registration if the user's email address begins with 'barry'.
There's a lot of better ways this could be used though, to add custom logic that BookStack does not support 
by default. For example, you could cross-reference the user against a file, you could check against an external API,
or even force disable this kind of registration completely by simply returning `false`.

### Back-end changes

There have been some significant changes this release cycle in regards to how the majority
of data is queried out from the database. This was mostly a code & data organisation
change but some performance optimization was performed alongside these changes.

There have also been changes made to how redirects & session history tracking are performed
which should help avoid some edge cases where users could be redirected to 
unexpected places, like to uploaded images.

### Translations

A big thanks again to all our terrific tireless translators who provide their time to help
translate text for the BookStack interface. Here's those that have contributed since 
the initial v23.12 release:

- algernon19 - *Hungarian - 3386 words*
- renge - *Korean - 2030 words*
- Ivan Krstic (ikrstic) - *Serbian (Cyrillic) - 1831 words*
- TheGatesDev (thegatesdev) - *Dutch - 889 words*
- Martins Pilsetnieks (pilsetnieks) - *Latvian - 849 words*
- toras9000 - *Japanese - 680 words*
- Irdi (irdiOL) - *Albanian - 542 words*
- KateBarber - *Welsh - 355 words*
- 10935336 - *Chinese Simplified - 341 words*
- Show - *Russian - 283 words*
- xBahamut - *Portuguese, Brazilian - 263 words*
- Vanja Cvelbar (b100w11) - *Slovenian - 214 words*
- Pavle Knežević (pavleknezzevic) - *Serbian (Cyrillic) - 213 words*
- m0uch0 - *Spanish - 182 words*
- Sascha (Man-in-Black) - *German; German Informal - 179 words*
- Guttorm Hveem (guttormhveem) - *Norwegian Nynorsk - 179 words*
- scureza - *Italian - 178 words*
- Hsin-Hsiang Peng (Hsins) - *Chinese Traditional - 141 words*
- bendem - *French - 103 words*
- sdhadi - *Persian - 98 words*
- Jøran Haugli (haugli92) - *Norwegian Bokmal - 84 words*
- Twister (theuncles75) - *Hebrew - 80 words*
- Honza Nagy (honza.nagy) - *Czech - 79 words*
- Jan Picka (polipones) - *Czech - 69 words*
- asd20752 - *Norwegian Bokmal - 68 words*
- Kasper Alsøe (zeonos) - *Danish - 62 words*
- sultani - *Persian - 61 words*
- diogoalex991 - *Portuguese - 47 words*
- Eduard Ereza Martínez (Ereza) - *Catalan - 25 words*
- Martin Sebek (sebekmartin) - *Czech - 20 words*
- Ehsan Sadeghi (ehsansadeghi) - *Persian - 11 words*
- ka_picit - *Danish - 6 words*

*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

Our next release will be focused on updating the framework used by BookStack, from Laravel 9
to Laravel 10. This will require an update of requirements, specifically to the minimum
PHP version, which will jump from PHP 8.0 to PHP 8.1. Therefore we'll also be dedicating 
effort to updating our install scripts & guidance, to support this change.

Upon that, I'd like to address the options provided for PDF rendering.
Right now we provide DOMPDF by default, which works great via just PHP and is license-compatible
for BookStack, while we also document a way to use WKHTMLtoPDF which offers more advanced
rendering but has security & technical considerations. WKHTMLtoPDF is no longer
maintained nor developed, and is dropping out of operating system software repositories,
so it's time to look at filling that gap.
My current idea is to support a generic, command-calling-based interface which can then be 
configured for a variety of PDF rendering solutions, with some guidance in the BookStack
docs to make this easy to configure.

### Full List of Changes

**Released in v24.02**

* Added simple WYSIWYG comment editor inputs. ([#4815](https://github.com/BookStackApp/BookStack/pull/4815), [#3018](https://github.com/BookStackApp/BookStack/issues/3018))
* Added default page templates for chapters. Thanks to [@Man-in-Black](https://github.com/BookStackApp/BookStack/pull/4750). ([#4750](https://github.com/BookStackApp/BookStack/pull/4750), [#4764](https://github.com/BookStackApp/BookStack/issues/4764))
* Added PKCE support for OIDC. ([#4804](https://github.com/BookStackApp/BookStack/pull/4804), [#4734](https://github.com/BookStackApp/BookStack/issues/4734))
* Added "Clear table formatting" & "Resize to contents" WYSIWYG table options. ([#4845](https://github.com/BookStackApp/BookStack/issues/4845))
* Added "Toggle header row" button to table toolbar in WYSWIYG editor. ([#985](https://github.com/BookStackApp/BookStack/issues/985))
* Added attachment serving range request support. ([#4758](https://github.com/BookStackApp/BookStack/pull/4758), [#3274](https://github.com/BookStackApp/BookStack/issues/3274))
* Added new `AUTH_PRE_REGISTER` logical theme event. ([#4833](https://github.com/BookStackApp/BookStack/issues/4833))
* Updated app entity loading to be more efficient and avoid global addSelects. ([#4827](https://github.com/BookStackApp/BookStack/pull/4827), [#4823](https://github.com/BookStackApp/BookStack/issues/4823))
* Updated book/shelf cover image wording to make sizing in usage clearer. ([#4748](https://github.com/BookStackApp/BookStack/issues/4748))
* Updated PWA manifest to allow landscape use. Thanks to [@shashinma](https://github.com/BookStackApp/BookStack/pull/4828). ([#4828](https://github.com/BookStackApp/BookStack/pull/4828))
* Updated redirect handling to reduce chance of redirecting to images. ([#4863](https://github.com/BookStackApp/BookStack/issues/4863))
* Updated some EN text for consistency/readability. ([#4794](https://github.com/BookStackApp/BookStack/pull/4794))
* Updated WYSIWYG editor with improved cell selection formatting clearing. ([#4850](https://github.com/BookStackApp/BookStack/pull/4850))
* Updated WYSIWYG text direction & alignment controls to work more reliably on complex structures. ([#4843](https://github.com/BookStackApp/BookStack/issues/4843))
* Fixed breadcrumb dropdowns being partially out of view on mobile screen sizes. ([#4824](https://github.com/BookStackApp/BookStack/issues/4824))
* Fixed description WYSIWYG not respecting RTL text. ([#4810](https://github.com/BookStackApp/BookStack/issues/4810))
* Fixed header bar collapse on smaller screen sizes when no name or logo is used. ([#4841](https://github.com/BookStackApp/BookStack/issues/4841))
* Fixed incorrect pagination display in RTL layout. ([#4808](https://github.com/BookStackApp/BookStack/issues/4808))
* Fixed JavaScript error logged on WYSIWYG editor load due to how custom styles were imported. ([#4814](https://github.com/BookStackApp/BookStack/issues/4814))
* Fixed scrollbars showing on WYSIWYG table cell range selection in some browsers. ([#4844](https://github.com/BookStackApp/BookStack/issues/4844))
* Fixed WYSIWYG code block text direction controls not being respected. ([#4809](https://github.com/BookStackApp/BookStack/issues/4809))

**Released in v23.12.3**

* Updated PHP dependencies, primarily to update php-svg-lib package.

**Released in v23.12.2**

* Fixed attachment list ctrl-click not opening attachments inline. ([#4782](https://github.com/BookStackApp/BookStack/issues/4782))
* Updated translations with latest Crowdin changes. ([#4779](https://github.com/BookStackApp/BookStack/pull/4779))
* Fixed entity selector popup pre-fill not searching term as expected. ([#4778](https://github.com/BookStackApp/BookStack/issues/4778))

**Released in v23.12.1**

* Fixed chapter API missing expected "book_slug" field. ([#4765](https://github.com/BookStackApp/BookStack/issues/4765))
* Updated translations with latest Crowdin changes. ([#4747](https://github.com/BookStackApp/BookStack/pull/4747))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://www.geograph.org.uk/photo/7714511">Steven Brown (CC-BY-SA-2)</a> - Image Modified</span></span>