+++
title = "Debugging Errors"
description = "How to find the cause of issues in BookStack"
date = "2017-01-01"
type = "admin-doc"
+++

When using BookStack, Especially when initially setting it up or after updating, you may come across some errors. While we try to reduce these as much as possible and make them helpful sometimes you may come across a bland, non-helpful 'An error has occurred' message. This is to prevent any potentially sensitive information being shown to all users.

_**NOTE: While debugging is enabled it's possible for users to be able to see private credentials used in the BookStack or server configuration. Ensure debugging is only enabled when your instance is not accessible by others. Remember to disable debugging before restoring user access.**_

To enable full error displaying edit the `.env` file, in the application root directory, and find the line `APP_DEBUG=false`. Change this to `APP_DEBUG=true` and the errors will be displayed in full with details of where it occurred. Remember to revert this change once you have found the issue so that the detailed error information is hidden from everyone.

On top of the above, An error log can be found at the path `storage/logs/laravel.log`. If the `laravel.log` file does not exist the `storage/logs` directory may not be writable by the server.

### Submitting Issues

If you have found the cause of the issue and it is not an issue with your particular setup you can submit it on the [GitHub issues page](https://github.com/BookStackApp/BookStack/issues). Please include as much information as possible when creating an issue with steps with how to replicate it so the bug can be fixed by a developer.
