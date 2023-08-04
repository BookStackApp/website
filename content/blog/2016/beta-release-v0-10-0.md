+++
description = ""
slug = "beta-release-v0-10-0"
draft = false
title = "Beta Release v0.10.0"
date = 2016-05-22T11:06:21Z
author = "Dan Brown"
categories = ["Releases"]
tags = ["Releases"]

+++

It's been a short while since the last release *(43 days to be exact)* but BookStack v0.10 is finally here. Here are some handy links:

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.10.0)
* [GitHub milestone](https://github.com/BookStackApp/BookStack/issues?utf8=%E2%9C%93&q=milestone%3A%22BookStack+Beta+v0.10.0%22+)
* v0.9 Bugfixes:
    - [v0.9.1](https://github.com/BookStackApp/BookStack/releases/tag/v0.9.1)
    - [v0.9.2](https://github.com/BookStackApp/BookStack/releases/tag/v0.9.2)
    - [v0.9.3](https://github.com/BookStackApp/BookStack/releases/tag/v0.9.3)

Most of the development time for this release was spent implementing a tagging system and overhauling the permissions systems which, although mainly for internal purposes, brings some useful extra functionality.

#### Permission System Changes

Internally the permission system has been re-written as it was growing out of control and was not originally built to accommodate features that have since been requested. There is now a database table which joins up the Book/Chapter/Page permissions with the role permissions so the system can quickly scan this one table to work out what a user can do.
A major benefit that this brings is `view` permissions on a role since this was not possible before. Now you can create a role without any view permissions then manually grant them access to view specific Books, Chapters & Pages. 

Upon update all current roles in the system will be given view permissions automatically to match the permissions pre-update. To change these just edit the role and you will find a new column to edit `view` permissions shown in the screenshot below:


![View Permissions](/images/2016/05/view-permissions.png)

#### Page Tagging

Tags have been a heavily requested feature for a while now but we wanted to ensure it's done right, in a way that can really add value to content within BookStack. Tags in BookStack must have a name but they can optionally also have a value. The value allows you to add unique detail against that tag instance. For example, You could have a tag with the name `City` then give it the value of `London`.

To add tags simply go and edit a page. You will find a new sidebar on the right-hand side of the screen. This will show up on both WYSIWYG & Markdown editor options. Click the arrow or tag icon at the top of this sidebar to expand it. You can then enter your tags, as well as re-order them. To save them just save the page. Here's a screenshot of the tag edit interface:

![Page Tag Interface](/images/2016/05/page-tags-interface.png)

Once you really get into using tags on your pages BookStack will provide auto-fill suggestions when typing tag names and values.

Page tags are visible when viewing a page as shown here:

![Page tag display](/images/2016/05/page-tag-display.png)

Clicking the tag name will start a search of everything with that tag name. Clicking the value will search the system for only pages that have that tag with that particular value. Tagging has been fully built into the search system in this format: `[tagname=tagvalue]`. You will see this when clicking on a tag name or value then looking at the search term used. Here are some example tag search terms with descriptions:

* `[Topic]` - Searches for pages with the tag named 'Topic'. Those tags can have any value.
* `[Topic=Wine Tasting]` - Searches for pages with a tag named 'Topic' that has a value of 'Wine Tasting'.
* `[Topic!=Wine Tasting]` - Searches for pages with a tag named 'Topic' that has a value that is empty or not 'Wine Tasting' .
* `[Hours Worked>2]` - Searches for pages with a tag 'Hours Worked' that has a value greater than 2. (This also works for text values).
* `[Topiclike%Slack%]` - SQL like match, Searches for pages with a tag names 'Topic' that has a value that contains the word 'Slack'.

#### Custom HTML Content In Head

There is now a new option in settings to allow custom HTML content to be inserted into every page. This will be really useful to anyone that wants to override some CSS styles, Add custom JS functionality or insert analytics code.

#### Other Updates & Bugfixes

* Fixed markdown editor not scrolling on Firefox.
* Allowed sorting & searching on the users page.
* Reworked the database migrations to only use simple non-app code to avoid future breakages.
* Cleaned some of the settings layouts for better consistency and hid more links when you don't have permissions to click them.
* Made user names as the bottom of entities linked to user profiles. 
