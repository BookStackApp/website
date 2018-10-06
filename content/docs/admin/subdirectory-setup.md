+++
title = "Subdirectory Setup"
description = "How to setup BookStack in a subdirectory"
date = "2018-10-04"
type = "admin-doc"
+++

You may want to host BookStack on a "Subdirectory" of your website, For example `https://example.com/bookstack`. To achieve this you will need to make some alterations to your webserver config. The details for setting this up on Apache can be found below. You'll need to follow the BookStack setup section after configuring any webserver.

If you are using Docker you will likely need to look into setting up reverse proxies instead of following the below.

## Apache Setup

Before following this, ensure you have apache installed along with PHP & ensure mod-php is enabled. This guide assumes a recent Ubuntu-like system is in use. To set-up the required rules, you will need to have mod-rewrite enabled:

```bash
sudo a2enmod rewrite
``` 

First, You will need to choose a folder to install BookStack into. This should a separate directory from where your main website is being served from since you don't want to risk exposing any of the private BookStack files.
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

Once the configuration has been updated, you'll need to restart apache. On Ubuntu you can do with the following command:

```bash
sudo systemctl restart apache2.service
```

Follow the below "BookStack Setup" to add your new URL to your BookStack configuration. Once done you should be able to access your BookStack instance at your desired sub-path.


## BookStack Setup

Within your `.env` file ensure you set the `APP_URL` parameter. This should be the base URL for your BookStack instance without a trailing slash. For example:

```bash
APP_URL=https://example.com/bookstack
```