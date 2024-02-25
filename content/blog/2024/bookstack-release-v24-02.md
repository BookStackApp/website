+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v24.02"
date = 2024-02-29T12:10:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-sa-2/burnieside-steven-brown.jpg"
slug = "bookstack-release-v24-12"
draft = false
+++

For our first feature release of 2024 we have a variety enhancements to enjoy, many
building upon the work from the previous release, and many others addressing some 
common pain-points in BookStack.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v24.02)

**Upgrade Notices**

TODO - Add security notice for v23.12.3.
TODO - Copy to updates page.

- **Comments** - The ability to use markdown content in comments has been removed in this release, replaced by a WYSWIYG editor. This was a fairly hidden feature though so was not commonly utilised. Existing markdown comments will remain although formatting may be lost if old markdown comments are edited.
- **Commands** - The "Regenerate Comment Content" command has been removed in this release as this action is now redundant.
- **OIDC Authentication** - Proof Key for Code Exchange (PKCE) support has been added to BookStack OIDC authentication. This should not affect existing OIDC use, but you may want to enforce PKCE to be required for BookStack on your authentication system, if supported, for extra security.

TODO - Video
<!-- {{<pt 4gCUZhHumJDLTtSbGQzXzU>}} -->

### Simple WYSIWYG comment editor

Last feature release [we added](https://www.bookstackapp.com/blog/bookstack-release-v23-12/#wysiwyg-editor-for-descriptions)
a simple WYSIWYG editor for shelf, book and chapter descriptions. In this release we've
updated comments to now also use this editor:

TODO - Image of comments editor

Formatting in comments was previously possible via markdown but this was little known and not really
intuitive for the mixed-skill environment we target, so this should make things much more accessible.
This does mean some previously supported markdown formats are no longer supported, but those comments 
will still remain as-is, unless edited in which case they might lose unsupported formatting while editing.

### Default Page Templates for Chapters

Building on the default page template option we added to books in the last release,
the same functionality has been carried across for chapters in this release.
So it's now possible to set a default page template at the chapter level which
will be used as the default content for new pages, when a page is created
within that specific chapter:

TODO - Image of chapter template selection

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

TODO - Image of table menu

Within the table toolbar menu, there are now a couple of extra options: "Clear table formatting" which
makes it easy to reset all sizing and formatting across the whole table in a single click.
"Resize to contents" which resets all fixed sizes across the tables, allowing it to automatically scale 
back to the contents. 

Multi-table-cell selection has been enhanced, so that clear-formatting & text-direction controls
will now properly apply across the whole selection range. We've also addressed an issue with
scrollbars clogging up the view in such selections in certain browsers.

Lastly, enabling a header row has been made easier. Previously, this required navigating multiple
levels of menus but instead you'll now see a "Toggle header row" button in the table toolbar
when focused on the first table row:

TODO - Table header toggle button

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

TODO - Embed preview/animation

### OIDC Authentication PKCE Support

Proof Key for Code Exchange (PKCE) is a mechanism that can be added to the OAuth/OIDC authentication flow
to help protect against a range of potential attacks via an extra layer of checks against the credentials
gained and used by a client application like BookStack.

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
and its return value can be used to indicate of the registration should be allowed.
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
by default. For example, you could cross-reference the user against a file, you could check against another API,
or even force disable this kind of registration completely by simply returning `false`.

### Back-end changes

There have been some significant changes this release cycle in regards to how the majority
of data is queried out from the database. This was mostly a code & data organisation
change but some performance optimization was performed alongside these changes.

There have also been changes to how redirects and session history tracking are performed
which should help avoid some edge cases where users could be redirected to 
unexpected places, like to uploaded images.

### Translations

A big thanks again to all our terrific tireless translators who provide their time to help
translate text for the BookStack interface. Here's those that have contributed since 
the initial v23.12 release:

- Name - *Language - x words*


*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

Our next release will be focused on updating the framework used by BookStack, from Laravel 9
to Laravel 10. This will require an update of requirements, specifically to the minimum
PHP version, which will jump from PHP 8.0 to PHP 8.1. Therefore we'll also be dedicating 
effort to updating install scripts and to guidance for updating PHP, to support this change.

Upon that, I'd like to address the options provided for PDF rendering.
Right now we provide DOMPDF by default, which works great via just PHP and is license-compatible
for BookStack, while also documenting a way to use WKHTMLtoPDF which offers more advanced
rendering but has security & technical considerations. WKHTMLtoPDF is also no longer
maintained nor developed, and is dropping out of operating system software repositories,
so it's time to look at filling that gap.
My current idea is to support a generic, command-calling-based, interface which can then be 
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
* Fixed breadcrumb dropdowns being partly out of view on mobile screen sizes. ([#4824](https://github.com/BookStackApp/BookStack/issues/4824))
* Fixed description WYSIWYG not respecting RTL text. ([#4810](https://github.com/BookStackApp/BookStack/issues/4810))
* Fixed header bar collapse on smaller screen sizes when when no name or logo is used. ([#4841](https://github.com/BookStackApp/BookStack/issues/4841))
* Fixed incorrect pagination display in RTL layout. ([#4808](https://github.com/BookStackApp/BookStack/issues/4808))
* Fixed JavaScript error logged on WYSIWYG editor load due to how custom styles were imported. ([#4814](https://github.com/BookStackApp/BookStack/issues/4814))
* Fixed scrollbars showing on WYSIWYG table cell range selection in some browsers. ([#4844](https://github.com/BookStackApp/BookStack/issues/4844))
* Fixed WYSIWYG code block text direction controls not being respected. ([#4809](https://github.com/BookStackApp/BookStack/issues/4809))

**Released in v23.12.3**

TODO

**Released in v23.12.2**

* Fixed attachment list ctrl-click not opening attachments inline. ([#4782](https://github.com/BookStackApp/BookStack/issues/4782))
* Updated translations with latest Crowdin changes. ([#4779](https://github.com/BookStackApp/BookStack/pull/4779))
* Fixed entity selector popup pre-fill not searching term as expected. ([#4778](https://github.com/BookStackApp/BookStack/issues/4778))

**Released in v23.12.1**

* Fixed chapter API missing expected "book_slug" field. ([#4765](https://github.com/BookStackApp/BookStack/issues/4765))
* Updated translations with latest Crowdin changes. ([#4747](https://github.com/BookStackApp/BookStack/pull/4747))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://www.geograph.org.uk/photo/7714511">Steven Brown (CC-BY-SA-2)</a> - Image Modified</span></span>