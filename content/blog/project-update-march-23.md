+++
categories = ["News"]
tags = ["News"]
title = "BookStack Project Update for March 2023"
image = "/images/blog-cover-images/flowers-tim-gouw.jpg"
author = "Dan Brown"
slug = "project-update-march-23"
draft = false
date = 2023-03-31T08:00:00Z
+++

There's no new feature release for BookStack this month, due to various distractions
and the type of work done in this release cycle, so I thought it'd be good to instead provide
a general project update to highlight what has happened in the last month or so.

{{<toc>}}

### Patch Release

Within the last week I published [BookStack v23.02.2](https://github.com/BookStackApp/BookStack/releases/tag/v23.02.2).
Since we're still a little far from a feature release, I thought it'd be worthwhile to package up a patch release
just to address a couple of user-management bugs and to merge in the latest translations.

### New Hacks

A bunch of new hacks have been added to the site.
If you're unfamiliar with this part of the site you can find out more [in my blogpost here](/blog/hacks-on-the-site/).
The newly added hacks are as follows:

- [Render TeX/LaTeX Mathematics with MathJax](/hacks/mathjax-tex/) - *Provided by @codemicro.*
- [IFrame Specific Tweaks](/hacks/iframe-specific-tweaks/) - *Provided by @vincent.*
- [Custom WYSIWYG Editor Buttons](/hacks/wysiwyg-custom-buttons/)
- [Page Export Contents List](/hacks/page-export-contents/)

### New API Script

While assisting a user on Discord, with using PowerShell to call the BookStack API, I ended up
creating a new REST API example script in the repo:

[PowerShell - Create BookStack Pages from HTML Files](https://github.com/BookStackApp/api-scripts/tree/main/powershell-files-to-pages)

I don't really know PowerShell, and I've never gotten on with Microsoft's documentation, but this was my first case
of finding ChatGPT very useful to at least provide tailored examples to work from until I got something working.

### Noted Interview

This month I did something a bit different & outside my comfort zone, by being interviewed
by Jeremy at Noted about BookStack.

[You can find the full interview here](https://noted.lol/dev-debrief-bookstack/).

The interview delves into the origin of the BookStack while also touching on the challenges
experienced maintaining the platform over the last 7 or so years.

### Development & CodeMirror 6

For the next release, so far my focus has primarily been on filling in gaps within the API as planned,
with code now in the main branch to add image and content-permissions API endpoints.

I've also continued to chip away at updating [CodeMirror](https://codemirror.net/) from CodeMirror 5 to CodeMirror 6.
CodeMirror is used for a lot of views within BookStack including code-blocks within content and the markdown editor input.
The jump in version is quite a significant change, and something [I started back in August](https://github.com/BookStackApp/BookStack/pull/3617)
but came across blockers with. During this month, I've looked to address the lack of default support in CodeMirror 6 for a couple of
languages we currently support. I've published my resultant work as external stand-alone open source NPM packages
in the event they're useful to other projects that require the same:

- [@ssddanbrown/codemirror-lang-smarty](https://www.npmjs.com/package/@ssddanbrown/codemirror-lang-smarty)
- [@ssddanbrown/codemirror-lang-twig](https://www.npmjs.com/package/@ssddanbrown/codemirror-lang-twig)

### First Repeat Support Subscriber

It's now been a full year since I set-up & [launched the BookStack support services](/blog/bookstack-support-services/).
Since these are annual-subscription-based we're now coming across the first renewals,
and I'm pleased to say we've seen our first successful renewal! This may seem minor but it's
quite significant to me in the interest of these support services "building up momentum"
across years to help cover my living costs to become sustainable.

If you're interested in how these have helped finances so far, I provided
a fair bit of information within the ["BookStack in 2022" post](/blog/bookstack-in-2022/#project-funding--support-services).

### Video: Installing BookStack on OpenBSD Assisted by ChatGPT

I've been wanting to expand my knowledge in the world of BSD operating systems
so, as a fun introduction, I decided I'd try to install BookStack on OpenBSD and
record the process. In addition, I thought it'd be fun to only have ChatGPT as my
external reference during the process:

{{<yt Qs2c20DpgbI>}}

Although this ended up with having almost 2 hours of video to edit down, I quite
enjoyed the process of discovery in addition to further learning the benefits and
weaknesses in using a tool like ChatGPT, especially in more niche subject areas.

---

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <span>Photo by <a href="https://www.pexels.com/@punttim/">Tim Gouw</a></span></span>