+++
title = "Installation"
description = "How to install BookStack"
date = "2017-01-01"
type = "admin-doc"
+++

Below you can find details on how to install BookStack on your own hosting. There are a number of installation options available depending on your setup. The install process will require some knowledge of hosting a PHP web application & database.

* [Requirements](#requirements)
* [Shared Hosting](#shared)
* [Manual](#manual)
* [Docker](#docker)
* [Ubuntu 22.04 Script](#ubuntu-2204)
* [Ubuntu 20.04 Script](#ubuntu-2004)
* [Ubuntu 18.04 Script](#ubuntu-1804)
* [Community Guides](#community)
* [Other Hosting Options](#other)
* [High Availability](#ha)

---

<a name="requirements"></a>

## Requirements

BookStack has the following requirements:

* **PHP** >= 7.4
    * For installation and maintenance, you'll need to be able to run `php` from the command line.
    * Required Extensions: *OpenSSL, PDO, MBstring, Tokenizer, GD, MySQL, SimpleXML & DOM*
* **MySQL** >= 5.7 or **MariaDB** >= 10.2
    * For the storage of BookStack content and data.
    * Single Database *(All permissions advised since application manages schema)*
* **Git Version Control**
    * For application of updates when following our standard process.
* **[Composer](https://getcomposer.org/)** >= v2.0
    * For installation and management of our PHP dependencies.
* **A PHP Compatible Webserver**
    * For usage with PHP and for serving static files.

---

<a name="shared"></a>

## Shared Hosting

BookStack does not currently support shared PHP hosting. There are too many differences between shared hosting providers and too many limitations to support the current install process although we would like to make this easier in the future. You can try searching for 'Laravel Install Guides' for your hosting provider as the process would be similar. Beware that modifying the application source files or applying large work-arounds could lead to security or stability issues.

---

<a name="manual"></a>

## Manual Installation

Ensure the above requirements are met before installing.

This project currently uses the `release` branch of the BookStack GitHub repository as a stable channel for providing updates. The installation is currently somewhat complicated and will be made simpler in future releases. Some PHP or Laravel experience will make this easier.

1. Clone the release branch of the BookStack GitHub repository into a folder.
```bash
git clone https://github.com/BookStackApp/BookStack.git --branch release --single-branch
```
2. `cd` into the application folder and run `composer install --no-dev`.
3. Copy the `.env.example` file to `.env` and fill with your own database and mail details.
4. Ensure the `storage`, `bootstrap/cache` & `public/uploads` folders are writable by the web server.
5. In the application root, Run `php artisan key:generate` to generate a unique application key.
6. If not using Apache or if `.htaccess` files are disabled you will have to create some URL rewrite rules as shown below.
7. Set the web root on your server to point to the BookStack `public` folder. This is done with the `root` setting on Nginx or the `DocumentRoot` setting on Apache.
8. Run `php artisan migrate` to update the database.
9. Done! You can now login using the default admin details `admin@admin.com` with a password of `password`. You should change these details immediately after logging in for the first time.

#### Webserver Configuration

- [Example Apache VirtualHost configuration](https://github.com/BookStackApp/devops/blob/main/config/apache/bookstack.conf)
- [Example Nginx Server block](https://github.com/BookStackApp/devops/blob/main/config/nginx)

---

<a name="docker"></a>

## Docker Containers

Community docker setups are available for those that would prefer to use a containerised version of BookStack:

#### LinuxServer.io

* [GitHub Repository](https://github.com/linuxserver/docker-bookstack)
* [GitHub container package](https://github.com/linuxserver/docker-bookstack/pkgs/container/bookstack)

#### solidnerd

* [GitHub Repository](https://github.com/solidnerd/docker-bookstack)
* [Docker Hub page](https://hub.docker.com/r/solidnerd/bookstack/)

---

<a name="ubuntu-2204"></a>

## Ubuntu 22.04 Installation Script

A script to install BookStack on a fresh instance of Ubuntu 22.04 is available. This script is ONLY FOR A FRESH OS, it will install Apache, MySQL 8.0 & PHP-8.1 and could OVERWRITE any existing web setup on the machine. It also does not set up mail settings or configure system security so you will have to do those separately. You can use the script as a reference if you're installing on a non-fresh machine.

- [Link to installation script](https://github.com/BookStackApp/devops/blob/main/scripts/installation-ubuntu-22.04.sh)
- [Video guide](https://www.youtube.com/watch?v=wq78komr9rs)

#### Running the Script

```bash
# Ensure you have read the above information about what this script does before executing these commands.

# Download the script
wget https://raw.githubusercontent.com/BookStackApp/devops/main/scripts/installation-ubuntu-22.04.sh

# Make it executable
chmod a+x installation-ubuntu-22.04.sh

# Run the script with admin permissions
sudo ./installation-ubuntu-22.04.sh
```

The script will output a log file for debugging within your current working directory when running the script.
Permissions for the BookStack installation files & folders will be set based upon the user used to run the script.

---

<a name="ubuntu-2004"></a>

## Ubuntu 20.04 Installation Script

A script to install BookStack on a fresh instance of Ubuntu 20.04 is available. This script is ONLY FOR A FRESH OS, it will install Apache, MySQL 8.0 & PHP-7.4 and could OVERWRITE any existing web setup on the machine. It also does not set up mail settings or configure system security so you will have to do those separately. You can use the script as a reference if you're installing on a non-fresh machine.

- [Link to installation script](https://github.com/BookStackApp/devops/blob/main/scripts/installation-ubuntu-20.04.sh)
- [Video guide](https://www.youtube.com/watch?v=ShqUjt33uOs)

#### Running the Script

```bash
# Ensure you have read the above information about what this script does before executing these commands.

# Download the script
wget https://raw.githubusercontent.com/BookStackApp/devops/main/scripts/installation-ubuntu-20.04.sh

# Make it executable
chmod a+x installation-ubuntu-20.04.sh

# Run the script with admin permissions
sudo ./installation-ubuntu-20.04.sh
```


---

<a name="ubuntu-1804"></a>

## Ubuntu 18.04 Installation Script

A script to install BookStack on a fresh instance of Ubuntu 18.04 is available. This script is ONLY FOR A FRESH OS, it will install Apache, MySQL 5.7 & PHP-7.4 and could OVERWRITE any existing web setup on the machine. It also does not set up mail settings or configure system security so you will have to do those separately. You can use the script as a reference if you're installing on a non-fresh machine.

[Link to installation script](https://github.com/BookStackApp/devops/blob/main/scripts/installation-ubuntu-18.04.sh)

#### Running the Script

```bash
# Ensure you have read the above information about what this script does before executing these commands.

# Download the script
wget https://raw.githubusercontent.com/BookStackApp/devops/main/scripts/installation-ubuntu-18.04.sh

# Make it executable
chmod a+x installation-ubuntu-18.04.sh

# Run the script with admin permissions
sudo ./installation-ubuntu-18.04.sh
```

---

<a name="community"></a>

## Community Guides

This is a collection of guides created by awesome members of the BookStack community:

* [RHEL 8 Install (Oracle/Alma Linux) by @xhark](https://github.com/blogmotion/bm-bookstack-install/) - [french guide](https://blogmotion.fr/internet/bookstack-script-installation-centos-8-18255)
* [CentOS 7 Install by Deviant Engineer](https://deviant.engineer/2017/02/bookstack-centos7/)
* [Fedora 27 Install by Jared Busch](https://mangolassi.it/topic/16471/install-bookstack-on-fedora-27/)
* [Debian 11 Install by Othman Alikhan](https://gist.github.com/OthmanAlikhan/322f83a77c15dfd1c91a2afe0b6a6fc2)
* [Sample Docker Swarm Stack by @neuroforgede](https://github.com/neuroforgede/bookstack-docker-swarm)

---

<a name="other"></a>

## Other Hosting Options

Below are some alternative platforms and services that can be used to host BookStack. <br>
_**Note: These are not tested, vetted nor supported by the official BookStack project in any manner**_.

- [Cloudron](https://www.cloudron.io/store/com.bookstackapp.cloudronapp.html) - A solution for running apps on your own server.
- [Uberspace](https://lab.uberspace.de/guide_bookstack.html) - A European based hosting provider.
- [Home Assistant Community Add-on](https://github.com/hassio-addons/addon-bookstack) - For [Home Assistant](https://www.home-assistant.io/) users.
- [Stellar Hosted](https://www.stellarhosted.com/bookstack/) - A European based managed hosting provider.
- [alwaysdata](https://www.alwaysdata.com/en/marketplace/bookstack/) - A European based managed hosting provider.
- [PikaPods](https://www.pikapods.com/pods?run=bookstack) - Managed open source hosting, EU and US regions available.
- [YunoHost](https://install-app.yunohost.org/?app=bookstack) - A Debian-based distribution that automates personal web server installation.
- [Elestio](https://elest.io/open-source/bookstack) - Managed hosting in common cloud services or on-premise.
- [Nexxwave](https://www.nexxwave.eu/app-hosting/bookstack) - Managed application hosting in the EU.
---

<a name="ha"></a>

## High Availability

Some enterprise environments may need to configure a "High Availability" setup of BookStack to include some operational redundancy.
**This type of setup is not needed for the vast majority of BookStack instances.**
For a "High Availability" BookStack setup you'll likely need to consider the following:

- High availability is not something we assure to support. There may be scenarios that will not allow availability.
  - For example: The BookStack upgrade process does not assure availability when ran.
- Sessions and Cache use the local filesystem by default. 
  - The database/memcached/redis options allow sharing across instances.
  - [Cache and session options are documented here](/docs/admin/cache-session-config/).
- Uploaded files use the local filesystem by default.
  - You could instead use S3 or an S3 like storage system for these files.
  - Alternatively you could mount/link the used directories to shared locations.
  - [Directory locations and storage options are documented here](/docs/admin/upload-config/).
- The [theme system](/docs/admin/hacking-bookstack/#theme-system) and [error log](/docs/admin/debugging/) also use the local filesystem.
- A simplistic health-check endpoint can be found at the `/status` URI.
  - This performs basic checks on subsystems.
  - This should return a HTTP error status code (>=400) on any failure otherwise a 200 status code.
