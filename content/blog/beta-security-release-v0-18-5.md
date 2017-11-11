+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Security Release v0.18.5 + Other Bugfix Releases"
date = 2017-11-11T19:01:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-jason-blackeye.jpg"
description = "BookStack Bugfix v0.18.5 released to fix security issue where content names were visible on 404"
slug = "beta-security-release-v0-18-5"
draft = false
+++

### Security Release v0.18.5

**This release fixes the following security issue:**

* Fixed issue where email confirmation was not forced when domain restriction was enabled. ([#573](https://github.com/BookStackApp/BookStack/issues/573))

This issue meant that if you have domain restriction enabled on sign-up, and you did not enable email confirmation, a user could sign up via email (Using an approved email domain) but then login right away without confirming they own the email.

It is suggested that if you had email confirmation disabled but domain restriction enabled you check all user accounts to ensure they are legitimate. This change may also mean that, after updating, some users will need to confirm their email address to access the BookStack instance.

Sincere apologies for this issue.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.18.5)

### Other Bugfix Releases

Since the last blogpost for v0.18 we've deployed quite a few bugfix releases. Here's the full changelog of v0.18.1 to v0.18.5:

* Fixed issue where images would jump to the bottom when pasted into a page. ([#489](https://github.com/BookStackApp/BookStack/issues/489))
* Fixed bug preventing pages being saved when including other page content. ([#514](https://github.com/BookStackApp/BookStack/issues/514))
* 'Spanish Argentina' translations added, Thanks to [@leomartinez](https://github.com/BookStackApp/BookStack/issues/517). ([#517](https://github.com/BookStackApp/BookStack/issues/517))
* Russian translations added, Thanks to [@turbotankist](https://github.com/BookStackApp/BookStack/issues/506). ([#506](https://github.com/BookStackApp/BookStack/issues/506))
* Some Dutch translations updated, Thanks to [@sanderdw](https://github.com/BookStackApp/BookStack/issues/510). ([#510](https://github.com/BookStackApp/BookStack/issues/510))
* When using social authentication, You are now redirected to your original intended location upon login. ([#508](https://github.com/BookStackApp/BookStack/issues/508))
* Updated code colorscheme to highlight shell commands. ([#535](https://github.com/BookStackApp/BookStack/issues/535))
* Prevented homepage item 'details' overflowing out of the lists. ([#533](https://github.com/BookStackApp/BookStack/issues/533))
* Improved search indexing to better split words apart. Fixes words at the start of sentances not being searchable. ([#531](https://github.com/BookStackApp/BookStack/issues/531))
* Updated Italian translations. Thanks to [@cipi1965](https://github.com/BookStackApp/BookStack/pull/529). ([#529](https://github.com/BookStackApp/BookStack/pull/529))
* Updated Russian translations. Thanks to [@turbotankist](https://github.com/BookStackApp/BookStack/pull/528). ([#528](https://github.com/BookStackApp/BookStack/pull/528))
* Update Dutch translations. Thanks to [@sanderdw](https://github.com/BookStackApp/BookStack/pull/523). ([#523](https://github.com/BookStackApp/BookStack/pull/523))
* Removed trailing spaces from input to achieve cleaner URLs. ([#526](https://github.com/BookStackApp/BookStack/issues/526))
* Migrated all AngularJS code. Results in much less JavaScript. ([#524](https://github.com/BookStackApp/BookStack/pull/524))
* Added Office 365/AzureAD as a social auth option. ([#509](https://github.com/BookStackApp/BookStack/issues/509))
* Added search filter to sort pages by last commented. ([#440](https://github.com/BookStackApp/BookStack/issues/440))
* Fixed issues where shortcuts would overwrite 'Alt-Gr' based character input. ([#330](https://github.com/BookStackApp/BookStack/issues/330))
* Improved image fetching for exporting. A hopeful solution to [#392](https://github.com/BookStackApp/BookStack/issues/392).
* Prevented duplicate hypens in generated slugs. ([#589](https://github.com/BookStackApp/BookStack/issues/589))
* Fixed url slugs when multi-byte characters are included. Thanks to [@wowkaster](https://github.com/BookStackApp/BookStack/pull/582). ([#582](https://github.com/BookStackApp/BookStack/pull/582))
* Allow custom session lifetime expiry. ([#570](https://github.com/BookStackApp/BookStack/issues/570))
* Fixed tag suggestions not functioning when BookStack is on a URI sub-path. Thanks to [@10bass](https://github.com/BookStackApp/BookStack/pull/563). ([#563](https://github.com/BookStackApp/BookStack/pull/563))
* Updated pt_BR translations. Thanks to [@lbguilherme](https://github.com/BookStackApp/BookStack/pull/558). ([#558](https://github.com/BookStackApp/BookStack/pull/558))

---

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp;<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px;" href="https://unsplash.com/@jeisblack?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Jason Blackeye"><span style="display:inline-block;padding:2px 3px;"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32"><title></title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px;">Jason Blackeye</span></a></span>
