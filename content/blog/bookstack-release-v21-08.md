+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v21.08"
date = 2021-08-31T21:01:23Z
author = "Dan Brown"
image = "/images/blog-cover-images/lighthouse-dimitry_b.jpg"
slug = "bookstack-release-v21-08"
draft = false
+++

Today we release BookStack v21.08, which brings along multi-factor authentication support in addition to a
number of other nice features. Within this post we'll dive into some of the biggest new changes since the v21.05 release.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.08)


**Upgrade Notices**

- **Config & Administration** - The introduction of multi-factor authentication brings the first use of encryption in the platform.
  This uses the `APP_KEY` value in your `.env` file. Ensure you have this stored safely since it would be required if you ever
  restore/migrate your instance to another system.
- **Security/Exports** - During this release cycle it was highlighted that server-side request forgery could be achieved via the 
  PDF export system. External fetching in the default PDF renderer has been disabled by default. The WKHTMLtoPDF renderer will now 
  not be used if active. Either of these changes can be overridden by setting `ALLOW_UNTRUSTED_SERVER_FETCHING=true` in your `.env` file.
  This should only be used were only trusted users can create and export content. To support this we've added permissions that allow disabling of exports per role.
- **Security/Authentication** - A slight change was made in relation to how email addresses are confirmed. Email confirmations are now primarily checked at point-of-login rather
  than being checked on every request. Enabling email confirmation, or email domain restrictions, may no longer take action on unconfirmed users right away in the future.


### Multi-Factor Authentication

Multi-factor authentication (MFA) can now be enabled for user accounts in BookStack.
Two different MFA methods are available in this initial release of the feature:

1. TOTP, Labelled as "Mobile App" (Google/Microsoft Authenticator etc...)
2. Backup Codes (A list of single-use codes)

MFA can be enabled by any user accounts in the system. It can be enforced at a per-role level
via a new "Requires Multi-Factor Authentication" checkbox found when editing a role:

![View of MFA required checkbox on role edit page](/images/2021/08/mfa-role-permission.png)

When required, users will be forced to setup at least one MFA method upon next login.
For those with at least one method configured, the system will require an MFA method to be used
upon login:

![MFA Verificiation View](/images/2021/08/mfa-verify-view.png)

To help in the scenario where someone may lose their MFA credentials, a new system command
has been added which will clear all MFA methods for the given user:

```bash
php artisan bookstack:reset-mfa --email=john@example.com
```

This feature was more effort than expected, partially due to needing to refactor how
authentication is performed within BookStack, but it should provide a significant 
benefit to instances that house sensitive content.

### Markdown Export

In addition to the PDF, plaintext and HTML export options, you can now export pages,
chapters and books as markdown:

![List of page export options including markdown](/images/2021/08/export-options-with-markdown.png)

For pages that have not been written in the markdown editor, we'll attempt to convert
the underlying HTML content to markdown. 
This new markdown export option has also been added to the API. Note: This format does
not contain the image data like the HTML option since readability and cleanliness have taken
priority.

### Role-Based Export Permissions

A new "Export content" role permission has been added to BookStack. This will be given to
all roles by default upon upgrade. This new permission allows admins to control who can 
see and use the "Export" option that's available via the API or on any page, chapter or book.

### "Skip to content" Link

A new accessibility feature was added in v21.05.3, providing a "Skip to main content" link on the
first element of focus on the page. This link is not visible by default but will appear when focused
upon, typically by hitting tab after landing on a page.

![View of the Skip to content link](/images/2021/08/skip-to-content-link.png)

### Upload Images in Page Content via API

As of v21.05.1 it's now possible to upload images via a page's HTML content.
To utilise this, the image just needs to be provided as a base64 encoded data URI within the
src of an img tag like so:

```json
{
	"html": "<p><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAACklEQVR4nGMAAQAABQAB'></p>"
}
```

Upon POST/PUT of this data, BookStack will extract these images out to their own files, as if they had 
been uploaded via the UI. This is not yet available for markdown content.

### Non-Download Attachment Links

Within BookStack v21.05.2 we added the ability to open/reference attachments without
forcing the file to be downloaded. This can be useful for files that your browser may support
like images and PDFs, where they could then open in their own tab instead of being downloaded.

![Preview of a non-download attachment link](/images/2021/08/non-download-attachment-link.png)

This feature is fairly hidden. You can either Ctrl/Cmd+Click the attachment link or add `?open=true` 
to the end of any current attachment link. I'd like to build this option into the interface at some
point to make it easier to find & use where desired.


### Translations

This release brings a new language option of Lithuanian!
Big thanks to [@ffranchina](https://github.com/BookStackApp/BookStack/pull/2868) and their translators
for providing this new language.

Upon that, the below wonderful people have provided translation updates to the shown languages
since the initial v21.05 release:

- Behzad HosseinPoor (behzad.hp) - *Persian*
- Jakub Bouček (jakubboucek) - *Czech*
- syn7ax69 - *Bulgarian; Turkish*
- Ole Aldric (Swoy) - *Norwegian Bokmal*
- whenwesober - *Indonesian*
- m0uch0 - *Spanish*
- Alexander Predl (Harveyhase68) - *German*
- scureza - *Italian*
- Gustav Kånåhols (Kurbitz) - *Swedish*
- 10 935 336 - *Chinese Simplified*
- Michał Stelmach (stelmach-web) - *Polish*
- Francesco Franchina (ffranchina) - *Italian*
- arniom - *French*
- 林祖年 (contagion) - *Chinese Traditional*
- nutsflag - *French*
- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- Vuong Trung Hieu (fpooon) - *Vietnamese*
- Irfan Hukama Arsyad (IrfanArsyad) - *Indonesian*
- semirte - *Bosnian*
- Luís Tiago Favas (starkyller) - *Portuguese*
- Statium - *Russian*
- Gerwin de Keijzer (gdekeijzer) - *German; Dutch*
- aarchijs - *Latvian*
- Lis Maestrelo (lismtrl) - *Portuguese, Brazilian*
- Nathanaël (nathanaelhoun) - *French*
- A Ibnu Hibban (abd.ibnuhibban) - *Indonesian*
- Martins Pilsetnieks (pilsetnieks) - *Latvian*
- Frost-ZX - *Chinese Simplified*
- Kuzma Simonov (ovmach) - *Russian*
- Vojtěch Krystek (acantophis) - *Czech*
- Blaade - *French*
- Siamak Guodarzi (siamakgoudarzi88) - *Persian*


### Full List of Changes

**Released in v21.08**

* Added multi-factor authentication system. ([#2827](https://github.com/BookStackApp/BookStack/pull/2827), [#1118](https://github.com/BookStackApp/BookStack/issues/1118))
* Added the ability to export content as Markdown. Thanks to [@nikhiljha](https://github.com/BookStackApp/BookStack/pull/2115). ([#2115](https://github.com/BookStackApp/BookStack/pull/2115), [#1717](https://github.com/BookStackApp/BookStack/issues/1717))
* Added role permissions for exporting content. ([#2899](https://github.com/BookStackApp/BookStack/pull/2899), [#1251](https://github.com/BookStackApp/BookStack/issues/1251))
* Added an advisory notice on the shelf permissions page regarding the lack of cascade. ([#2876](https://github.com/BookStackApp/BookStack/issues/2876))
* Added Lithuanian language translations. Thanks to [@ffranchina](https://github.com/BookStackApp/BookStack/pull/2868). ([#2868](https://github.com/BookStackApp/BookStack/pull/2868))
* Added item parent link in recycle bin restore to make parent item restore easier. Thanks to [@arjvand](https://github.com/BookStackApp/BookStack/pull/2682). ([#2682](https://github.com/BookStackApp/BookStack/pull/2682), [#2594](https://github.com/BookStackApp/BookStack/issues/2594))
* Added some core opengraph tags to content. Thanks to [@james-geiger](https://github.com/BookStackApp/BookStack/pull/2393). ([#2393](https://github.com/BookStackApp/BookStack/pull/2393), [#2348](https://github.com/BookStackApp/BookStack/issues/2348))
* Updated blade views to be more consistent and follow a documented convention. ([#2805](https://github.com/BookStackApp/BookStack/issues/2805))
* Fixed markdown blockquotes not rendering correctly in preview. ([#2858](https://github.com/BookStackApp/BookStack/issues/2858), [#2837](https://github.com/BookStackApp/BookStack/issues/2837))
* Fixed issue on API where page updates can remove HTML. ([#2856](https://github.com/BookStackApp/BookStack/issues/2856))
* Fixed inconsistency in list display and nesting. ([#2854](https://github.com/BookStackApp/BookStack/issues/2854))
* Standardised styling of the codebase. ([#2820](https://github.com/BookStackApp/BookStack/pull/2820))

**Released in v21.05.1 through v21.05.4**

* Added base64 image extraction within page content. Thanks to [@awarre](https://github.com/BookStackApp/BookStack/pull/2700). ([#2700](https://github.com/BookStackApp/BookStack/pull/2700), [#2631](https://github.com/BookStackApp/BookStack/issues/2631))
* Added Croatian translations. Thanks to [@ffranchina](https://github.com/BookStackApp/BookStack/pull/2784). ([#2784](https://github.com/BookStackApp/BookStack/pull/2784), [#2785](https://github.com/BookStackApp/BookStack/pull/2785))
* Added VB.NET code block highlighting option. ([#2869](https://github.com/BookStackApp/BookStack/issues/2869))
* Added a "Skip to content" link as first page focus item for accessibility use. ([#2810](https://github.com/BookStackApp/BookStack/issues/2810))
* Added the ability to serve attachments without forcing downloads. ([#2791](https://github.com/BookStackApp/BookStack/pull/2791))
* Updated item permission roles list to be sorted alphabetically. ([#2782](https://github.com/BookStackApp/BookStack/issues/2782))
* Updated social account detachment to have CSRF protection. ([#2808](https://github.com/BookStackApp/BookStack/issues/2808))
* Updated PHP dependency versions.
* Updated translations with latest changes from Crowdin. ([#2790](https://github.com/BookStackApp/BookStack/pull/2790))
* Merged in latest Crowdin translations. ([#2787](https://github.com/BookStackApp/BookStack/pull/2787), [#2777](https://github.com/BookStackApp/BookStack/pull/2777))
* Improved audit log user select list stability. ([#2863](https://github.com/BookStackApp/BookStack/issues/2863))
* Fixed incorrect styling of favourites sidebar when using a non-default homepage option. ([#2783](https://github.com/BookStackApp/BookStack/issues/2783))
* Fixed issue where empty HTML comments could cause errors. ([#2804](https://github.com/BookStackApp/BookStack/issues/2804))
* Extracted not found text into it's own view for easier overridding ([58117bc](https://github.com/BookStackApp/BookStack/commit/58117bcf2d91b72620de3e34b0daa705da519f5e))
* Fixed issue where translations system may attempt to load from the root directory when a theme was not in use. ([#2836](https://github.com/BookStackApp/BookStack/issues/2836))
* Fixed issue where user profile pages item "View All" links used ids hence did not link to proper searches. ([#2857](https://github.com/BookStackApp/BookStack/issues/2857))


### Next Steps

This will likely be my last feature release before [I leave my current job](https://danb.me/blog/posts/leaving-my-job-to-focus-on-open-source/)
and start focusing on BookStack for a while. For the next month or so I'll just be sneaking in bugfixes and minor improvements as patch releases.

Over the last couple of releases I've made good progress in merging in pending pull requests, so I'll now look to upgrade
the framework of BookStack from Laravel 6 to Laravel 8. As part of this I'll probably do some more cleanup of the codebase.

I'm not sure what I'll be starting with once I'm working on BookStack full time. The search system is in much need of improvement
so that may be the first challenge I tackle.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@dimitry_b?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Dimitry B</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>