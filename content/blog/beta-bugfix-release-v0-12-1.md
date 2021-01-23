+++
author = "Dan Brown"
draft = false
title = "Beta Bugfix Release v0.12.1"
date = 2016-09-06T20:25:06Z
categories = ["Releases"]
tags = ["Releases"]
image = "/images/2016/09/blog_bg_bugfix_samuel_myles.jpg"
description = ""
slug = "beta-bugfix-release-v0-12-1"

+++

A new bugfix has been released to patch up a few issues found in v0.12.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.12.1)

It was found that I had accidentally set two shortcuts on the same keys, The draft quick save and inline-code format were both mapped to `ctrl+s`. This has now been updated so that inline code is mapped to `Ctrl+Shift+E`. Also, as part of this bugfix the WYSIWYG editor shortcuts on mac will use the command key instead of the ctrl key to better fit with other Mac shortcuts.

The WYSIWYG editor (TinyMCE) library has been updated to cover a range of bugs fixed in the 6 months since the the library was last updated in BookStack.

Tables have been updated to prevent words being sliced across lines in FireFox and IE. The structure of tables has also been changed to 'fixed' to allow more control while editing and to make them a bit more predictable. Also, Excess spacing has been removed from tables.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@samdasherx13" target="_blank">Samuel Myles</a></span>
