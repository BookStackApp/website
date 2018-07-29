+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.23.0"
date = 2018-07-29T15:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/book-aaron-burden.jpg"
description = "BookStack v0.23 brings quicker editing, Discord login, LDAP group syncing and much more"
slug = "beta-release-v0-23-0"
draft = false
+++

Quicker editing, better LDAP integration and Discord login are now here with BookStack v0.23 along with a good set of fixes and improvements.
I must admit this release comes a little later than expected due to an unusually warm English summer making working conditions in my home office exhausting
but luckily we've had a good number of code contributions to keep things moving.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.23.0)


### Team Updates

To start things off I'd like to welcome [lommes](https://github.com/lommes) as an official member of the BookStack team.
This is to recognise the valuable help that lommes has been providing by responding to issues on GitHub in addition to the multiple pull requests they've created to add new features.

### Page Section Quick-Edit

On large pages it can be quite cumbersome to find a section you'd like to edit; then go into edit mode; then find you need to scroll back down in the editor to find your particular section that needs to change.
Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/875) you can now directly select almost any section when viewing a page and have the editor jump directly to that section. This works for both WYSIWYG and markdown editor users.

To quickly edit a section simply highlight the text show the pop-over, then click the edit icon. This video shows how it works:

<video src="/images/2018/07/bookstack-quick-edit.mp4" muted="true" controls></video>

### LDAP Group Sync

Those using LDAP to manage user access to BookStack will be delighted to know that you can now sync LDAP groups to user roles. A massive thanks to [@brennanmurphy](https://github.com/BookStackApp/BookStack/pull/911) for working on this feature.

This sync will match LDAP group names to BookStack role names and automatically add users to the correct groups upon login. You can optionally configure this sync to also remove users from non-matching groups. If your LDAP group need to be different to your BookStack role name there's a new 'External Authentication IDs' field visible when you edit a role while LDAP is enabled. Names entered here will override the default role-name matching behaviour.

Details on setting up group sync can be found in the [updated LDAP documentation](/docs/admin/ldap-auth/#ldap-group-sync).

### Discord Login Option

![BookStack Discord Login](/images/2018/07/bookstack-discord-login.png)

Thanks to [@lommes](https://github.com/BookStackApp/BookStack/pull/904) it is now possible to use Discord as an login option. Details on setting this up can be found in the [updated third party authentication](/docs/admin/third-party-auth/#discord) documentation.

### Language Support

As usual, This release includes a round of translation updates. French, German, Brazilian Portuguese, Spanish Argentinian & Spanish translations have been updated. A big thanks to GitHub users @nicobubulle, @alex2702, @DeehSlash, @leomartinez and @moucho for contributing updates.

### Full List of Changes

* Added LDAP group sync. Thanks to [@brennanmurphy](https://github.com/BookStackApp/BookStack/pull/911). ([#911](https://github.com/BookStackApp/BookStack/pull/911))
* Added Discord as social login provider. Thanks to [@lommes](https://github.com/BookStackApp/BookStack/pull/904). ([#904](https://github.com/BookStackApp/BookStack/pull/904), [#903](https://github.com/BookStackApp/BookStack/issues/903))
* Added ability to select a particular section of a page to edit. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/875). ([#875](https://github.com/BookStackApp/BookStack/pull/875))
* Added copy icon & functionality to codeblocks ([#858](https://github.com/BookStackApp/BookStack/issues/858))
* Updated French translations. Thanks to [@nicobubulle](https://github.com/BookStackApp/BookStack/pull/933). ([#933](https://github.com/BookStackApp/BookStack/pull/933))
* Updated German notification translations. Thanks to [@alex2702](https://github.com/BookStackApp/BookStack/pull/925). ([#925](https://github.com/BookStackApp/BookStack/pull/925))
* Updated Brazilian Portuguese translations. Thanks to [@DeehSlash](https://github.com/BookStackApp/BookStack/pull/918). ([#918](https://github.com/BookStackApp/BookStack/pull/918))
* Updated 'Spanish Argentina' translations. Thanks to [@leomartinez](https://github.com/BookStackApp/BookStack/pull/886). ([#886](https://github.com/BookStackApp/BookStack/pull/886))
* Updated Spanish translations. Thanks to [@moucho](https://github.com/BookStackApp/BookStack/pull/865). ([#865](https://github.com/BookStackApp/BookStack/pull/865))
* Updated dates shown in the image-manager to be much cleaner. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/907). ([#907](https://github.com/BookStackApp/BookStack/pull/907))
* Fixed permission bug causing page create to fail within chapter if lacking permissions to view the parent book. ([#912](https://github.com/BookStackApp/BookStack/issues/912))
* Fixed issue with code not wrapping on revision page. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/906). ([#906](https://github.com/BookStackApp/BookStack/pull/906), [#888](https://github.com/BookStackApp/BookStack/issues/888))
* Fixed error notification briefly showing on initial load. ([#897](https://github.com/BookStackApp/BookStack/issues/897))
* Fixed incorrect and confusing attachment deletion behaviour. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/892). ([#892](https://github.com/BookStackApp/BookStack/pull/892), [#884](https://github.com/BookStackApp/BookStack/issues/884))
* Fixed undefined error when clicking on link under page navigation. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/874). ([#874](https://github.com/BookStackApp/BookStack/pull/874), [#873](https://github.com/BookStackApp/BookStack/issues/873))

### Next Steps

Last month I set out a proposal of what 'Bookshelves' may look like within BookStack. [This proposal can be seen here](https://github.com/BookStackApp/BookStack/issues/95#issuecomment-399753699).
Feedback so far has been positive with no major objections so Bookshelves will be the main focus for the next release. If you have any thoughts on the proposal feel free to comment on that GitHub issue.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@aaronburden?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Aaron Burden"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Aaron Burden</span></a></span>
