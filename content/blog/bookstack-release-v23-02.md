+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v23.02"
date = 2023-02-26T11:45:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/cow-aj-wallace.jpg"
slug = "bookstack-release-v23-02"
draft = false
+++

BookStack v23.02 is here, acting primarily as a maintenance release to
upgrade the underlying framework while optimizing things and making
a few other additions.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v23.02)

**Upgrade Notices**

- **PHP Version Requirement Change** - The minimum supported PHP version has changed from PHP 7.4 to PHP 8.0.2 in this release. Please see the [version-specific update instructions](/docs/admin/updates/#updating-to-v2302-or-higher) for this release for guidance on updating PHP. 
- **Logical Theme System Event Change** - The `commonmark_environment_configure` event argument and return type has changed. Please [see the event definition](https://github.com/BookStackApp/BookStack/blob/b88b1bef2c0cf74627c5122b656dfabc2d5f23ee/app/Theming/ThemeEvents.php#L63-L71) to understand the new types.

<!-- {{<yt W7I2Hlcj1QA>}} -->

### Framework Update

The main task of this release was to upgrade the core framework of BookStack
from Laravel 8 to Laravel 9, allowing us to keep on supported libraries.
While not providing any user-visible features, this provides some benefits
on the development side of things while bumping the minimum PHP version
supported to PHP 8.0.2, providing us new language features to play with.

### Roles API Endpoints

This release extends the REST API with some new endpoints for roles.
This adds list, create, read, update & delete endpoints allowing 
integration and automation of role management where desired, working
in support with the existing user API endpoints.

TODO - Image of role endpoints in docs?

### Shelf Book Sort Enhancements

The shelf edit view has received more attention to generally improve
the user experience of managing books on the shelf, with the primary
aim of making the interface usable via keyboard & screen-reader use, 
much like the book sort additions in the last release.

TODO - Image of shelf book edit with dropdown sort menu

Also added to the view is a new dropdown menu containing quick
sort actions so you can quickly sort by common categories such
as name, created date or updated date, without needing to drag 
& reorder each item manually.

### Sendmail Command Configuration

We've always supported the sending of email via `sendmail` where
preferred, but the exact command used has been hardcoded
to `/usr/sbin/sendmail -bs`. In some environments a different command
could be desired, so this can now be configured like so:

```bash
MAIL_SENDMAIL_COMMAND="/my/path/to/sendmail -bs"
```

### System Performance Improvements

Attention has been put on performance in a few key areas 
where things were reported to be slow or inefficient in certain scenarios:

- Saving page content, especially on first save with a lot of content, 
  can now be much faster as some inefficiencies in how some parsing operations
  have been addressed.
- Significantly increasing WYSIWYG page editor lag, when page length increases,
  has been significantly reduced.
- App setting loading is now done in batch to reduce latency caused 
  previously by per-setting-cache usage.
- An extra index has been added to the `pages` table to improve loading of
  recently updated pages.

Overall, these changes should help to keep the system feeling fast and responsive.

### Improved Favicon Handling

In the last feature release we introduced the ability to set an app icon
and, while this was used in the vast majority of scenarios, there
could be certain edge-cases you'd still see the default BookStack favicon.

To help with this, BookStack will now also generate a `favicon.ico` file
(if permissions allow) using your custom supplied icon file.

### Translations

Once again a big thanks to our brilliant translators that help keep
the language text of BookStack up-to-date. All those listed
below have contributed translations since the last feature release:

- User - *Language*


### Customization Hacks

Although not part of this release, during the last month I deployed the new [/hacks](/hacks) part of the site
where you can find different kinds of unsupported customizations that can be applied to BookStack.

You can [find more information in this blogpost](/blog/hacks-on-the-site/).

### Next Steps

The roles API addition in this release was a bit of a prerequisite for
adding permission API endpoints, so I'll likely look to spend some
time further fleshing out the API.

I'd also like to spend some time making the install & update process
streamlined with some scripts, which I've wanted to do for a while 
but have been split between approaches, but I think it's time to
just proceed with a pragmatic approach.

At a higher level, I need to start thinking about what the next
major feature will be on our roadmap, so may begin some 
implementation proposal discussions.


### Full List of Changes

**Released in v23.02**

TODO

**Released in v23.01.1**

* Updated pdf library to address vulnerability. ([#4010](https://github.com/BookStackApp/BookStack/pull/4010))
* Updated translations with latest Crowdin changes. ([#4008](https://github.com/BookStackApp/BookStack/pull/4008))
* Fixed missing default 180px icon. ([#4006](https://github.com/BookStackApp/BookStack/issues/4006))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@alejandrowallace?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">AJ Wallace</a> on <a href="https://unsplash.com/photos/1H64_-WVjWs?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>