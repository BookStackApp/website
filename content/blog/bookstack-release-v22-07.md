+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.07"
date = 2022-07-28T11:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/library-chaojie-ni.jpg"
slug = "bookstack-release-v22-07"
draft = false
+++

TODO - Intro

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.07)

### Permission System Performance Increase

TODO

### Shelf Book Management Improvements

TODO

### WYSIWYG Code Editor Language Favourites

TODO

### Sort a Book from the Chapter

TODO

### Adjustable IP Address Storage Precision

TODO

### Editor List Shortcuts

TODO

### Tag-based CSS Customization

TODO

### New "Activity Logged" Local Theme System Event

TODO

### Underlying Library Updates

TODO (tinyMCE 6 and DOMPDF) 

### Translations

A usual shout-out again  to our wonderful wordsmiths of different languages that have provided translation content since the  original v22.06 release:


TODO
- User - *languages*


### Next Steps

TODO

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