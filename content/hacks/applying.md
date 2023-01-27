+++
title = "Applying Hacks"
+++


The hacks provided on this part of the site generally fall into one of three types:

- [Head HTML](#head-html)
- [Visual Theme System](#visual-theme-system)
- [Logical Theme System](#logical-theme-system)

Some hacks may use a combination of these types.
The type of hack required will be shown alongside any example code blocks.
Detailed below are the steps required to use each type of hack.

---

### Head HTML

Head HTML can simply be placed into the "Custom HTML Head Content" customization
setting that's found within the BookStack interface. 
Just copy and paste the code into that setting box then press the save button below.
Keep in mind that any code added won't be applied to when on the customization settings page. This is to ensure you can access the page to remove code in the event of an issue.

If there's already code in the "Custom HTML Head Content" customization
setting box, you can usually create a new line and add your code below.

---

### Visual Theme System

The visual theme system is used to override and add templates, text and icons within BookStack.
Use of the visual theme system requires access to the BookStack host system to edit and create files.
Ideally you'd have some PHP & HTML knowledge to be able to maintain and customize your hacks as required.

- [Getting Started Video](https://www.youtube.com/watch?v=gLy_2GBse48)
- [Developer Info](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/visual-theme-system.md)

To use this you'll first need to follow the [Theme Folder Setup](#theme-folder-setup) section below to have an active theme folder at the ready.

For any visual theme files you need to apply, simply create them relative to your theme folder path. For example, if the hack I need to apply is labelled `common/parts/header.blade.php`, and my theme folder is at `themes/custom` within my BookStack instance, I'd create the directory `common` within my theme folder, then create a `parts` directory within that, then copy the code into a `header.blade.php` file within that. 

In the event you already have a file at the required theme folder path, things become a little tricky since as the files would need to be carefully merged, ideally by a developer familiar with the code and languages in use.

---

### Logical Theme System

The logical theme system is used to extend BookStack system functionality.
Use of the logical theme system requires access to the BookStack host system to edit and create files.
Ideally you'd have some PHP knowledge to be able to maintain and customize your hacks as required.

- [Getting Started Video](https://www.youtube.com/watch?v=YVbpm_35crQ)
- [Developer Info](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md)

To use this you'll first need to follow the [Theme Folder Setup](#theme-folder-setup) section below to have an active theme folder at the ready.

Most logical theme hacks will make use of a `functions.php` file. 
This simple represents a `functions.php` that needs to exist directly within 
your theme folder. 

For other files you need to apply, simply create them relative to your theme folder path. For example, if the hack I need to apply is labelled `includes/spanner.php`, and my theme folder is at `themes/custom` within my BookStack instance, I'd create the directory `includes` within my theme folder, then copy the code into a `spanner.php` file within that. 

In the event you already have a file at the required theme folder path, things become a little tricky since as the files would need to be carefully merged, ideally by a developer familiar with the code and languages in use.

---

### Theme Folder Setup

A theme folder needs to be set-up when using either the logical or visual theme system. To achieve this, create a folder for your theme within your BookStack themes directory. As an example we'll use `custom` as our theme name, so we'd create a `themes/custom` folder. You then need to tell BookStack to use your theme via the `APP_THEME` option in your .env file. For example: `APP_THEME=my_theme`.

And that's it set-up! You now have a theme folder ready to be used.