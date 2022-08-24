+++
categories = ["Releases"]
tags = ["Releases"]
title = "Beta Security Release v0.30.4"
date = 2020-10-31T16:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/locks-marcos-mayer.jpg"
description = "This release contains some security fixes to prevent various XSS attacks"
slug = "beta-release-v0-30-4"
draft = false
+++


XSS and user-injected auto-redirect vulnerabilities have been found within the page content & attachment components of BookStack which BookStack v0.30.4 looks to address. These are primarily a concern if untrusted users can edit content on your BookStack instance.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.4)


### Impact

1. A user with permissions to edit a page could insert JavaScript code through the use of `javascript:` URIs within a link or form which would run, within the context of the current page, when clicked or submitted. 

2. A user with permissions to edit a page could insert a particular meta tag which could be used to silently redirect users to a alternative location upon visit of a page.

3. A user with permissions to edit a page could add an attached link which would execute untrusted JavaScript code when clicked by a viewer of the page.

### Patches

The issues were addressed in BookStack v0.30.4. 

Dangerous content may remain in the database. The in-page vulnerabilities will be removed before being displayed on a page but dangerous attachment content will remain if exploited. If you think this could have been exploited you can search for potential cases with the following SQL commands:

```sql
# XSS within page content:
select * from pages where html like '%javascript:%';

# Auto-redirect within page content:
select * from pages where html like '%<meta%';

# XSS in page link attachments:
select a.name as attachment_name, p.name as page_name, p.id as page_id from attachments a left join pages p on (a.uploaded_to=p.id) where a.path like '%javascript:%';
```

### Workarounds

Page edit permissions could be limited to only those that are trusted until you can upgrade although this will not address existing exploitation of this vulnerability. 

### References

* [BookStack Beta v0.30.4](https://github.com/BookStackApp/BookStack/releases/tag/v0.30.4)
* [GitHub Security Page - XSS/Redirect in Page Content](https://github.com/BookStackApp/BookStack/security/advisories/GHSA-r2cf-8778-3jgp)
* [GitHub Security Page - XSS in Page Attachment](https://github.com/BookStackApp/BookStack/security/advisories/GHSA-7p2j-4h6p-cq3h)

### Attribution

* Thanks to [@PercussiveElbow](https://github.com/PercussiveElbow) for the discovery, reporting, patching and testing of the page-content vulnerabilities.
* Thanks to Yassine ABOUKIR (https://twitter.com/yassineaboukir/) for the discovery and reporting of the page attachment vulnerability.

### More Information

If you have any questions or comments about this advisory:
* Open an issue in [the BookStack GitHub repository](https://github.com/BookStackApp/BookStack/issues).
* Ask on the [BookStack Discord chat](https://discord.gg/ztkBqR2).
* Follow the [BookStack Security Advice](https://github.com/BookStackApp/BookStack#-security) to contact someone privately.


----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@mmayyer?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">marcos mayer</a> on <a href="https://unsplash.com/s/photos/lock?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>
