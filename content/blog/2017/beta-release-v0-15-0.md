+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.15.0"
date = 2017-02-27T12:45:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/bookshelf-janko-ferlic.jpg"
description = "BookStack v0.15 released with new sign in options and book/chapter exporting"
slug = "beta-release-v0-15-0"
draft = false
+++

Sneaking in before February closes we have another BookStack release. As well as your usual handful of bugfixes this release also comes with new sign-in options and better export functionality.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.15.0)

*Quick note: There was a bug in v0.15.0 that could cause errors when upon update. This has now been addressed and v0.15.1 has been released to cover this. Rerun the update commands if you had trouble updating previously.*

### New Login Options

A new group of login options have been added to BookStack. Google and GitHub were supported before but now Slack, Twitter and Facebook have joined the party. As well as the new options the login area has been cleaned up a little with the social buttons receiving some better icons:

![New Social Login Options](/images/2017/02/new-social-login-options.png)

The [social authentication](/docs/admin/social-auth/) docs page has been updated with instructions for adding the new services to BookStack.

### Book & Chapter Exports

The export options that were available for pages have now made their way across to books and chapters. As with pages, The export options are currently PDF, contained HTML or text files. Book and chapter exports in the PDF or HTML formats include a simple linked table of contents.

As a quick tip, The HTML export option is surprisingly useful for importing a BookStack page into a Word or LibreOffice document. 

### Updated Commands

The commands available to BookStack have been updated and added to. New commands for clearing page revisions and user activity will help if your database is getting a little large. [Details on commands can be found here](/docs/admin/commands/).

### Full List of Changes

* Export options added for books and chapters.
* Added Slack, Facebook & Twitter signin/signup options.
* Added list checkbox support to the markdown editor.
* Added commands to clear revisions and activity.
* Allow custom LDAP email attribute to be set.
* More complete German translations added (Thanks to [ReeseSebastian](https://github.com/BookStackApp/BookStack/pull/295)).
* Changed callout styling slighlty to prevent the icon being wrapped by text.
* Increased testing coverage for sorting operations.
* Fixed issue preventing page revisions from being viewable when not an admin.
* Prevented custom HTML from being inserted into the settings page to allow fixing bad input.
* Updated Laravel framework to 5.4.
* Cleaned login/register design up with better social icons.


### Next Steps

For the next release I'd like to continue the work on import/export options as well as overall system efficiency. I would also like to [trial a new search system](https://github.com/BookStackApp/BookStack/issues/271) to replace the usage of MySQL fulltext indexes.

Just as a heads up; the next version of Laravel, the framework BookStack is built on, will require PHP 7+ so later this year BookStack will have the same requirement. 

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@thepootphotographer" target="_blank">Janko Ferlic</a></span>
