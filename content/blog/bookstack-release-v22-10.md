+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.10"
date = 2022-10-21T10:15:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/brambles-dan-brown.webp"
slug = "bookstack-release-v22-10"
draft = false
+++

This spooky season supplies us with BookStack v22.10, which continues our work to improve permission control
while bringing along some extra treats, without any tricks.

* [Release video overview](https://www.youtube.com/watch?v=8kAhZAIV5MM)
* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.10)


**Upgrade Notices**

- **Permission Management Changes** - The interface and logic for managing shelf, book, chapter & page permissions has changed significantly in this release. The following should be noted:
  - Content permissions that were not active (where the "Enable Custom Permissions" checkbox was unchecked) will be removed upon upgrade to v22.10.
  - Content permission role entries, that had no permissions provided, will not be reflected/shown as a row in the permissions interface immediately upon upgrade. Instead such cases will be reflected via the "Everyone Else" permission entry being active, in a non-inheriting state, with no permissions set.
  - There should be no functional change to active permissions upon upgrade. Care has been taken to ensure existing permissions are migrated so that access control remains the same as pre-upgrade.

### Redesigned Content Permission Control

Since content-level (Shelf, Book, Chapter, Page) permissions were added to BookStack they've required, when enabled, a user to manage permissions for all roles in the system. This can often be unintuitive, since a common use-case would be to permit or restrict a single role, but you'd be forced to manage all other roles at the same time. 

This release looks to address that with a significant revision to how permissions are implemented and managed. 
This is what the new revision view looks like:

![Screenshot of the new revisions view, with permission set for two roles, with a "Everyone else" option show with permission controls](/images/2022/10/item-permissions.png)

Content permissions are no longer an "all roles or nothing" scenario. You can now add individual roles to override, so you can manage just the roles you need to work with. Any roles without specific permissions defined can be managed by the "Everyone Else" option shown towards the bottom of the view. By default this will be set to inherit default role permissions, but you can override this to set new baseline permissions. 

Overall these changes should make permission management much simpler for existing use-cases, while making possible some new useful permission configurations.  

### Added Book Read API Endpoint Detail

While the REST API provided book detail via the `/api/books/<id>` book read endpoint, you'd have to also call two other endpoints to form a view
of the chapters & pages within the book, and even then you'd need to apply additional logic to build the content structure and ordering aligned
with the BookStack interface. 

To ease this, the book read endpoint will now return its child chapters and pages, ready ordered and nested as what be seen within the BookStack UI, on a `contents` property like so:

```json
{
  "id": 16,
  "name": "My own book",
  ...
  "contents": [
    {
      "id": 50,
      "name": "Bridge Structures",
      ...
      "url": "https://example.com/books/my-own-book/chapter/bridge-structures",
      "type": "chapter",
      "pages": [
        {
          "id": 42,
          "name": "Building Bridges",
          ...
          "url": "https://example.com/books/my-own-book/page/building-bridges"
        }
      ]
    },
    {
      "id": 43,
      "name": "Cool Animals",
      ...
      "url": "https://example.com/books/my-own-book/page/cool-animals",
      "type": "page"
    }
  ],
  ...
}
```

### System Back-end Maintenance

During this release cycle I spent a little extra time on cleaning up some existing parts of the codebase, specifically:

- Updated our tests to use standardised helper methods for common operations.
- Clean up authentication routes, removing old entwined Laravel framework auth logic that was barely used. 
- Added support for parallel PHPUnit testing for quicker dev environment test runs.

Gotta keep that codebase clean 🧹🧹🧹

### Updated WYSIWYG Table Control Icons

I'm highlighting this rather subtle change as an example of spending time to make the little things better for users.
Upon our upgrade to TinyMCE 5 for the main WYSIWYG editor, it was reported that the new table toolbar icons could be hard to read at a glance.
After [some discussion to explore the issues](https://github.com/BookStackApp/BookStack/issues/3397), and some trialling of options, 
I spent an hour or two playing with the original icons to tweak spacing and sizing to boost legibility where possible.
Here's the result, with the old icons on the top, and the tweaked icons below:

![Table toolbar icons comparison, original icons on top, new icons below](/images/2022/10/table-toolbar-icons.png)

While quite subtle, hopefully this should be notable improvement when glancing at them during editing.

### Handling Related Shelves on Book Copy

We added the ability to copy books late last year in BookStack v21.12. 
Something missing from the copy would be any relations to shelves that the original book sat upon.
As of this release, copying a book will now also copy its shelf relations, as long as the user
performing the copy has permission to edit those shelves (Since they'd effectively be altering its content).

### Code Block WYSIWYG Toolbar

Within the WYSIWYG editor it's always been tricky to edit code blocks on mobile, since it's usually done via a double-click
which is often not possible on mobile browsers. This wasn't much of a problem before since the code editor popup was 
very mobile unfriendly anyway but, with recent improvements to editing code its now more likely that users may edit code 
on such devices.

To help access code blocks for edit, a toolbar will now show when a code block is selected with an action that will 
open the block for editing:

![View of a select code block in the editor with a tooltip above it with a pencil icon button](/images/2022/10/code-block-toolbar.png)


### MATLAB/Octave Code Block Highlighting

Code block highlighting support has been added for MATLAB, or GNU Octave, syntax.
Along with this, both "MATLAB" and "Octave" are now selectable languages in the WYSIWYG code editor:

![View of the BookStack code editor with the "Octave" language selected, with octave language code showing](/images/2022/10/octave-code-highlighting.png)

### Translations

This release adds the language of Greek! A massive thanks to [@Gr-DigiLady](https://github.com/BookStackApp/BookStack/issues/3732) for their great effort in providing the language addition.

Our usual splendid super scribes have continued their solid work to provide us with the 
below translation updates since the original v22.09 release:

- digilady - *Greek*
- Linus (LinusOP) - *Swedish*
- HeartCore - *German Informal; German*
- Felipe Cardoso (felipecardosoruff) - *Portuguese, Brazilian*
- RandomUser0815 - *German*
- Vitaliy (gviabcua) - *Ukrainian*
- Naoto Ishikawa (na3shkw) - *Japanese*
- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- Maciej Lebiest (Szwendacz) - *Polish*
- Statium - *Russian*
- Indrek Haav (IndrekHaav) - *Estonian*
- Éric Gaspar (erga) - *French*
- sdhadi - *Persian*
- pedromcsousa - *Portuguese*
- DerLinkman (derlinkman) - *German; German Informal*
- 구인회 (laskdjlaskdj12) - *Korean*
- LiZerui (CNLiZerui) - *Chinese Traditional*
- Mihai Ochian (soulstorm19) - *Romanian*
- scureza - *Italian*
- m0uch0 - *Spanish*
- TurnArabic - *Arabic*
- SmokingCrop - *Dutch*
- 10935336 - *Chinese Simplified*
- Fabrice Boyer (FabriceBoyer) - *French*
- Martin Sebek (sebekmartin) - *Czech*

### Next Steps

Since this release cycle was consumed by permissions management, I feel like taking a break from permissions
for a month to focus on something else. I'll dig into the issues list and maybe check in with those in Discord to
find something fun to work on. May result in a release comprised of smaller-scope improvements. 

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