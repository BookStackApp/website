+++
title = "Commands"
description = "BookStack command-line actions"
date = "2017-02-26"
type = "admin-docs"
+++

BookStack has some command line actions that can help with maintenence and common operations. There are also many commands available from the undlying Laravel framework. To list all available commands you can simply run `php artian` from your BookStack install folder. Custom BookStack commands are all under the 'bookstack' namespace.

### BookStack Commands

Here's a listing of the BookStack specific commands:

```

# Delete all activity history from the system
php artisan bookstack:clear-activity

# Delete all page revisions from the system
php artisan bookstack:clear-revisions

# Delete all page revisions from the system including update drafts
php artisan bookstack:clear-revisions -a

# Delete all page views from the system
php artisan bookstack:clear-views

# Regenerate access permissions - Used mostly in development.
php artisan bookstack:regenerate-permissions

```
