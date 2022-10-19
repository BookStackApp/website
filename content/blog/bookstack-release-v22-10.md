+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.10"
date = 2022-10-21T11:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/brambles-dan-brown.webp"
slug = "bookstack-release-v22-10"
draft = false
+++

TODO

* [Release video overview]() TODO!!!
* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.10)


**Upgrade Notices**

TODO

- **Category** - Detail

### Redesigned Content Permission Control

TODO

### Updated WYSIWYG Table Control Icons

TODO

### Book Copy Behaviour

TODO - https://github.com/BookStackApp/BookStack/issues/3699

### Book Read API Endpoint Detail

TODO - https://github.com/BookStackApp/BookStack/issues/3734

### System Back-end Maintenance

TODO

- Testing cleanup
- Auth system cleanup
- Parallel testing
- Fixes and tweaks

### Code Block Toolbar

TODO

### Translations


- User - *Language*

### Next Steps

TODO

### Full List of Changes

**Released in v22.10**

* Added Greek language. ([#3732](https://github.com/BookStackApp/BookStack/issues/3732))
* Added MATLAB code syntax highlighting. ([#3744](https://github.com/BookStackApp/BookStack/issues/3744))
* Added toolbar for code blocks in WYSIWYG editor to make mobile editing possible. ([#2815](https://github.com/BookStackApp/BookStack/issues/2815))
* Updated content permissions interface & logic to allow more selective/intuitive control. ([#3760](https://github.com/BookStackApp/BookStack/pull/3760))
* Update WYSIWYG table toolbar icons to be a little more legible. ([#3397](https://github.com/BookStackApp/BookStack/issues/3397))
* Updated auth controller components to not depend on older Laravel library. ([#3745](https://github.com/BookStackApp/BookStack/pull/3745), [#3627](https://github.com/BookStackApp/BookStack/issues/3627))
* Updated book copy behaviour to copy book-shelf relations if permissions allow. ([#3699](https://github.com/BookStackApp/BookStack/issues/3699))
* Updated books-read API endpoint to list child book/chapter tree. ([#3734](https://github.com/BookStackApp/BookStack/issues/3734))
* Updated list style handling to align deeply nested list styling in & out of editor. ([#3685](https://github.com/BookStackApp/BookStack/issues/3685))
* Updated shelf book management for easier touch device usage. ([#2301](https://github.com/BookStackApp/BookStack/issues/2301))
* Updated tag suggestions to provide more accurate results. ([#3720](https://github.com/BookStackApp/BookStack/issues/3720))
* Updated testing to support parallel running. ([#3751](https://github.com/BookStackApp/BookStack/pull/3751))
* Updated tests to align/clean-up certain common actions. ([#3757](https://github.com/BookStackApp/BookStack/pull/3757))
* Updated translations with latest Crowdin changes. ([#3737](https://github.com/BookStackApp/BookStack/pull/3737))
* Fixed custom code block theme not used within the WYSIWYG editor. ([#3753](https://github.com/BookStackApp/BookStack/issues/3753))
* Fixed issue where revision delete control would show to those without permission. ([#3723](https://github.com/BookStackApp/BookStack/issues/3723))
* Fixed justified text not applying to list content. ([#3750](https://github.com/BookStackApp/BookStack/issues/3750))
* Fixed not being able to deselect "Created/Update by me" search options. Thanks to [@Wertisdk](https://github.com/BookStackApp/BookStack/pull/3770). ([#3770](https://github.com/BookStackApp/BookStack/pull/3770), [#3762](https://github.com/BookStackApp/BookStack/issues/3762))
* Fixed page popover being hidden behind content in chromium-based browsers. ([#3774](https://github.com/BookStackApp/BookStack/issues/3774))
* Fixed SAML2 metadata display depending on external IDP metadata page. ([#2480](https://github.com/BookStackApp/BookStack/issues/2480))
* Fixed squashing of columns in users list. ([#3787](https://github.com/BookStackApp/BookStack/issues/3787))

**Released in v22.09.1**

* Added PHPCS for project PHP formatting. ([#3728](https://github.com/BookStackApp/BookStack/pull/3728))
* Updated SAML error handling to display additional error detail. ([#3731](https://github.com/BookStackApp/BookStack/issues/3731))
* Updated translations with latest Crowdin updates. ([#3710](https://github.com/BookStackApp/BookStack/pull/3710))
* Updated locale setting to help apply right locale on Windows. ([#3650](https://github.com/BookStackApp/BookStack/issues/3650))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://danb.me">Dan Brown</a>
  </span></span>