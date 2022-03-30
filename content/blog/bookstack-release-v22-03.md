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

Today we release BookStack v22.03 which features some further additions to the WYSIWYG editor,
aiming to align its feature-set with our markdown editor. We also see some changes to the settings 
view while LDAP users get a useful new debugging option.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.03)

**Upgrade Notices**

- **Webhook Data Changes** - Properties found at the `related_item -> created_by/updated_by/owned_by` path of the webhook data will now be an object instead of an ID integer. If you were using these ids you'd now need to access them within the relevant objects. (For example `related_item.created_by.id`).
- **Security Releases** - During this last release cycle there was a security update. See the [v22.02.3 blog post](/blog/bookstack-release-v22-02-3/) for more detail.

### Official Support Services & Website Updates

While not a particular feature for this release, I've been spending time this release
cycle putting together some official support services. These services are primarily targeted at
business that require an assured level of support.

Details regarding the launch of this service can be [found in this blogpost](/blog/bookstack-support-services/)
and details of the available plans can be seen on [our new support page](/support/).

Adding an additional link to our website header made things a little too busy so I've also redesigned
that area of this site to make things a little cleaner. We now have a multi-level site menu and a search bar
has been added to the center, mimicking the header style of BookStack itself.

### WYSIWYG Editor Task-Lists

You can now have checkbox task-lists within the WYSIWYG editor. 
Such lists have been part of BookStack's markdown editor capabilities
for a long time but now the editors are aligned on supporting this option.
Task-lists can be found in the list section overflow in the WYSIWYG toolbar:

![WYSIWYG Editor Task List Example](/images/2022/03/task_lists.png)

Checked status can be controlled when editing the page by simply clicking the checkbox.
This checked status will then be reflected when the page is viewed, with the checkbox
in a non-editable state.

### Link Control in WYSIWYG Editor

Links within the WYSIWYG editor are now easier to manage.
Previously, removing a link would be a non-obvious chore of editing the link
via the main toolbar then emptying the link input before pressing save.
Now, when you're focused on a link, you'll 
see a toolbar to allow quick and easy link editing, removal or opening:

![WYSIWYG Editor Toolbar Link with three buttons: Edit link, Remove link & Open link in new tab](/images/2022/03/link_toolbar.png)

In addition, a new shortcut has been added to the editor. 
You can press `Ctrl+Shift+K` (Or `Cmd+Shift+K` on MacOS) to instantly show a popup
for quick linking to existing BookStack content:

![Link Selector Popup Modal Window Preview](/images/2022/03/link_selector.png)

### Settings Interface Changes

Within the settings view we would previously show three categories of settings,
each in their own panel with their own "Save" button. 
In some cases, this could prove frustrating as a user may click the save button of
section "A", which would loose any settings changed within section "B".
To avoid this the settings view has been split out to a page-per-category with
a navigation bar on the side:

![Example of new settings view, categorised via a left sidebar menu](/images/2022/03/settings_view.png)

### Webhook Updates

There have been some further changes to webhooks based upon community feedback.
`created_by`/`updated_by`/`owned_by` details on the sent `related_item` property
will now be objects instead of ids, which themselves contain a few details
such as `id`, `name` and `slug`.

In addition, Page creation and update events will now include revision details
within the `related_item` content. 

Put all together, the POST data will now look something like this for a page update event:

```json
{
    "event": "page_update",
    "...",
    "related_item": {
        "id": 2432,
        "...",
        "created_by": {
            "id": 1,
            "name": "Benny",
            "slug": "benny"
        },
        "updated_by": {
            "id": 1,
            "name": "Benny",
            "slug": "benny"
        },
        "owned_by": {
            "id": 1,
            "name": "Benny",
            "slug": "benny"
        },
       "current_revision": {
            "id": 597,
            "page_id": 2598,
            "name": "My wonderful updated page",
            "created_by": 1,
            "created_at": "2021-12-11T21:53:24.000000Z",
            "updated_at": "2021-12-11T21:53:24.000000Z",
            "slug": "my-wonderful-updated-page",
            "book_slug": "my-awesome-book",
            "type": "version",
            "summary": "Updated the title and fixed some spelling",
            "revision_number": 2
        }
    }
}
```

For those customizing the webhook data via our [logical theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md), it may be useful
to know I've extracted out the default webhook formatting to it's own [class which can be seen here](https://github.com/BookStackApp/BookStack/blob/0887c396940b99b37cd1bec4387dc7e112f171cf/app/Actions/WebhookFormatter.php). If needed, you could use this to emulate the base default webhook data as a starting point.

### LDAP Group Debugging

When configuring LDAP authentication, enabling and configuring the group syncing
would be a common pain-point. We do have a `LDAP_DUMP_USER_DETAILS` debugging 
option but this did not contain any group, or "memberOf" details.
Instead you'd have to run manual external LDAP searches, out of BookStack, to emulate
what might be happening.

In this release, we've now added a new `LDAP_DUMP_USER_GROUPS` option.
Setting this to true will stop login requests, at the point of parsing group details,
and dump the found details out to the browser as JSON. You'll see the raw
data fetched from the LDAP system in addition to how BookStack has parsed that data, upon any
fetching of nested groups:

```json
{
  "details_from_ldap": {
    "0": "memberof",
    "memberof": {
      "0": "cn=Editor,ou=Users,o=abc123,dc=jumpcloud,dc=com",
      "1": "cn=Wizards,ou=Users,o=abc123,dc=jumpcloud,dc=com",
      "2": "cn=All Users,ou=Users,o=abc123,dc=jumpcloud,dc=com",
      "count": 3
    },
    "count": 1,
    "dn": "uid=bjacobs,ou=Users,o=abc123,dc=jumpcloud,dc=com"
  },
  "parsed_direct_user_groups": [
    "Editor",
    "Wizards",
    "All Users"
  ],
  "parsed_recursive_user_groups": [
    "Editor",
    "Wizards",
    "All Users"
  ]
}
```

More details can be found in [our LDAP documentation](/docs/admin/ldap-auth/).

### Translations

We have a new language in this release, Basque! Work on this language is still in progress
but a big thanks to "Xabi" on Crowdin for starting work on these translations!

Upon that, we've had lots of updates since the last feature release provided 
by the wonderful contributors listed below:

- metaarch - *Bulgarian*
- Xabi (xabikip) - *Basque*
- Vitaliy (gviabcua) - *Ukrainian*
- pedromcsousa - *Portuguese*
- na3shkw - *Japanese*
- Nir Louk (looknear) - *Hebrew*
- Statium - *Russian*
- scureza - *Italian*
- MASOUD HOSSEINY (masoudme) - *Persian*
- Indrek Haav (IndrekHaav) - *Estonian*
- stothew - *German*
- m0uch0 - *Spanish*
- SmokingCrop - *Dutch*
- Maciej Lebiest (Szwendacz) - *Polish*
- Martins Pilsetnieks (pilsetnieks) - *Latvian*
- 10935336 - *Chinese Simplified*

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
* Fixed usage of `<br>` tags within code blocks instead of newlines when using the WYSIWYG editor. ([#3327](https://github.com/BookStackApp/BookStack/issues/3327))
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