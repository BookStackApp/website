+++
description = ""
slug = "beta-release-v0-7-6"
draft = false
title = "Beta Release v0.7.6"
date = 2016-03-06T07:03:00Z
author = "Dan Brown"
categories = ["Releases"]
tags = ["Releases"]

+++

BookStack Beta v0.7.6 has now been released. The release can be found [here on GitHub](https://github.com/BookStackApp/BookStack/releases/tag/v0.7.6) and [update instructions can be found here](https://github.com/BookStackApp/BookStack/blob/development/readme.md#updating-bookstack).

**Here are some important things to note with this update:**

* Images uploaded to restricted content will still currently be visible to everyone.
* The new roles & restriction system is a large change, it has been tested well but there is still likely to be a few bugs so please use with caution for now.

With that out of the way here are the new features in this update: 

### Custom Roles

Previously in BookStack there have been three main roles. Admin, Editor and Viewer. This system has now been opened up so you can define as many custom roles as you want. To go with this you can now assign multiple roles to each user. Current Admins will be able to edit these roles from the 'Roles' tab in the settings menu. Here's a screenshot of the role configuration screen:

![BookStack Roles](/images/2016/03/bookstack-role-settings.png)

As you can see you can now really customise a role and change system and asset permission. New permissions have been added to restrict users to only be able to edit/create/delete their own content.

### Book/Chapter/Page Restrictions

Within BookStack you are now able to restrict actions on individual books, chapters & pages. This ties in with the new roles system so that restrictions are done per role. These restrictions cascade down so restrictions set on books and chapters will affect child pages and/or chapters within then unless they have restrictions set which will override their parents. Restrictions can be found on the header tool bar when viewing a Book, Chapter or Page as long as you have permission to edit restrictions. Any restrictions set will be shown in the top-right when viewing a Book/Chapter/Page. Here's a screenshot showing this as well as the new overflow menu that's on Books to keep the toolbar tidy.

![](/images/2016/03/bookstack-restrictions-notification.png)

Restrictions are ignored and cannot be editing for admin users. 

### Custom Primary Color

Within the settings you can now define a custom primary color for the application. This will affect all major component that are currently blue such as the header, buttons and links. Here's an example of a red themed BookStack:

![](/images/2016/03/bookstack-color-red.png)

### Better Search

When searching the system you can now put words in double quotes, `"like this"`, to search for a phrase. This allows you to be more specific when searching for content. If two quoted phrases are used they will be or'd together.

### Bug Fixes & Small Updates

* Fixed homepage 'Recent Pages' list showing the same pages as the 'Recently Created Pages' list.
* Added configration support for Memcached.
