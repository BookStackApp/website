+++
title = "Hacking BookStack"
description = "Performing deeper customisation & extending the platform to suit your needs"
date = "2020-02-02"
type = "admin-doc"
+++

Sometimes you may want to perform deeper customisation to BookStack or extend the system to suit your use-case. The core of BookStack is fairly rigid as it's intended to be a configured, ready-to-use system out of the box but there are a few advanced options for performing more advanced modifications without needing to alter the system code-base.

_**Note: Customisation options on this page are not deemed to be stable or officially supported. BookStack core files may change on any release causing changes in behaviour to your hacks.**_

---


### BookStack API

BookStack has a built-in REST API for external interaction and consumption of your BookStack data. API documentation can be found within your BookStack instance at the `/api/docs` URL path. You'll need to have the 'Access system API' role permission to access the API.

For quick reference of the current API abilities, you can [view the API documentation of our demo instance](https://demo.bookstackapp.com/api/docs).

---

### Custom HTML Head Option

Within the settings area you'll find a 'Custom HTML head content' setting. You can use this to add in any custom JavaScript or CSS content which enables you to override default BookStack functionality and styles.

---

### BookStack Editor Events

Both the TinyMCE based WYSIWYG editor and the CodeMirror based Markdown editor emit events as part of their lifecycle. You can listen for these hook in and alter their configs or to gain a reference to the underlying editor instance. The below code sample shows the events available; Log out the `detail` property of events, as per the below example, to understand what is passed with the events:

```html
<script>
	// TinyMCE WYSIWYG editor events
	window.addEventListener('editor-tinymce::pre-init', event => console.log('TINYMCE-PRE_INIT', event.detail));
	window.addEventListener('editor-tinymce::setup', event => console.log('TINYMCE-SETUP', event.detail));

	// CodeMirror / Markdown-it Markdown editor events
	window.addEventListener('editor-markdown-cm::pre-init', event => console.log('MARKDOWN-CODEMIRROR-PRE_INIT', event.detail));
	window.addEventListener('editor-markdown::setup', event => console.log('MARKDOWN-EDITOR-SETUP', event.detail));
</script>
```

---

### Visual Theme System

BookStack allows visual customization via the theme system which enables you to extensively customize views, translation text & icons.
Documentation for this system is contained within [the project repo here](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/visual-theme-system.md).

_**Note: The files that can be override using the theme system are not deemed to be stable. BookStack core files may change on any release causing changes in behaviour to your overrides. Theme overrides are not officially supported in any way.**_


---

### Logical Theme System

BookStack allows PHP code-based extension via what we call the "Logical Theme System". 
This works by hooking into specific events where you can then perform custom actions or extension of the underlying framework.
Documentation for this system is contained within [the project repo here](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md).

_**Note: Only the API described in the logical-theme-system document is considered stable & supported. Any usage of other application classes is regarded as unstable and unsupported.**_