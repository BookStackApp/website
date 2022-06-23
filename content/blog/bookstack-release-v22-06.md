+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.06"
date = 2022-06-23T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/bluebells-dan-brown.jpg"
slug = "bookstack-release-v22-06"
draft = false
+++


* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.06)

**Upgrade Notices**

- **SAML/LDAP Group Mapping** - Within the "External Authentication Ids" field for a BookStack role, a backslash followed by a comma (`\,`) will now cause the comma to be treated as a literal comma within the mapping name, instead of acting as a value separator to define multiple mappings.

### Convert Chapters to Books, Books to Shelves

TODO

### Auto-Initiate SAML/OIDC Login

TODO

### WYSIWYG Code Editor Updates

TODO - Design
TODO - Language option list

### More Efficient Markdown Preview Display

TODO

### Visual Theme System Template Updates

TODO - Export & CSS helper classes
TODO - Body start/end templates

### UI Fixes & Improvements

TODO - Intro, Overview of small bits

#### "Custom HTML Head Content" Setting

TODO

#### Attachment Link Dropdown

TODO

### Translations

TODO

- Name - *Language*


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

TODO

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://danb.me">Dan Brown</a>
  </span></span>