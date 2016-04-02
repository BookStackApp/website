# Installation

### Requirements

BookStack has similar requirements to Laravel:

* PHP >= 5.5.9, Will need to be usable from the command line.
* PHP Extensions: `OpenSSL`, `PDO`, `MBstring`, `Tokenizer`, `GD`
* MySQL >= 5.6
* Git (Not strictly required but helps manage updates)
* [Composer](https://getcomposer.org/)

### Installation

Ensure the above requirements are met before installing. Currently BookStack requires its own domain/subdomain and will not work in a site subdirectory.

This project currently uses the `release` branch of the BookStack GitHub repository as a stable channel for providing updates. The installation is currently somewhat complicated and will be made simpler in future releases. Some PHP/Laravel experience will currently benefit.

1. Clone the release branch of the BookStack GitHub repository into a folder.

	```
	git clone https://github.com/ssddanbrown/BookStack.git --branch release --single-branch
	```

2. `cd` into the application folder and run `composer install`.
3. Copy the `.env.example` file to `.env` and fill with your own database and mail details.
4. Ensure the `storage`, `bootstrap/cache` & `public/uploads` folders are writable by the web server.
5. In the application root, Run `php artisan key:generate` to generate a unique application key.
6. If not using Apache or if `.htaccess` files are disabled you will have to create some URL rewrite rules as shown below.
7. Set the web root on your server to point to the BookStack `public` folder. This is done with the `root` setting on Nginx or the `DocumentRoot` setting on Apache.
8. Run `php artisan migrate` to update the database.
9. Done! You can now login using the default admin details `admin@admin.com` with a password of `password`. It is recommended to change these details directly after first logging in.

---

### URL Rewrite rules

**Apache**
```
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

**Nginx**
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
