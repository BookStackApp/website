+++
title = "Autosort Tagged Books"
author = "@ssddanbrown"
date = 2023-01-23T20:00:00Z
updated = 2023-01-23T20:00:00Z
tested = "v22.11.1"
+++


This is a hack to BookStack to enable auto-sorting of book chapters and pages upon page or chapter create/update. It sorts by name, ascending, with chapters first. By default it will run for any book with an `Autosort` tag assigned.

#### Options

Customize the tag name, if desired, by tweaking the string at around line 45. Set this to empty to run for all books.

#### Code

{{<hack file="functions.php" type="logical">}}
