+++
title = "Filesystem Permissions"
description = "The file and folder permissions required by BookStack"
date = "2023-02-27"
type = "admin-doc"
+++

BookStack requires the ability to write and read files for various uses such as writing
logs, handling file uploads and running application code.
Ideally, files permissions should be limited to just what's required to reduce the chance
of potential vulnerability exploit.

By default, BookStack requires the following permissions:

- Read access to the BookStack install folder and everything within.
- Write permission to the following folders, relative to the BookStack installation directory, and everything within:
  - `storage/`
  - `bootstrap/cache`
  - `public/uploads`

**Note:** This access is likely controlled by the user/group of the PHP and/or web-server processes. 

Additionally, you may want to ensure read access the `.env` file is limited as much as possible, to just PHP/web-server process and any trusted users that may need to update it, since this file can often contain credentials and keys.

### Example Permissions Approach

This section provides an approach for setting permissions for your BookStack instance, which allows updating by the login user while providing the web-server with the required permissions.

The below makes the following assumptions, **you will need to change these parts** of the commands to make it work for you:

- Your normal login user (That you may run updates with) is called `barry`.
- Your BookStack install folder is located at `/var/www/bookstack`.
- Your web-server/php user is called `www-data` (Default on Ubuntu systems).

Lines starting with `#` are comments.

```bash
# Set the bookstack folders and files to be owned by the user barry and have the group www-data
sudo chown -R barry:www-data /var/www/bookstack

# Set all bookstack files and folders to be readable, writable & executable by the user (barry) and
# readable & executable by the group and everyone else
sudo chmod -R 755 /var/www/bookstack

# For the listed directories, grant the group (www-data) write-access
sudo chmod -R 775 /var/www/bookstack/storage /var/www/bookstack/bootstrap/cache /var/www/bookstack/public/uploads

# Limit the .env file to only be readable by the user and group, and only writable by the user.
sudo chmod 640 /var/www/bookstack/.env
```

### SELinux

SELinux, commonly found on RHEL-based systems, can be a factor for filesystem access in some cases.
You can often check if SELinux is blocking file access by watching the relevant log while reproducing an action in BookStack
which causes an error to occur, via something like the following (Ctrl+C to stop watching):

```bash
sudo tail -f /var/log/audit/audit.log
```

Alternatively you could temporarily disable SELinux to check if any issues are resolved with SELinux inactive.
If SELinux appears to be the problem, you may additionally need to add a type label to your install files.
The below commands show an example of applying SElinux labels on a BookStack installation.

The below makes the following assumptions, **you will need to change these parts** of the commands to make it work for you:

- Your BookStack install folder is located at `/var/www/bookstack`.
- Your web-server uses the `httpd_sys_content_t` for readonly files and `httpd_sys_rw_content_t` for read-write files.

Lines starting with `#` are comments.

```bash
# Set the httpd_sys_content_t type on all bookstack files
semanage fcontext -a -t httpd_sys_content_t    '/var/www/bookstack(/.*)?'

# Set the httpd_sys_rw_content_t type on all directories that will need need read-write access
semanage fcontext -a -t httpd_sys_rw_content_t '/var/www/bookstack/storage(/.*)?'
semanage fcontext -a -t httpd_sys_rw_content_t '/var/www/bookstack/bootstrap/cache(/.*)?'
semanage fcontext -a -t httpd_sys_rw_content_t '/var/www/bookstack/public/uploads(/.*)?'

# Apply the changes
restorecon -R /var/www/bookstack
```
