+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.26.0"
date = 2019-05-06T10:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/paint-andrian-valeanu.jpg"
description = "A design update comes to BookStack which includes a whole bunch of user experience improvements and includes much better mobile usability"
slug = "beta-release-v0-26-0"
draft = false
+++

**TODO**

- Update other docs if needed.
- Update homepage screenshots.
- Finish below post.

--

After a long development cycle BookStack v0.26 is finally here, bringing a refreshed design that includes new
functionality while providing a much better mobile experience.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.26.0)


Before jumping into all the changes, there's a few things to note before upgrading:

**Internet Explorer Support**

IE11 Support has now been dropped. We *may* support any critical issues for view-only scenarios otherwise please use a modern browser.

**Translations**

Since many interfaces and lines of text have been updated, It may take a little while for some translations to catch-up. Expect to see more English text than usual if you're using a non-English language option.

**Images**

Due to changes how images are handled, as detailed below, some types of images may become inaccessible. Old logo images will be deleted when changed. Unused Book/Shelf cover images & User profile images will be become inaccessible after the update so you may want to delete them before upgrade.

### Design things to cover

- Better mobile experience
- Image selection changes
- Toggle details state saving
- Shelves & Books sorting
- Shelf list layout (With books)
- Shelves in breadcrumbs
- Create book from shelf. [Credit cw1998]
- Breadcrumb navigation dropdowns
- Book sorting helpers
- Organised settings pages
- Permission toggles
- Cleaned profile pages?

### Other Features


### Full List of Changes


* Updated the application design for better mobile functionality and improved general UX. ([#1153](https://github.com/BookStackApp/BookStack/pull/1153))
* Updated how profile, system & cover images are set & added extra permission checks on image actions.  ([#1410](https://github.com/BookStackApp/BookStack/pull/1410), [#1307](https://github.com/BookStackApp/BookStack/issues/1307), [#1128](https://github.com/BookStackApp/BookStack/issues/1128))
* Added the possibility to create a book directly within a shelf. Thanks to [@cw1998](https://github.com/BookStackApp/BookStack/pull/1366). ([#1366](https://github.com/BookStackApp/BookStack/pull/1366), [#1260](https://github.com/BookStackApp/BookStack/issues/1260))
* Added sign-up link to login form and fixed differing name validation on sign-up. Thanks to [@cw1998](https://github.com/BookStackApp/BookStack/pull/1395). ([#1395](https://github.com/BookStackApp/BookStack/pull/1395), [#1239](https://github.com/BookStackApp/BookStack/issues/1239))
* Added code block syntax highlight for OCaml, Haskell, Rust. Thanks to [@XVilka](https://github.com/BookStackApp/BookStack/pull/1344). ([#1344](https://github.com/BookStackApp/BookStack/pull/1344))
* Updated page content script escaping logic to strip inline JS event attributes. Thanks to [@Xiphoseer](https://github.com/Xiphoseer) for reporting.
* Updated revision restore to require confirmation and changed the method from GET so it's less likely to be accidentally triggered. ([#1321](https://github.com/BookStackApp/BookStack/issues/1321))
* Updated shortcut used for markdown drawing manager to be cross-platform. ([#1228](https://github.com/BookStackApp/BookStack/issues/1228))
* Fixed issue where duplicate ID's could sometimes break pages. ([#1393](https://github.com/BookStackApp/BookStack/issues/1393))
* Fixed issue where user role assignments were not remembered, for roles with a dot in the name, on validation failure. Thanks to [@cw1998](https://github.com/BookStackApp/BookStack/pull/1392). ([#1392](https://github.com/BookStackApp/BookStack/pull/1392), [#1325](https://github.com/BookStackApp/BookStack/issues/1325))
* Fixed issue where the port would be ignored if a full LDAP server URI was used. ([#1386](https://github.com/BookStackApp/BookStack/pull/1386), [#1278](https://github.com/BookStackApp/BookStack/pull/1278))
* Dropped IE11 support. ([#1164](https://github.com/BookStackApp/BookStack/issues/1164))

### Next Steps

Since this release includes a lot of design changes I expect there to be a good few fixes, improvements and translation updates to implement over the coming weeks.

**JavaScript Organisation**

I may start having an experimental dig into a new way to organise the JavaScript code BookStack uses.
BookStack currently bundles pretty much all the JavaScript into single file.
With the dropping of IE, I'd like to look at going a bit old-school, with most of the JS code being directly on the page and only have a few core global libraries bundled up.
This would bring the benefit of allowing users to directly modify parts of the JS without having to install tools or re-bundle the code.

**REST API Authentication**

Once the current redesign has settled focus will be on the next roadmap item, The REST API.
In preparation for this, I've opened up a proposal for the primary authentication method to implement for this API [here on GitHub](https://github.com/BookStackApp/BookStack/issues/1414) so any issues or recommendations can be discussed ahead of time.

**Templating**

For the next release I thought it'd be good to look at a highly requested documentation-focused request; Templating. I've put a proposal together [in this comment on GitHub](https://github.com/BookStackApp/BookStack/issues/129#issuecomment-460412403).
It's a fairly simplistic implementation idea but should provide a benefit to users without having that much extra code/functionality to manage.
Would be good to get an idea if the proposal would meet people's needs.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@freephotocc?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Andrian Valeanu"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Andrian Valeanu</span></a></span>
