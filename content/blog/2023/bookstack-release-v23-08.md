+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.08"
date = 2023-08-30T12:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/deer_dan_brown.jpg"
slug = "bookstack-release-v23-08"
draft = false
+++

The August release of BookStack is now here! This is focused upon an initial implementation of 
a notification system for content, but as usual there are a few other improvements to enjoy.

* [Update instructions](/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.08)


**Upgrade Notices**

- **Security - Webhooks** - In scenarios where admins users are not trusted, webhooks could potentially be used maliciously. This update adds a control for such functionality. Please read [our documentation for the new `ALLOWED_SSR_HOSTS` option](/docs/admin/security/#server-side-request-allow-list) if this may be a concern for your instance.

Note that [v23.06.1](/docs/admin/updates/#updating-to-v23061-or-higher) and [v23.06.2](/docs/admin/updates/#updating-to-v23062-or-higher) also had version specific upgrade notices that should be considered
if not already read and/or upgraded to those.

TODO - Video:
<!-- {{<pt 69eAVo8iNHPYs4n4UTT3Nb>}} -->

### Content Notification System

It's now possible to be notified via email upon page changes within BookStack!
Alongside this you can also be notified upon new comments to pages.
To provide some high-level user control, there's a new "Notification Preferences"
view which can be accessed via the "Preferences" option in the header bar user 
dropdown:

TODO - Image of notifications preferences with preferences option

Within here are three new user preferences:

- Notify upon changes to pages I own
- Notify upon comments on pages I own
- Notify upon replies to my comments

These options represent global defaults for notifications.
Upon those options, the "Notification Preferences" view also lists all the items you're
watching or ignoring. Watching or ignoring allows content-specific control of notifications
that may work in addition to, or override, your global notification preferences.
You can watch any book, chapter or page via the new "Watch" action:

TODO - Image of watch action.

By default this will watch for both new pages and page changes. This can be changed
via the watch options menu, found by selecting the watch status in the details:

TODO - Image of watch menu

This provides various different levels of watching of content, in addition to the ability
to ignore any notification events if things are getting too noisy within a particular book,
chapter or page.

Like much other functionality, watch preferences cascade from books to chapters to pages unless
those have their own watch preferences set to override the parent watch status.
When a page or chapter has active watch preferences from a parent item, this will be reflected
in the details of that item:

TODO - Image of parent watch

Notifications are sent upon relevant activity, and will include a few details
in addition to a link to the relevant content:

TODO - Image of notification

Page update notifications are somewhat debounced, meaning that the system will avoid
sending notifications if re-updated by the same author within a time window. This is
to prevent an attack of emails from an enthusiastically updating author.

The ability to receive and manage notifications is handled via a new role permission.
For a stable upgrade path, this permission will only be provided to the default
"Admin" user role upon upgrade, so you'll need to assign it to other roles where desired:

TODO - Image of notifications permission

An important consideration of this system is performance. Having to send out emails
upon certain common actions does require extra time, making these actions slow.
It is however possible for emails to be sent asynchronously to avoid significant
added delay with a little extra setup. Consult our ["Async Action Handling" Email & Webhooks](/docs/admin/email-webhooks/#async-action-handling) documentation for guidance on this.


### Drawing Save Safety Net

When editing or creating a drawing within BookStack, via the diagrams.net integration, 
BookStack will wait until you save the drawing before then uploading the drawing data
to the system for storage. This process works in most cases but, from the drawing start
time to the point of save, various things can change or go wrong resulting in the drawing
failing to save. As an example, going offline or your user login session timing out could
result in a lost drawing. This could be especially frustrating where hours have been spent
on a drawing.

To help avoid the frustration of lost drawing effort, we've added a safety net to the save
process. Now when drawings are saved, they'll first be saved into the browser before 
they're sent back to BookStack. If they then save on the BookStack server-side successfully,
the browser version will be cleared. If the save process fails, the browser stored image will
remain and you'll get a prompt when you next try to edit/create a drawing:

TODO - Image of prompt

You can confirm via this prompt to then restore the browser-saved image into diagrams.net
for continued editing and re-attempt of saving.

### API - Set Page/Chapter Ordering in Books

The sort ordering of pages and chapters within a book can now be managed
via the API. This functionality comes through the addition of a new `priority` parameter
available on create & update requests for pages & chapters. As an example:

```http
PUT https://bookstack.example.com/api/chapters/15
Content-Type: application/json
Authorization: Token {{token_id}}:{{token_secret}}

{
  "priority": 22
}
```

Items within a book or chapter are shown from lowest priority number to largest.

Thanks to [@rouet on GitHub](https://github.com/BookStackApp/BookStack/pull/4313) for providing
the pull request to add this functionality.

### Server Side Request Allow List

As mentioned in the upgrade notices, is was reported that webhooks could be used maliciously as a server-side-request
means to potentially hit unexpected or private endpoints from the BookStack instance system.
This is usually not a concern, but there could be scenarios where an instance is hosted for admins that are untrusted, within a usually private environment.

To help with such cases, a new `ALLOWED_SSR_HOSTS` option has been added as a form of allow-list for use in functionality like webhooks:

```bash
ALLOWED_SSR_HOSTS="https://*.example.com https://example.org/bookstack/"
```

This defaults to `ALLOWED_SSR_HOSTS="*"` to allow all hosts by default, to prevent breaking webhooks for existing users, and since this only a mild concern in specific environments due to the permissions required and the limits of exploitation in those environments.

Thanks to [morioka12 on huntr.dev](https://huntr.dev/users/scgajge12) ([@scgajge12 on Twitter](https://twitter.com/scgajge12)) for reporting this vulnerability via huntr.dev.

For more detail on the new option, see the ["Server Side Request Allow List" section in our security docs](/docs/admin/security/#server-side-request-allow-list).

### Translations

TODO

- User - *Language*

### Next Steps

While spending time of the features of this release, I noticed some of the UI and views are becoming a
little untidy, to a point where it now might be confusing to understand where certain options may exist,
especially when it comes to user options and preferences.
I want to spend a release cycle focused on cleaning up rough edges and existing bug reports, just to ensure
the platform remains at a good level of polish and the user experience remains intuitive.

Looking a little further forward into the future,
I've been thinking about aligning a few inputs where some formatting may be desired,
but not at the level of a full-blown page editor. As an example, comments can actually accept markdown input
for formatting but this is not clear nor intuitive to most users. There have also been requests for slightly more formatting
in descriptions for books, chapters and shelves. Therefore I envision setting up a simplified WYSIWYG editor across these inputs.
I just need to be sure we do that in a way that works with existing functionality and doesn't
 cause too many forward compatibility issues.

### Other Updates

In regards to other goings on in the project over the last month, 
In July we reached the 8 year mark for the project. You can find
a lot more about that [in my post here](/blog/8-years-of-bookstack/) where
I dig into the figures and finances, and reflect on the project reach.

On the video side of things, I've set-up a PeerTube instance as a YouTube
alternative for our video content. I wrote about this in detail in
[my blogpost here](/blog/bookstack-on-foss-video/).
On the instance you can find the new videos I've published since last
release:

- [More Power User Features in BookStack](https://foss.video/w/b4aTq3YzsTVjdEFBQtuHgZ)
- [Installing BookStack on Debian 12 (Bookworm) with HTTPS](https://foss.video/w/mUKH26XNcYwxkF7VzupQAa)
- [Tea Break: 8 Years of BookStack, LLM Connection Demo & Video Hosting](https://foss.video/w/mB67n8JBBHb9mSMYUM5DED)

As one last thing, I've been a long term viewer of the Linus Tech Tips YouTube channel and, although they've been going
through some problems & controversy lately, it was pretty cool to see them using BookStack, in their ["Here's the plan." video](https://youtu.be/qAE5KoyFEUo?si=WdaqNUH77Fg9AMeM&t=231) (About 3:51), as a tool to improve/define their processes.

### Full List of Changes

**Released in v23.08**

* Added content notification system. ([#4390](https://github.com/BookStackApp/BookStack/pull/4390), [#4371](https://github.com/BookStackApp/BookStack/issues/4371), [#241](https://github.com/BookStackApp/BookStack/issues/241))
* Added browser-based drawing backup storage mechanism. ([#4457](https://github.com/BookStackApp/BookStack/pull/4457), [#4421](https://github.com/BookStackApp/BookStack/issues/4421))
* Added order/priority control within books via the API. Thanks to [@rouet](https://github.com/BookStackApp/BookStack/pull/4313). ([#4313](https://github.com/BookStackApp/BookStack/pull/4313), [#4298](https://github.com/BookStackApp/BookStack/issues/4298))
* Added host allow list option for server side requests like webhooks. ([#4410](https://github.com/BookStackApp/BookStack/issues/4410))
* Added additional comment-specific activities. ([#4389](https://github.com/BookStackApp/BookStack/pull/4389))
* Updated translations with latest Crowdin changes. ([#4380](https://github.com/BookStackApp/BookStack/pull/4380))
* Fixed API docs caching failure when using DB cache driver. ([#4453](https://github.com/BookStackApp/BookStack/issues/4453))
* Fixed overly wide page view when using an RTL language. ([#4429](https://github.com/BookStackApp/BookStack/issues/4429))
* Fixed status cache check to work better for simultaneous requests. ([#4396](https://github.com/BookStackApp/BookStack/issues/4396))

**Released in v23.06.2**

* Re-added shelf create permissions, now include a note to indicate permission usage. ([#4375](https://github.com/BookStackApp/BookStack/issues/4375))
* Fixed issue causing some delete-based action webhooks to create not-found errors. ([#4373](https://github.com/BookStackApp/BookStack/issues/4373))
* Updated translations with latest Crowdin changes. ([#4367](https://github.com/BookStackApp/BookStack/pull/4367))

**Released in v23.06.1**

* Updated MAIL_ENCRYPTION usage due to incorrectly forcing initial TLS usage. ([#4358](https://github.com/BookStackApp/BookStack/issues/4358))
* Updated translations with latest Crowdin changes. ([#4352](https://github.com/BookStackApp/BookStack/pull/4352))
* Fixed image updated timestamp not updating when gallery images are replaced. ([#4354](https://github.com/BookStackApp/BookStack/issues/4354))
* Fixed sort options breaking roles page load. ([#4350](https://github.com/BookStackApp/BookStack/issues/4350))
* Fixed IPv6 addresses in audit log spilling into date column. ([#4349](https://github.com/BookStackApp/BookStack/issues/4349))
* Fixed many inaccuracies in API example responses. Thanks to [@devdot](https://github.com/BookStackApp/BookStack/pull/4344). ([#4344](https://github.com/BookStackApp/BookStack/pull/4344))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://danb.me">Dan Brown</a></span></span>