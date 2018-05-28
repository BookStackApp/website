+++
title = "Installation"
description = "How to install BookStack"
date = "2017-01-01"
type = "admin-doc"
+++

Below are some different methods of installing BookStack. If you cannot find a guide for your setup search the web for "Laravel install guides" relevant for your system as the process is mostly the same.

* [Shared Hosting](#shared)
* [Manual](#manual)
* [Docker](#docker)
* [Ubuntu 16.04 Script](#ubuntu-1604)
* [Ubuntu 18.04 Script](#ubuntu-1804)
* [Community Guides](#community)

---

<a name="shared"></a>

## Shared Hosting

Currently BookStack does not support shared PHP hosting. There are too many differences between shared hosting providers and too many limitations to support the current install process although we would like to make this easier in the future. You can try searching for 'Laravel Install Guides' for your hosting provider as the process would be similar. Beware that modifying the application source files or applying large work-arounds could lead to security or stability issues.

---

<a name="manual"></a>

## Manual Installation

#### Requirements

BookStack has similar requirements to Laravel:

* PHP >= 7.0.0, Will need to be usable from the command line.
* PHP Extensions: `OpenSSL`, `PDO`, `MBstring`, `Tokenizer`, `GD`, `MySQLND`, `Tidy`, `SimpleXML`, `DOM`
* MySQL >= 5.6, Single DB *(All permissions advised since application manages schema)*
* Git *(Not strictly required but helps manage updates)*
* [Composer](https://getcomposer.org/)

#### Instructions

Ensure the above requirements are met before installing.

This project currently uses the `release` branch of the BookStack GitHub repository as a stable channel for providing updates. The installation is currently somewhat complicated and will be made simpler in future releases. Some PHP/Laravel experience will currently benefit.

1. Clone the release branch of the BookStack GitHub repository into a folder.

	```bash
	git clone https://github.com/BookStackApp/BookStack.git --branch release --single-branch
	```

2. `cd` into the application folder and run `composer install`.
3. Copy the `.env.example` file to `.env` and fill with your own database and mail details.
4. Ensure the `storage`, `bootstrap/cache` & `public/uploads` folders are writable by the web server.
5. In the application root, Run `php artisan key:generate` to generate a unique application key.
6. If not using Apache or if `.htaccess` files are disabled you will have to create some URL rewrite rules as shown below.
7. Set the web root on your server to point to the BookStack `public` folder. This is done with the `root` setting on Nginx or the `DocumentRoot` setting on Apache.
8. Run `php artisan migrate` to update the database.
9. Done! You can now login using the default admin details `admin@admin.com` with a password of `password`. It is recommended to change these details directly after first logging in.

#### URL Rewrite rules

**Apache**
```apache
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

**Nginx**
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

---

<a name="docker"></a>

## Docker Image

A community built docker image is available for those that prefer to use a containerised version of BookStack. This image runs on Apache and PHP7. A docker compose file is also available to bring up a whole BookStack environment which includes MySQL 5.7. Here are the links for the docker image:

* [GitHub repository including docker compose file](https://github.com/solidnerd/docker-bookstack)
* [Docker Hub page](https://hub.docker.com/r/solidnerd/bookstack/)

---

<a name="ubuntu-1604"></a>

## Ubuntu 16.04 Installation Script

A script to install BookStack on a fresh instance of Ubuntu 16.04 is available. This script is ONLY FOR A FRESH OS, It will install Nginx, MySQL 5.7, & PHP7 and could OVERWRITE any existing web setup on the machine. It also does not set up mail settings or configure system security so you will have to do those separately. You can use the script as a reference if you're installing on a non-fresh machine.

[Link to installation script](https://github.com/BookStackApp/devops/blob/master/scripts/installation-ubuntu-16.04.sh)

#### Running the Script

```bash
# Ensure you have read the above information about what this script does before executing these commands.

# Download the script
wget https://raw.githubusercontent.com/BookStackApp/devops/master/scripts/installation-ubuntu-16.04.sh

# Make it executable
chmod a+x installation-ubuntu-16.04.sh

# Run the script with admin permissions
sudo ./installation-ubuntu-16.04.sh
```

---

<a name="ubuntu-1804"></a>

## Ubuntu 18.04 Installation Script

A script to install BookStack on a fresh instance of Ubuntu 18.04 is available. This script is ONLY FOR A FRESH OS, It will install Apache, MySQL 5.7, & PHP-7.2 and could OVERWRITE any existing web setup on the machine. It also does not set up mail settings or configure system security so you will have to do those separately. You can use the script as a reference if you're installing on a non-fresh machine.

[Link to installation script](https://github.com/BookStackApp/devops/blob/master/scripts/installation-ubuntu-18.04.sh)

#### Running the Script

```bash
# Ensure you have read the above information about what this script does before executing these commands.

# Download the script
wget https://raw.githubusercontent.com/BookStackApp/devops/master/scripts/installation-ubuntu-18.04.sh

# Make it executable
chmod a+x installation-ubuntu-18.04.sh

# Run the script with admin permissions
sudo ./installation-ubuntu-18.04.sh
```

---

<a name="community"></a>

## Community Guides

This is a collection of guides created by awesome members of the BookStack community:

* [CentOS 7 Install by Deviant Engineer](https://deviantengineer.com/2017/02/bookstack-centos7/)
* [Fedora 27 Install by Jared Busch](https://mangolassi.it/topic/16471/install-bookstack-on-fedora-27/)
