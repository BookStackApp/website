+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.14.0"
date = 2017-01-22T12:45:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/logs-sean-tan.jpg"
description = "BookStack v0.14 released with multi language support, Page includes and many bugfixes"
slug = "beta-release-v0-14-0"
draft = false
+++

The first release of 2017 is upon us with v0.14. Since the last release, back in November, focus has been put on adding support mulitple languages as was planned but a range of additional features & bugfixes have also been added. As usual, Here are the update links:

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.14.0)

### Language Support

All of the text used in BookStack has been moved into language-specific text files so different languages can be easily added. Thanks to some awesome members of the community much of BookStack has been translated to French and Brazillian Portuguese. There is also partial support for German. A default language can be set at an instance level by setting a `APP_LANG` variable to a specific language code. For example:

```
APP_LANG=FR
# OR
APP_LANG=PT_BR
```

In addition to the global language setting, Users can set their own language preference by changing the option found in the 'Edit Profile' screen:

![Changing BookStack user language](/images/2017/01/language-selection.png)


Obviously this will not translate the content you write in BookStack but it goes a long way to opening up BookStack to non-english speakers. If you're interested in adding a language the [readme.md file](https://github.com/BookStackApp/BookStack#translations) has been updated with some details on how to do this.

Please note that adding language support was quite a large effort so there is likely to be a few areas missing translations. Where there are no language translations english is used as a backup so you may see a mix of english and other languages until this stabilises.

### Page Include Tags

A commonly request feature was being able to include pages and page content within other pages. This is now possible through the use of page include tags. Details of this can be [found in the docs here](/docs/user/reusing-page-content/).

### Full List of Features, Changes & Fixes

* Added full support for mulitple languages.
* French & Brazillian Portuguese languages added (Thanks to [sirgix](https://github.com/BookStackApp/BookStack/pull/274) and [NakaharaL](https://github.com/BookStackApp/BookStack/pull/279)).
* Added support for page/page-content includes within other pages.
* Added support for using the database to store the cache and session.
* Added option to use WKHTMLtoPDF for improved PDF rendering. [Details here](/docs/admin/pdf-rendering/).
* Added auto-linking in the WYSIWYG editor.
* Updated page nav to scale if only smaller headers are used.
* Fixed bug causing offset first lines in code blocks when using the markdown editor.
* Fixed issue preventing non-admin users from deleting images or attachments.
* Fixed page navigation not working on some browsers when the link contains special characters.
* Fixed issue where panes could be blank if the default app color was used.
* Fixed page link popover copy button to work on modern non-flash-enabled browsers.
* Increased testing coverage of social authentication methods.
* Standardised breadcrumbs across BookStack views.
* Refactored entity code and permissions code to be more efficient.
* Updated LDAP config to allow a protocol to be defined which allows use of ldaps connections (Thanks to [fredericmohr](https://github.com/BookStackApp/BookStack/pull/236)).

### Next Steps

For the next release I want to focus some time on making sure BookStack is efficient as possible and spend some time refactoring some of the code base. Since Laravel 5.4 is to be released soon it's likely BookStack will move onto 5.4 to stay current.

In terms of new features some additional import/export options are much needed so I hope to tackle a few of the outstanding requests for those.

As a longer term idea I've been thinking about making BookStack JavaScript driven to be a VueJS single page application. To voice your opinion on this or to see the advantages/disadvantages you can [view the issue on GitHub here](https://github.com/BookStackApp/BookStack/issues/249).

### Other Updates

As you may have noticed, The BookStack blog, website and docs have recently been updated and are now all stored in the single [BookStackApp/website](https://github.com/BookStackApp/website) repository and it's now generated using the [Hugo](https://gohugo.io/) static site generator. Additionally search has been added to the docs courtesy of [Algolia Docsearch](https://community.algolia.com/docsearch/).

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@darkroomsg" target="_blank">Sean Tan</a></span>
