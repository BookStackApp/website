+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.12"
date = 2023-12-29T12:10:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-sa-4/mountains-milan-bališin.jpg"
slug = "bookstack-release-v23-12"
draft = false
+++

As a little Christmas-time treat we have BookStack v23.12 slipping in as the last
release of the year. This release focuses on providing a simple WYSIWYG editor 
for description inputs, along with adding default page templates within books,
in addition to some other additional gifts.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.12)

**Upgrade Notices**

- **Page Includes** - The way page include content is fetched & merged has changed significantly in this release,
   which in some cases may alter how included content appears on the page.
- **Prior Security Release** - Prior version v23.10.3 was a security release. If you missed this before, further details about that [can be found on the blog here](/blog/bookstack-release-v23-10-3/).

{{<pt 4gCUZhHumJDLTtSbGQzXzU>}}

### WYSIWYG Editor for Descriptions

In BookStack we have description fields for chapters, books and shelves which allow a little bit of explanation & context to be provided for those items.
These have always been simple plaintext fields, but as of v23.12 you'll now see a simple WYSIWYG input box instead with a few formatting controls:

![A "description" part of a form, showing a WYSIWYG input box with some content that includes italic, bold and linked content, and a toolbar with 5 formatting buttons at the top of the input box](/images/2023/12/wysiwyg_description_input.png)

Formatting options include, and are limited to: bold, italic, links, bullet lists and numbered lists.
The formatting is purposefully limited here to keep main content within pages, but allow a little formatting along with linking to relevant pages where required.
Since links can now be placed within descriptions, references to other items will now be tracked via the existing reference system:

![View of the "References" for a page, showing four incoming references, one each from a book, chapter, shelf and page](/images/2023/12/references_from_descriptions.png)

For API users, new `description_html` fields now exist on responses & requests to interact with this field in a HTML-aware manner, otherwise the pre-existing `description` fields will continue to work as before.

### Default Template For New Book Pages

We've long since supported page [templates](/docs/user/page-templates/) within BookStack but to be used an editing user would have to access the relevant sidebar menu within the page editor, meaning they could be easy to miss or ignore. Additionally, it would be a common desire to use a template for all pages created within a certain context.
In this release, a new option for books allows you to set a default page template:

![A view of the form for editing a Book, focused on a "Default Page Template" section with a "Development Plan Template" item selected](/images/2023/12/book_default_page_template.png)

When set, this template page will be used as the default content for all new pages within that book, preventing the need to select the template within the editor each time you create something new. Note though, this is still permission controlled so the template will only be used if the page creator has view access to the template assigned.

A big thanks to [@lennertdaniels](https://github.com/BookStackApp/BookStack/pull/3918) for performing the initial implementation work to move this forward within BookStack!

### OIDC RP-Initiated Logout

OpenID-Connect authentication in BookStack allows for easy login via an external system, but so far it's lacked any kind of logout support.
That changes in this release thanks to efforts by [@joancyho](https://github.com/BookStackApp/BookStack/pull/4467) to introduce OIDC RP-Initiated logout support.
This official [complementary part of the OIDC spec](https://openid.net/specs/openid-connect-rpinitiated-1_0.html) allows an application like BookStack to request logout of the external authentication system as part of the application's logout flow.

BookStack's support of this includes the use of autodiscovery to learn the logout endpoint.
If you want to use RP-initiated logout you'll need to configure a `OIDC_END_SESSION_ENDPOINT` option for BookStack:

```bash
# Set to true to enable logout via a URL found via auto-discovery:
OIDC_END_SESSION_ENDPOINT=true

# Or configure a specific URL to be used for RP-initiated logout:
OIDC_END_SESSION_ENDPOINT="https://instance.authsystem.example.com/logout"

# Or disable RP-initiated logout (default):
OIDC_END_SESSION_ENDPOINT=false
```

It's likely you'll need to also configure logout/sign-out URIs on your OIDC authentication system for your BookStack application instance.
Our [OIDC documentation](/docs/admin/oidc-auth/#authentication-system-configuration) has been updated with details of these URIs.

During testing I've validated this system to work with Okta, KeyCloak, Azure, Authentik and Auth0; so support for this part of the 
standard by authentication services seems pretty widespread.

### Page Context in Email Notifications

A couple of releases ago we added email notifications for certain page activities, and these notifications would include
a name and link for the page interacted upon. Sometimes though, it may not be clear where the activity has occurred from the 
page name alone since it could be a page name used multiple times, or lacking context without knowing where that page is located.
To help add that context, notifications will now reflect the page parent book, and chapter if within:

![A screenshot of a BookStack notification message, showing a new "Page Path" detail with the text: "Accounts Department > Pension Providers"](/images/2023/12/notification_page_context.png)

A big thanks to [@Man-in-Black](https://github.com/BookStackApp/BookStack/pull/4629) for contributing this functionality.

### Friendlier Buttons

For a long time BookStack has used buttons with forced upper-case text, the design of which was getting a bit long in the tooth
while potentially coming across somewhat angry via their shouty appearance.
For this release, the design of buttons has been tweaked a little to better fit them into the current design, rounding the corners
a little more, tweaking the shadows upon hover and, most importantly, using the casing from the source translation text:

![Four buttons, comparing the old and new design](/images/2023/12/button_design_update.png)

In most cases buttons will now appear as Title Case, although this can now change to suit different languages as needed as it's not forced
by design.

### Logical Theme System Events to Register Routes

This release I've added a couple of new events to the [logical theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md)
to allow easier registration of custom web routes/endpoints where desired. As an example of these:

```php
<?php

use BookStack\Theming\ThemeEvents;
use BookStack\Facades\Theme;
use Illuminate\Routing\Router;

// Register a custom "/counter" endpoint which increments each time accessed
Theme::listen(ThemeEvents::ROUTES_REGISTER_WEB, function (Router $router) {

    $router->get('/counter', function () {
        $count = session()->get('counter', 0) + 1;
        session()->put('counter', $count);
        return "Count: {$count}";
    });
});

// Register a custom "/counter-auth" endpoint which increments each time accessed
// like above but only if the user is logged in (or public access is enabled).
Theme::listen(ThemeEvents::ROUTES_REGISTER_WEB_AUTH, function (Router $router) {

    $router->get('/counter-auth', function () {
        $count = session()->get('secret-counter', 0) + 1;
        session()->put('secret-counter', $count);
        return "Count Authed: {$count}";
    });
});
```

It was possible to register such routes previously, but you had to register them in a very specific way
using internally named middleware, in the right order, otherwise you'd have issues with session & user access.
These new events are intended to make this much simpler.

### Rebuilt Page Include Engine

When [reusing page content](/docs/user/reusing-page-content/) BookStack has always processed include tags via quite
a simple find/replace approach, which worked well for the most part but could lead to technically invalid syntax in some
cases due to nested paragraphs and other oddities, which may cause unpredictable issues in how pages would display
with include tags.

In this release, the engine for page include tags has been rebuilt to specifically be more content aware,
avoiding invalid structure where possible by smartly splitting existing blocks or moving included content to
appropriate locations if needed.

### Translations

Before the year closes out we have one more new language made available in BookStack, and that is Finnish!
A big thanks to the [Crowdin user ajnyga](https://crowdin.com/profile/ajnyga/activity) for all their efforts
translating for Finnish up to the point where we can include it.

Once again a big thanks to all the exceptionally eloquent experts in language who've contributed
translations since our last feature release:

- Eduard Ereza Martínez (Ereza) - *Catalan - 7160 words*
- Antti-Jussi Nygård (ajnyga) - *Finnish - 6108 words*
- Guttorm Hveem (guttormhveem) - *Norwegian Nynorsk; Norwegian Bokmal - 2718 words*
- toras9000 - *Japanese - 1045 words*
- Vitaliy (gviabcua) - *Ukrainian - 922 words*
- poesty - *Chinese Simplified - 635 words*
- Jabir Lang (amar.almrad) - *Arabic - 480 words*
- Sascha (Man-in-Black) - *German Informal; German - 443 words*
- pedromcsousa - *Portuguese - 372 words*
- Jaroslav Koblizek (foretix) - *Czech; French - 365 words*
- Felipe Cardoso (felipecardosoruff) - *Portuguese, Brazilian - 348 words*
- SmokingCrop - *Dutch - 324 words*
- sdhadi - *Persian - 284 words*
- Indrek Haav (IndrekHaav) - *Estonian - 250 words*
- Konstantin (kkovacheli) - *Ukrainian; Russian - 246 words*
- Wiktor Adamczyk (adamczyk.wiktor) - *Polish - 184 words*
- Maciej Lebiest (Szwendacz) - *Polish - 164 words*
- Abdulmajeed Alshuaibi (4Majeed) - *Arabic - 114 words*
- scureza - *Italian - 99 words*
- m0uch0 - *Spanish - 99 words*
- HyoungMin Lee (ddokkaebi) - *Korean - 67 words*
- Dasferco - *Chinese Simplified - 64 words*
- NotSmartZakk - *Czech - 62 words*
- TheRazvy - *Romanian - 55 words*
- Martins Pilsetnieks (pilsetnieks) - *Latvian - 49 words*
- balmag - *Hungarian - 25 words*
- Serkan Yardim (serkanzz) - *Turkish - 14 words*
- LameeQS - *Latvian - 12 words*
- Marcus Teräs (mteras) - *Finnish - 10 words*
- Y (cnsr) - *Ukrainian - 7 words*
- ZY ZV (vy0b0x) - *Chinese Simplified - 6 words*
- diegobenitez - *Spanish - 4 words*
- Sorin T. (trimbitassorin) - *Romanian - 3 words*
- Marc Hagen (MarcHagen) - *Dutch - 1 words*


*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

Now we have a simpler WYSIWYG editor, as implemented for descriptions in this release, I'll probably be looking to carry this across to the comments system to provide that with simple WYSIWYG editing, although this will require some breaking changes to the currently supported markdown content of this input. 

Upon that, over the initial few weeks of this year I'd like to explore some of the new PHP-ecosystem technologies like roadrunner and/or FrankenPHP to understand their potential benefit to BookStack.

Over the next few days I'll be putting together a "BookStack in 2023" blogpost, like [done previous years](https://www.bookstackapp.com/blog/bookstack-in-2022/) to look back and assess the progress of the project over the last year.

### Full List of Changes

**Released in v23.12**

* Added simple WYSIWYG for description fields. ([#4729](https://github.com/BookStackApp/BookStack/pull/4729), [#2354](https://github.com/BookStackApp/BookStack/issues/2354), [#2203](https://github.com/BookStackApp/BookStack/issues/2203))
* Added default template option for books. Thanks to [@lennertdaniels](https://github.com/BookStackApp/BookStack/pull/3918). ([#4721](https://github.com/BookStackApp/BookStack/pull/4721), [#3918](https://github.com/BookStackApp/BookStack/pull/3918), [#1803](https://github.com/BookStackApp/BookStack/issues/1803))
* Added OIDC RP-initiated logout. Thanks to [@joancyho](https://github.com/BookStackApp/BookStack/pull/4467). ([#4714](https://github.com/BookStackApp/BookStack/pull/4714), [#4467](https://github.com/BookStackApp/BookStack/pull/4467), [#3715](https://github.com/BookStackApp/BookStack/issues/3715))
* Added new Logical Theme System event to register web routes. ([#4663](https://github.com/BookStackApp/BookStack/issues/4663))
* Updated email notifications to include the page parent chapter/book. Thanks to [@Man-in-Black](https://github.com/BookStackApp/BookStack/pull/4629). ([#4629](https://github.com/BookStackApp/BookStack/pull/4629))
* Updated and standardised DOM handling in the codebase. ([#4673](https://github.com/BookStackApp/BookStack/pull/4673))
* Updated back redirection handling to not rely on referrer headers. ([#4656](https://github.com/BookStackApp/BookStack/issues/4656))
* Updated book/chapter/shelf description character limit. ([#4085](https://github.com/BookStackApp/BookStack/issues/4085))
* Updated design of buttons to be a bit friendlier. ([#4728](https://github.com/BookStackApp/BookStack/pull/4728))
* Updated HTML exporting with better RTL handling. ([#4645](https://github.com/BookStackApp/BookStack/issues/4645))
* Updated include tag handling to be structure/DOM aware. ([#4688](https://github.com/BookStackApp/BookStack/pull/4688))
* Updated SAML2 dump debug option to include group parsing details. ([#4706](https://github.com/BookStackApp/BookStack/issues/4706))
* Updated translations with latest Crowdin changes. ([#4658](https://github.com/BookStackApp/BookStack/pull/4658))
* Updated WYSIWYG editor to allow video/embed alignment controls. ([#4727](https://github.com/BookStackApp/BookStack/pull/4727), [#3378](https://github.com/BookStackApp/BookStack/issues/3378))
* Updated WYSIWYG library TinyMCE from 6.5.1 to 6.7.2. ([#4661](https://github.com/BookStackApp/BookStack/pull/4661))
* Fixed extra paragraphs & invalid syntax when using page includes. ([#3385](https://github.com/BookStackApp/BookStack/issues/3385))
* Fixed lack of user invite via the API in certain cases. ([#4720](https://github.com/BookStackApp/BookStack/issues/4720))
* Fixed page includes leading to duplicate IDs. ([#3982](https://github.com/BookStackApp/BookStack/issues/3982))
* Fixed permission generation failure with large amounts of content. ([#4695](https://github.com/BookStackApp/BookStack/issues/4695))
* Fixed PHP mbstring deprecation warnings. ([#4638](https://github.com/BookStackApp/BookStack/issues/4638))
* Fixed SAML2 Single Logout (SLO) not invalidating session at point defined by the spec. ([#4713](https://github.com/BookStackApp/BookStack/issues/4713))

**Released in v23.10.4**

This was simply a follow-up of v23.10.3 to fix the app version number.

**Released in v23.10.3**

* Updated thumbnail handling to fix use of content as image data. ([#4681](https://github.com/BookStackApp/BookStack/pull/4681))

**Released in v23.10.2**

* Fixed incorrect audit log dropdown behaviour. ([#4652](https://github.com/BookStackApp/BookStack/issues/4652))
* Fixed redirects to the manfiest endpoint in some environments. ([#4649](https://github.com/BookStackApp/BookStack/issues/4649))
* Updated translations with latest Crowdin changes. ([#4643](https://github.com/BookStackApp/BookStack/pull/4643))

**Released in v23.10.1**

* Added "Norwegian Nynorsk" to user language options.
* Added JavaScript public event for customizing codemirror instances. ([#4639](https://github.com/BookStackApp/BookStack/issues/4639))
* Added handling to allow jumping to headers/sections within collapsible sections. ([#4637](https://github.com/BookStackApp/BookStack/issues/4637))
* Added PHP 8.3 support. ([#4633](https://github.com/BookStackApp/BookStack/issues/4633))
* Updated translations with latest Crowdin changes. ([#4631](https://github.com/BookStackApp/BookStack/pull/4631))
* Fixed header bar peeking through on markdown editor fullscreen mode. ([#4641](https://github.com/BookStackApp/BookStack/issues/4641))
* Fixed incorrect color usage for editor toolbox active tabs. ([#4630](https://github.com/BookStackApp/BookStack/issues/4630))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://commons.wikimedia.org/wiki/File:Min%C4%8Dol_(vrch_v_%C4%8Cergove)_08.JPG">Milan Bališin (CC-BY-SA-4)</a> - Image Modified</span></span>