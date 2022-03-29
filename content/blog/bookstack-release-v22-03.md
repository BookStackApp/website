+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.03"
date = 2022-03-30T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/spring-bird-brian-breeden.jpg"
slug = "bookstack-release-v22-03"
draft = false
+++


Today we release BookStack v22.03 which features some further additions to the WYSIWYG editor
to align its feature-set with our markdown editor. We also see some changes to the settings 
view and LDAP users get a useful new debugging option.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.03)

**Upgrade Notices**

- **Webhook Data Changes** - Properties found at the `related_item -> created_by/updated_by/owned_by` path of the webhook data will now be an object instead of an ID integer. If you were using these ids you'd now need to access them within the relevant objects. (For example `related_item.created_by.id`).
- **Security Releases** - During this last release cycle there was a security update. See the [v22.02.3 blog post](/blog/bookstack-release-v22-02-3/) for more detail.

### Official Support Services & Website Updates

While not a particular feature for this release, I've been spending time this release
cycle putting together some official support services. These services are primarily targeted at
business that require assured support.

Details regarding the launch of this service can be [found in this blogpost](/blog/bookstack-support-services/)
and details of the available plans can be seen on [our new support page](/support/).

Adding an additional link to our website header made things a little too busy so I've also redesigned
that area of this site to make things a little cleaner. We now have a multi-level site menu and a search bar
has been added to the center, mimicking the header style of BookStack itself.

### WYSIWYG Editor Task-Lists


### Link Control in WYSIWYG Editor

- Popup control to edit/remove
- New entity selector shortcut

### Settings Interface Changes


### Webhook Updates


### LDAP Group Debugging


### Translations

- Name (username) - *language*


### Full List of Changes

**Released in v22.03**

* Added support for checkbox tasklists in the WYSIWYG editor. ([#3333](https://github.com/BookStackApp/BookStack/pull/3333), [#4](https://github.com/BookStackApp/BookStack/issues/4))
* Added WYSIWYG control to remove & edit links. ([#3276](https://github.com/BookStackApp/BookStack/issues/3276), [#3298](https://github.com/BookStackApp/BookStack/pull/3298))
* Added WYSIWYG `Ctrl+Shift+K` shortcut to show entity selector popup shortcut in WYSIWYG editor. ([#3244](https://github.com/BookStackApp/BookStack/issues/3244), [#3298](https://github.com/BookStackApp/BookStack/pull/3298))
* Added LDAP user group debugging option. ([#3345](https://github.com/BookStackApp/BookStack/issues/3345))
* Added support for the Basque language. ([#3296](https://github.com/BookStackApp/BookStack/issues/3296))
* Updated settings view with a re-organized layout for a less confusing user experience. ([#3349](https://github.com/BookStackApp/BookStack/pull/3349), [#3221](https://github.com/BookStackApp/BookStack/issues/3221))
* Updated code block rendering in WYSIWYG to help prevent scroll jumping upon undo/redo. ([#3326](https://github.com/BookStackApp/BookStack/issues/3326))
* Updated translations with latest Crowdin updates. ([#3320](https://github.com/BookStackApp/BookStack/pull/3320))
* Updated webhook data to include details of page/chapter/shelf/book creator/updater/owner. ([#3279](https://github.com/BookStackApp/BookStack/issues/3279))
* Updated webhook data to include revision details on page_update and page_create events. ([#3218](https://github.com/BookStackApp/BookStack/issues/3218))
* Fixed lack of translation support for some editor buttons. ([#3342](https://github.com/BookStackApp/BookStack/issues/3342))
* Fixed incorrect page concatenation in book markdown export. ([#3341](https://github.com/BookStackApp/BookStack/issues/3341))
* Fixed existence of `<br>` tags within code blocks instead of newlines. ([#3327](https://github.com/BookStackApp/BookStack/issues/3327))
* Fixed image thumbnail generation not taking EXIF rotation data into account. ([#1854](https://github.com/BookStackApp/BookStack/issues/1854))


**Released in v22.02.1 through v22.02.3**

* Updated editor references to avoid caching issue that would prevent WYSIWYG editor from opening. ([#3293](https://github.com/BookStackApp/BookStack/issues/3293))
* Updated code blocks within the editor to be more reliable, especially on first insertion. ([#3292](https://github.com/BookStackApp/BookStack/issues/3292))
* Added cache breaker to WYSIWYG onward loading to prevent plugin errors appearing if cached. ([#3303](https://github.com/BookStackApp/BookStack/pull/3303))
* Updated translations with latest Crowdin changes. ([#3301](https://github.com/BookStackApp/BookStack/pull/3301), [#3312](https://github.com/BookStackApp/BookStack/pull/3312), [#3291](https://github.com/BookStackApp/BookStack/pull/3291))
* Updated sidebar fade to be more subtle when in dark mode. ([#3203](https://github.com/BookStackApp/BookStack/issues/3203))
* Fixed WYISWYG editor issue where blank lines would collapse. ([#3302](https://github.com/BookStackApp/BookStack/issues/3302))
* Added iframe allow-list control to prevent a range of malicious uses of untrusted iframe sources. ([#3314](https://github.com/BookStackApp/BookStack/issues/3314))

### Next Steps

With the changes in this release, the WYSIWYG and markdown editors are now much better aligned in terms of features & functionality.
Over the next month the focus will be on providing the ability to switch between the editor types. 
This will likely be at a per-page level, with permission controls to decide who wields that power to change editor type.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@bcbreeden?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Brian Breeden</a> on <a href="https://unsplash.com/s/photos/spring?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>