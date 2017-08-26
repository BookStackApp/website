+++
title = "Customising BookStack"
description = "Changing the colors, logo and styles of BookStack to suit your needs"
date = "2017-08-22"
type = "admin-docs"
+++

You may find you want to customise BookStack to use custom branding or you may just not like the default blue theme. Customising the branding of BookStack is super simple and can be done through the settings interface under 'App Settings'. Here you can change the application name, logo and primary color.
Changing the app name will simply update the name displayed in the header and browser tab.
Changing the logo updates the logo shown in the header. This can be removed if you only want to display the chosen name.
Changing the app color will update the color of the header, links and the majority of buttons within the system.

### Changing Fonts

To change fonts you can make use of the 'Custom HTML head content' setting to add some CSS to alter fonts used.
Copy the code below and alter the font names to your desired fonts. Then paste this into the 'Custom HTML head content' box
in the admin settings of BookStack.

```html
<style>
body, button, input, select, label, textarea {
  font-family: "Roboto", sans-serif;
}
.Codemirror, pre, #markdown-editor-input, .editor-toolbar, .code-base {
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
.Codemirror, pre, #markdown-editor-input, .editor-toolbar, .code-base {
  font-family: monospace;
}
</style>
```

Note that this won't change anything in the settings screen for stability purposes.

### Further Customisation

If you need to customise BookStack further to the given controls in the settings area you can make use of the 'Custom HTML head content' setting. Using this you can add in any custom JavaScript or CSS content to override default BookStack functionality and styles.

Further customisation options have been requested and are planned in the future once the core features of BookStack have matured.
