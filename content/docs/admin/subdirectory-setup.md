+++
title = "Subdirectory Setup"
description = "How to setup BookStack in a subdirectory"
date = "2018-10-04"
type = "admin-doc"
+++

You may want to host BookStack on a "Subdirectory" of your website, For example `https://example.com/bookstack`. To achieve this you will need to make some alterations to your webserver config. The details for setting this up on Apache or Nginx can be found below. You'll need to follow the BookStack setup section after configuring any webserver.

If you are using Docker you will likely need to look into setting up reverse proxies instead of following the below.

- [BookStack Setup](#bookstack-setup)
- [Apache Setup](#apache-setup)
- [Nginx Setup](#nginx-setup)

---

### BookStack Setup

Within your `.env` file ensure you set the `APP_URL` parameter. This should be the base URL for your BookStack instance without a trailing slash. For example:

```bash
APP_URL=https://example.com/bookstack
```

---

### Apache Setup

Before following this, ensure you have apache installed along with PHP & ensure mod-php is enabled. This guide assumes a recent Ubuntu-like system is in use. To set-up the required rules, you will need to have mod-rewrite enabled:

```bash
sudo a2enmod rewrite
``` 

First, You will need to choose a folder to install BookStack into. This should be a separate directory from where your main website is being served from since you don't want to risk exposing any of the private BookStack files.
By default Apache on Ubuntu serves from the `/var/www/html` directory. In this example, we'll use `/var/www/bookstack` to store our BookStack install. If you use a different path ensure you change that path in the below steps.
Create this directory and follow the standard [BookStack install steps](/docs/admin/installation) to install BookStack into this folder. Once complete, following our example directory above, you should end up with a `.env` file in the `/var/www/bookstack` folder.

The next step is to alter your Apache configuration to serve any requests to your sub-path from our chosen folder. To do this you'll need to find and edit the Apache virtual-host config for your website. By default, this is often found at `/etc/apache2/sites-available/000-default.conf`. To edit this file you'll likely have to open it with admin permissions (using `sudo`). 

Within the `<VirtualHost>` tags of this file you'll need to add the below additional configuration. Note, the `<VirtualHost>` tags should already exist and the `...` parts represent existing rules. You should only need to copy the middle section:

```apache
<VirtualHost *:80>

    ...

    # BookStack Configuration
    Alias "/bookstack" "/var/www/bookstack/public"

    <Directory "/var/www/bookstack/public">
      Options FollowSymlinks
      AllowOverride None
      Require all granted

      RewriteEngine On
      # Redirect Trailing Slashes If Not A Folder...
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteRule ^(.*)/$ /$1 [L,R=301]

      # Handle Front Controller...
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteRule ^ index.php [L]
    </Directory>


    <Directory "/var/www/bookstack">
      AllowOverride None
      Require all denied
    </Directory>
    # End BookStack Configuration

    ...

</VirtualHost>
``` 

On line 6 in the above, beginning with `Alias`, You'll need to change `"/bookstack"` path to be the web 'subdirectory' you want to serve BookStack on. For example, If you wanted to serve BookStack on `https://example.com/docs` this would be `"/docs"`. Any instances of `/var/www/bookstack` in the above will need to be changed to the folder you installed BookStack in. The `/public` part of these paths should remain.

Once the configuration has been updated, you'll need to restart apache. On Ubuntu you can do this with the following command:

```bash
sudo systemctl restart apache2.service
```

Follow the above [BookStack Setup](#bookstack-setup) to add your new URL to your BookStack configuration. Once done you should be able to access your BookStack instance at your desired sub-path.

---

### Nginx Setup

Before following this, ensure you have Nginx installed along with php-fpm. This guide assumes a recent Ubuntu-like system is in use. You may need to alter steps to suit other operating systems.
There are multiple ways to achieve this approach with Nginx. The below uses multiple Nginx server blocks and proxying to achieve sub-path serving which keeps the 
BookStack server configuration contained.

First, you will need to choose a folder to install BookStack into. This should be a separate directory from where your main website is being served from since you don't want to risk exposing any of the private BookStack files. Do not install BookStack to a child directory of any other website's web root.

By default Nginx on Ubuntu serves from the `/var/www/html` directory. In this example, we'll use `/var/www/bookstack` to store our BookStack install. If you use a different path ensure you change that path in the below steps.
Create this directory and follow the standard [BookStack install steps](/docs/admin/installation) to install BookStack into this folder. Once complete, following our example directory above, you should end up with a `.env` file in the `/var/www/bookstack` folder.

The next step is to alter your Nginx configuration to serve any requests to your sub-path from our chosen folder. To do this you'll need to find and edit the Nginx config for your website. By default, this is often found at `/etc/nginx/sites-available/default`. To edit this file you'll likely have to open it with admin permissions (using `sudo`). 

Within your existing config file, or within a new one, add a new server block as per the below:

```nginx
server {
  listen 8080;
  listen [::]:8080;

  server_name localhost;

  root /var/www/bookstack/public;
  index index.php index.html;

  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }
  
  location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/php7.4-fpm.sock;
  }
}
```

This server block will host BookStack at `http://localhost:8080`. The port and server name used here are intentional since this is only intended to be directly used locally.
Next, locate the `server {` block for your existing website. Within this block add the following location block:

```nginx
location /bookstack/ {
  proxy_pass http://localhost:8080/;
  proxy_redirect off;
}
```

Tweak the `/bookstack/` part to match the path you want to serve BookStack on. The slashes used within both the `location` and `proxy_pass` lines are important to functionality.
This block will tell Nginx to handle requests to `/bookstack/` by proxying them to our previously created BookStack `server {` block.

A full [example of this configuration can be seen here](https://github.com/BookStackApp/devops/blob/main/config/nginx/subpath-proxy-config).

Once done save your config files. You can often test your Nginx config is valid by running `sudo nginx -t`. If valid restart Nginx. On Ubuntu this can be done with the following command:

```bash
sudo systemctl restart nginx.service
```

Follow the above [BookStack Setup](#bookstack-setup) to add your new URL to your BookStack configuration. Once done you should be able to access your BookStack instance at your desired sub-path.