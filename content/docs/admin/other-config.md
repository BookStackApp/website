+++
title = "Other Configuration"
description = "Other BookStack configuration such as system revisions and custom avatar fetching"
date = "2018-01-12"
type = "admin-doc"
+++


* [.env Options](#env-options)
* [Revision Limit](#revision-limit)
* [Recycle Bin Lifetime](#recycle-bin-lifetime )
* [Custom User Avatar Fetching](#custom-user-avatar-fetching)
* [Custom diagrams.net URL](#custom-diagramsnet-url)
* [IP Address Storage Precision](#ip-address-storage-precision)

---

### .env Options

As part of the installation of BookStack you will have a `.env` file containing system options. By default this only contains a few options.
Within your BookStack install directory you should also have a `.env.example.complete` file which contains every supported option available alongside the default value for each.
You can copy options in this file to your own `.env` file as required. Many of the options in the `.env.example.complete` file are detailed in-depth in this documentation.

The `.env` file essentially sets environment variables for BookStack to read. Environment variables will be checked if an option is not in the `.env` file which can be useful
in the creation and use of docker containers.

---

### Revision Limit

Each time a page is saved a revision is stored to track history. To prevent your database becoming bloated BookStack will automatically remove revisions when the count, per page, exceeds 50. You can set the following option in your `.env` file to increase or remove the limit:

```bash
# Set the revision limit to 100
# Defaults to '50'
REVISION_LIMIT=100

# Alternatively, You can set to 'false' to disable the limit altogether.
REVISION_LIMIT=false
```

---

### Recycle Bin Lifetime

Instead of deleting pages completely, it is possible to move them to a recycle bin. 
The lifespan of pages in the recycle bin can be controlled by passing an option in the `.env` file.

Three modes are available :

- `RECYCLE_BIN_LIFETIME=0` : disable the recycle bin : 
- `RECYCLE_BIN_LIFETIME=-1` : do not auto-remove pages from the recycle bin
- `RECYCLE_BIN_LIFETIME=n` : try to remove pages after `n` days<sup>*</sup>

<sup>*</sup> the pages' auto-removal might be delayed.

```bash
# Recycle Bin Lifetime 
# The number of days that content will remain in the recycle bin before 
# being considered for auto-removal. It is not a guarantee that content will 
# be removed after this time. 
# Set to 0 for no recycle bin functionality. 
# Set to -1 for unlimited recycle bin lifetime. 
RECYCLE_BIN_LIFETIME=30 
```

---

### Custom User Avatar Fetching

When a user is created BookStack will, by default, fetch an avatar image from [Gravatar](https://en.gravatar.com/). This functionality can be disabled in the `.env` file or the URL can be customized 
which allows you to use a different avatar service altogether. Examples of this can be seen below:

```bash
# Use libravatar instead of gravatar
AVATAR_URL=https://seccdn.libravatar.org/avatar/${hash}?s=${size}&d=identicon

# Disable avatar fetching altogether
AVATAR_URL=false
```

The following variables can be used in this setting which will be populated by BookStack when used:

* `${email}` - The user's email address, URL encoded.
* `${hash}` - MD5 hashed copy of the user's email address.
* `${size}` - BookStack's ideal requested image size in pixels.

---

### Custom diagrams.net URL

BookStack uses [diagrams.net](https://www.diagrams.net/) (formerly draw.io) to provide users with the ability to create & edit drawings.
By default BookStack embeds the diagrams.net interface using the following URL:

```php
https://embed.diagrams.net/?embed=1&proto=json&spin=1&configure=1
```

You can instead define your own URL to customise this embed or even use a self-hosted
instance of diagrams.net. This can be done by defining an option in your `.env` file like so:

```bash
DRAWIO=https://drawing.example.com/?embed=1&proto=json&spin=1&configure=1
```

**The `embed=1&proto=json&spin=1` query string parameters are required for the integration with BookStack to function. Remember to include these when defining a custom URL.**

Refer to this diagrams.net guide to see what options are supported: [diagrams.net embed URL parameters](https://www.diagrams.net/doc/faq/supported-url-parameters). In particular, the `stealth=1` option might be of interest if you 
don't want other external services to be used. 

---

### IP Address Storage Precision

Some areas of BookStack, such as the activity audit log, store and show IP address of users.
By default, the entire IP address will be stored but you can adjust with the following `.env` option:

```bash
# Alter the precision of IP addresses stored by BookStack.
# Should be a number between 0 and 4, where 4 retains the full IP address
# and 0 completely hides the IP address. As an example, a value of 2 for the
# IP address '146.191.42.4' would result in '146.191.x.x' being logged.
# For the IPv6 address '2001:db8:85a3:8d3:1319:8a2e:370:7348' this would result as:
# '2001:db8:85a3:8d3:x:x:x:x'
IP_ADDRESS_PRECISION=2
```
