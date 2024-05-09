+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v24.05"
date = 2024-05-11T13:36:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cc-by-sa-3/seven-sisters-cliffs-david-iliff.jpg"
slug = "bookstack-release-v24-05"
draft = false
+++

Today we release a new BookStack feature update that's mainly focused on updating
the core underlying framework and some accompanying code, but that work comes with a sprinkling
of extra additions and tweaks too.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v24.05)

**Upgrade Notices**

- **PHP Version Requirement Change** - The minimum supported PHP version has changed from PHP 8.0.2 to PHP 8.1 in this release. Please see our ["Updating PHP & Composer" documentation page](https://www.bookstackapp.com/docs/admin/updating-php/#updating-php) for guidance on updating PHP.
- **Composer Version Requirement Change** - The minimum supported composer version has changed from v2.0 to v2.2 in this release. Please see our ["Updating PHP & Composer" documentation page](https://www.bookstackapp.com/docs/admin/updating-php/#updating-composer) for guidance on updating Composer.
- **Page Content** - Text links in page content will now be underlined by default for accessibility. Refer to [the release blogpost](https://www.bookstackapp.com/blog/bookstack-release-v24-05/#change-to-default-link-styles) for an simple customization to override & revert this if desired.
- **PDF Exports** - The `WKHTMLTOPDF` option is now considered deprecated, with the alternative being the newly added `EXPORT_PDF_COMMAND` which is detailed in [our documentation here](https://www.bookstackapp.com/docs/admin/pdf-rendering/#pdf-export-command). The `WKHTMLTOPDF` option will though remain supported for a number of feature releases though to avoid unexpected breaking changes.
- **OIDC Authentication** - The OIDC "userinfo" endpoint may now be called in very rare scenarios where not all expected claims were being properly provided in the user ID Token, which could alter the details used for new users on access, and the groups obtained for user group/role sync, but only in edge case scenarios where functionality was not matching configuration before the update.
- **LDAP Authentication** - The `LDAP_USER_FILTER` BookStack option now uses `{user}` as a placeholder instead of `${user}` by default. The older `${user}` placeholder format is still supported but you may want to use the new format instead. This should not cause any issues on existing instances, unless `{user}` was used as a literal part of your user filter which would be very unlikely.

TODO - Video
<!-- {{<pt 8w3F4aWqH3MProMwyQBf2d>}} -->


### Framework & PHP Requirement Update

The core aim of this release was to update the core framework BookStack uses from
[Laravel](https://laravel.com/) 9 to 10 to help us stay on modern and supported dependencies.
This requires a bump to the minimum version of PHP BookStack supports, from 8.0 to 8.1.
This is something we typically do on a yearly basis, and keeps somewhat inline with the official
support lifetime of PHP versions, where PHP 8.0 stopped being officially supported late last year.

Apart from the PHP requirement change, this should not really have any affect to normal BookStack use
but it ensures we're keeping things maintained and on a modern codebase.

### Command-based PDF Export Option

By default in BookStack we use a PHP-based PDF renderer ([DomPDF](https://github.com/dompdf/dompdf))
and have long provided a more accurate alternative via [wkhtmltopdf](https://www.bookstackapp.com/docs/admin/pdf-rendering/#using-wkhtmltopdf).
Unfortunately, wkhtmltopdf has become somewhat deprecated and is therefore dropping out of system repositories.
Additionally, there were security considerations when using wkhtmltopdf in BookStack.

As an alternative we've now added a generic command-based option for BookStack.
Since PDF rendering can be a complex element, with different solutions having different strengths and weaknesses,
we didn't want to support a specific new PDF renderer, but instead provide an interface that could be 
used with many external options. This option allows you to define a command, which will take an input HTML
file argument, and an output PDF file argument, which BookStack will then call during an export.
Existing solutions can then be directly called via this, or wrapped to work with this command-based interface.

Right now we have [just one example in our documentation](/docs/admin/pdf-rendering/#example-weasyprint-command-option), and this is marked unsafe due to security concerns.
In the near future I'd like to expand upon, and potentially build/maintain, some safer alternative examples.

### Change to Default Link Styles

Within page content links are now underlined by default.

![Bullet list of links about types of cats, with all links blue and underlined](/images/2024/05/page-links.png)

We generally try to avoid change that can affect core user content within BookStack, but this
has been done to improve default accessibility by providing an additional indicator of a link upon
just the color, which may not be easy to identify to all.

If you'd prefer your links to remain non-underlined you can easily override this change by adding the following
to your "Custom HTML Head Content" customization setting:

```html
<style>
  .page-content a { text-decoration: none; }
</style>
```

### OIDC Userinfo Endpoint Support

When OIDC authentication was in use, BookStack would previously only read claims direction from the supplied
user ID token. While this worked fine in most cases, some auth platforms would only provide certain details 
via the userinfo endpoint. In this release we add wider support of the OIDC spec by making use of the userinfo 
endpoint where needed. If not all details are in the token, BookStack will call & use the userinfo endpoint data.
This means existing OIDC use-cases should remain speedy and unaffected, with extra calls only being made during 
authentication when needed.

The userinfo endpoint will be fetched via autodiscovery if enabled, otherwise it can also be defined via env options 
using an `OIDC_USERINFO_ENDPOINT` option. Our [OIDC documentation](/docs/admin/oidc-auth/) has been updated to include this.

Thanks to [@LukeShu](https://github.com/BookStackApp/BookStack/pull/4726) for starting the implementation of this one.

### Simple Registration Honeypot

For instances with open registration, spam can be a problem. While we don't want get deep into the ever moving scope
of spam prevention, this release adds a simple honeypot field to the registration to hopefully help at least
filter some of the simplest spam bots out.

Thanks to [@nesges](https://github.com/BookStackApp/BookStack/pull/4970) for contributing this addition.

### Audit Log API Endpoint

We continue to expand the capabilities of the API in this release with the addition of a 
list API endpoint for the audit log. This endpoint provides much the same data you'd be able
to access when visiting the in-app Audit Log as an administrator. The endpoint requires
the API user to have both "Manage app settings" and "Manage users" role permission since
audit log data may contain sensitive information, and is unfiltered by item-level permissions.

This addition should be helpful to those that need external insight into BookStack activities, 
and those that like to standardise & centralise such audit data.

### LDAP Custom TLS CA Cert Option

When using LDAP along with TLS, to encrypt connections, it could be common that custom
certificates are used by the authentication platform. Such custom certificates could then throw
errors due to not being issues by a trusted/known authority. While custom certificates could technically be configured 
via openldap, the methods/steps needed for this are not clear nor obvious.
In this release, we now support a `LDAP_TLS_CA_CERT` option that can be set so BookStack will use a
certain CA certificate, or a directory of many CA certificates.

You can find further details of this option in our [updated LDAP documentation](https://www.bookstackapp.com/docs/admin/ldap-auth/).

### Licenses Page

For this release we've built a more formal standard process in how we record and provide license & attribution information for BookStack as its dependencies.
These records are updated during development & release, and are tracked as part of the codebase.

Within the application you can visit the `/licenses` URL, which is also referenced below the app version in "Settings", at which you'll
find a new licenses page that provides full license detail for BookStack and all known dependencies (including those used for development):

![Screenshot of a new BookStack license page. The text on the page details the license information for BookStack, as well as the projects and libraries that are used within BookStack.](/images/2024/05/licenses-page.png)

### Translations

A big thanks once again to all the wonderful word weavers below that have helped translate BookStack
since that last feature release:

- Michele Bastianelli (makoblaster) - *Italian - 1971 words*
- Tim (thegatesdev) - *Many Languages - 1655 words*
- jespernissen - *Danish - 587 words*
- johnroyer - *Chinese Traditional - 554 words*
- Ivan Krstic (ikrstic) - *Serbian (Cyrillic) - 441 words*
- Vanja Cvelbar (b100w11) - *Slovenian - 263 words*
- Andrey (avmaksimov) - *Russian - 262 words*
- Maciej Lebiest (Szwendacz) - *Polish - 218 words*
- Vitaliy (gviabcua) - *Ukrainian - 200 words*
- daniel chou (chou0214) - *Chinese Traditional - 186 words*
- Igor V Belousov (biv) - *Russian - 183 words*
- cracrayol - *French - 182 words*
- toras9000 - *Japanese - 169 words*
- CapuaSC - *Dutch - 158 words*
- SmokingCrop - *Dutch - 158 words*
- Gonzalo Loyola (AlFcl) - *Spanish, Argentina; Spanish - 152 words*
- David Bauer (davbauer) - *German - 141 words*
- Jøran Haugli (haugli92) - *Norwegian Bokmal - 125 words*
- Guardian75 - *German Informal - 97 words*
- m0uch0 - *Spanish - 80 words*
- grobert63 - *French - 78 words*
- 10935336 - *Chinese Simplified - 73 words*
- scureza - *Italian - 45 words*
- MaximMaximS - *Czech - 45 words*
- Jaroslav Kobližek (foretix) - *Czech - 43 words*
- zygimantus - *Lithuanian - 35 words*
- wusst. (Supporti) - *German - 34 words*
- Antti-Jussi Nygård (ajnyga) - *Finnish - 29 words*
- mr-kanister - *German - 26 words*
- damian-klima - *Slovak - 24 words*
- crow_ - *Latvian - 9 words*
- JocelynDelalande - *French - 8 words*
- Jan (JW-CH) - *German Informal - 2 words*
- Timo B (lommes) - *German Informal - 2 words*

*\* Word counts are those tracked by Crowdin, indicating original EN words translated.*

### Next Steps

In BookStack the default WYSIWYG page editor (and recent description/comment editor) is powered by library
called TinyMCE. They've recently [changed the project](https://github.com/tinymce/tinymce/discussions/9496)
to a GPLv2+ license which is incompatible with our MIT license for the project as a working whole.
This is quite a big deal for us since it's such a core part of the project.
I've opened a BookStack [discussion for this here](https://github.com/BookStackApp/BookStack/issues/4908).
Over the next release cycle I'll be diving into this further to get a better idea of what route we'll take.

Last month we had the release of Ubuntu 24.04, for which we quickly published a [new install script](/docs/admin/installation/#ubuntu-2404),
but to accompany this I'd like to record a new video guide, perhaps going a little bit deeper this time into topics like updates
and other general maintenance tasks.

### Full List of Changes

**Released in v24.05**

* Added new command-based PDF export option. ([#4969](https://github.com/BookStackApp/BookStack/pull/4969), [#4732](https://github.com/BookStackApp/BookStack/issues/4732))
* Added Audit Log API list endpoint. ([#4987](https://github.com/BookStackApp/BookStack/pull/4987), [#4316](https://github.com/BookStackApp/BookStack/issues/4316))
* Added LDAP option to provide a custom CA cert. Thanks to [@mmoore2012](https://github.com/BookStackApp/BookStack/pull/4913). ([#4985](https://github.com/BookStackApp/BookStack/pull/4985), [#4913](https://github.com/BookStackApp/BookStack/pull/4913))
* Added OIDC userinfo endpoint support. Thanks to [@LukeShu](https://github.com/BookStackApp/BookStack/pull/4726). ([#4955](https://github.com/BookStackApp/BookStack/pull/4955), [#4726](https://github.com/BookStackApp/BookStack/pull/4726), [#3873](https://github.com/BookStackApp/BookStack/issues/3873))
* Added simple registration form honeypot. Thanks to [@nesges](https://github.com/BookStackApp/BookStack/pull/4970). ([#4970](https://github.com/BookStackApp/BookStack/pull/4970))
* Added Scala to list of supported languages in code blocks. ([#4953](https://github.com/BookStackApp/BookStack/issues/4953))
* Added licenses page supported by licenses list building process. ([#4907](https://github.com/BookStackApp/BookStack/pull/4907))
* Updated app framework from Laravel 9 to 10. ([#4903](https://github.com/BookStackApp/BookStack/pull/4903))
* Updated content links to be underlined by default for accessibility. ([#4939](https://github.com/BookStackApp/BookStack/issues/4939))
* Updated dev Dockerfile with improvements. Thanks to [@C0rn3j](https://github.com/BookStackApp/BookStack/pull/4895). ([#4895](https://github.com/BookStackApp/BookStack/pull/4895))
* Updated included images with extra compression to save data. Thanks to [@C0rn3j](https://github.com/BookStackApp/BookStack/pull/4904). ([#4904](https://github.com/BookStackApp/BookStack/pull/4904))
* Updated JS build system to split markdown-focused packages to own file. ([#4930](https://github.com/BookStackApp/BookStack/pull/4930), [#4858](https://github.com/BookStackApp/BookStack/issues/4858))
* Updated LDAP user filter option to support new placeholder format. ([#4967](https://github.com/BookStackApp/BookStack/issues/4967))
* Updated minimum required PHP version from 8.0 to 8.1. ([#4894](https://github.com/BookStackApp/BookStack/pull/4894), [#4893](https://github.com/BookStackApp/BookStack/issues/4893))
* Updated translations with latest Crowdin changes. ([#4890](https://github.com/BookStackApp/BookStack/pull/4890))
* Fixed code direction in WYSWIYG editor lacking direction support in code editor. ([#4943](https://github.com/BookStackApp/BookStack/issues/4943))
* Fixed difference of line-heights for paragraphs in tables between editor and page view. ([#4960](https://github.com/BookStackApp/BookStack/issues/4960))
* Fixed extra space at the beginning of a translation. Thanks to [@johnroyer](https://github.com/BookStackApp/BookStack/pull/4972). ([#4972](https://github.com/BookStackApp/BookStack/pull/4972))
* Fixed failing drag and drop of attachments into editor on Chrome. ([#4975](https://github.com/BookStackApp/BookStack/issues/4975))
* Fixed incorrect tag counts when tagged items are in the recycle bin. ([#4892](https://github.com/BookStackApp/BookStack/issues/4892))
* Fixed WYSIWYG object embeds in the editor showing image toolbar button. ([#4974](https://github.com/BookStackApp/BookStack/issues/4974))
* Fixed WYSIWYG table cell format handling which could clear styles unexpectedly. ([#4964](https://github.com/BookStackApp/BookStack/issues/4964))

**Released in v24.02.3**

* Fixed non-working "Open Link In..." option for description editors. ([#4925](https://github.com/BookStackApp/BookStack/issues/4925))
* Fixed failed reference loading when references are from recycle bin items. ([#4918](https://github.com/BookStackApp/BookStack/issues/4918))
* Fixed failed code block rendering when a code language was not set. ([#4917](https://github.com/BookStackApp/BookStack/issues/4917))
* Updated page editor max content widths to align with page display.  ([#4916](https://github.com/BookStackApp/BookStack/issues/4916))

**Released in v24.02.2**

* New version to address missed version and asset changes in v24.02.1. ([#4889](https://github.com/BookStackApp/BookStack/issues/4889))

**Released in v24.02.1**

* Updated translations with latest Crowdin changes. ([#4877](https://github.com/BookStackApp/BookStack/pull/4877))
* Updated breadcrumb book & shelf lists to be name-ordered. ([#4876](https://github.com/BookStackApp/BookStack/issues/4876))
* Updated MFA inputs to avoid auto-complete. Thanks to [@ImMattic](https://github.com/BookStackApp/BookStack/pull/4849). ([#4849](https://github.com/BookStackApp/BookStack/pull/4849))
* Fixed non-breaking spaces causing combined words in page navigation. ([#4836](https://github.com/BookStackApp/BookStack/issues/4836))
* Fixed page navigation click not jumping to headers in nested collapsible blocks. ([#4878](https://github.com/BookStackApp/BookStack/issues/4878))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://commons.wikimedia.org/wiki/File:Seven_Sisters_Panorama,_East_Sussex,_England_-_May_2009.jpg">David Iliff (CC-BY-SA-3)</a> - Image Modified</span></span>