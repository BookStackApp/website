+++
categories = ["Releases"]
tags = ["Releases"]
description = ""
slug = "beta-release-v0-8-0"
draft = false
title = "Beta Release v0.8.0"
date = 2016-03-13T12:57:42Z
author = "Dan Brown"

+++

**Update**

[BookStack v0.8.1 has since been released](https://github.com/BookStackApp/BookStack/releases/tag/v0.8.0) to address some bugs.

----

BookStack v0.8.0 has now been released!. The release can be found [here on GitHub](https://github.com/BookStackApp/BookStack/releases/tag/v0.8.0) and [update/install instructions can be found here](https://github.com/BookStackApp/BookStack/blob/development/readme.md#updating-bookstack). 

We realised that we have pretty much been randomly creating the release numbers so far so but from now on we are going to stick to [Semantic Versioning 2.0.0](http://semver.org/) as much as possible. Since this release has some large new features that are upgrade-compatible we're jumping off v0.7.x and going direct to v0.8.0.

**Here are some important things to note with this update:**

* Any images previously uploaded will be visible to all users, Even those on restricted pages. The new image restrictions will only take action on images uploaded after applying this update.

Now that's done, Here's the good stuff:

### Restricted Images

In release v0.7.6 restrictions were added to give greater control over who can perform actions on particular Books, Chapters & Pages. For this release this have been extended out to images. Now when an image is uploaded on a page the image's relationship to that page will be saved. Only images that are uploaded to visible *(non restricted)* pages will be visible to the current user. 

As with the entity restrictions the effect will cascade down. If a whole book is restricted from view for an individual they will not be able to see any images uploaded to pages within that book. The same applies for chapters.

Below is a screenshot of the views of two different users. The one on the right cannot see the majority of the images since the book that contains the pages that contains the images is restricted

![](/images/2016/03/bookstack-image-restrictions.png)

### Autosaving Drafts

In the era of the modern internet we now expect things to be done automatically. One of these things is saving stuff. Accidents are easy and web-server sessions are not *usually* unlimited so every so often you can end up losing a whole load of work and that can really suck and make you not want to write stuff out. To prevent this from happening BookStack will now automatically save pages periodically (30 seconds to be exact) if changes have been made.

![](/images/2016/03/bookstack-autosave.png)

A little indicator at the top of the editing screen will let you know when the draft was last saved. You can click this to manually save the draft if you don't want to wait for it to be done automatically. On the right, Next to the save button you'll find an button which will discard the draft which will update the editor with the current, live, contents of the page. When you save the draft copy will be made into the published version. Only the creator can see their drafts. Every user can have their own draft copy of a page.

![](/images/2016/03/bookstack-draft-notification.png)

When editing a page that you have a previous draft of you will get the notification shown in the screenshot above to let you know you're editing a draft copy, not the current live page content. If the page has been saved since you created your draft the system will let you know in the same notification.

## New Page Drafts

Along with saving drafts when updating a page, Drafts will now be created straight away when creating a new page. This give you the ability to work on a page, Saving it as you go, without being redirected or having the make the page visible to everyone. 

![](/images/2016/03/bookstack-draft-page-menu.png)

As with updating a page, new page drafts will save every 30 seconds or you can save it manually. You can also delete the draft page from the system entirely.

Draft pages will show up in the system in a similar way to normal pages except they are only visible to you. They will also be shown above normal pages in any lists to point them out. Draft pages are coloured purple to make them stand out. Your most recent drafts can be found right away on the homepage otherwise they are in the book/chapter you created them in.

Here are some screenshot of the new drafts in various places in BookStack:

![](/images/2016/03/draft-homepage.png)

![](/images/2016/03/draft-book-page.png)

![](/images/2016/03/draft-page-sidebar.png)

### Multiple User Edit Warnings

With the new autosaving functionality in BookStack we can use that to check if users have been editing a page within the most recent x minutes. Now when you edit a page the system will look over to see if there have been any autosaves within the last hour. If there have it will notify you as the editor opens. If there's just one other user it'll let you know who they are otherwise, If there's more than one, it'll let you know how many users have been editing the page.

![](/images/2016/03/bookstack-user-notification.png)

### Better Default Logo

The last update added the ability to set a custom primary colour theme for BookStack. In this update the logo has been updated to remove the blue outline so it fits better with the custom colours.

![](/images/2016/03/bookstack-themes-logo.png)

### Bugfixes and Other Changes

* TinyMCE updated to 4.3.7 to hopefully fix a few bugs.
* Updated the styling for bullet & numbered lists to prevent them bugging out in Firefox.
* Improved button text size consistency.
* Fixed list styling issues that caused the theme colour to be used incorrectly.
* Made the scrollbar static on most pages to prevent erratic page width changes.
* Fixed a permission error that showed up when updating your profile. 


