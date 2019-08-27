+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.27.0"
date = 2019-08-28T21:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/books-eugenio-mazzone.jpg"
description = "BookStack v0.27 brings faster building with Page Templates, A more accessible interface, a new user invitation flow and much more "
slug = "beta-release-v0-27-0"
draft = false
+++

// TODO

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.27.0)


Before jumping into all the changes, there's a few things to note before upgrading:

// TODO

~~ ~~

### Page Templating

// TODO

### Accessibility

// TODO

### New User Invitation Flow

// TODO

### Docker Development Environment

// TODO

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
