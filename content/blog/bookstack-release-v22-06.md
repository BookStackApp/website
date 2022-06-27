+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.06"
date = 2022-06-24T11:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/bluebells-dan-brown.jpg"
slug = "bookstack-release-v22-06"
draft = false
+++

BookStack v22.06 is now here! This release was primarily refinement focused but it does include
some great new features that may streamline your usage of the platform.

* [Release video overview](https://www.youtube.com/watch?v=fUUg66Zypgg)
* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.06)

**Upgrade Notices**

- **SAML/LDAP Group Mapping** - Within the "External Authentication Ids" field for a BookStack role, a backslash followed by a comma (`\,`) will now cause the comma to be treated as a literal comma within the mapping name, instead of acting as a value separator to define multiple mappings.

### Convert Chapters to Books, Books to Shelves

To help with organisation, you can now convert chapters and books up within the content hierarchy.
The option to do this can be found when editing a chapter or book, where you'll also find some considerations
in regards to how this may affect content:

![View of the "Convert to Shelf" option when editing a book](/images/2022/06/convert_book_to_shelf.png)

Converting a book to a shelf will also convert chapters, within the book, to become new books themselves. 
If pages previously existed in the book, without being in a chapter, they will form their own new book with a name matching that of the original parent book but with " Pages" append onto it.

### Auto-Initiate SAML/OIDC Login

For instances that only use SAML2 or OIDC authentication, it's now possible to make the login flow
automatically start, instead of users needing to click the "Login with x" button.
This can be enabled via the following setting in your `.env` file:

```bash
AUTH_AUTO_INITIATE=true
```

With this enabled, BookStack will automatically start the authentication redirect process upon access
to the standard login endpoint. Users will see a loading view while this occurs:

![View showing "Attempting Login" with a loading spinner and help text](/images/2022/06/auth_auto_initiate.png)

Thanks to [@rjmidau](https://github.com/BookStackApp/BookStack/pull/3406) for building out this feature.

### WYSIWYG Code Editor Updates

The WYSIWYG code editor design has been refactored in this release to provide a cleaner look that makes more efficient use of space for easier editing. The language list is now an easier-to-parse single column that will auto-scroll and highlight based on language input.

![Screenshot of the code editor popup window, with code languages listed down the left](/images/2022/06/code_editor_redesign.png)

Upon the visual changes, the code language list has been updated with some requested options including TypeScript, Diffs, Julia, OCaml and Rust.

### UI Fixes & Improvements

Some time this release was focused to bring a slew of UI fixes and enhancements. 
Most of this was tightening of margins, paddings, hover-states & animations, improving consistency where possible. A couple of these are explained below but a [full list can be found here](https://github.com/BookStackApp/BookStack/pull/3433).

#### "Custom HTML Head Content" Setting

The "Custom HTML Head Content" setting, shown in the "Customization" category, is now rendered using a codemirror block which provides syntax highlighting, which should help indicate errors, and is generally more pleasant to edit code within.

![Screenshot of the "Custom HTML Head Content" setting rendered using a code editor](/images/2022/06/custom_head_html_setting.png)

#### Attachment Link Dropdown

Attachments, when viewed on a page, will now show a dropdown when hovered over.
This allows you to select the method of opening, providing a choice between:

- Download (The default) - Forced browser download as file.
- Open in Tab - Displays the file in-browser if the file type is safe & supported by the browser.

![Example of a page attachment dropdown in BookStack](/images/2022/06/attachment_dropdown.png)

Previously the "Open in Tab" option was fairly hidden, requiring URL manipulation or a keyboard shortcut to access, so this change should make this much more accessible.

### More Efficient Markdown Preview Display

The markdown editor preview display has received some behind-the-scenes changes to provide a more performant and provide a smoother experience. The display now receives changes via a virtual DOM diffing implementation which means only changed parts of the display will be updated, instead of the previous method of replacing the whole content code upon each update. This should especially improve scenarios where external embedded content is shown.

### Visual Theme System Template Updates

In this release cycle we've made some changes that should provide an easier and more maintainable experience using [the visual theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/visual-theme-system.md) to customize a few specific areas:

#### Export Customisation

Significant improvements have been made to the way export templates files and styles are managed.
Templates have been [organised into an exports-specific directory](https://github.com/BookStackApp/BookStack/tree/development/resources/views/exports) and the contents have been split into much more modular parts.

```
resources/views/exports
├── book.blade.php
├── chapter.blade.php
├── page.blade.php
└── parts
    ├── book-contents-menu.blade.php
    ├── chapter-contents-menu.blade.php
    ├── chapter-item.blade.php
    ├── custom-head.blade.php
    ├── meta.blade.php
    ├── page-item.blade.php
    └── styles.blade.php
```

Included with these changes is some new helper classes, used in the based export layout, allowing easy CSS targeting of export-specific content. For example, you could target `<p>` tags in only DOMPDF-generated PDF exports like so:

```css
.export.export-format-pdf.export-engine-dompdf p {
  color: tomato;
}
```

#### Body Start & End Templates

It's quite common that, when performing customizations, you'd need to add custom code at the start and 
end of the HTML `<body>` element. The only way to do this before was to override the entire `base.blade.php` layout template. We've now added a few extra placeholder partial templates, located at the start and end of the body in the base template, to allow easier access for customization.

```
resources/views/layouts/parts
├── base-body-end.blade.php
└── base-body-start.blade.php
```

### Translations

A big thanks again to the below wonderful translators that have contributed text since the original v22.04 release:

- David Clubb (davidoclubb) - *Welsh*
- welles freire (wellesximenes) - *Portuguese, Brazilian*
- Magnus Jensen (MagnusHJensen) - *Danish*
- Martins Pilsetnieks (pilsetnieks) - *Latvian*
- Maciej Lebiest (Szwendacz) - *Polish*
- Hieu Vuong Trung (vuongtrunghieu) - *Vietnamese*
- m0uch0 - *Spanish*
- Indrek Haav (IndrekHaav) - *Estonian*
- Hesley Magno (hesleymagno) - *Portuguese, Brazilian*
- Éric Gaspar (erga) - *French*
- na3shkw - *Japanese*
- scureza - *Italian*
- SmokingCrop - *Dutch*
- Fr3shlama - *German*
- 10935336 - *Chinese Simplified*
- DSR - *Spanish, Argentina*
- Statium - *Russian*
- Saeed (saeed205) - *Persian*
- Ypsilon-dev - *Arabic*
- sgenc - *Turkish*
- Mykola Ronik (Mantikor) - *Ukrainian*
- Andrii Bodnar (andrii-bodnar) - *Ukrainian*
- Xabi (xabikip) - *Basque*
- Jakub Bouček (jakubboucek) - *Czech*
- Helga Guchshenskaya (guchshenskaya) - *Russian*
- Younes el Anjri (younesea28) - *Dutch*
- Guclu Ozturk (gucluoz) - *Turkish*
- Atmis - *French*
- redjack666 - *Chinese Traditional*
- lihaorr - *Chinese Simplified*
- Ashita007 - *Russian*


### Full List of Changes

**Released in v22.06**

* Added ability to convert chapters to books, and books to shelves. ([#3499](https://github.com/BookStackApp/BookStack/pull/3499), [#1087](https://github.com/BookStackApp/BookStack/issues/1087))
* Added ability to auto-initiate login for SAML and OIDC auth users. Thanks to [@rjmidau](https://github.com/BookStackApp/BookStack/pull/3406). ([#3406](https://github.com/BookStackApp/BookStack/pull/3406), [#3216](https://github.com/BookStackApp/BookStack/issues/3216), [#2175](https://github.com/BookStackApp/BookStack/issues/2175))
* Added ability to use commas in the role "External Auth ID". ([#3416](https://github.com/BookStackApp/BookStack/pull/3416), [#3405](https://github.com/BookStackApp/BookStack/issues/3405))
* Added body-start/end templates as a convenience to theme system users. ([#894](https://github.com/BookStackApp/BookStack/issues/894))
* Added OCaml to the code editor language list and fixed highlighting type. ([#3511](https://github.com/BookStackApp/BookStack/issues/3511))
* Added TypeScript to the code editor language list. ([#3494](https://github.com/BookStackApp/BookStack/issues/3494))
* Added common audio types to our `WebSafeMimeSniffer` for non-download attachment usage. ([#3485](https://github.com/BookStackApp/BookStack/issues/3485))
* Added LaTex to the code editor language list. ([#3458](https://github.com/BookStackApp/BookStack/issues/3458))
* Updated the UI/design with a mass of fixes & improvements. ([#3433](https://github.com/BookStackApp/BookStack/pull/3433))
* Updated WYSIWYG code editor interface. ([#3512](https://github.com/BookStackApp/BookStack/pull/3512))
* Updated API docs to remove non-existant `image_id` field. ([#3474](https://github.com/BookStackApp/BookStack/issues/3474))
* Updated logging system to not log `StoppedAuthenticationException` events. ([#3468](https://github.com/BookStackApp/BookStack/issues/3468))
* Updated the markdown editor preview display to be patch-updated. ([#3454](https://github.com/BookStackApp/BookStack/issues/3454))
* Updated export templates into smaller chunks for easier override. ([#3443](https://github.com/BookStackApp/BookStack/issues/3443))
* Updated translations with latest Crowdin changes. ([#3428](https://github.com/BookStackApp/BookStack/pull/3428))
* Fixed tag overview entity-counts showing incorrect values. ([#3435](https://github.com/BookStackApp/BookStack/issues/3435))
* Fixed incorrectly placed debug script on default home page. ([#3430](https://github.com/BookStackApp/BookStack/issues/3430))
* Fixed text after line-breaks not being indexed. ([#3508](https://github.com/BookStackApp/BookStack/issues/3508))
* Fixed new WYSIWYG code snippets being shown as a single line. ([#3507](https://github.com/BookStackApp/BookStack/issues/3507))


**Released in v22.04.2**

* Added Persian to language list. ([#3426](https://github.com/BookStackApp/BookStack/issues/3426))
* Updated API docs to detail rate-limit information. ([#3423](https://github.com/BookStackApp/BookStack/issues/3423))
* Updated translations with latest Crowdin changes. ([#3418](https://github.com/BookStackApp/BookStack/pull/3418))
* Fixed broken attachment downloads in environments where PHP output buffering is disabled. ([#3415](https://github.com/BookStackApp/BookStack/issues/3415))
* Fixed `LDAP_DUMP_*` options throwing error when LDAP details contain binary data. ([#3396](https://github.com/BookStackApp/BookStack/issues/3396))
* Updated PHP dependency versions. 

**Released in v22.04.1**

* Fixed issue where a duplicate slash could occur in the URL leading to a 404 page. ([#3404](https://github.com/BookStackApp/BookStack/issues/3404))
* Updated translations with latest changes from Crowdin. ([#3402](https://github.com/BookStackApp/BookStack/pull/3402))

### Next Steps

My attention for the next release cycle will likely be focused on the next stage of [the road-map](https://github.com/BookStackApp/BookStack#%EF%B8%8F-road-map), the permissions system review. This review will assess changes to make the system more performant & scalable while taking into account requests and feedback provided over the last 6 years. If this goes ahead, it will likely be complex and require a lot of testing and therefore it may extend the release cycle timeline.

New versions of some of our core front-end libraries, TinyMCE and CodeMirror, have recently been released so I've targeted upgrade of those for our next feature release, which should bring some improvements to the editors.

Thinking longer-term, I've recently [opened a new proposal on GitHub](https://github.com/BookStackApp/BookStack/issues/3520) to set out a potential new URL scheme for core content (shelves, books, chapters, pages) within BookStack. I'd appreciate any feedback or commentary you may have on this.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://danb.me">Dan Brown</a>
  </span></span>