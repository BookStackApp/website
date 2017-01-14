+++
description = ""
slug = "beta-release-v0-9-0"
draft = false
title = "Beta Release v0.9.0"
date = 2016-04-09T09:51:18Z
author = "Dan Brown"
categories = ["Releases"]
tags = ["Releases"]

+++

BookStack v0.9.0 is now available. Update instructions can be found in the [new documentation pages here](https://www.bookstackapp.com/docs/admin/updates).

If you have not yet read through the changes of v0.8.2 I'd recommend doing so as there were some fairly large changes to the permission system as well as a nice little header fix. [The changes are detailed here](https://www.bookstackapp.com/blog/beta-release-v0-8-2/).

### Markdown Editor

A much requested addition to BookStack was a markdown editor. An initial implementation has now been added which includes a live preview of your content. Here's what it looks like:

![BookStack Markdown Editor](/images/2016/04/BookStack-markdown-editor.png)

A drop down menu has been added in the settings to select what editor to use. This is an application-wide setting so will effect all users. This was done to keep formatting compatibility between all users in the system. After switching to the markdown editor, any pages that were created before will simply show as HTML plaintext content in the editor.

The editor uses GitHub flavoured markdown and the image manager from the WYSIWYG editor has been fully integrated. Currently there are no formatting shortcuts/buttons but these are planned for the future.

### Image Manager Filters & Search

![](/images/2016/04/bookstack-image-manager-search.png)

More work has been done on the image manager since the last release. To make it easier to find images you can now search  by the image name. As well as search, when using the image manager on a page, you can now get a view of the images uploaded to the current Book & Page.

### Other Updates & Bugfixes

* Made the 'Require email confirmation' setting work when using LDAP authentication.
* Fixed draft saved message to use local timezone.
* Added Redis cache/session support via the `.env` file.
* Added some friendlier error messages when using LDAP and there is an user mismatch.
* Added a list of users when editing a user role for visibility.
* Fixed pages in chapters not being given the correct order on creation.