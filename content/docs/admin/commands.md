+++
title = "Commands"
description = "BookStack command-line actions"
date = "2017-02-26"
type = "admin-doc"
+++

BookStack has some command line actions that can help with maintenance and common operations. There are also many commands available from the underlying Laravel framework. To list all available commands you can simply run `php artisan` from your BookStack install folder. Custom BookStack commands are all under the 'bookstack' namespace.

## BookStack Commands

Below is a listing of the BookStack specific commands. For any you can provide a `-h` option to list details and options for the command.

#### Create an Admin User

Create a new admin user via the command line. Can offer a good last resort if you ever get locked out the system.
Will use the details provided as options otherwise will request them interactively.

```bash
# Interactive usage
php artisan bookstack:create-admin

# Non-interactive usage example
php artisan bookstack:create-admin --email="barry@example.com" --name="Bazza" --password="hunter2"
```

#### Copy Shelf Permission

By default shelf permissions will not auto-cascade since a book can be in many shelves.
This command will copy the permissions of a shelf to all child books.
This can be done for a single shelf or for all shelves in the system:

```bash
# Run for all shelves
php artisan bookstack:copy-shelf-permissions --all

# Run for a single shelf
php artisan bookstack:copy-shelf-permissions --slug=my_shelf_slug
```

#### Update System URL

BookStack will store absolute URL paths for some content, such as images, in the database.
If you change your base URL for BookStack this can be problematic.
This command will essentially run a find & replace operation on all relevant tables in the database.
Be sure to take a database backup for running this command.

```bash
# Searches for <oldUrl> and replaces it with <newUrl>
php artisan bookstack:update-url <oldUrl> <newUrl>

# Example:
php artisan bookstack:update-url http://docs.example.com https://demo.bookstackapp.com
```

#### Delete All Activity History

This will clear all tracked activities in the system. Note: Some areas of the interface rely on this data, including the Audit Log and any "Recent Activity" lists.

```bash
php artisan bookstack:clear-activity
```

#### Delete Page Revisions

By default this deletes all page revisions apart from page update drafts which share the same system.
A `-a` flag can be used to also delete these update drafts.

```bash
# Delete just the page revisions
php artisan bookstack:clear-revisions

# Delete all page revisions from the system including update drafts
php artisan bookstack:clear-revisions -a
```

#### Delete Page Views

Delete tracked content views from the system. These are primarily used to populate any "Recently Used" lists.

```bash
php artisan bookstack:clear-views
```

#### Cleanup Unused Images

Searches and removes images that are not used in page content.
While this can be done in the "Maintenance" section of the interface, running this via the command-line is often safer to avoid timeouts.

```bash
php artisan bookstack:cleanup-images
```

#### Regenerate the Search Index

This can be useful if manually inserting pages into the system.

```bash
php artisan bookstack:regenerate-search
```

#### Regenerate Access Permissions

This is primarily used in development but can be useful if manually adding content via the database.

```bash
php artisan bookstack:regenerate-permissions
```

#### Regenerate Comment Content

Comments are created and stored in Markdown but also rendered to HTML on save.
This command will regenerate the stored HTML content for all comments using the original Markdown content.

```bash
php artisan bookstack:regenerate-comment-content
```

#### Delete Users

Delete all users from the system that are not original "admin" or system-level users.

```bash
php artisan bookstack:delete-users
```

#### Generate UTF8mb4 SQL Upgrade Commands

Generates out the SQL which can be used to upgrade the database to UTF8mb4.
See [UTF8mb4/Emoji Support](/docs/admin/ut8mb4-support/) for further details.

```bash
php artisan bookstack:db-utf8mb4
```