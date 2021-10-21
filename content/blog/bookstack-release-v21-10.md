+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v21.10"
date = 2021-10-23T14:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/gate-benofthenorth.jpg"
slug = "bookstack-release-v21-10"
draft = false
+++

October brings us BookStack v21.10. This release is primarily intended to wrap up some 
loose ends before we make some more substantial framework changes, but it does bring with
it a new authentication option in addition to some new API endpoints.

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.10)


**Upgrade Notices**

- **Security Releases** - There were a series of security vulnerabilities found during the life of 
  v21.08. See the [v21.08.2](/blog/bookstack-release-v21-08-2/) and
  [v21.08.5](/blog/bookstack-release-v21-08-5/) posts for more details.
- **Content Security Policy** - v21.08.2 introduced the use of BookStack-applied CSP headers. These
  could potentially conflict with any CSP headers set a server-level. The use of these are detailed
  in the post below and details of the headers can be found on the [security page here](/docs/admin/security/#csp).

### OpenID Connection Authentication

Notes

### API Updates

#### Attachment Endpoints

Notes

#### Image Upload via Markdown Content

Notes

### TOTP URL During MFA Setup

v21.08.1
Notes

### IP Address in Audit Log

v21.08.4
Notes, mention `APP_PROXIES` env option if needed

### Smarter Concurrent Editing Detection & Warnings

v21.08.5

### New Debug View

v21.08.6

### Introduction of Content Security Policy

v21.08.2

### Translations

TODO

### Full List of Changes


**Released in v21.10**

TODO


**Released in v21.08.1 through v21.08.6**

* Added custom whoops-based debug view which fixes issue where debug view would not show content due to CSP rules. ([#2977](https://github.com/BookStackApp/BookStack/pull/2977), [#2976](https://github.com/BookStackApp/BookStack/issues/2976))
* Added throttling to password reset requests. ([ca764ca](https://github.com/BookStackApp/BookStack/commit/ca764caf2d55a5c9bac61718d656423b0c3a060b))
* Added IP address to tracked activities and displayed in audit log. Thanks to [@johnroyer](https://github.com/BookStackApp/BookStack/pull/2936). ([#2936](https://github.com/BookStackApp/BookStack/pull/2936), [#2747](https://github.com/BookStackApp/BookStack/issues/2747))
* Added the option to use database table prefixes. Thanks to [@floviolleau](https://github.com/BookStackApp/BookStack/pull/2935). ([#2935](https://github.com/BookStackApp/BookStack/pull/2935))
* Allowed the use of content includes when using a custom homepage.
* Updated DOMPDF chroot directory to prevent potential unintended file access. ([#2965](https://github.com/BookStackApp/BookStack/pull/2965))
* Updated TOTP setup flow to display a URL of the QR code contents during setup for non-QR scanning usage. ([#2908](https://github.com/BookStackApp/BookStack/issues/2908))
* Updated translations with latest content from Crowdin. ([#2926](https://github.com/BookStackApp/BookStack/pull/2926), [#2915](https://github.com/BookStackApp/BookStack/pull/2915), [#2906](https://github.com/BookStackApp/BookStack/pull/2906), [#2980](https://github.com/BookStackApp/BookStack/pull/2980), [#2953](https://github.com/BookStackApp/BookStack/pull/2953))
* Fixed broken page ordering on various views. ([#2905](https://github.com/BookStackApp/BookStack/issues/2905))
* Fixed vulnerability where a malicious user with page edit access could enter script that would execute upon page view.
* Fixed certain "Custom HTML Head Content" being incorrectly altered or converted. ([#2923](https://github.com/BookStackApp/BookStack/issues/2923), [#2914](https://github.com/BookStackApp/BookStack/issues/2914))
* Converted old test cases to remove reliance on BrowserKit. ([#2928](https://github.com/BookStackApp/BookStack/pull/2928))
* Fixed incorrect audit log detail on social account sign-in. ([#2930](https://github.com/BookStackApp/BookStack/issues/2930))
* Fixed issue where QR codes were not readable when using dark mode. ([#2925](https://github.com/BookStackApp/BookStack/issues/2925))
* Added concurrent page editing warnings upon draft save events. Thanks to [@MatthieuParis](https://github.com/BookStackApp/BookStack/pull/2877) ([#2877](https://github.com/BookStackApp/BookStack/pull/2877))
* Fixed issue where TOTP setup would provide guest email address upon QR code scan when MFA setup was enforced at login. ([#2971](https://github.com/BookStackApp/BookStack/issues/2971))


### Next Steps

This release marks the first feature release since [I left my job](https://danb.me/blog/posts/leaving-my-job-to-focus-on-open-source/) to focus on BookStack and other bits
for a while. My main focus of v21.10 was to work through some of the challenging
and time consuming authentication elements that have been on the backlog for a while. 
Having the extra time to dedicate to these has been helpful to perform the discovery and learning
required without consuming many-a-weekend.

Now I've reduced some of the PR backlog, initial focus going into next week will be on 
upgrading the codebase framework from Laravel 6 to Laravel 8 (As mentioned the "Next Steps"
of the last two feature release posts). Once this upgrade is done I'll look to test things out
via making improvements to existing systems. Both the search system and tagging capabilities are
in need of some attention.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@benofthenorth?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Ben Griffiths</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>