+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.05"
date = 2023-05-02T11:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/bird-ray-hennessy.jpg"
slug = "bookstack-release-v23-05"
draft = false
+++

BookStack v23.05 releases today, sneaking into the start of May with a
bunch of additions, updates and changes including a new command line tool
to help with admin operations. 

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.05)

**Upgrade Notices**

TODO - Add to updates page
TODO - Check docs changes

- **Page Include Tags** - Nesting is now allowed for [include tags](https://www.bookstackapp.com/docs/user/reusing-page-content/#include-tags), up to 3 levels of depth. You may now see more content loaded for pages which previously had unparsed nested include tags.
- **SAML2** - SAML2 Single LogOut (SLO) requests will now include a "session_index" for the current user. This technically brings BookStack's implementation closer to the spec, and is not expected to cause issues, but if using SLO it may be wise to check your identity provider behavior remains the same as before during logout.
- **Custom Code Block Themes** - Due to a change of library, the way custom code block themes has significantly changed, as no longer uses the "window.CodeTheme" method previously used. Refer to our ["Changing Code Block Themes"](https://www.bookstackapp.com/docs/admin/visual-customisation/#changing-code-block-themes) documentation for further information.
- **Editor Event - editor-markdown::setup** - This event no longer contains "codeMirrorInstance" in the event data. It instead has a "cmEditorView" property. [See the event docs for more details](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/javascript-public-events.md#editor-markdownsetup).
- **Editor Event - editor-markdown-cm::pre-init** - This event has been renamed to "editor-markdown-cm6::pre-init" and no longer contains "config" in the event data. It instead has a "editorViewConfig" property. [See the event docs for more details](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/javascript-public-events.md#editor-markdown-cm6pre-init).
- **Upload Timeouts** - The use of "window.uploadTimeout" has been removed as a way to control upload timeouts. This would previously only be used in certain cases. Instead, if required, timeouts can usually be enforced at the web-server level.

TODO - Video Link

### New System CLI (Early Alpha)

When it comes to managing a BookStack instance, backup and restore has always been a point of contention.
Ultimately, the method of backup can depend on preference, hosting and environment.
Our documentation provided a generic set of commands & actions to achieve backup & restore, but while some found these simple and scriptable, 
some found the process overwhelming and complicated.

To help with backup, restore, and other tasks, with this release I'm introducing the BookStack System CLI.
This is a new CLI tool, included within the BookStack app files, that can perform the following commands:

- **Init** - Setup a fresh BookStack installation within a folder.
- **Backup** - Creates a backup of an existing BookStack installation to a single ZIP file.
- **Restore** - Restore a backup ZIP into an instance of BookStack.
- **Update** - Update an existing BookStack installation to the latest version.

This CLI is technically managed as [a new separate project](https://github.com/BookStackApp/system-cli) and is actually self-contained
and independent of the BookStack codebase, meaning it can be downloaded and be used alone without an existing working BookStack install.

Here's a demo of using the CLI to take a backup, and restoring that backup into a new instance created by the CLI:

[![asciicast](https://asciinema.org/a/whALf4oAkhBU3VeuOAjpmGEGz.svg)](https://asciinema.org/a/whALf4oAkhBU3VeuOAjpmGEGz)

To support backups, a new `<bookstack_install_dir>/storage/backups` folder has been added to act as the default backup output location, but alternatively the output zip can be provided when running the command if a custom path is preferred.

It should be noted this new CLI **should be considered an early alpha** implementation, with the likelihood to run into bugs relatively high.
Some known issues (mostly due to MySQL variance) are [documented in the project readme](https://github.com/BookStackApp/system-cli#known-issues).
The CLI is written in PHP, and made to be platform abstract. So far i've been testing this across a range of unix-based systems but this kind of CLI is still very environment dependant so it may be a while before things mature.
Behaviour, Output, options and the CLI name may change over time as I gain feedback from people using this.

In the longer-term vision, I may integrate this CLI with the BookStack interface, so that things like backups can be managed from in-app, but that brings its own complications and I'd like to see the CLI mature first.

### New File Upload Handling & Attachment Manager Simplification

File upload handling has been revamped in a few key areas, specifically the image manager and attachment manager UIs, found when editing a page.
The new experience switches out our previous usage of the [dropzone.js](https://www.dropzone.dev/) library with a much more lightweight 
custom implementation to provide a more "BookStack" integrated feel, which we'll be able to better utilize in the future:

TODO - Image upload from image manager here, maybe show error?

This new format for image uploads has the added benefit of now showing errors in a clearer and more accessible format.

To support these changes the areas in which they are used have received some attention.
The styles of the image manager have been tidied and tightened to provide a cleaner user experience.
The attachment management panel has had a more extensive overhaul, replacing the previous tabbed-based interface
with a simpler layout that requires less clicks for common upload actions.

TODO - Image of attachment manager here.

### Code Block Updating to CodeMirror 6

Within BookStack all code syntax highlighting and code editing, including that of the Markdown page editor, is assisted by the popular [CodeMirror](https://codemirror.net/) JavaScript library. 
After being released last year, I started work to upgrade from CodeMirror 5 to 6 in August of last year, but quickly found this update was essentially a rebuild of the library requiring a lot of work on the BookStack side of things.
This release cycle I put my head down and spent a lot of time on this so that, as of BookStack v23.05, all such code blocks are now using CodeMirror 6.

TODO - image of CM6 codeblcok?

This will hopefully not impact most users, while it should bring us better mobile support while keeping us up-to-date on our libraries.
This does have some significant impacts to those that had applied customizations, since it changes some of the "Editor Events" we previously had,
while also significantly changing (and unfortunately complicating) the way custom code themes are applied. 
See the upgrade notices at the top of the blogpost for more details.

### API Updates - Image Gallery & Content Permissions

This release brings two new sets of endpoints to the API, helping to fill gaps and empower our API users to achieve all actions possible via the UI.

TODO - Image of endpoints

The first set are image gallery APIs, which allow the management of page content images much like within the image manager when editing pages. 
This will be welcome to those that have wanted to handle images in a much more granular way via the API, outside of using the base64-encoded-in-content approach.

The second set are content permissions APIs, allowing handling of all controls you'd usually see when viewing the "Permissions" for a single Shelf/Book/Chapter/Page within the user interface. Those wanting to set custom permissions on API-created content should be happy to see these added.

### Nested Include Tags

From very early on BookStack has had the ability to dynamically include the whole content, or parts of content, from other pages
using [page include tags](https://www.bookstackapp.com/docs/user/reusing-page-content/#include-tags).
These have only ever worked at a single layer though, so "nested" tags within the included content would not then be subsequently parsed.

Within this release, this behaviour has been changed so that nested include tags will be parsed.
This works up to three levels of content, with the limit being there to prevent performance and recursion issues.

Thanks to [@jasonF1000](https://github.com/BookStackApp/BookStack/pull/4192) for helping to contribute this feature.

### Clojure Code Syntax Highlighting

Another new coding language gets highlighting support in this release, with
the lucky language being clojure:

TODO - Image of clojure code

### OIDC ID Token Logical Theme Event

A new `OIDC_ID_TOKEN_PRE_VALIDATE` event has been added to the [logical theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md). This allows the customization of incoming OIDC ID token data which can be useful to perform any changes required
that are outside the scope of what the standard and/or BookStack supports.

As an arbitrary example, the below would prefix "Sir" to the names of those that have a name ending in "Chuckle":

```php
Theme::listen(ThemeEvents::OIDC_ID_TOKEN_PRE_VALIDATE, function (array $idTokenData, array $accessTokenData) {
    $currentName = $idTokenData['name'];
    if (str_ends_with($currentName, 'Chuckle')) {
        return array_merge($idTokenData, [
            'name' => 'Sir ' . $currentName,
        ]);
    }
});
```

### JavaScript Codebase & Public (Editor) Events

With all the JavaScript focused work performed for this release, there's been some general
clean-up and alignment performed to keep things tidied and maintained.

First of all, I've added [ESLint](https://eslint.org/) to standardise the formatting and code style
across the whole BookStack JavaScript codebase which helps ensure consistency while potentially
spotting or preventing issues.

Secondly, the custom public JavaScript events (Which we previously called "Editor Events") have been 
properly documented within a [developer doc markdown file within the repo](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/javascript-public-events.md), providing details of each event along with an example.
In addition to providing detail for developers, this helps us track the public API we're providing so it's easier
for us to track and advise of breaking changes.

### Disable SMTP SSL Verification Option

Many using BookStack in private/local networks would configure the system to send mail via a SMTP
server that used a self/privately-signed certificate, and this could cause BookStack to throw an error
since the certificate was not signed by a commonly known authority.

While it's often possible to work around this, by adding the custom certificate authority to the system's 
trusted store, this could be a tricky process in some environments. 
As an alternative, the below option can now added to your `.env`:

```bash
MAIL_VERIFY_SSL=false
```

With this option set to `false`, all levels of SSL/TLS certificate verification will be ignored during SMTP email sending.
This can make you more vulnerable to [MITM attacks](https://en.wikipedia.org/wiki/Man-in-the-middle_attack), so should only be used where necessary on private networks.

Thanks to [@vincentbernat](https://github.com/BookStackApp/BookStack/pull/4126) for helping to contribute this feature.

### Translations

Another release means another update the translation content within BookStack from the following
remarkable roster of folks that have provided translation text since the original v23.02 release:

- Name - *Lang*


### Next Steps

Within this release cycle I though a lot more about multi-language support within BookStack, 
but ran into significant doubts about it about it being worthwhile to make significant content changes to support this
due to the complexity it'd add, especially as such a change would likely only benefit the larger, more resourceful 
BookStack users while having a development impact for everyone. 
I wanted to think about potential alternative options that don't require so much foundational change, so I posted
a question [within the issue thread](https://github.com/BookStackApp/BookStack/issues/569#issuecomment-1501145217)
to gain feedback to help explore what exactly people are lacking right now. 
If you have a need to support multi-lingual content within BookStack, I've welcome your response to that.

Right now there's fair demand in regards to features surrounding comments and notifications, both areas untouched
in quite a while apart from the addition of webhooks.
I'd like to spend some time in these areas. Notifications in general is very complex topic, at least when you consider
the levels of preferences and control that people may desire/need. 
It may be the case I tackle some minor issues in these areas, to help form questions and ideas that I can take to the 
wider community to help establish a path forward to the more significant features here.

The image upload work in this release reminded me that the image manager is a little old.
While I neatened a few parts for v23.05, it's still very much non-mobile-friendly and I don't think it's very screen-reader accessible either, so I'd like to overhaul things a tad to bring them up to standards.

### Other Updates

If you missed it, it's worth checking out the [March Project Update](/blog/project-update-march-23/) post
where I shared many of the non-release-specific project updates for the month which included
new hacks and API scripts.

### Full List of Changes

**Released in v23.05**

* Added system CLI for admin operations. ([#4206](https://github.com/BookStackApp/BookStack/pull/4206), [#3149](https://github.com/BookStackApp/BookStack/issues/3149))
* Added image gallery API Endpoints. ([#4103](https://github.com/BookStackApp/BookStack/pull/4103))
* Added content permission API endpoints. ([#2702](https://github.com/BookStackApp/BookStack/issues/2702), [#4099](https://github.com/BookStackApp/BookStack/pull/4099))
* Added new logical theme event to customize OIDC ID token data. ([#4200](https://github.com/BookStackApp/BookStack/issues/4200))
* Added Clojure syntax highlighting for code blocks. ([#4112](https://github.com/BookStackApp/BookStack/issues/4112))
* Added option to disable SSL verification with SMTP email sending. Thanks to [@vincentbernat](https://github.com/BookStackApp/BookStack/pull/4126). ([#4126](https://github.com/BookStackApp/BookStack/pull/4126), [#3166](https://github.com/BookStackApp/BookStack/issues/3166))
* Added support for three-levels of nested include tags. Thanks to [@jasonF1000](https://github.com/BookStackApp/BookStack/pull/4192). ([#4192](https://github.com/BookStackApp/BookStack/pull/4192), [#2845](https://github.com/BookStackApp/BookStack/issues/2845))
* Added detailed documentation for public JS events. ([#4179](https://github.com/BookStackApp/BookStack/issues/4179))
* Added standard JS codebase formatting via ESLint. ([#4181](https://github.com/BookStackApp/BookStack/pull/4181), [#4180](https://github.com/BookStackApp/BookStack/issues/4180))
* Updated code blocks & markdown editor to CodeMirror 6. ([#3617](https://github.com/BookStackApp/BookStack/pull/3617), https://github.com/BookStackApp/BookStack/issues/3518))
* Updated file upload handling for images and attachments. ([#4193](https://github.com/BookStackApp/BookStack/pull/4193))
* Updated SAML2 SLO requests to include a session index. ([#3936](https://github.com/BookStackApp/BookStack/issues/3936))
* Updated translations with latest Crowdin changes. ([#4163](https://github.com/BookStackApp/BookStack/pull/4163))
* Fixed audit log type filter leading to wrong location. ([#4201](https://github.com/BookStackApp/BookStack/issues/4201))
* Fixed large videos within content escaping content area. Thanks to [@chopin2712](https://github.com/BookStackApp/BookStack/pull/4204). ([#4204](https://github.com/BookStackApp/BookStack/pull/4204))
* Fixed missing WKHTMLTOPDF in .env.example.complete file. Thanks to [@7nohe](https://github.com/BookStackApp/BookStack/pull/4145). ([#4145](https://github.com/BookStackApp/BookStack/pull/4145))
* Fixed not being able to search for terms containing backslashes . Thanks to [@esakkiraja100116](https://github.com/BookStackApp/BookStack/pull/4202). ([#4202](https://github.com/BookStackApp/BookStack/pull/4202), [#4175](https://github.com/BookStackApp/BookStack/issues/4175))
* Fixed timestamp in API docs example chapter response. Thanks to [@tigsikram](https://github.com/BookStackApp/BookStack/pull/4191). ([#4191](https://github.com/BookStackApp/BookStack/pull/4191))

**Released in v23.02.3**

* Fixed issue where user delete fails when no "migration" user is selected. ([#4162](https://github.com/BookStackApp/BookStack/issues/4162))
* Fixed tag selection via mouse on Safari. ([#4139](https://github.com/BookStackApp/BookStack/issues/4139))
* Updated translations with latest Crowdin changes. ([#4131](https://github.com/BookStackApp/BookStack/pull/4131))

**Released in v23.02.2**

* Fixed role deletion failing when submitting with empty migration role. ([#4128](https://github.com/BookStackApp/BookStack/issues/4128))
* Fixed ownership migration upon user delete not working. ([#4124](https://github.com/BookStackApp/BookStack/issues/4124))
* Updated translations with latest Crowdin changes. ([#4074](https://github.com/BookStackApp/BookStack/pull/4074))

**Released in v23.02.1**

* Fixed an issue with language loading in certain scenarios. ([#4068](https://github.com/BookStackApp/BookStack/issues/4068))
* Updated translations with latest Crowdin changes. ([#4066](https://github.com/BookStackApp/BookStack/pull/4066))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@rayhennessy?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Ray Hennessy</a> on <a href="https://unsplash.com/photos/Hk6W46UGWRg?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>