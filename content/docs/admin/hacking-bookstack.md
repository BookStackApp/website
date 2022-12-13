+++
title = "Hacking BookStack"
description = "Performing deeper customisation & extending the platform to suit your needs"
date = "2020-02-02"
type = "admin-doc"
+++

Sometimes you may want to perform deeper customisation to BookStack or extend the system to suit your use-case. The core of BookStack is fairly rigid as it's intended to be a configured, ready-to-use system out of the box but there are a few advanced options for performing more advanced modifications without needing to alter the system code-base.

_**Note: Customisation options on this page are not deemed to be stable or officially supported. BookStack core files may change on any release causing changes in behaviour to your hacks.**_

{{<toc>}}

---


### BookStack API

BookStack has a built-in REST API for external interaction and consumption of your BookStack data. API documentation can be found within your BookStack instance at the `/api/docs` URL path. You'll need to have the 'Access system API' role permission to access the API.

**Reference Links**

- [API documentation of our demo instance](https://demo.bookstackapp.com/api/docs).
- [Our "BookStack API Scripts" repo containing examples](https://github.com/BookStackApp/api-scripts).

---

### Custom HTML Head Option

Within the settings area you'll find a 'Custom HTML head content' setting. You can use this to add in any custom JavaScript or CSS content which enables you to override default BookStack functionality and styles.


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

---

### BookStack Editor Events

For the core underlying libraries, used in the BookStack page editors, we emit some custom events as part of their lifecycle.
You can listen for these events to hook in and alter their configs or to gain a reference to the underlying editor instance.
The below code sample shows the events available; Log out the `detail` property of events, as per the below example, to understand what is passed with the events:

```html
<script>
	// TinyMCE WYSIWYG editor events
	window.addEventListener('editor-tinymce::pre-init', event => console.log('TINYMCE-PRE_INIT', event.detail));
	window.addEventListener('editor-tinymce::setup', event => console.log('TINYMCE-SETUP', event.detail));

	// CodeMirror / Markdown-it Markdown editor events
	window.addEventListener('editor-markdown-cm::pre-init', event => console.log('MARKDOWN-CODEMIRROR-PRE_INIT', event.detail));
	window.addEventListener('editor-markdown::setup', event => console.log('MARKDOWN-EDITOR-SETUP', event.detail));

	// Diagrams.net configure event
	// Reference: https://www.diagrams.net/doc/faq/configure-diagram-editor
	// If using a custom diagrams.net instance, via the `DRAWIO` option, you will need to ensure
	// this your URL has the `configure=1` query parameter.
	window.addEventListener('editor-drawio::configure', event => console.log('DIAGRAMS.NET-CONFIGURE', event.detail));
</script>
```

---

### Tag Classes

While primarily for categorization, tags within BookStack can also provide opportunities for customization.
When viewing an item with tags applied, those tags will be normalized to CSS classes and applied to the `<body>` element of the page. As an example, a tag name/value pair of `Priority: Critical` will apply the following classes to the body:

- tag-name-priority
- tag-value-critical
- tag-pair-priority-critical

For the normalization to classes, the following is done to both the name and value of the tag:

- Text is lower-cased
- Spaces and hyphens are stripped

This normalization provides relatively stable class naming for CSS targeting, but note it does mean that two tags, of different values, could be normalized to the same CSS class names in some scenarios.

As an example of usage, pages with the tag `Priority: Critical` could have their text made red with the following "Custom HTML Head Content" setting value:

```html
<style>
.tag-pair-priority-critical .page-content { color: red; }
</style>
```