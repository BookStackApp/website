+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.27.0"
date = 2019-08-29T21:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/books-eugenio-mazzone.jpg"
description = "BookStack v0.27 brings faster building with Page Templates, A more accessible interface, a new user invitation flow and much more "
slug = "beta-release-v0-27-0"
draft = false
+++

BookStack v0.27 is now available which adds page templates, a new user invitation flow, a more accessible interface and a bunch of under-the-hood changes to provide a better user and developer experience. 

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.27.0)

### Page Templating

It's now possible to define page templates that can be used to speed up and standardise the creation & modification of page content:

<video src="/images/2019/08/page_templates.mp4" muted="true" controls onclick="this.paused ? this.play() : this.pause()"></video>

Templates are simply pages that have been marked as a template in the editor sidebar. Once marked as a template it will show as an available template to any other users that have view permissions of that page template. Simply clicking the template will replace the your existing editor contents, if any, with the page templates. There are also buttons to insert the template content at the top or bottom of your page. Alternatively, It is possible to drag the template into the editor to specify where the template content is inserted. This works in both the default WYSIWYG editor and markdown editor. 

![Page Templates](/images/2019/08/page_templates.png)

Since templates are essentially just specially-marked pages, templates can be organised within books and chapters like any other page. An approch many admins may want to take is to create a new "Templates" book with restriced permissions so anyone can view, and therefore use them as templates, but only certain members can edit. A new "Manage page templates" role permission is now available to designate which roles have the ability to mark a page as a template.

### Accessibility

Accessibility (A11y) on the web is important but is often something that is unfortunately overlooked; It definately was something I overlooked in BookStack. For this release I have invested some time learning how we can make BookStack easier to use for those with disabilities. Here's an overview of what's changed:

- Default colors in BookStack have become darker, now meeting WCAG Level A standards, for better readability.
- Interactive components such as dropdowns, modals & slide-downs can now used properly without a mouse.

<video src="/images/2019/08/header_accessibility.mp4" muted="true" controls onclick="this.paused ? this.play() : this.pause()"></video>

- Descriptions have been set for many elements where context relies up sight.
- Main layout HTML tags have been updated to better indicate the purpose of various sections of the page.
- Styles have been updated to ensure it remains clear which element on the page has focus.
- Icons have been tagged so they're not mistaken for content. 

There's still some work to be done, especially when it comes to the page editors, but this release marks a good start in making the project acessible to all. The project [readme on GitHub](https://github.com/BookStackApp/BookStack/#-accessibility) has been updated with the accessibility standards we're aiming for along with some details to confirm we're open to issues regarding accessibility.

### New User Invitation Flow

// TODO

### Docker Development Environment

// TODO

### Under-the-Hood Changes

jQuery, Theme color customization etc...

### Discord

// TODO

### Full List of Changes

* Reviewed accessibility of BookStack to move towards WCAG 2.0 Support. ([#1320](https://github.com/BookStackApp/BookStack/issues/1320), [#1476](https://github.com/BookStackApp/BookStack/issues/1476))
* Added page templating functionality. ([#129](https://github.com/BookStackApp/BookStack/issues/129), [#1527](https://github.com/BookStackApp/BookStack/pull/1527))
* Added the ability to send a new user a sign-up link where they can set their own password. ([#316](https://github.com/BookStackApp/BookStack/issues/316))
* Added docker development environment. Thanks to [@timoschwarzer](https://github.com/BookStackApp/BookStack/pull/1504). ([#1504](https://github.com/BookStackApp/BookStack/pull/1504))
* Added the ability to set seperate storage types for Images and Attachments. ([#1302](https://github.com/BookStackApp/BookStack/issues/1302))
* Added Hungarian translations. Thanks to [@miles75](https://github.com/BookStackApp/BookStack/pull/1554). ([#1554](https://github.com/BookStackApp/BookStack/pull/1554), [#1573](https://github.com/BookStackApp/BookStack/pull/1573))
* Added notice to the "Custom HTML Head Content" setting to advise it does not apply while on the settings page. ([#1144](https://github.com/BookStackApp/BookStack/issues/1144))
* Updated entity permissions table so it's hidden unless custom permissions are enabled to prevent confusion. Thanks to [@timoschwarzer](https://github.com/BookStackApp/BookStack/pull/1505). ([#1505](https://github.com/BookStackApp/BookStack/pull/1505))
* Updated French translations. Thanks to [@lucaguindani](https://github.com/BookStackApp/BookStack/pull/1485). ([#1485](https://github.com/BookStackApp/BookStack/pull/1485))
* Updated German translations. Thanks to [@danielroehrig-mm](https://github.com/BookStackApp/BookStack/pull/1561). ([#1561](https://github.com/BookStackApp/BookStack/pull/1561))
* Updated Brazillian Portuguese translations. Thanks to [@DeehSlash](https://github.com/BookStackApp/BookStack/pull/1534). ([#1534](https://github.com/BookStackApp/BookStack/pull/1534))
* Updated HTML code of base templates with locale definition. Thanks to [@kostasdizas](https://github.com/BookStackApp/BookStack/pull/1486). ([#1486](https://github.com/BookStackApp/BookStack/pull/1486))
* Updated the debug bar so it does not show unless explicitly enabled. ([#1508](https://github.com/BookStackApp/BookStack/issues/1508))
* Updated entity colors so they can be easily overidden.
* Updated page navigation so full headings are included in the output but then truncated via CSS which can be overidden. ([#1206](https://github.com/BookStackApp/BookStack/issues/1206))
* Re-wrote URL generation system to avoid incorrect redirects occuring during certain actions such as login and list view change. ([#1536](https://github.com/BookStackApp/BookStack/issues/1536), [#1459](https://github.com/BookStackApp/BookStack/issues/1459))
* Made it possible to run phpunit via the composer-installed copy. ([#1555](https://github.com/BookStackApp/BookStack/issues/1555))
* Moved 'config' directory into 'app' directory to avoid confusion. ([#1506](https://github.com/BookStackApp/BookStack/issues/1506))
* Redesigned front-end translation system to prevent an addition HTTP call on each page load. ([#1258](https://github.com/BookStackApp/BookStack/issues/1258))
* Fixed issue causing main menu to be hidden by the page editor at certain widths. ([#1556](https://github.com/BookStackApp/BookStack/issues/1556))
* Fixed missing word in social account description text. Thanks to [@bjubes](https://github.com/BookStackApp/BookStack/pull/1517). ([#1517](https://github.com/BookStackApp/BookStack/pull/1517))
* Fixed print CSS to work with the recent design changes. ([#1472](https://github.com/BookStackApp/BookStack/issues/1472))
* Fixed sidebar layout issues on mid-level screen sizes. ([#1434](https://github.com/BookStackApp/BookStack/issues/1434))
* Fixed issue that prevented scrolling in the WYSIWYG editor on iOS devices. ([#1058](https://github.com/BookStackApp/BookStack/issues/1058))
* Fixed issue where multi-byte characters would not render correctly in the sidebar. ([#1172](https://github.com/BookStackApp/BookStack/issues/1172))
* Fixed incorrect page navigation indentation. ([#542](https://github.com/BookStackApp/BookStack/issues/542))
* Removed use of babel and css autoprefixer from dev build system for faster builds. ([#1468](https://github.com/BookStackApp/BookStack/issues/1468))
* Removed jQuery and replaced jQuery-based libraries.

### Framework Upgrade & PHP Version

// TODO

### Next Steps

// TODO

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@eugi1492?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Eugenio Mazzone"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Eugenio Mazzone</span></a></span>
