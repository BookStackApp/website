+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.30.0"
date = 2020-09-19T18:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/library-priscilla-du-preez.jpg"
description = "The v0.30 release introduces the audit log, adds chapters to the API, improves code editing and more"
slug = "beta-release-v0-30-0"
draft = false
+++

Although intended to be a quick release cycle, v0.30 is now here 5 months after the last major release. Sketchy personal health, a poorly pet & a busy day-job workload, combined with constant working-from-home, have reduced the amount of time I could afford to spare working on the project but with normality somewhat returning I present BookStack v0.30 which includes an assortment of enhancments. 


* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.0)


### Audit Log

//

### Code Block Editing Session History

//

### Attachment Link Insertion

//

### API Update - Chapters

//

### Dark Mode Tweaks

//

### Removal of Vue.JS & Webpack

//

### Failed Access Logging

//

### Translations

As always our teriffic translating tribe continue to provide their awesome efforts as this release brings updates
from the below languages by the below great Crowdin & GitHub members:

!!BELOW OUTDATED!

* Hasan Özbey (the-turk) - *Turkish*
* mrjaboozy - *Slovenian*
* rcy - *Swedish*
* Ali Yasir Yılmaz (ayyilmaz) - *Turkish*
* m0uch0 - *Spanish*
* scureza - *Italian*
* Statium - *Russian*
* Biepa - *German Informal; German*
* Finn Wessel (19finnwessel6) - *German*
* nutsflag - *French*
* syecu - *Chinese Simplified*
* Rodrigo Saczuk Niz (rodrigoniz) - *Portuguese, Brazilian*
* Lap1t0r - *French*
* Thinkverse (thinkverse) - *Swedish*
* milesteg - *Hungarian*
* [@jzoy](https://github.com/BookStackApp/BookStack/pull/2023) - *Chinese*

### Full List of Changes

* Added API endpoints for chapters.
* Added audit log to the settings area. ([#2173](https://github.com/BookStackApp/BookStack/issues/2173), [#1167](https://github.com/BookStackApp/BookStack/issues/1167))
* Added the ability to insert an attachment link directly into the current editor window. ([#1460](https://github.com/BookStackApp/BookStack/issues/1460))
* Added session-based code-block editor auto-save to prevent potential loss of content. ([#1398](https://github.com/BookStackApp/BookStack/issues/1398))
* Added warning wording around role system permissions to indicate what permissions could allow privilege escalation. ([#2105](https://github.com/BookStackApp/BookStack/issues/2105))
* Added the ability to log login failures to a file. Thanks to [@benrubson](https://github.com/BookStackApp/BookStack/pull/1881). ([#1881](https://github.com/BookStackApp/BookStack/pull/1881), [#728](https://github.com/BookStackApp/BookStack/issues/728))
* Updated Simplified Chinese translations. Thanks to [@Honvid](https://github.com/BookStackApp/BookStack/pull/2157). ([#2157](https://github.com/BookStackApp/BookStack/pull/2157))
* Updated WYSIWYG editor css to put editor in it's own layer to improve degraded dark mode performance. ([#2154](https://github.com/BookStackApp/BookStack/issues/2154))
* Updated Czech translations. Thanks to [@jakubboucek](https://github.com/BookStackApp/BookStack/pull/2238). ([#2238](https://github.com/BookStackApp/BookStack/pull/2238))
* Updated permission system so that the permission map table does not contain ID's since database limits could be met in scenarios where permissions were automatically refreshed on a frequent basis. ([#2091](https://github.com/BookStackApp/BookStack/issues/2091))
* Updated to role table in the database to remove a redundant name field which fixes issue where changing a role name would not change the name used to match with LDAP groups. ([#2032](https://github.com/BookStackApp/BookStack/issues/2032))
* Updated URL slug generation to achieve a much cleaner result when non-ascii characters are used. Thanks to [@drzippie](https://github.com/BookStackApp/BookStack/pull/2165). ([#2165](https://github.com/BookStackApp/BookStack/pull/2165), [#2026](https://github.com/BookStackApp/BookStack/issues/2026), [#1765](https://github.com/BookStackApp/BookStack/issues/1765))
* Updated error reporting so that not-found errors are not written to the log, causing logs to fill much quicker than expected. ([#2110](https://github.com/BookStackApp/BookStack/issues/2110))
* Updated dark mode styles to remove filters applied to images so that they display as expected. ([#2045](https://github.com/BookStackApp/BookStack/issues/2045))
* Removed vuejs from project & started standardisation of custom basic component system. ([#2202](https://github.com/BookStackApp/BookStack/issues/2202))
* Replaced dev usage of node-sass with dart-sass. Thanks to [@timoschwarzer](https://github.com/BookStackApp/BookStack/pull/2166). ([#2166](https://github.com/BookStackApp/BookStack/pull/2166))
* Fixed issue where, upon role delete, users would not be migrated when specified to during role delete flow. ([#2211](https://github.com/BookStackApp/BookStack/issues/2211))
* Fixed issue where the system would error on upload of images that contain a hash in the name. ([#2161](https://github.com/BookStackApp/BookStack/issues/2161))
* Fixed scenario where page drafts would show as saved where request would actually fail, leading to loss of data. Added a browser-side storage mechanism for emergency use. ([#2150](https://github.com/BookStackApp/BookStack/issues/2150))
* Fixed issue where LDAP groups would not sync on initial login due to the email confirmation system taking over before the group sync would run. ([#2082](https://github.com/BookStackApp/BookStack/issues/2082))
* Fixed issue where the redirect upon login could lead to an external site. ([#2073](https://github.com/BookStackApp/BookStack/issues/2073))
* Fixed low visibility of horizontal lines when dark mode is in use. ([#2209](https://github.com/BookStackApp/BookStack/issues/2209))
* Fixed issue where HTML entities would be seen in page preview content. Thanks to [@mr-vinn](https://github.com/BookStackApp/BookStack/pull/2257). ([#2257](https://github.com/BookStackApp/BookStack/pull/2257), [#2114](https://github.com/BookStackApp/BookStack/issues/2114))
* Fixed issue where previous page content would be indexed upon save instead of the fresh content. ([#2042](https://github.com/BookStackApp/BookStack/issues/2042))
* Fixed issue where an error would be thrown on SAML logout request from the IdP. ([#2002](https://github.com/BookStackApp/BookStack/issues/2002))
* Fixed bad pagination styling which would result in invisible numbering. ([#1839](https://github.com/BookStackApp/BookStack/issues/1839))
* Fixed incorrect and misleading behaviour when saving a comment with no content. ([#1836](https://github.com/BookStackApp/BookStack/issues/1836))


### Next Steps

For v0.31 my main focus will be adding pages to the API which will be a bit more involved than the other endpoints we've added so far. That would complete the core API endpoints I wanted to initially implement; After that I'll allow issues to be created to request other API endpoints that people may need.

Now that I've added the audit log I'd like to expand the activities we track to include things such as setting changes, logins & user creations so that admins will be able to review administration operations. As part of that work I'll try to start a deeper scoping into how content notifications could fit into the application.

I've opened a proposal to implement proper "Owner" controls, which can be seen here: https://github.com/BookStackApp/BookStack/issues/2246. At the moment the permission system has the ability to apply different permissions for someone's own content but this currently relates to the creator. This causes issues in scenarios where someone would create elements, such as a book, on behalf of another user. These changes would mean a "Owner" user would be assigned to each item, the creator by default, but that "Owner" could be easily re-assigned where required. I'll likely implement this as part of the next release cycle unless there are any major concerns. 

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: &nbsp; <span>Photo by <a href="https://unsplash.com/@priscilladupreez?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Priscilla Du Preez</a> on <a href="https://unsplash.com/s/photos/books?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>
