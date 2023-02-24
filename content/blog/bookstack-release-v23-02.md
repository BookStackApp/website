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

TODO - Notice on updates page.
TODO - Required docs updates

**Upgrade Notices**

- **PHP Version Requirement Change** - The minimum supported PHP version has changed from PHP 7.4 to PHP 8.0.2 in this release. Please see the [version-specific update instructions](/docs/admin/updates/#updating-to-v2302-or-higher) for this release for guidance on updating PHP. 
- **Logical Theme System Event Change** - The `commonmark_environment_configure` event argument and return type has changed. Please [see the event definition](https://github.com/BookStackApp/BookStack/blob/b88b1bef2c0cf74627c5122b656dfabc2d5f23ee/app/Theming/ThemeEvents.php#L63-L71) to understand the new types.

<!-- {{<yt W7I2Hlcj1QA>}} -->

### Framework Update

TODO

### Roles API Endpoints

TODO

### Shelf Book Sort Enhancements

TODO

### Sendmail Command Configuration

TODO

### System Performance Improvements

TODO

- Page save parsing
- WYSIWYG editor lag on long pages
- Setting loading

### Improved Favicon Handling

TODO

### Translations

TODO

- User - *Language*


### Customization Hacks

Although not part of this release, during the last month I deployed the new [/hacks](/hacks) part of the site
where you can find different kinds of unsupported customizations that can be applied to BookStack.

You can [find more information in this blogpost](http://localhost:1313/blog/hacks-on-the-site/).


### Next Steps

TODO


### Full List of Changes

**Released in v23.02**

TODO

**Released in v23.01.1**

TODO

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@alejandrowallace?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">AJ Wallace</a> on <a href="https://unsplash.com/photos/1H64_-WVjWs?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>