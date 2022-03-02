+++
title = "Security"
description = "BookStack security concerns and considerations"
date = "2017-01-01"
type = "admin-doc"
+++

Since BookStack can hold important information for users you should be aware of any potential security concerns.
Read through the below to ensure you have secured your BookStack instance. Note, The below only
relates to BookStack itself. The security of the server BookStack is hosted on is not instructed below but should be taken into account.

If you'd like to be notified of new potential security concerns you can sign-up to the [BookStack security mailing list](https://updates.bookstackapp.com/signup/bookstack-security-updates). For reporting security vulnerabilities, please see the ["Security" section](https://github.com/BookStackApp/BookStack/blob/development/readme.md#-security) of the project readme on GitHub.


<ul>
    <li><a href="#initial-security-setup">Initial Security Setup</a></li>
    <li><a href="#mfa">Multi-Factor Authentication</a></li>
    <li><a href="#securing-images">Securing Images</a></li>
    <li><a href="#attachments">Attachments</a></li>
    <li><a href="#user-passwords">User Passwords</a></li>
    <li><a href="#javascript-in-page-content">JavaScript in Page Content</a></li>
    <li><a href="#web-crawler-control">Web Crawler Control</a></li>
    <li><a href="#secure-cookies">Secure Cookies</a></li>
    <li><a href="#iframe-control">Host IFrame Control</a></li>
    <li><a href="#failed-access-logging">Failed Access Logging</a></li>
    <li><a href="#server-side-requests">Untrusted Server Side Requests</a></li>
    <li><a href="#csp">Content Security Policy (CSP)</a></li>
    <li><a href="#mysql-ssl-connection">MySQL SSL connection</a></li>
</ul>

---

<a name="initial-security-setup"></a>

### Initial Security Setup

1. Ensure you change the password and email address for the initial `admin@admin.com` user.
2. Ensure only the `public` folder is being served by your webserver. Serving files above this folder
opens up a lot of code that does not need to be public. Triple check this if you have installed
BookStack within the commonly used `/var/www` folder.
3. Ensure the database user you've used for BookStack has limited permissions for only accessing
the database used for BookStack data.
4. Check that you've set the `APP_URL` option in your `.env` file so that system generated URLs cannot be manipulated.
5. Within BookStack, go through the settings to ensure registration and public access settings are as you expect.
6. Review the user roles in the settings area.
7. Read the below to further understand the security for images & attachments.

---

<a name="mfa"></a>

### Multi-Factor Authentication

Any user can enable multi-factor authentication (MFA) on their account. Upon login they would then need to use an extra proof of identity
to gain access. BookStack currently supports the following mechanisms:

- TOTP (Time-based One-Time Passwords)
  - Labelled as "Mobile App" (Google/Microsoft Authenticator etc...).
  - Uses a SHA1 algorithm internally (Greater algorithms have poor cross-app compatibility).
- Backup Codes
  - These are a list of 16 one-time-use codes.
  - Users will be warned once they have less than 5 codes remaining.

Secrets and values for these options are stored encrypted within the database.

Where required, MFA can be forced upon users via their roles. This can be found via
a "Requires Multi-Factor Authentication" checkbox seen when editing a role.
If a user does not already have an MFA method configured, they will be forced to set one up
upon next login.

---

<a name="securing-images"></a>

### Securing Images

By default, Images are stored in a way which is publicly accessible. This is done on purpose to ensure decent performance while using BookStack. Below are a couple of options to increasing image security:

#### Image Authentication

You can choose to store images behind authentication so only logged-in users can view images. This solution is currently still in testing you could experience performance issues. This option will only work if you have the  'Allow Public Viewing' setting disabled.

***Back-up your BookStack instance before migrating to this option***

To use this option simply set `STORAGE_TYPE=local_secure` in your `.env` file. Uploaded images will be stored within the `storage/uploads/images` folder.

If you are migrating to this option with existing images you will need to move all content in the folder `public/uploads/images` to `storage/uploads/images`. Do not simply copy and leave content in the `public/uploads/images` as those images will still be publicly accessible. After doing this migration you may have to clean-up and re-upload any 'App Icon' images, found in settings, since these need to remain publicly accessible. 

#### Complex Urls

In the settings area of BookStack you can find the option 'Enable higher security image uploads?'. Enabling this will add a 16 character
random string to the name of image files to prevent easy guessing of URLs. This increases security without potential performance concerns.

It's important to ensure you disable 'directory indexes' to prevent unknown users from being able to navigate their way through your images. Here's the configuration for NGINX & Apache if your server allows directory indexes:

**NGINX**

```nginx
# By default indexes are disabled on Nginx but if you have them enabled
# add this to your BookStack server block
location /uploads {
       autoindex off;
}
```

**Apache**

```apache
# Add this to your Apache BookStack virtual host if Indexes are enabled.
# If .htaccess file are enabled then the below should already be active.
<Location "/uploads">
    Options -Indexes
</Location>
```

---

<a name="attachments"></a>

### Attachments

Attachments, if not using Amazon S3, are stored in the `storage/uploads` directory.
By default, unlike images, these are stored behind the application authentication layer so access
depends on permissions you have set up at a role level and page level.

If you are using Amazon S3 for file storage then access will depend on your S3 permission
settings. Unlike images, BookStack will not automatically attempt to make uploaded attachments
publically accessible.  

---

<a name="user-passwords"></a>

### User Passwords

User passwords, if not using an alternative authentication method, are stored in the database.
These are hashed using the standard Laravel hashing methods which use the Bcrypt hashing algorithm.

---

<a name="javascript-in-page-content"></a>

### JavaScript in Page Content

By default, JavaScript tags within page content is escaped when rendered. This can be turned off by setting `ALLOW_CONTENT_SCRIPTS=true` in your `.env` file. Note that even if you disable this escaping the WYSIWYG editor may still perform it's own JavaScript escaping. This option will also alter the [CSP rules](#csp) set by BookStack.

***This option disables some fundemental cross-site-scripting protections. Only use this option on secure instances, where only very trusted users can edit content***

---

<a name="web-crawler-control"></a>

### Web Crawler Control

The rules found in the `/robots.txt` file are automatically controlled via the "Allow public viewing?" setting. This can be overridden by setting `ALLOW_ROBOTS=false` or `ALLOW_ROBOTS=true` in your `.env` file. If you'd like to customise the rules this can be done via theme overrides.

---

<a name="secure-cookies"></a>

### Secure Cookies

BookStack uses cookies to track sessions, remember logins and for XSRF protection. When using HTTPS you may want to ensure that cookies are only sent back to the browser if the connection is over HTTPS. If you have set a https `APP_URL` option in your `.env` this will enabled automatically but it can also be forced on by setting `SESSION_SECURE_COOKIE=true` in your `.env` file.

---

<a name="iframe-control"></a>

### Host Iframe Control

By default BookStack will only allow itself to be embedded within iframes on the same domain as you're hosting on. This is done through a [CSP: frame-ancestors](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-ancestors) header. You can add additional trusted hosts by setting a `ALLOWED_IFRAME_HOSTS` option in your `.env` file like the example below:

```bash
# Adding a single host
ALLOWED_IFRAME_HOSTS="https://example.com"

# Mulitple hosts can be separated with a space
ALLOWED_IFRAME_HOSTS="https://a.example.com https://b.example.com"
```

Note: when this option is used, all cookies will served with `SameSite=None` [(info)](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie/SameSite#None) set so that
a user session can persist within the iframe.

---

<a name="failed-access-logging"></a>

### Failed Access Logging

An option is available to log failed login events to a log file which is useful to identify users having trouble logging in, track malicious login attempts or to use with tools such as Fail2Ban. This works with login attempts using the default email & password login mechanism or attempts via LDAP login. Failed attempts are **not logged** for "one-click" social or SAML2 options.

To enable this you simply need to define the `LOG_FAILED_LOGIN_MESSAGE` option in your `.env` file like so:

```bash
LOG_FAILED_LOGIN_MESSAGE="Failed login for %u"
```

The optional "%u" element of the message will be replaced with the username or email provided in the login attempt
when the message is logged. By default messages will be logged via the php `error_log` function which, in most
cases, will log to your webserver error log files.

---

<a name="server-side-requests"></a>

### Untrusted Server Side Requests

Some features, such as the PDF exporting, have the option to make http calls to external user-defined locations to do things
such as load images or styles. This is disabled by default but can be enabled if desired. This is required for using 
WKHTMLtoPDF as your PDF export renderer.

To enable untrusted server side requests, you need to define the `ALLOW_UNTRUSTED_SERVER_FETCHING` option in your `.env` file like so:

```bash
ALLOW_UNTRUSTED_SERVER_FETCHING=true
```

---

<a name="csp"></a>

### Content Security Policy (CSP)

BookStack serves responses with multiple CSP headers to increase protection again malicious content.
This is especially important in a system such as BookStack where users can create a variety of HTML content, 
especially so if you allow untrusted users to create content in your instance.
The CSP headers set by BookStack are as follows:

- `frame-ancestors 'self'`
  - Restricts what websites can embed BookStack pages via iframes.
  - See the "[Host Iframe Control](#iframe-control)" section above for details on expanding this rule to other hosts.
- `script-src http: https: 'nonce-abc123' 'strict-dynamic'`
  - Restricts what scripts can be ran on a BookStack-served page.
  - Will not be set if the `ALLOW_CONTENT_SCRIPTS` .env option is active.
  - The nonce value used is randomly generated upon each request. It is automatically applied to any "Custom HTML Head Content" scripts.
- `object-src 'self'`
  - Restricts which embeddable content can be loaded onto a BookStack-served page.
  - Will not be set if the `ALLOW_CONTENT_SCRIPTS` .env option is active.
- `base-uri 'self'`
  - Restricts what `<base>` tags can be added to a BookStack-served page.

If needed you should be able to set additional CSP headers via your webserver.
If there's a clash with an existing BookStack CSP header then browsers will generally favour the most restrictive policy.

---

<a name="mysql-ssl-connection"></a>

### MySQL SSL Connection

If your BookStack database is not on the same host as your web server, you may want to ensure the connection is encrypted using SSL between these systems.
Assuming SSL is configured correctly on your MySQL server, you can enable this by defining the `MYSQL_ATTR_SSL_CA` option in your `.env` file like so:

```bash
# Path to Certificate Authority (CA) certificate file for your MySQL instance.
# When this option is used host name identity verification will be performed
# which checks the hostname, used by the client, against names within the
# certificate itself (Common Name or Subject Alternative Name).
MYSQL_ATTR_SSL_CA="/path/to/ca.pem"
```