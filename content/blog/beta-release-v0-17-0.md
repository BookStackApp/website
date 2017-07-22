+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Release v0.17.0"
date = 2017-07-02T21:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/code-markus-spiske.jpg"
description = "BookStack v0.17 released with updated with better code editing and more"
slug = "beta-release-v0-17-0"
draft = false
+++

After a few quiet months I'm happy to announce BookStack v0.17 is now ready for release. This release focuses mainly on the code editing experience throughout BookStack. Here are the handy quick-links:

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.17.0)

 Also, We're back into July which means BookStack is now almost two years old. It's worth checking out [this post from last year](/blog/1-year-of-bookstack/) to see how BookStack originally evolved if you're new to the project.

If you didn't catch the last couple of bug fix releases ensure you [read about them here](/blog/beta-bugfix-release-v0-16-3/) as there were some crucial permission issues that might require some additional steps if you recently changed role permissions.

### Code Content Updates

Due to its nature of being a niche self-hosted platform there are a lot of folks that store code in BookStack. I am one of those folks and the previous code editing experience has always been frustrating in my experience since any code pasted would always be formatted incorrectly then when editing you could never indent or move the content without issue. For this update I wanted to revamp all code displays to a level that's enjoyable to use. To acheive this we have used [codemirror](http://codemirror.net/), The editor in brackets and many other projects, throughout BookStack. Here is what's changed:

#### Code Display in Pages

To start, The display of code has been updated on pages. A base-16 light color scheme is now used and line numbers are now shown.
Copying from these blocks of code is nice and simple and you won't end up copying the line numbers like some code displays.

![Page code display](/images/2017/07/page-code-display.png)

#### Editing Code in the WYSIWYG Editor

The code editing system in the WYSIWYG editor has been drastically changed. Code blocks can be inserted via the format menu as before but now a new popup window will display:

<video src="/images/2017/07/bookstack-code-edit.mp4" controls/>

This window allows you to enter your code and specify the language. Previously the coding language would attempt to be auto-detected on pages but this was a bit 'hit-and-miss'
and resulted in less specific syntax highlighting. Unfortunately, This change does mean any previous code blocks inserted in the WYSIWYG editor will not be syntax highlighted until
edited. Fortunately, This change means that code will be highlighted as you edit the code, or the page content, so you can see the syntax highlighting without having to save.

Once you have a code block in a page it cannot be edited directly. To edit a code block you simply need to double-click it and the popup will re-appear.
By not being directly editable it makes moving and working around code blocks much easier and prevents strange behaviour in the editor.

The fact that the editor is now a codemirror instance means that code input is a much better experience. Formatting will retain on paste and tabbing content in & out can now be done without having to manually insert spaces.

#### Markdown Editor Revamp

Previously the markdown editor was simply a HTML textarea input. This has been converted into proper text editor instance with markdown highlighting:

![Markdown Editor](/images/2017/07/markdown-editor-codemirror.png)

This makes it much nicer to edit markdown content as the highlighting provides instant visual feedback as you type.
Additionally the code editor provides better tabbing support along with line numbers. The scroll syncing between
the editor and preview has now been improved to be smarter and content-based rather than based on a linear scale so there's a better chance
of them staying in sync.

This change opens up things that can be done in the future. For example, Keyboard shortcuts for markdown formats was previously difficult to implement but
now it should be much easier due to the features and nice API codemirror provides so they should be implemented soon.

### Database Changes 🖥️🤷🐅

An issue recently appeared regarding emoji in BookStack pages. It appeared the previous default charset and collation used for
MySQL ('utf8') has issues supporting emoji and some other characters. The defaults in BookStack have now been changed (To 'utf8mb4')
which provides emoji support. ~~On migration, The database and all tables within will be converted. This means that migrations
could take some time this update (Should still be in the range of 5 seconds though) depending on database size.~~

**22nd July Update**
<p style="color:tomato;font-weight:bold;">As of BookStack v0.17.2 the database conversion has been made manually with an assistive command due to issues upon upgrade. Details on [performing this change can be found here](/docs/admin/ut8mb4-support/).</p>

### Language Updates 🇯🇵

Thanks to the [wonderful S64](https://github.com/BookStackApp/BookStack/pull/422) I'm happy to say BookStack now contains Japanese translations!
Another massive thanks to all those that translate or edit language text. I didn't expect this level of community assistance and it makes me really
happy every time I see someone contribute new text.

### Full List of Changes

* Code display/edit changes: (Fixes [#382](https://github.com/BookStackApp/BookStack/issues/382), [#346](https://github.com/BookStackApp/BookStack/issues/346), [#296](https://github.com/BookStackApp/BookStack/issues/296))
  * Highlight.js replaced with codemirror instances.
  * Custom code block system built for TinyMCE editor.
  * Markdown editor revamped with codemirror instance.
* Japanese language support added (Thanks to [@S64](https://github.com/BookStackApp/BookStack/pull/422)).
* Database charset changed from `utf8` to `utf8mb4` to support emoji. ([#405](https://github.com/BookStackApp/BookStack/issues/405))
* Tests added to cover previous permission bug. ([#409](https://github.com/BookStackApp/BookStack/issues/409))
* Empty state actions ('Create new page', 'Create Chapter') in books will now hide for users without permission. ([#411](https://github.com/BookStackApp/BookStack/issues/411))
* Fixed some inconsistent padding in the subheader toolbar.


### Next Steps

The excellent [Abijeet has been working](https://github.com/BookStackApp/BookStack/pull/261) on a commenting system for BookStack.
The next release will be focused on merging this work into BookStack.

I hope to do more maintenance work soon as well. Both AngularJS and Vue are currently used in BookStack. Over the next months I'd like to
move over all angular code so that everything is on Vue again. I've been experimenting with various Vue setups with the current laravel/blade
codebase we have and I'm now confident about moving forward with removing angular.

One issue I'd like to have some feedback on is regarding fonts. I am thinking about using system fonts instead of Roboto which is currently in use.
Feel free to read my thoughts and provide your comments [on the issue here](https://github.com/BookStackApp/BookStack/issues/423).


----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@markusspiske" target="_blank">Markus Spiske</a></span>
