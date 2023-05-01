+++
title = "Customising Visuals"
description = "Changing the colors, logo and styles of BookStack to suit your needs"
date = "2017-08-22"
type = "admin-doc"
+++

You may want to customise BookStack to use custom branding, or you may just not like the default blue theme. Customising the branding of BookStack is super simple and can be done within the "Settings > Customization" area of the interface. Here you can change the application name, logo and the core colours used. Additional ways to customise are listed below:

{{<toc>}}

### Changing Fonts

To change fonts you can make use of the 'Custom HTML head content' setting to add some CSS to alter fonts used.
Copy the code below and alter the font names to your desired fonts. Then paste this into the 'Custom HTML head content' box
in the admin settings of BookStack.

```html
<style>
body, button, input, select, label, textarea {
  font-family: "Roboto", sans-serif;
}
.CodeMirror, pre, #markdown-editor-input, .editor-toolbar, .code-base {
  font-family: monospace;
}
</style>
```

Here's an example of using the 'Lato' font from [Google Web Fonts](https://fonts.google.com):

```html
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<style>
body, button, input, select, label, textarea {
  font-family: 'Lato', sans-serif;
}
.CodeMirror, pre, #markdown-editor-input, .editor-toolbar, .code-base {
  font-family: monospace;
}
</style>
```

Note that this won't change anything while viewing the settings screen, for stability purposes.

### Changing Code Block Themes

When inserting code into a page, or when using the Markdown editor, the text you enter is highlighted by the [CodeMirror library](https://codemirror.net/).
For those that'd prefer a different colour scheme for code blocks, we do provide a custom `library-cm6::configure-theme` JavaScript event 
which provides a couple of methods that allow registration of CodeMirror UI and syntax highlighting themes.

You can find more information, along with an example, in our [JavaScript public events documentation here](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/javascript-public-events.md#library-cm6configure-theme).

### Default Light/Dark Mode

By default, BookStack will be presented in "light mode". Users can toggle their light/dark mode preference
using one of the buttons either found on the homepage view, or within the header bar user dropdown menu.

If you'd instead like your instance to be presented in "dark mode" by default, you can add the following option to your `.env` file:

```bash
# Use dark mode by default
# Will be overridden by any existing user/session preference.
APP_DEFAULT_DARK_MODE=true
```

### Default Book View

By default the `/books` page displays your books as a list. Users can change this option to list or grid view but if you'd like to set the default for public viewers or new users you can add the following to your `.env` file:

```bash
# Show grid view by default
APP_VIEWS_BOOKS=grid

# Show list view by default
APP_VIEWS_BOOKS=list
```

### Further Customisation

If you need to customise BookStack further to the given controls in the settings area you can make use of the 'Custom HTML head content' setting. Using this you can add in any custom JavaScript or CSS content to override default BookStack functionality and styles.

[View the Hacking BookStack](/docs/admin/hacking-bookstack/) page for more advanced ways to achieve deeper customisation.
