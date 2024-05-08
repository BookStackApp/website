+++
title = "Updating PHP & Composer"
date = "2024-05-08"
type = "admin-doc"
+++

While we try to ensure a fairly slow, steady and stable path for BookStack updates, requirements do change
as software develops & moves on. In particular, the minimum required version of PHP will increase
about once per year. Every so often we also may require a new minimum version of composer to be used
for BookStack. This page details the common steps required to update these both.

---

## Updating PHP

Currently the minimum version of PHP required by BookStack is PHP 8.1. You'll need to update PHP if using a version lower than 8.1. 
You can usually check your installed PHP version by running `php -v` but in some cases your web-server could be running a different PHP version than what the command line reflects. 

<details>
<summary>Updating to PHP 8.3 on most Debian & Ubuntu based systems using Apache</summary>

The commands below provide an example of how PHP can be updated to the latest version (8.3) on most Debian & Ubuntu based systems
that are running PHP via Apache using mod-php.

**Warnings:** 
  - In most cases, especially if installed using our scripts and updating from a recent BookStack version, you won't need to update PHP using the below as you'll already be using PHP 8.1 or greater.
  - If you run other applications on this machine, PHP applications in particular, then those may also be affected by these changes.

```bash
sudo apt update
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install -y php8.3 php8.3-curl php8.3-mbstring php8.3-ldap php8.3-xml php8.3-zip php8.3-gd php8.3-mysql libapache2-mod-php8.3
sudo a2dismod php7.4 php8.0 php8.1 php8.2
sudo a2enmod php8.3
sudo systemctl restart apache2
```

You may also need to [update `composer`](#updating-composer) to be compatible with php8.3.

</details>

---

## Updating Composer

You can check your current composer version by running `composer -V`. 
You can often update composer by running `sudo composer self-update` (Or you may be prompted to run `sudo composer self-update --2`).
Typically it's fine, and best practice, to be using the latest version of composer rather than a specific version near our minimum requirements.

If you're using a system-supplied composer package you may need to first uninstall that (eg. `sudo apt remove composer`) then follow the [composer download documentation](https://getcomposer.org/download/) to get the latest version. Take notice of the `sudo mv composer.phar /usr/local/bin/composer` command shown in the documentation to install composer globally for easier usage.