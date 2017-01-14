+++
title = "Changing Upload Limits"
description = "How to increase uploads limits for images and attachments"
date = "2017-01-01"
type = "admin-docs"
+++

BookStack allows users to upload both images for content and files as attachments. By default, a lot of server software has strict limits on upload sizes which causes errors when users upload new content. This is not configured as part of BookStack but as part of PHP and your web sever software. If you run into problems with upload size limits follow the below details for PHP and whichever web server you use:

---

### PHP

PHP has two main variables which effect upload limits. Find your `php.ini` file and look for the following variables:

* `post_max_size`
* `upload_max_filesize`

If the values of these variables are low increase them to something sensible that's not too high to cause issues. Unless you need something higher 10MB is a sensible value to enter for these values:

```
post_max_size = 10M
upload_max_filesize = 10M
```

After updating these values ensure you restart your webserver and also PHP if using PHP-FPM or something similar.

---

### NGINX

By default NGINX has a limit of 1MB on file uploads. To change this you will need to set the `client_max_body_size` variable. You can do this either in the http block in your `nginx.conf` file or in the server block set up for BookStack. Here's an example of increasing the limit it 10MB in the http block:

```
http {
	#...
        client_max_body_size 100m;
        client_body_timeout 120s; # Default is 60, May need to be increased for very large uploads
	#...
}
```

As per the example above, If you are expecting upload very large files where upload times will exceed 60 seconds you will also need to add the `client_body_timeout` variable with a large value.

After updating you NGINX configuration don't forget to restart NGINX. You can test the configuration beforehand with `nginx -t`.

---

### Apache

Apache does not have any built-in limits which you will need to change but something to note is that if you are using apache and mod_php with `.htaccess` files enabled you may be able to set the above PHP variables in your `.htaccess` file like so:

```
php_value upload_max_filesize 10M
php_value post_max_size 10M
```