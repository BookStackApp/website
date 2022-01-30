+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v21.12"
date = 2021-12-22T16:45:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/reindeer-joe-green.jpg"
slug = "bookstack-release-v21-12"
draft = false
+++

As our last feature release of the year BookStack v21.12 is now available.
Upon a bunch of fixes & improvements, this release features outgoing webhooks in
addition to the ability of copying entire chapters and books.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.12)


**Upgrade Notices**

- **Security Releases** - There were a couple of security vulnerabilities found during the life of 
  v21.11. See the [v21.11.2](/blog/bookstack-release-v21-11-2/) and [v21.11.3](/blog/bookstack-release-v21-11-3/) posts for more details.


### Outgoing Webhooks

BookStack can now send out webhooks! These are web requests that are emitted by BookStack
when someone performs an action in the system (Updates page, Creates book etc..).
Webhooks can be created by an administrator in the application "Settings > Webhooks" view.

![Webhook list in settings](/images/2021/12/webhooks_list.png)

Webhooks can be triggered by any event that's tracked in the audit log. You can choose
specific events to trigger your webhooks or you can trigger upon any available system event.

![Webhook from view](/images/2021/12/webhook_form.png)

When triggered, BookStack will send a HTTP POST JSON request to the provided endpoint
with a common set of details regarding the event. The general data format is shown when creating
or editing a webhook, but the below is an example of a `page_update` event:

```json
{
    "event": "page_update",
    "text": "Benny updated page \"My wonderful updated page\"",
    "triggered_at": "2021-12-11T22:25:10.000000Z",
    "triggered_by": {
        "id": 1,
        "name": "Benny",
        "slug": "benny"
    },
    "triggered_by_profile_url": "https://bookstack.local/user/benny",
    "webhook_id": 2,
    "webhook_name": "My page update webhook",
    "url": "https://bookstack.local/books/my-awesome-book/page/my-wonderful-updated-page",
    "related_item": {
        "id": 2432,
        "book_id": 13,
        "chapter_id": 554,
        "name": "My wonderful updated page",
        "slug": "my-wonderful-updated-page",
        "priority": 2,
        "created_at": "2021-12-11T21:53:24.000000Z",
        "updated_at": "2021-12-11T22:25:10.000000Z",
        "created_by": 1,
        "updated_by": 1,
        "draft": false,
        "revision_count": 9,
        "template": false,
        "owned_by": 1
    }
}
```

Webhooks have a `text` property (Populated where possible, depending on event) which allows them to 
be used directly in slack or slack-compatible services. If you wanted to get more advanced
you could build your own middleware or use a service like [Zapier](https://zapier.com/) or [n8n](https://n8n.io/)
to glue actions & services together. Some possibilities could be:

- Email an admin when application settings are changed.
- Post in slack when a book is deleted.
- Log page change occurrences to a Google doc.
- Update a BookStack page via the REST API when new users register.

Since webhooks need to make external HTTP requests, they have potential to slow down a system.
If you're creating a large amount of webhooks, that'd be triggered frequently, we have a way to run these in the background to
prevent user experience slowdowns; [Details can be found here](/docs/admin/email-webhooks/#async-action-handling).

### Copy Entire Chapters & Books

It's been possible to copy a page for a while now. With v21.12 it's now possible to 
copy entire chapters or even books. Performing this action will also copy all child chapters
and/or pages in a single smooth action. Copy views will now show warnings to confirm
copy behavior within BookStack so the necessary considerations can be made.

![Book copy view](/images/2021/12/copy_book.png)

These new abilities bring some great potential new workflow advancements such as being
able to create "templated" books, pre-configured with the right chapter & page structure,
ready to be copied out.

### Copy Roles

When creating or updating a role there can be a lot of permissions to configure.
Creating a set of similar roles could be a time consuming experience. 
As of v21.12 there's now a "Copy" action when viewing an existing role which
will take you to the role create view with all fields filled as per the copied role.

![Role copy button](/images/2021/12/copy_role.png)

### Audit Log IP Address Search

The audit log has received another update thanks to [@johnroyer](https://github.com/BookStackApp/BookStack/pull/3081).
It's now possible to search the audit log by IP address. 
The search is a prefix-match so you can filter using just the starting 
portion if needing to match an IP range.

![IP address search in audit log](/images/2021/12/audit_log_search.png)

### Search API Updates

In v21.11 we added the new search API endpoint. Within v21.11.3 a few extra useful properties
were added to item response data:

```json
{
   ...
    "url": "https://example.com/books/my-book/page/how-advanced-are-cats",
    "preview_html": {
      "name": "How advanced are <strong>cats</strong>?",
      "content": "<strong>cats</strong> are some of the most advanced animals in the world."
    },
   ...
}
```

These additions save you from needing to do extra work to formulate the full 
item URL or preview content.

### Logical Theme System Custom Commands

The [logical theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md)
has been updated to allow registration of custom commands. These are actions you'd typically
run on command line via `php artisan bookstack:<command>`.

I recently produced a getting started guide for the local theme system which includes
registering custom commands:

<iframe width="100%" height="360" src="https://www.youtube.com/embed/YVbpm_35crQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


### Translations

As always our awesome translators have been doing their work to keep language
content up-to-date. The below are the great contributions since v21.11:

- Vitaliy (gviabcua) - *Ukrainian*
- Marco (cdrfun) - *German; German Informal*
- mannycarreiro - *Portuguese*
- m0uch0 - *Spanish*
- na3shkw - *Japanese*
- marinkaberg - *Russian*
- 10935336 - *Chinese Simplified*
- Luís Tiago Favas (starkyller) - *Portuguese*
- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- nutsflag - *French*
- Thiago Rafael Pereira de Carvalho (thiago.rafael) - *Portuguese, Brazilian*
- scureza - *Italian*
- Ken Roger Bolgnes (kenbo124) - *Norwegian Bokmal*
- Nguyen Hung Phuong (hnwolf) - *Vietnamese*
- Indrek Haav (IndrekHaav) - *Estonian*
- Umut ERGENE (umutergene67) - *Turkish*


### Full List of Changes

**Released in v21.12**

* Added webhooks. ([#147](https://github.com/BookStackApp/BookStack/pull/147), [#3099](https://github.com/BookStackApp/BookStack/pull/3099))
* Added ability to copy books, chapters & roles. ([#3118](https://github.com/BookStackApp/BookStack/pull/3118), [#1123](https://github.com/BookStackApp/BookStack/issues/1123))
* Added audit log IP address search. Thanks to [@johnroyer](https://github.com/BookStackApp/BookStack/pull/3081). ([#3081](https://github.com/BookStackApp/BookStack/pull/3081))
* Updated translations with latest Crowdin changes. ([#3117](https://github.com/BookStackApp/BookStack/pull/3117))
* Fixed issue where non-ascii content could break search result previews. Thanks to [@Kristian-Krastev](https://github.com/BookStackApp/BookStack/pull/3113). ([#3113](https://github.com/BookStackApp/BookStack/pull/3113))
* Fixed mismatched password validation rules across the application. ([#2237](https://github.com/BookStackApp/BookStack/issues/2237))

**Released in v21.11.1 through v21.11.3**

* Added custom command support to the logical theme system. ([#3072](https://github.com/BookStackApp/BookStack/pull/3072))
* Added support for `prefers-contrast` media setting to increase contrast in faded areas when active. ([#2634](https://github.com/BookStackApp/BookStack/issues/2634))
* Updated user search to help prevent discovery and harvesting of user information. Thanks @haxatron for reporting. ([#3108](https://github.com/BookStackApp/BookStack/issues/3108))
* Updated search API results to include the highlighted preview content. ([#3096](https://github.com/BookStackApp/BookStack/issues/3096))
* Updated search API results to include item URL. ([#3080](https://github.com/BookStackApp/BookStack/issues/3080))
* Updated translations with latest Crowdin changes. ([#3093](https://github.com/BookStackApp/BookStack/pull/3093), [#3076](https://github.com/BookStackApp/BookStack/pull/3076), [#3057](https://github.com/BookStackApp/BookStack/pull/3057))
* Updated TOTP confirmation view to autofocus on code input. Thanks to [@raccettura](https://github.com/BookStackApp/BookStack/pull/3068). ([#3068](https://github.com/BookStackApp/BookStack/pull/3068))
* Updated any links on homepage lists to be more obvious & accessible. ([#3046](https://github.com/BookStackApp/BookStack/issues/3046))
* Fixed issue with greater-than-expected visibility on page-draft-related items. Thanks @haxatron for reporting. ([#3086](https://github.com/BookStackApp/BookStack/issues/3086))
* Fixed issue where public API access was not limited by system public control in certain conditions. ([#3091](https://github.com/BookStackApp/BookStack/issues/3091))
* Fixed faulty page navigation links when headers are nested within other content. Thanks to [@Julesdevops](https://github.com/BookStackApp/BookStack/pull/3069). ([#3069](https://github.com/BookStackApp/BookStack/pull/3069), [#3058](https://github.com/BookStackApp/BookStack/issues/3058))

### Next Steps

Focus going into next year will be on the editor. I've started assessing new options but found it difficult to harness
the time needed this year, so it will be my priority going into 2022.

I have continued to produce more videos on the [BookStack YouTube channel](https://www.youtube.com/channel/UCH66RFWfw6CSm2T1EM4ik1g).
I'll look to continue this when wanting to get away from code-level work for a bit.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@jg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Joe Green</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>