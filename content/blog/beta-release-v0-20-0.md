+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.20.0"
date = 2018-02-11T18:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/drawing-sergey-zolkin.jpg"
description = "The first release of 2018 is a big one with Draw.IO support, authenticated Images, new languages and new auth options"
slug = "beta-release-v0-20-0"
draft = false
+++

Here we have the first release of 2018 and it's a chunky one! Not only do we have draw.io integration but thanks to a range of contributors we have extra languages and authentication options. Additionally, In this release we are testing options for theming as well as authenticated image access.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.20.0)

### Draw.io Integration

Often when creating documentation there are some things that are much better explained as drawings rather than text hence why drawing support had been requested a few times for BookStack. Creating our own solution is a bit too much work for a project like BookStack to take on but in this release I'm pleased to introduce Draw.io integration as a solution for creating drawings.

Previously you could create a drawing on draw.io then export it as an image to then upload into BookStack but this user flow is clunky and slow. Now there's a drawing button in both the WYSIWYG and Markdown editors that will load in draw.io and create drawings without leaving BookStack.

<video src="/images/2018/02/drawio-support.mp4" controls></video>

When you save the drawing it will be uploaded to BookStack. You can then continue editing the image by double-clicking the drawing from the page editor.

There are a couple of things to note with the current implementation. Updating a drawing will overwrite the file in BookStack instantly. Even if you don't save the page the drawing will be updated. In addition, There is no current way to delete drawings. In the near future we plan to implement some level of 'drawing manager' which will allow drawing versioning and deletion control. If you expect a high level of drawings to be created and you're low on disk space you may want to disable draw.io support for now. 

The Draw.io integration can be disabled from your `.env` file by setting `DRAWIO=false` or `DISABLE_EXTERNAL_SERVICES=true`.

### Chinese and Swedish Language Support

Our language support grows with v0.20 adding support for both simplified Chinese and Swedish thanks to [@yuezhihan](https://github.com/BookStackApp/BookStack/pull/696) and [@marcusforsberg](https://github.com/BookStackApp/BookStack/pull/679).

For anyone wishing to help with adding or updating translations, Details of doing so can be found in the [project readme](https://github.com/BookStackApp/BookStack#translations). The readme details the use of a helper script to speed up the process of finding missing or unused translations.

### GitLab and Twitch Authentication Options

Thanks to [@jozefbalun](https://github.com/BookStackApp/BookStack/pull/691) and [@moutonnoireu](https://github.com/BookStackApp/BookStack/pull/684) we now respectively have GitLab and Twitch authentication options. The GitLab option supports both GitLab.com and self-hosted options.

[Details on authentication options can be found here](/docs/admin/third-party-auth/)

### Book Grid Enhancements

The last BookStack release included the new grid view for the books page. Since then, Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/635), Switching between the grid and list view has been made more intuitive and now only requires clicking the appropriate link situated on the left of the header bar. The old user-profile option for this has been removed accordingly. In addition, The book grid will now properly align to provide a cleaner grid format:

![Book Grid Updates](/images/2018/02/book-grid-updates.png)

### Authenticated Image Access

Previously images could not be secured behind authentication like page content itself due to performance concerns. With this release authenticated image access is being trialled. This prevents image access to anyone not logged in if your instance is not publicly accessible. On larger instances and on pages with many images there could still be performance concerns so use this feature with caution.

[Details on enabling this option can be found here](/docs/admin/security#image-authentication).  

### Groundwork for Theming

Some initial work for support custom views and themes has been added. BookStack is built on Laravel and therefore uses [blade template files](https://laravel.com/docs/5.5/blade) for rendering page content. This new system allows you to selectively override any blade view file that BookStack uses without altering any original BookStack code.

***Note that this feature is very early-on in it's implementation and using it in a production environment is not advised at this time.***

After updating, You'll find a `themes` folder in the top-folder-level of your BookStack install. Within this folder you can create a folder, 'my-custom-theme' for example, to house your view overrides. Within your `.env` file you can then set `APP_THEME=my-custom-theme`. When loading a view BookStack will then look in your specified theme folder before then defaulting to the stock BookStack views. The view will need to match the name and folder structure as those within the `resources/views/` directory.

In a future release I plan to go over the views and considerably clean them up to make things more consistent, modular and easier to override. This cleanup will cause breakages to existing themes so create themes with caution for now.

### Full List of Changes

* Added Draw.io integration. ([#632](https://github.com/BookStackApp/BookStack/pull/632), [#66](https://github.com/BookStackApp/BookStack/issues/66), [#619](https://github.com/BookStackApp/BookStack/issues/619))
* Added language - Swedish. Thanks to [@marcusforsberg](https://github.com/BookStackApp/BookStack/pull/679). ([#679](https://github.com/BookStackApp/BookStack/pull/679))
* Added language - Simplified Chinese(zh-CN). Thanks to [@yuezhihan](https://github.com/BookStackApp/BookStack/pull/696). ([#696](https://github.com/BookStackApp/BookStack/pull/696))
* Added GitLab authentication. Thanks to [@jozefbalun](https://github.com/BookStackApp/BookStack/pull/691). ([#691](https://github.com/BookStackApp/BookStack/pull/691), [#476](https://github.com/BookStackApp/BookStack/issues/476), [#349](https://github.com/BookStackApp/BookStack/issues/349))
* Added Twitch authentication. Thanks to [@moutonnoireu](https://github.com/BookStackApp/BookStack/pull/684). ([#684](https://github.com/BookStackApp/BookStack/pull/684), [#680](https://github.com/BookStackApp/BookStack/issues/680))
* Added ability to secure images behind authentication. ([#665](https://github.com/BookStackApp/BookStack/pull/665))
* Added button to allow quick switching between grid and list book views. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/635). ([#635](https://github.com/BookStackApp/BookStack/pull/635), [#613](https://github.com/BookStackApp/BookStack/issues/613))
* Added utility command to delete all users from the system. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/621). ([#621](https://github.com/BookStackApp/BookStack/pull/621), [#579](https://github.com/BookStackApp/BookStack/issues/579))
* Added utility command to add an admin user. ([#609](https://github.com/BookStackApp/BookStack/issues/609))
* Added '.env' option to set default books view. ([#675](https://github.com/BookStackApp/BookStack/issues/675))
* Updated book sort operation to check permission of all involved entities before sorting. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/651). ([#651](https://github.com/BookStackApp/BookStack/pull/651))
* Updated books 'Grid' view so it now uses CSS grid so books align in height. ([#701](https://github.com/BookStackApp/BookStack/issues/701))
* Standardised PHP code to follow PSR-2. ([#649](https://github.com/BookStackApp/BookStack/issues/649))
* Corrected the example configuration for okta auth. Thanks to [@lommes](https://github.com/BookStackApp/BookStack/pull/692). ([#692](https://github.com/BookStackApp/BookStack/pull/692))
* Fixed long code block lines going off the page on PDF exports. ([#676](https://github.com/BookStackApp/BookStack/issues/676))
* Fixed long text pushing out the view width on mobile devices when viewing books and chapters. ([#669](https://github.com/BookStackApp/BookStack/issues/669))
* Fixed bug causing markdown editor preview to collapse. ([#658](https://github.com/BookStackApp/BookStack/issues/658))
* Fixed bug causing page to refresh when clicking search in the image manager. ([#697](https://github.com/BookStackApp/BookStack/issues/697))
* Fixed styling issue preventing code editor save button from showing on smaller-screen devices. ([#650](https://github.com/BookStackApp/BookStack/issues/650))
* Fixed error thrown when user accesses an attachment without permission. ([#681](https://github.com/BookStackApp/BookStack/issues/681))
* Fixed font-size difference between list types in comments. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/644). ([#644](https://github.com/BookStackApp/BookStack/pull/644), [#643](https://github.com/BookStackApp/BookStack/issues/643))
* Fixed content includes to not break code structure if targeting a table or list. ([#640](https://github.com/BookStackApp/BookStack/issues/640))


### Next Steps

As mentioned in the article above a 'Drawing Manager', similar to the 'Image Manager', would be a good addition. Maybe also some kind of 'Image/Drawing Cleanup' functionality would be good at this stage to find unused drawings and images on larger instances.

For other features please ensure you add a 'Thumbs-up' reaction on the parent post of any GitHub issue for desired features as it's a really helpful way to identify the most requested features.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@szolkin?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Sergey Zolkin"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">Sergey Zolkin</span></a></span>
