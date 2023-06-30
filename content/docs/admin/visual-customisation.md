+++
title = "Customising Visuals"
description = "Changing the colors, logo and styles of BookStack to suit your needs"
date = "2017-08-22"
type = "admin-doc"
+++

You may want to customise BookStack to use custom branding, or you may just not like the default blue theme. Customising the branding of BookStack is super simple and can be done within the "Settings > Customization" area of the interface. Here you can change the application name, logo and the core colours used. Additional ways to customise are listed below:

{{<toc>}}

### Changing Fonts

To change fonts you can make use of the "Custom HTML Head Content" customization setting by adding custom CSS to alter fonts used.
Copy the code below into this setting and alter the font names to your desired fonts:

```html
<style>
  body {
    --font-body: 'Noto Serif', serif;
    --font-heading: 'Roboto', sans-serif;
    --font-code: 'Source Code Pro', monospace;
  }
</style>
```

Here's an example of using the 'Lato' font from [Google Web Fonts](https://fonts.google.com) as the main body text font:

```html
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<style>
  body {
    --font-body: 'Lato', sans-serif;
  }
</style>
```

Some additional notes to consider when setting custom fonts:

- Changes won't apply to the main `/settings` pages of BookStack, since custom HTML head content is not applied here.
- If a heading font is not set via `--font-heading`, then the `--font-body` value will be used as a fallback.
- This system simply makes use of normal [CSS variables](https://developer.mozilla.org/en-US/docs/Web/CSS/var), and the values are used for the standard [CSS font-family](https://developer.mozilla.org/en-US/docs/Web/CSS/font-family) property.
- These fonts won't apply to PDF exports, where font availability and usage is more limited.
- The font used for `--font-code`, if set, should be a monospace font.

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
