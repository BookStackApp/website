+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v22.11"
date = 2022-11-30T12:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/autumn-leaves-dan-brown.webp"
slug = "bookstack-release-v22-11"
draft = false
+++

Just sneaking into November is BookStack v22.11 which comes with a splendid spread of surprises
intended to enhance many existing interfaces and features of BookStack. 
There's no upgrade notices for this one, so let's jump right in.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v22.11)

{{<yt 9Oz6-YOeiuU>}}

### User Interface Shortcuts

Keyboard power users rejoice! It's now possible to perform common user-interface actions via keyboard shortcuts within BookStack.
By default these are disabled to prevent confusing interference, but you can enable & access your shortcut preferences via your 
user profile:

![List of options for interface shortcuts including a grid of possible shortcuts to customize](/images/2022/11/shortcut-preferences.png)

Here you can enable keyboard shortcuts for the user interface, and also fully customize the key combinations to appease your muscle memory. 
A large range of common actions and navigation options are available, and the exact action of these may depend on the context of your location in BookStack.
All shortcut actions are tied to existing abilities in the interface. 
To help recall or find a shortcut you can press `?` when interface shortcuts are enabled.
This will show an overlay, indicating the configured shortcuts for the elements visible on your screen:

![View of BookStack page view with UI elements highlighted with keyboard characters shown upon them](/images/2022/11/shortcut-overlay.png)

Hopefully this addition should speed of the navigation flow for many users; I certainly have enjoyed the gains while using this on my development instance.

### Global Search Live Preview

Within modern search systems it's now common, and almost expected, to have live feedback when performing a search.
In v22.11 BookStack aims to meet that expectation by now showing live search previews in the global search box as you type:

![BookStack header bar with a search started, and a small list of matching content below](/images/2022/11/live-search-preview.png)

Effort has been placed to ensure this is also navigable via expected common keyboard controls to keep up the mouse avoidance flow.
If you hit enter within the search box, click the search icon, or opt to view all results, you'll still be taken to the familiar full search page
with the advanced search controls.

### Redesigned Interface Tabular Lists

For this release I've been through and revised each of the tabular listing views within the interface and aligned them to a common refreshed design, with aligned layout and controls where possible. The main benefit this brings is that these lists are now much more mobile responsive. 
In addition, many of the lists have received added functionality such as new sorting controls, searching, and extra detail display:

![List of roles with a search bar and sort options](/images/2022/11/roles-list-revamp.png)

The following lists have received this treatment: Users, roles, webhooks, api tokens, audit log, tags, recycle bin, page revisions, advanced search terms and role permissions.

### Markdown Editor Enhancements

As part of some JavaScript code cleanup this cycle, I spent a fair amount of time refactoring the somewhat old markdown editor codebase.
While doing that, I thought it'd be good to power-up the editor with some new features and options.

First up is the ability to cycle through callout block styles using the `Ctrl+9` shortcut (Or `Cmd+9` on mac). 
This was already available in the WYSIWYG editor, but now markdown users are not left out:

<video src="/images/2022/11/markdown-callouts.webm" controls muted></video>

You may notice the design of the editor has been tidied a tad, with some better border alignment and reduced editor action bar buttons that have better design-aligned icons and labels hidden until hover. Added to these buttons is the new options menu:

![Dropdown menu in the top-left corner of the Markdown editor](/images/2022/11/markdown-editor-settings.png)

Here you can enable or disable the preview scroll syncing, or even just hide the preview pane entirely to give yourself more writing space.
Along with those options, you can now drag the border between the editor and preview page to adjust the balance of each as desired.
All of these added options and controls are saved as preferences to the browser, rather than your BookStack user profile, so you can retain different preferences on different devices since all these options are quite screen-size dependant. 

### Code Block Swift & Dart Support

We have another couple of code languages supported in this release: Swift and Dart.
This should make many Apple and Flutter developers happy.

![WYSIWYG code editor with Dart language code being edited](/images/2022/11/dart-code-support.png)

### Dark Mode Updates

Updates have been applied to soften some edges and fix a couple of issues in the dark mode color scheme.
The most impactful change is that BookStack will now indicate the mode in use to the browser so that browser-controlled
elements, such as scrollbars, will now correctly follow the chosen option. Below is a before & after of the markdown editor in Chrome, showing
how the scroll bars will now better blend into the UI.

![Comparison between old and new dark mode styles, with old showing bright white scrollbars in a dark theme, and the new showing blended dark scrollbars](/images/2022/11/dark-mode-changes.png)

### Visual Theme System Login & Registration Partials

A common customization request I heard was the addition of custom text/links/content to the login & registration views of a BookStack instance.
While this was possible via the [visual theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/visual-theme-system.md) it could be 
quite daunting as you'd have to override the whole form section. In this release I've added a couple of placeholder templates for easier addition
of content just above the forms. These templates are as follows:

- [auth/parts/login-message.blade.php](https://github.com/BookStackApp/BookStack/blob/development/resources/views/auth/parts/login-message.blade.php)
- [auth/parts/register-message.blade.php](https://github.com/BookStackApp/BookStack/blob/development/resources/views/auth/parts/register-message.blade.php)

As an example, adding the following content to a `auth/parts/login-message.blade.php` override:

```html
<p class="callout info">
  Please login using the email provided by Barry during your induction.
</p>
```

Would show as:

![BookStack login view with a blue information box informing to use "the email provided by Barry during your induction"](/images/2022/11/visual-theme-login-partial.png)


### Translations

Once again commendations to our champions of characters that have provided us with translations for BookStack.
Listed below are those that have provided translations since the original v22.10 release:

- Jan Mitrof (jan.kachlik) - *Czech*
- mikael (bitcanon) - *Swedish*
- SmokingCrop - *Dutch*
- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- pedromcsousa - *Portuguese*
- Indrek Haav (IndrekHaav) - *Estonian*
- Maciej Lebiest (Szwendacz) - *Polish*
- Jeff Huang (s8321414) - *Chinese Traditional*
- m0uch0 - *Spanish*
- scureza - *Italian*
- Felipe Cardoso (felipecardosoruff) - *Portuguese, Brazilian*
- edwardsmirnov - *Russian*
- Statium - *Russian*
- Mr_OSS117 - *French*
- johnroyer - *Chinese Traditional*
- Xabi (xabikip) - *Basque*
- shotu - *French*
- 10935336 - *Chinese Simplified*
- sdhadi - *Persian*
- Matthias Mai (schnapsidee) - *German*
- Éric Gaspar (erga) - *French*
- Cesar_Lopez_Aguillon - *Spanish*
- Martin Sebek (sebekmartin) - *Czech*
- dina davoudi (dina.davoudi) - *Persian*
- Irfan Hukama Arsyad (IrfanArsyad) - *Indonesian*
- Ufuk Ayyıldız (ufukayyildiz) - *Turkish*
- bdewoop - *German*

### Next Steps

While the past month has been a nice distraction, I'll be jumping back into the permission system for December with a hope to 
get all the main intended functionality wrapped up so I'm not dragging it into 2023. 

On a tangent, I've been thinking about creating a part of this site for showing/listing/providing customizations using the theme systems.
I'm often providing examples and snippets, just via a GitHub gist but it'd be good to organize these and save on much of the repeated instruction I need to provide.
Could even integrate this with BookStack itself so customizations can be easily pulled down and added to an instance. 
My main concern with this is that, by being part of the official site, people may expect an official level of support which is against the point of them being out-of-core customizations. Would need to make it clear in the user journey about risks and support. 

### Full List of Changes

**Released in v22.11**

* Added user interface shortcuts system. ([#3830](https://github.com/BookStackApp/BookStack/pull/3830), [#1216](https://github.com/BookStackApp/BookStack/issues/1216))
* Added global search live preview. ([#3850](https://github.com/BookStackApp/BookStack/pull/3850))
* Added markdown preview pane resize/hide/sync controls. ([#2215](https://github.com/BookStackApp/BookStack/issues/2215))
* Added Dart/Flutter support for code blocks & editor. ([#3808](https://github.com/BookStackApp/BookStack/issues/3808))
* Added Swift language support for code blocks & editor. ([#3847](https://github.com/BookStackApp/BookStack/issues/3847))
* Added login/register message partials for easier use via theme system. ([#3848](https://github.com/BookStackApp/BookStack/pull/3848), [#608](https://github.com/BookStackApp/BookStack/issues/608))
* Added Georgian Language support on Crowdin. ([#3823](https://github.com/BookStackApp/BookStack/issues/3823))
* Updated all interface tabular list views to new format with added functionality. ([#3821](https://github.com/BookStackApp/BookStack/pull/3821))
* Updated markdown codebase to be modular and tidied some styles. ([#3875](https://github.com/BookStackApp/BookStack/pull/3875))
* Updated dark mode styles with fixes and browser color scheme support. ([#3878](https://github.com/BookStackApp/BookStack/pull/3878))
* Updated email confirmation routes to be confirmed via POST. ([#3797](https://github.com/BookStackApp/BookStack/issues/3797))
* Updated JavaScript usage to align on single cleaned-up component system. ([#3853](https://github.com/BookStackApp/BookStack/pull/3853))
* Updated our testing process to ensure PHP8.2 Support. ([#3852](https://github.com/BookStackApp/BookStack/pull/3852))
* Updated tests to cover issue of permission regeneration with chapter in the recycle bin. ([#3796](https://github.com/BookStackApp/BookStack/issues/3796))
* Updated translations with latest Crowdin changes. ([#3828](https://github.com/BookStackApp/BookStack/pull/3828))
* Fixed app logo not being stored for public access when using "local_secure_restricted" images. ([#3827](https://github.com/BookStackApp/BookStack/issues/3827))
* Fixed missing translations for some editor elements. ([#3822](https://github.com/BookStackApp/BookStack/issues/3822))
* Fixed OIDC JWKs parsing when "use" property missing on keys. ([#3869](https://github.com/BookStackApp/BookStack/issues/3869))

**Released in v22.10.2**

* Updated translations with latest changes from Crowdin. ([#3791](https://github.com/BookStackApp/BookStack/pull/3791))

**Released in v22.10.1**

* Fixed issue with generation permissions where a chapter is in the recycle bin. ([commit](https://github.com/BookStackApp/BookStack/commit/ea6eacb400d23fa118677290fb5b262d88f91e12))

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://danb.me">Dan Brown</a>
  </span></span>