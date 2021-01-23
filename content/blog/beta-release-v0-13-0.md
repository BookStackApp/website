+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.13.0"
date = 2016-11-13T12:36:33Z
author = "Dan Brown"
image = "/images/2016/11/bookshelf-kazuend.jpg"
description = ""
slug = "beta-release-v0-13-0"
draft = false

+++

BookStack v0.13.0 has now been released. This release has taken a while but it did require some large under-the-hood updates and brings a few chunky features. Here are the update links:

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.13.0)

**Please read the additional information** at the bottom of the update instructions page as there are some changes in v0.13 that will likely require some manual intervention due to new system requirements.

Before we jump into the features of this release I'd like to point out a new page in the documentation: [Security](https://www.bookstackapp.com/docs/admin/security). I realised some security concerns of BookStack were not 100% clear so this page has been created to explain any potential security concerns. If you currently maintain a BookStack instance I'd advise giving this a quick read to ensure your instance is as secure as possible.

### Page Attachments

The main new feature this release is page attachments. This allows a user to attach files and links to a page. Files will be uploaded to the `storage/uploads` folder unless you have set up Amazon S3 as your file storage service. Attaching links is useful if you use an alternate cloud storage system.

To create & edit attachments simply edit a page and attachments can be found in the sidebar along with tags. Note that edits to attachments are saved instantly. Once created, Attachments can be re-ordered via drag and drop.

![Editing Attachments](/images/2016/11/attachments-edit.png)

 Attachments will be shown in the sidebar when viewing a page. Different icons dictate the type of attachment, link or file.

![Attachment Viewing](/images/2016/11/attachments-view.png)

The permissions for accessing attachments are controlled by whether the user has access to view the page. Create, edit and delete permissions have been added to the role settings. Upon update, Admins are automatically given these permissions but other roles must be given these permissions manually.

### Revision Changes View

When viewing the revisions of a page there is now a new action named 'Changes'. Clicking this will present a diff view displaying the changes in the revision, compared to the revision before. While you could preview old content before this new feature makes it much easier to see exactly what has changed. Here's what a diff looks like:


![Revision Diff View](/images/2016/11/revision-diff-view.png)


### Public Role & Guest User

The system for controlling non-authenticated users has been exposed to allow greater control of how those users interact with your BookStack instance. Note that the 'Allow public viewing?' is still the main master control for public access but these new features allow more control when this setting is enabled.

In the 'Users' settings you will find a new user named 'Guest'. This is the user that is effectively assigned to any non-logged in users. You cannot log in as this user. The guest user can be assigned additional roles but it cannot be unassigned from the new 'Public' role.

A new system role named 'Public' will also show up. Via this role you can change the permissions that public users have. Now you can allow them to create, edit or even delete content. Any actions performed will be visible under the 'Guest' user. Due to the way guests users work they cannot create draft pages and auto-save will not be enabled for guests when editing.

This new role also allows you to control guest permissions at an asset level as the role can be seen in the 'Permissions' area of Books, Chapters & Pages. Overall this new level of control over public users can allow you to do so much more such as have a completely open system or even take a 'white-listing' approach to what public users can access.

### Page Navigation & Headers 

Page navigation has been added to the sidebar to allow users to jump between headings on a page. The navigation will show up as long as the page contains more than one header and the navigation options are indented depending on the header used to provide a visual hierarchy. 

![Page Navigation](/images/2016/11/page-nav.png)

To fit in with new navigation available, page headers have been tweaked in the WYSIWYG editor to provide a greater range of options:

![Heading Changes](/images/2016/11/heading-changes.png)

As you can see from the above, There's now an additional size option and the names have been made much more descriptive. The tweaks in size also enable to page content to flow a little better. Note that these changes will have an effect on any existing pages although hopefully the change will be for the better and the chances of additional bugs is minimal.

### Updated Page, Chapter & Book Urls

The URL system has been modified to allow a much wider range of characters in the URL. This means that when you create content with non-ASCII characters such as Japanese or Chinese these characters will also be used in the URL. URL's won't change automatically upon update but will change if you amend the name of your page, chapter or book.

![UTF8 URL chars](/images/2016/11/utf8-url-chars.png)

### Other Features, Changes & Bugfixes

* Added settings for showing app name in the header bar.
* Base framework updated to Laravel 5.3.
* Sign-up & Password reset emails have been updated to be standardised and fit in with the new Laravel 5.3 notifications system. 
* Ensured new user Gravatar/Signup email requests error gracefully.
* Added page auto-save failure notification (For if you go offline during a page edit).
* Changed versioning system so app version will no display correctly in settings.
* Added initial support for German translations (Thanks [robertlandes](https://github.com/robertlandes)).
* Fixed tag & number search.

### Next Steps

For the next release of BookStack I would like to focus on multi-language support and get translations for all text within BookStack. This will be a fairly large task but will have the massive benefit of extending the usefulness of BookStack to non-English speakers.

If you would like to keep updated on BookStack blog content you can sign up to the weekly newsletter (Dependant on content) below. Emails will be for BookStack blog updates only and you will not be sent any additional unwanted information.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@kazuend" target="_blank">kazuend</a></span>
