+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v21.05"
date = 2021-05-30T14:32:33Z
author = "Dan Brown"
image = "/images/blog-cover-images/book-collection-fredmarriage.jpg"
slug = "bookstack-release-v21-05"
draft = false
+++

BookStack v21.05 has now been released which brings along new user interface
features & enhancements including a favourites system and easier in-book
navigation.

The previous release, BookStack v21.04, also received a bunch of fixes & enhancements during
the last couple of months so we'll also delve into a few of those changes within this post.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.05)


### Favourites System

For quite a while I've wanted to be able to favourite specific items within BookStack for easier future location.
For this release cycle I decided to be a bit selfish and spend a couple of nights getting this implemented.
Thanks to all those that provided feedback in regards to the naming in [GitHub issue 2053](https://github.com/BookStackApp/BookStack/issues/2053).

When viewing a shelf, book, chapter or page while logged in you'll see a new "Favourite" action
situated next to the export action.

![BookStack Favourites Action Link](/images/2021/05/favourites-action.png)


Clicking this will add the item to your personal favourites.
Now when you're on the homepage you'll see a list of your most viewed favourites:


![BookStack Favourites Home List](/images/2021/05/favourites-home-list.png)

You can view all your favourites by clicking the header of the homepage list shown above or via
a link within the profile dropdown menu in the header bar:


![BookStack Favourites Link in Profile Menu](/images/2021/05/favourites-profile-menu.png)

This new feature makes it really easy to curate a personal collection of items within the system.
In the future we may able to use this for other purposes; For example, for watching/notification control.

### Next/Previous Page & Chapter Navigation

Much like a physical book, you'll often want to move to the next or previous page when you get to the
bottom of the current one. To support this we now have actions below the page content to move to the 
next, or previous, chapter or page from the current one within the ordering of the current book.

![BookStack Next & Previous Content Navigation Preview](/images/2021/05/next-prev-nav.png)

The links are designed to not be distracting by default, like the other non-content interface, but will
become more apparent upon interaction. Thanks to [@shubhamosmosys](https://github.com/BookStackApp/BookStack/pull/2511) for providing an initial
implementation of this and also a thanks to [@james-geiger](https://github.com/BookStackApp/BookStack/issues/1381#issuecomment-540105003)
for supporting a work-around for this in the mean time.

### Tags Within Search Results

Tags applied to content will now be shown within search results:

![Tags in Search Example](/images/2021/05/tags-in-search.png)

They are shown below the content preview, with a more muted design to prevent them from being too distracting when 
parsing the search results. Thanks to [@burnoutberni](https://github.com/BookStackApp/BookStack/pull/2487) for an 
initial implementation of this feature.

### LDAP User Avatar Import

When using LDAP for authentication, you can now specify an attribute for fetching
a JPEG user avatar image. This is done via a `LDAP_THUMBNAIL_ATTRIBUTE` in your `.env` like so:

```bash
LDAP_THUMBNAIL_ATTRIBUTE=jpegphoto
```

BookStack will import and use this thumbnail data as the user avatar upon login or registration
if that user doesn't have an existing avatar image set.
Thanks to [@jasonhoule](https://github.com/BookStackApp/BookStack/pull/2320) for providing
the pull request with the initial implementation of this feature.

### Improved Header Accessibility

In BookStack patch release v21.04.1, the accessibility of the mobile-style header
controls was significantly improved. Previously you could not use the dropdown menu
nor the Info/Content layout controls via keyboard alone. These issues
have now been addressed providing a much more accessible experience at smaller
screen sizes.

![Improved Header Accessibility Example](/images/2021/05/header-a11y.png)

A big thanks to [@Flameborn and @tspivey for reporting and verifying](https://github.com/BookStackApp/BookStack/issues/2681) 
the previous limitations.

### Dark Mode Updates

Within the v21.04.3 & v21.04.4 patch releases we addressed a good few outstanding 
issues with dark mode. This included the leftover layout control light styles showing in 
dark mode.

<table>
<tr>
	<td>
		<h4>v21.04</h4>
		<img src="/images/2021/05/dark-mode-header-2104.png" alt="Dark mode interface controls in v21.04">
	</td>
	<td>
		<h4>v21.05</h4>
		<img src="/images/2021/05/dark-mode-header-2105.png" alt="Dark mode interface controls in v21.05">
	</td>
</tr>
</table>


### Translations

As usual, our terrific translating team have been at work to bring the following language updates since
the original v21.04 release:

- Gerwin de Keijzer (gdekeijzer) - *Dutch; German; German Informal*
- Jonas Anker Rasmussen (jonasanker) - *Danish*
- Francesco Franchina (ffranchina) - *Italian*
- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- Aimrane Kds (aimrane.kds) - *Arabic*
- kometchtech - *Japanese*
- Martins Pilsetnieks (pilsetnieks) - *Latvian*
- nutsflag - *French*
- Auri (Atalonica) - *Catalan*
- m0uch0 - *Spanish*
- 10935336 - *Chinese Simplified*
- Statium - *Russian*
- Luís Tiago Favas (starkyller) - *Portuguese*
- Rodrigo Saczuk Niz (rodrigoniz) - *Portuguese, Brazilian*
- whenwesober - *Indonesian*
- aarchijs - *Latvian*
- Mykola Ronik (Mantikor) - *Ukrainian*
- [@Jokuna](https://github.com/BookStackApp/BookStack/pull/2716) - *Korean*


### Full List of Changes

**Released in v21.05**

* Added shelf/book/chapter/page favourite system. ([#2748](https://github.com/BookStackApp/BookStack/pull/2748))
* Added previous/next navigation to chapters and pages. Thanks to [@shubhamosmosys](https://github.com/BookStackApp/BookStack/pull/2511). ([#2511](https://github.com/BookStackApp/BookStack/pull/2511), [#1381](https://github.com/BookStackApp/BookStack/issues/1381))
* Added display of tags within search results. Thanks to [@burnoutberni](https://github.com/BookStackApp/BookStack/pull/2487). ([#2487](https://github.com/BookStackApp/BookStack/pull/2487), [#2462](https://github.com/BookStackApp/BookStack/issues/2462))
* Added the ability to import JPEG user avatar images during LDAP login/registration. Thanks to [@jasonhoule](https://github.com/BookStackApp/BookStack/pull/2320). ([#2320](https://github.com/BookStackApp/BookStack/pull/2320), [#1161](https://github.com/BookStackApp/BookStack/issues/1161))
* Updated export meta date format to align with the format used in revisions. ([#2771](https://github.com/BookStackApp/BookStack/issues/2771))
* Updated drawing manager system to verify host on post messages for additional security. ([#2769](https://github.com/BookStackApp/BookStack/issues/2769))
* Updated potential external links with `rel="noopener"` for better security . Thanks to [@CorruptComputer](https://github.com/BookStackApp/BookStack/pull/2768). ([#2768](https://github.com/BookStackApp/BookStack/pull/2768))
* Updated drawing upload error handling to better advise when images are too large for the server. ([#2740](https://github.com/BookStackApp/BookStack/issues/2740))
* Updated page deletions to also delete related revisions. ([#2668](https://github.com/BookStackApp/BookStack/issues/2668))
* Updated shelf, book & chapter creation/edit views to autofocus on the name input. ([#1956](https://github.com/BookStackApp/BookStack/issues/1956))
* Updated translations with latest Crowdin changes. ([#2764](https://github.com/BookStackApp/BookStack/pull/2764))
* Fixed issue where user search field could stack too early in certain languages. ([#2147](https://github.com/BookStackApp/BookStack/issues/2147))

**Released in v21.04.1 through v21.04.6**

* Added a way to configure options on a social driver, for the initial redirects, through the `Theme::addSocialDriver` system. ([#2759](https://github.com/BookStackApp/BookStack/issues/2759))
* Added a new `SAML2_IDP_AUTHNCONTEXT` option for SAML2 authentication since the default did not work well for some Windows environments. Thanks to [@ivir](https://github.com/BookStackApp/BookStack/pull/1998). ([#1998](https://github.com/BookStackApp/BookStack/pull/1998))
* Updated mobile header elements for much better keyboard/screen-reader accessibility. ([#2681](https://github.com/BookStackApp/BookStack/issues/2681))
* Updated WYSIWYG editor code-block handling provide a more stable undo/redo experience. ([#2602](https://github.com/BookStackApp/BookStack/issues/2602))
* Updated AWS S3 SDK to fix incompatibility with Minio. ([#2689](https://github.com/BookStackApp/BookStack/issues/2689))
* Updated translations with latest Crowdin changes. ([#2691](https://github.com/BookStackApp/BookStack/pull/2691), [#2695](https://github.com/BookStackApp/BookStack/pull/2695), [#2719](https://github.com/BookStackApp/BookStack/pull/2719), [#2672](https://github.com/BookStackApp/BookStack/pull/2672), [#2737](https://github.com/BookStackApp/BookStack/pull/2737))
* Updated migration string column lengths to better fit within restrictive index limits ([#2710](https://github.com/BookStackApp/BookStack/issues/2710))
* Updated select box styles with to work around default iOS styles causing issues in dark mode. ([#2709](https://github.com/BookStackApp/BookStack/issues/2709))
* Updated styles of layout view buttons in mobile screen sizes to respect dark mode.
* Updated image upload behaviour for s3 style uploads to set public permissions as part of the upload request instead of a separate request.
* Updated Korean translations. Thanks to [@Jokuna](https://github.com/BookStackApp/BookStack/pull/2716). ([#2716](https://github.com/BookStackApp/BookStack/pull/2716))
* Updated table style handling across exports types to be consistent. ([#2666](https://github.com/BookStackApp/BookStack/issues/2666))
* Updated S3 ACL setting so ACLs are set via another request, as per pre-v21.04.2, but only when actually use AWS S3. ([#2739](https://github.com/BookStackApp/BookStack/issues/2739))
* Updated overflowing table content to be consistent. Thanks to [@dopyrory3](https://github.com/BookStackApp/BookStack/pull/2735). ([#2735](https://github.com/BookStackApp/BookStack/pull/2735), [#2732](https://github.com/BookStackApp/BookStack/issues/2732))
* Updated export system to remove JavaScript used in Custom HTML Head Content to prevent errors or strange behaviour. ([#2490](https://github.com/BookStackApp/BookStack/issues/2490))
* Improved error messaging when attempting to access a non-existent image file. ([#2696](https://github.com/BookStackApp/BookStack/issues/2696))
* Fixed issue where "Recently Viewed" would show non-viewed content for new users. ([#2703](https://github.com/BookStackApp/BookStack/issues/2703))
* Fixed issue where a page could become inaccessible when the creator no longer existed. ([#2687](https://github.com/BookStackApp/BookStack/issues/2687))
* Fixed HTTP JSON detection when an encoding is in the response JSON content type. ([#2684](https://github.com/BookStackApp/BookStack/issues/2684))
* Fixed page export error thrown when the created by, or last updated by user, had been deleted. ([#2733](https://github.com/BookStackApp/BookStack/issues/2733))
* Fixed white borders on layout buttons when in dark mode when using Safari. ([#2728](https://github.com/BookStackApp/BookStack/issues/2728))
* Fixed error during PDF export in some cases due to incorrect path. ([#2746](https://github.com/BookStackApp/BookStack/issues/2746))
* Fixed error thrown when saving a markdown page with empty content. ([#2741](https://github.com/BookStackApp/BookStack/issues/2741))
* Fixed scenario where recent Image upload visibility changes caused issues on hosting where webserver and PHP process group/user differ. ([#2758](https://github.com/BookStackApp/BookStack/issues/2758))


### Next Steps

As planned for this release cycle, I've been through a good chunk of the outstanding pull requests on GitHub.
I'll look to continue this for another release cycle as I'd ideally want to address most of these before
updating the Laravel framework version, which will soon be due.

To start thinking about our next "Editor Review" roadmap stage, I've [opened a scoping issue on GitHub](https://github.com/BookStackApp/BookStack/issues/2738) to gain feedback on potential options. If you have experience on developing with any of the options posted then feedback is appreciated. I'll be looking to dig a little deeper into this within the next release cycle or two.


### Donating to BookStack

Donations are always something I stayed away from. I always thought that people should spend their money
on more worthy causes, since I didn't really need the money myself nor would I expect it to have a 
significant impact on the project. That said, people really wanted to provide donations and it was raised
multiple times. Ideas like bug-bounties were floated but I never wanted money to be a core motivator
for BookStack features and efforts.

After thinking it through over the last few years, I realised that donations could be used for the following:

1. Support the projects & people that BookStack is built upon by forwarding donations onwards.
2. Gauge the feasibility of using the income to potentially one day work on open source full time.

The second idea is a bit of a pipe-dream but for now I'll focus on the first, supporting other projects.
Since the end of last year I've been testing out utilising GitHub sponsors:

<iframe src="https://github.com/sponsors/ssddanbrown/button" title="Sponsor ssddanbrown" height="35" width="116" style="border: 0;" loading="lazy"></iframe>

GitHub sponsors provides a multitude of options for one-off and monthly donations.
As my donations build up I'll look to support additional projects and people.
If the donations ever get to a point where they could support me working on open source full time, I'll likely change focus and only support myself
until I could get to a point of stable sustainability to be able to then support others again.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@fredmarriage?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">freddie marriage</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>