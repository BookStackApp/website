+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.24.0"
date = 2018-09-24T11:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/shelves-michael-d-beckwith.jpg"
description = "Bookshelves arrive in BookStack v0.24 along with a treasure chest of other features, fixes and updates"
slug = "beta-release-v0-24-0"
draft = false
+++

Need a way to categorise your Books? Well BookStack v0.24 is the release for you bringing Bookshelves along with a host of other notable features such as revision removals, social authentication auto-registration and Arabic support.

**Please Note, Due to required re-working of some settings you may have to re-apply any homepage options you've previously set upon updating to v0.24. See the update instructions page linked below for further info.**

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.24.0)


### Bookshelves

Bookshelves have now been added as a new layer to the organisation system. Bookshelves offer a way to group and categorise books. A single bookshelf can contain multiple books and a single book can be contained in multiple bookshelves.

<video src="/images/2018/09/bookshelves.mp4" muted="true" controls></video>

This is only the initial functional implementation of bookshelves. Currently the interface for bookshelves is very similar to that for books and chapters. As part of a bigger design update we'll be looking to make bookshelves more unique in respect to their functionality and design.

As with books, bookshelves can have custom permissions set upon them but they differ in the fact the permissions won't cascade down to child items as they do with books & chapters. This is due to fact a book can be in multiple bookshelves. Instead, within the permissions view for the shelf, you have the option to copy the shelf permission settings to all child books:

![Copy Bookshelf Permissions](/images/2018/09/bookshelves_copy_permissions.png)

### Page Revision Updates

Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/1008) it's now possible to remove particular revisions. This can be useful if you ever need to remove sensitive information that was part of a previous page version without having to delete all revision history in the system.

![Copy Bookshelf Permissions](/images/2018/09/revision_delete.png)

A new configuration option has also been added to control the amount of revisions kept by BookStack. Previously there was a limit of 50 versions enforced. This remains the default but it is now possible to increase or even remove this limit by setting the following in your `.env` file:

```bash
# Set the revision limit to 100
REVISION_LIMIT=100

# Alternatively, You can set to 'false' to disable the limit altogether. 
REVISION_LIMIT=false
```


### Social Auto-Registration & Auto-Email-Confirmation

Previously, to register in the system, you'd need to visit the register page and select your login option, you were not able to register via the login page. This also required registrations to be enabled and prevented social registration if using LDAP as your authentication option.

With this release it's now possible to configure, per authentication option, if users should be auto-registered upon login in the event they do not already have an account. This allows a much smoother sign-up process. It's also possible to automatically mark emails as confirmed for particular authentication options if you trust the service to provide the correct email address. Domain restrictions will still be respected, if set, for both of these options.

[Details on configuring these options can be found here.](/docs/admin/third-party-auth/#automatic-registration-email-confirmation)

### Arabic and Right-to-Left Text Support

This release brings quite a notable addition to BookStack's language support. Thanks to [@kmoj86](https://github.com/BookStackApp/BookStack/pull/945) Arabic is now a language choice. This is the first right-to-left language in BookStack so some functionality has been added to support right-to-left text.

The WYSIWYG editor will now default it's text direction based on your language setting. In addition, If a right-to-left language is in use then additional toolbar options will show to provide control over text direction:

![wysiwyg_rtl_support.png](/images/2018/09/wysiwyg_rtl_support.png)

Bullet-point styles have been updated to ensure they display correctly when displayed in a right-to-left manner and page content should show in the correct direction depending on the text detected within.

Note, Right-to-left text support is in its early stages so there's likely to be further updates needed. Please feel free to raise any issues found on GitHub.

### Additional Language Updates

Once again, We've received a whole load of translations by wonderful people. Here are the languages that have received updates and their contributors:

🇪🇸 &nbsp; Spanish - Thanks to [@moucho](https://github.com/BookStackApp/BookStack/pull/1025). <br>
🇩🇪 &nbsp; German - Thanks to [@vriic](https://github.com/BookStackApp/BookStack/pull/983). <br>
🇷🇺 &nbsp; Russian - Thanks to [@mullinsmikey](https://github.com/BookStackApp/BookStack/pull/1002). <br>
🇧🇷 &nbsp; Brazilian Portuguese - Thanks to [@DeehSlash](https://github.com/BookStackApp/BookStack/pull/986). <br>


### Full List of Changes

* Added bookshelves, A level above books. ([#947](https://github.com/BookStackApp/BookStack/pull/947), [#1023](https://github.com/BookStackApp/BookStack/issues/1023), [#95](https://github.com/BookStackApp/BookStack/issues/95))
* Added ability to remove particular revisions. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/1008). ([#1008](https://github.com/BookStackApp/BookStack/pull/1008), [#784](https://github.com/BookStackApp/BookStack/issues/784))
* Added social auto-registration option. <br> Thanks to [@ibrahimennafaa](https://github.com/BookStackApp/BookStack/pull/966). ([#966](https://github.com/BookStackApp/BookStack/pull/966), [#574](https://github.com/BookStackApp/BookStack/issues/574), [#572](https://github.com/BookStackApp/BookStack/issues/572), [#477](https://github.com/BookStackApp/BookStack/issues/477))
* Added Arabic language and initial RTL language support. Thanks to [@kmoj86](https://github.com/BookStackApp/BookStack/pull/945). ([#945](https://github.com/BookStackApp/BookStack/pull/945), [#939](https://github.com/BookStackApp/BookStack/issues/939))
* Added ability to scroll past the end in the Markdown editor. ([#1020](https://github.com/BookStackApp/BookStack/issues/1020))
* Updated default cookie name and made configurable via .env file. ([#1018](https://github.com/BookStackApp/BookStack/issues/1018))
* Updated revision limit to be configurable. ([#1004](https://github.com/BookStackApp/BookStack/issues/1004))
* Updated export templates to include custom styles. ([#981](https://github.com/BookStackApp/BookStack/issues/981))
* Updated database migrations so MyISAM engine is never forced and so that fulltext index support is not required. ([#726](https://github.com/BookStackApp/BookStack/issues/726))
* Updated Spanish translations. Thanks to [@moucho](https://github.com/BookStackApp/BookStack/pull/1025). ([#1025](https://github.com/BookStackApp/BookStack/pull/1025), [#1021](https://github.com/BookStackApp/BookStack/pull/1021))
* Updated German translations. Thanks to [@vriic](https://github.com/BookStackApp/BookStack/pull/983). ([#983](https://github.com/BookStackApp/BookStack/pull/983), [#1026](https://github.com/BookStackApp/BookStack/pull/1026))
* Updated Russian translations. Thanks to [@mullinsmikey](https://github.com/BookStackApp/BookStack/pull/1002). ([#1002](https://github.com/BookStackApp/BookStack/pull/1002))
* Updated Brazilian Portuguese translations. Thanks to [@DeehSlash](https://github.com/BookStackApp/BookStack/pull/986). ([#986](https://github.com/BookStackApp/BookStack/pull/986))
* Fixed chapter content dropdown acting unreliably. Thanks to [@Abijeet](https://github.com/BookStackApp/BookStack/pull/1009). ([#1009](https://github.com/BookStackApp/BookStack/pull/1009), [#960](https://github.com/BookStackApp/BookStack/issues/960))
* Fixed duplicate role attachment database error that could occur on LDAP group sync. ([#1003](https://github.com/BookStackApp/BookStack/issues/1003))
* Fixed issue in WYSIWYG editor where the "No color" option would disappear or not be present. ([#999](https://github.com/BookStackApp/BookStack/issues/999))
* Fixed issue where code block content may be hidden by the copy button. ([#980](https://github.com/BookStackApp/BookStack/issues/980))
* Fixed issue in WYSIWYG where it could be hard to escape a blockquote section. ([#961](https://github.com/BookStackApp/BookStack/issues/961))
* Fixed hardcoded English text in search page. ([#864](https://github.com/BookStackApp/BookStack/issues/864))
* Fixed issue causing Safari to download items as .dms files. Thanks to [@ajvolin](https://github.com/ajvolin). ([#581](https://github.com/BookStackApp/BookStack/issues/581))


### Next Steps

As mentioned above, The Bookshelves implementation has been functionality focused for this release so I'll be thinking about how to bring in a unique Bookshelf design to make them more effective in use. I'm sure we'll also see some further thoughts and requests as people start to use Bookshelves.  

To support the implemented, but not documented, themeing system I'd like to revamp and clean-up all views used by the system. This would probably tie in with fleshing-out the Bookshelf design work as part of a bigger design update which also enhances mobile support.

To support future back-end features such as notifications, exports and API support I'd like to refactor a chunk of the existing code that deals with shelves, books, pages & chapters to make such future developments easier. This will probably be my own focus for the next couple of weeks. 

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@michael_david_beckwith?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Michael D Beckwith"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Michael D Beckwith</span></a></span>
