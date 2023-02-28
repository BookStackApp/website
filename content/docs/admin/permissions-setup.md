+++
title = "Bookstack Permissions Setup"
description = "How to setup permissions to your Bookstack instance"
date = "2023-02-27"
type = "admin-doc"
+++

## BookStack Permission Setup

This document provides an approach for setting permissions for your BookStack instance, which allows updating by the login user while providing the webserver with the required permissions.

The below makes the following assumptions, **you will need to change these parts** of the command to make it work for you:

- Your normal login user (That you may run updates with) is called `barry`.
- Your bookstack folder is located at `/var/www/bookstack`.
- Your webserver/php user called `www-data` (Default on Ubuntu systems).

Lines starting with `#` are comments.

```bash
# Set the bookstack folders and files to be owned by the user barry and have the group www-data
sudo chown -R barry:www-data /var/www/bookstack

# Set all bookstack files and folders to be readable, writeable & executable by the user (barry) and
# readable & executable by the group and everyone else
sudo chmod -R 755 /var/www/bookstack

# For the listed directories, grant the group (www-data) write-access
sudo chmod -R 775 /var/www/bookstack/storage /var/www/bookstack/bootstrap/cache /var/www/bookstack/public/uploads

# Limit the .env file to only be readable by the user and group, and only writable by the user.
sudo chmod -R 640 /var/www/bookstack/.env
```
