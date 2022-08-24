+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Security Release v0.30.5"
date = 2020-12-06T20:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/lock-jon-moore.jpg"
description = "This release contains some security fixes to prevent phishing and server-side request forgery"
slug = "beta-release-v0-30-5"
draft = false
+++


Phishing and and server-side request forgery vulnerabilities have been found within BookStack. Release v0.30.5 will remove this server-side request forgery issue while bringing updated wording and advisories to prevent the potential phishing vulnerability.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.5)


### Impact

1. A user with permissions to edit a page could set certain image URL's within a page to manipulate functionality in the exporting system, which would allow them to make server side requests and/or have access to a wider scope of files within the BookStack file storage locations. This is primarily a concern if untrusted users are able to edit pages in your instance.

2. A malicious attacker could craft a password reset request with an alternate host address, resulting in a password reset email being sent to someone with an alternate destination. This could be used for phishing attempts with a sight to gain further access if successful. This is a primarily a concern on hosts where requests to unexpected domain names could reach your BookStack instance.

### Patches

Within v0.30.5 the above server-side request forgery vulnerability will no longer exist since that specific functionality was removed. Within v0.30.5 the default state and wording within the provided `.env.example` file was updated to encorage filling of the `APP_URL` parameter (See below).

### Workarounds

To help prevent the potential phishing vulnerability, please ensure you have set the `APP_URL` option in your `.env` file. The value of this should exactly match the base URL you are using to host BookStack.

To prevent exploitation of the server-side request forgery issue, page edit permissions could be limited to only those that are trusted until you can upgrade. 

### References

* [BookStack Beta v0.30.5](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.5)
* [GitHub Security Page - Server Side Request Forgery](https://github.com/BookStackApp/BookStack/security/advisories/GHSA-8wfc-w2r5-x7cr)

### Attribution

* Thanks to [@PercussiveElbow](https://github.com/PercussiveElbow) for the responsible discovery & reporting of this vulnerability.

### More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack Security Advice](https://github.com/BookStackApp/BookStack#-security) to contact someone privately.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@thejmoore?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Jon Moore</a> on <a href="https://unsplash.com/s/photos/locks?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>
