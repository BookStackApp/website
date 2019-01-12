+++
title = "Other Configuration"
description = "Other BookStack configuration such as system revisions and custom avatar fetching"
date = "2018-01-12"
type = "admin-doc"
+++


* [.env Options](#env-options)
* [Revision Limit](#revision-limit)
* [Custom User Avatar Fetching](#custom-user-avatar-fetching)

---

### .env Options

As part of the installation of BookStack you will have a `.env` file containing system options. By default this only contains a few options.
Within your BookStack install directory you should also have a `.env.example.complete` file which contains every support option available alongside the default value for each.
You can copy options in this file to your own `.env` file as required. Many of the options in the `.env.example.complete` file are detailed in-depth in this documentation.

The `.env` file essential sets environment variables for BookStack to read. Environment variables will be checked if an option is not in the `.env` file which can be useful
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

### Custom User Avatar Fetching

When a user is created BookStack will, by default, fetch an avatar image from [Gravatar](https://en.gravatar.com/). This functionality can be disabled or the URL can be customized 
which allows you to use a different avatar service altogether. Examples of this can be seen below:

```bash
# In your .env file

# Use libravatar instead of gravatar
AVATAR_URL=https://seccdn.libravatar.org/avatar/${hash}?s=${size}&d=identicon

# Disable avatar fetching altogether
AVATAR_URL=false
```

The following variables can be used in this setting which will be populated by BookStack when used:

* `${email}` - The user's email address, URL encoded.
* `${hash}` - MD5 hashed copy of the user's email address.
* `${size}` - BookStack's ideal requested image size in pixels.