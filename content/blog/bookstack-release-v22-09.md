+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.09"
date = 2022-09-08T13:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/sheep-mountain-luke-ellis-craven.jpg"
slug = "bookstack-release-v22-09"
draft = false
+++

TODO - Intro

TODO - Update video link

* [Release video overview](https://youtu.be/m0iCq2MFynI)
* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.09)


**Upgrade Notices**

- **Security** - This release cycle contained a security release that added detail that's important to consider when BookStack content is used externally. See the [v22.07.3 post](/blog/bookstack-release-v22-07-3/) for more detail.
- **Revision Visibility** - This update fixes a permission disparity with revisions. Revision content has always been accessible to those with page-view permissions, but the links to the revisions list previously required page-edit permission to show. This has been aligned, which may mean page revision links may now show to those that did not previously see them.
- **Revision Limit Change** - The default, per-page, revision limit has been doubled from 50 to 100, to account for new system-content updates that may occur. If desired, you can [configure this to a custom value](/docs/admin/other-config/#revision-limit).
- **Reference Index** - New features have been added to track links between content in BookStack, which uses an internal reference index. Upon upgrade from an older BookStack version, this index will need to be rebuilt. This can be done with the ["Regenerate References" command](/docs/admin/commands/#regenerate-reference-index) or via the "Regenerate References" maintenance action within BookStack.

TODO - Notices on updates page.

### Cross-Item Reference Tracking

TODO - Intro
- Auto-link updating
- Reference view

### OIDC Group Sync Support

TODO

### New "local_secure_restricted" Image Storage Option

TODO

### "Page Include Parse" Logical Theme Event

TODO

### Visual Theme System - Export Template Partials

TODO, released in v22.07.2, link to export video.

### Translations

TODO - Intro

- User - *Language*

### Next Steps

TODO

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
* Fixed dates not using the correct encoding on some systems. ([#3590](https://github.com/BookStackApp/BookStack/issues/3590))
* Fixed image delete button showing to those without permission to delete. ([#3697](https://github.com/BookStackApp/BookStack/issues/3697))
* Fixed incorrect comment counts on Chinese language options. ([#3554](https://github.com/BookStackApp/BookStack/issues/3554))
* Fixed list indentation when next to floated images. ([#3672](https://github.com/BookStackApp/BookStack/issues/3672))
* Fixed various RTL text interface issues. ([#3702](https://github.com/BookStackApp/BookStack/issues/3702))
* Fixed WYSIWYG drawing update not triggering draft save. ([#3682](https://github.com/BookStackApp/BookStack/issues/3682))

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