+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.04"
date = 2022-04-29T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cat-pounce-dorothea-oldani.jpg"
slug = "bookstack-release-v22-04"
draft = false
+++

TODO - Spellcheck all changes on branch.
TODO - Copy upgrade notices to updates page. (After spellcheck)

Today brings the release of BookStack v22.04! This includes the much-awaited feature
of easier editing switching, in addition to a bunch of other additions and improvements.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.04)

**Upgrade Notices**

- **Database Changes** - This release makes some significant changes to data within the database which may cause the update to take a little longer than usual. Please give the update time to complete.
- **REST API Page Create/Update Changes** - Create or update page requests now have the potential to change the current editor type for that page, depending on the content type sent in the request, if the API user has permission to change the page editor.
- **URL Handling** - The way we handle URLs has changed this release to hopefully address some issues in specfic scenarios. These changes have been tested and should not affect existing scenarios but there's an increased chance this release of affecting setups with more complex URL handling. Please [raise an issue](https://github.com/BookStackApp/BookStack/issues/new/choose) or jump into our Discord server if you have any issues with URLs after upgrading.

### Switch Between WYSIWYG & Markdown While Editing

TODO

### Recycle Bin API Endpoints

TODO

### New Editor Event to Configure Diagrams.net

For those that like to hack and customize, we've extended our custom editor events
to also emit a 'configure' editor event when loading diagrams.net (formerly draw.io) in BookStack.
This follows the pattern of [our other existing editor events](/docs/admin/hacking-bookstack/#bookstack-editor-events) and can be used like so:

```html
<script>
    window.addEventListener('editor-drawio::configure', event => {
        const config = event.detail.config;
        config.sidebarWidth = 900;
    });
</script>
```

If you've set a custom `DRAWIO` .env option, you'll need to ensure that contains a `configure=1` query parameter for this to work.
This event provides loads of abilities of customization.
[Consult this diagram.net FAQ page](https://www.diagrams.net/doc/faq/configure-diagram-editor) for a list of the options you can define.

### File Handling Efficiency Improvements

TODO

### Translations

The wonderful wizards of language within our community have continued their efforts
to keep the BookStack translations up-to-date. 
A big thanks to the following translators for their efforts since the last feature release:

- Username - *language*

### Full List of Changes

**Released in v22.04**

* Added ability to switch editor types on a per-page basis. ([#3387](https://github.com/BookStackApp/BookStack/pull/3387), [#458](https://github.com/BookStackApp/BookStack/issues/458))
* Added new recycle bin API endpoints. Thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3377). ([#3377](https://github.com/BookStackApp/BookStack/pull/3377), [#3372](https://github.com/BookStackApp/BookStack/issues/3372))
* Added ability to pass diagrams.net configuration options. ([#3391](https://github.com/BookStackApp/BookStack/pull/3391))
* Added Uzbek language option to allow translation, not yet active in the interface. ([#3383](https://github.com/BookStackApp/BookStack/issues/3383))
* Updated translations with latest Crowdin updates. ([#3384](https://github.com/BookStackApp/BookStack/pull/3384), [#3358](https://github.com/BookStackApp/BookStack/pull/3358))
* Updated database polymorphic relations to simpler morphmap. ([#3395](https://github.com/BookStackApp/BookStack/issues/3395))
* Updated file handling in many cases to stream data for better efficiency, reduce memory usage and avoid hitting limits. ([#3365](https://github.com/BookStackApp/BookStack/pull/3365), [#2886](https://github.com/BookStackApp/BookStack/issues/2886))
* Updated URL handling to be more stable in sub-path scenarios. ([#3364](https://github.com/BookStackApp/BookStack/pull/3364), [#2765](https://github.com/BookStackApp/BookStack/issues/2765), https://github.com/BookStackApp/BookStack/issues/2058)
* Updated content updates to increment updated_at field, even if only tags are changed. ([#3319](https://github.com/BookStackApp/BookStack/issues/3319))
* Fixed editor Portuguese translation. Thanks to [@evandroamaro](https://github.com/BookStackApp/BookStack/pull/3373). ([#3373](https://github.com/BookStackApp/BookStack/pull/3373))
* Fixed API issue where tags would not be applied on API shelf update. ([#3370](https://github.com/BookStackApp/BookStack/issues/3370))
* Fixed development build command Windows/non-bash compatibility. ([#3323](https://github.com/BookStackApp/BookStack/issues/3323))


**Released in v22.03.1**

* Fixed issue where `/settings` redirect would lead to wrong location in some scenarios. ([#3356](https://github.com/BookStackApp/BookStack/issues/3356))
* Fixed non-active prevention of custom HTML head content on settings views. ([#3355](https://github.com/BookStackApp/BookStack/issues/3355))
* Updated translations with latest Crowdin changes. ([#3354](https://github.com/BookStackApp/BookStack/pull/3354))
* Updated project PHP dependencies.

### Next Steps

Over the next month I'll probably take a break from big features and instead target v22.05 as a refinement release,
improving upon existing functionality and features to address some pain points and unfinished corners.
During this time I'll also look to open up a proposal for some larger-scale changes, specifically in relation to content URLs, to support some future features.

I intend to produce a few more videos for our [YouTube channel](https://www.youtube.com/c/BookStackApp) since these have proved
very useful so far. In particular, I want to create an install guide for Ubuntu 22.04, showing [the use of our new script](https://www.bookstackapp.com/blog/ubuntu-2204-script/), and produce a more general "Intro to BookStack" video for those new to the project.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@dorographie?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Dorothea OLDANI</a> on <a href="https://unsplash.com/?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  </span></span>