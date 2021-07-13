+++
title = "Debugging Errors"
description = "How to find the cause of issues in BookStack"
date = "2017-01-01"
type = "admin-doc"
+++

This page details how you can find out more information about errors you may face and the resolutions to common problems we often see.

- [Showing Error Details](#showing-error-details)
- [Common Issues & Resolutions](#common-issues--resolutions)
    - [Blank White Screen on Access](#blank-white-screen-on-access)
    - [No Styles and Large Icons on Access](#no-styles-and-large-icons-on-access)
    - [Broken Links or No Images After APP_URL Change](#broken-links-or-no-images-after-app_url-change)
- [Submitting Issues](#submitting-issues)

### Showing Error Details

When using BookStack, especially when initially setting it up or after updating, you may come across some errors. While we try to reduce these as much as possible and make them helpful sometimes you may come across a bland, non-helpful 'An error has occurred' message. This is to prevent any potentially sensitive information being shown to all users.

_**NOTE: While debugging is enabled it's possible for users to be able to see private credentials used in the BookStack or server configuration. Ensure debugging is only enabled when your instance is not accessible by others. Remember to disable debugging before restoring user access.**_

To enable full error displaying edit the `.env` file, in the application root directory, and find the line `APP_DEBUG=false`. Change this to `APP_DEBUG=true` and the errors will be displayed in full with details of where it occurred. Remember to revert this change once you have found the issue so that the detailed error information is hidden from everyone.

On top of the above, An error log can be found at the path `storage/logs/laravel.log`. If the `laravel.log` file does not exist the `storage/logs` directory may not be writable by the server.

### Common Issues & Resolutions

The below lists some of the common issues we see, when it comes to installing & maintaining BookStack, and their usual resolutions.

##### Blank White Screen on Access

A completely blank screen, when attempting to access your BookStack instance, is commonly due to system/folder permission issues.
Check that webserver user has read/write access to the `bootstrap/cache`, `storage` and `public/uploads` folders within your BookStack install.
On a common Ubuntu install this can usually be done by running `sudo chown -R www-data:www-data bootstrap/cache storage public/uploads` from within the BookStack install folder.

If you don't believe this is due to permissions, and you have nothing in the `storage/logs/laravel.log` file as detailed above, you'd next want to look at your webserver error logs which can commonly be found within `/var/log/nginx/` or `/var/logs/apache2/`.

##### No Styles and Large Icons on Access

If the page loads, but shows large icons and appears broken, it generally means the system is generating incorrect paths to some required files
or those files do not exist.

- Check that the `APP_URL` option is set in your `.env` file and ensure it matches the URL you're accessing BookStack on (Including the "https://" or "http://" component).
- Check that you're using the `release` code branch. If you cloned the project without a branch flag, or downloaded the files from GitHub, you may be using the development branch files which does not include some of these required files.

##### Broken Links or No Images After APP_URL Change

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

### Submitting Issues

If you have found the cause of the issue, and it is not an issue with your particular setup, you can submit it on the [GitHub issues page](https://github.com/BookStackApp/BookStack/issues). Please include as much information as possible when creating an issue along with steps detailing how to replicate it so the bug can be fixed by a developer.
