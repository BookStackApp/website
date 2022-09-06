+++
categories = ["Releases"]
tags = ["Releases"]
title = "BookStack Release v21.10"
date = 2021-10-25T14:20:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/gate-benofthenorth.jpg"
slug = "bookstack-release-v21-10"
draft = false
+++

October brings us BookStack v21.10. This release is primarily intended to wrap up a few 
loose ends before we make more substantial framework changes, but it does bring with
it a new authentication option in addition to some new API endpoints.
In the below we'll dive into many of the new features and improvements added
[since v21.08](/blog/bookstack-release-v21-08/).

* [Update instructions](https://www.bookstackapp.com/docs/admin/updates)
* [GitHub release page](https://github.com/BookStackApp/BookStack/releases/tag/v21.10)


**Upgrade Notices**

- **Security Releases** - There were some security vulnerabilities found during the life of 
  v21.08. See the [v21.08.2](/blog/bookstack-release-v21-08-2/) and
  [v21.08.5](/blog/bookstack-release-v21-08-5/) posts for more details.
- **Content Security Policy** - v21.08.2 introduced the use of BookStack-applied CSP headers. These
  could potentially conflict with any CSP headers set a server-level. The use of these are detailed
  in the post below and details of the headers can be found on the [security page here](/docs/admin/security/#content-security-policy-csp).

### OpenID Connect Authentication

v21.10 brings with it the option of using OpenID Connect (OIDC) as a primary authentication method
within BookStack.
This allows authentication integration with a wide range of providers that support the OIDC standard. 
The implementation includes basic auto-discovery of endpoints & keys for easier configuration.
During development it has been tested with Okta, KeyCloak and Auth0. 

![BookStack OpenID Connect Login View](/images/2021/10/oidc.png)

For this initial implementation we don't yet support group sync but I've opened up a
[GitHub issue here](https://github.com/BookStackApp/BookStack/issues/3004) to gain feedback on how
identity providers supply groups. Please contribute feedback on that issue if you desire OIDC group support.

You can find documentation on [using OpenID Connect here](/docs/admin/oidc-auth/).

### API Updates

#### Attachment Endpoints

A new set of API endpoints have been introduced to support the management of attachments. 
Full CRUD & listing operations are supported for both file-upload and external-link style
attachments.

![Attachment API Endpoints View in API docs](/images/2021/10/attachment-api-endpoints.png)

#### Image Upload via Markdown Content

Since v21.05.1 it has been possible to upload images as part of an API page update or create operation,
via embedding the image as a data-uri within HTML content. This release builds upon that to bring 
the same functionality to markdown content on the same API endpoints; For example:

```markdown
![My image](data:image/png;base64,ABC123...)
```

### TOTP URL During MFA Setup

Since the TOTP MFA system was added to BookStack in the last feature release, it was reported
that some TOTP-handling services require a URL, or secret code, instead of a QR code. To support
this, as of v21.08.1, we now show the TOTP URL below the QR code, which the secret can be copied out from 
if needed.

![Preview of TOTP URL input within MFA TOTP Setup process](/images/2021/10/totp-url.png)

### IP Address in Audit Log

Within BookStack v21.08.4 the audit log was updated to now record and show the related user IP address 
for activities. Note, if you're using a reverse proxy in front of BookStack you may need to configure
the `APP_PROXIES` .env option [as shown here](https://github.com/BookStackApp/BookStack/blob/9c2b8057ab7b744c0824a9a3e48c3ccd36b8c103/.env.example.complete#L45-L51) otherwise the reported IP
address may be that of the proxying system instead of the user.

![IP Address shown in Audit Log View](/images/2021/10/audit-log-ip.png)

Thanks to [@johnroyer](https://github.com/BookStackApp/BookStack/pull/2936) for the addition of this feature.

### Smarter Concurrent Editing Detection & Warnings

Thanks to [@MatthieuParis](https://github.com/BookStackApp/BookStack/pull/2877), BookStack will now run
additional potential editor conflict detection upon draft saves whereas previously this would only run upon the
start of an editing session. This should prove especially useful when someone has the editor open for 
a while, since there's now a much greater chance of being alerted if someone else starts editing the
same page. This enhancement was added as part of v21.08.5.

![Preview of warning message shown on editor conflict detection](/images/2021/10/editor-conflicts.png)

### New Debug View

In v21.08.6 a new BookStack specific debug view was introduced.
This was introduced to limit the accidental sharing of errors and confidential details, while
providing important details & potentially helpful BookStack specific resources to the admin
attempting to debug the problem at hand.

![Preview of the page BookStack error debug view](/images/2021/10/debug-view.png)


### Translations

Another feature release, another language added to BookStack. A massive thanks to Indrek Haav for
adding Estonian to BookStack!

As usual, there's been a bunch of translation updates via CrowdIn since the last feature release.
Thanks a bunch to all those listed below for their great continued work!

- Indrek Haav (IndrekHaav) - *Estonian*
- na3shkw - *Japanese*
- Nicolas Pawlak (Mikolajek) - *French; Polish; German*
- Michał Lipok (mLipok) - *Polish*
- Hl2run - *Slovak*
- Leonardo Mario Martinez (leonardo.m.martinez) - *Spanish, Argentina*
- FastHogi - *German; German Informal*
- Statium - *Russian*
- Giancarlo Di Massa (digitall-it) - *Italian*
- Thomas Hansen (thomasdk81) - *Danish*
- Ngo Tri Hoai (trihoai) - *Vietnamese*
- Luís Tiago Favas (starkyller) - *Portuguese*
- Francesco Franchina (ffranchina) - *Italian*
- Radim Pesek (ramess18) - *Czech*
- aarchijs - *Latvian*
- 10935336 - *Chinese Simplified*
- m0uch0 - *Spanish*
- nutsflag - *French*
- anastasiia.motylko - *Ukrainian*
- M Nafis Al Mukhdi (mnafisalmukhdi1) - *Indonesian*
- 慕容潭谈 (591442386) - *Chinese Simplified*

### Introduction of Content Security Policy

Within v21.08.2 [Content Security Policy (CSP)](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP)
headers were added to the responses served by BookStack.
This massively helps reduce the impact of a wide range of potential XSS vulnerabilities by restricting
the types of scripts that can run within the content of a page.

Content within the "Custom HTML Head Content" is automatically parsed to be correctly tagged so it adheres
to the fairly strict policy set. Any custom script additions you've made may need adjustment.

Details of headers set can be found in the [CSP section of our security page](/docs/admin/security/#csp).

### SAML 2 Enhancements

The SAML 2.0 authentication system has received some attention in this release.
It has been found that logging in via
SAML could lose the original intended location context of a user, leading to them being redirect to the 
homepage after login instead of the page they actually wanted to visit. This was due to a change in cookies
causing the user's session to be lost during the SAML flow. This release tweaks the flow so the session
is kept for correct expected redirection.

Upon the above, A couple of new `.env` options have been introduced to allow the configuring of service
provider certificate and key:

```bash
# Service Provider Certificate & Key (Optional)
# Providing these will provide key data within BookStack's metadata endpoint
# while implicitly enabling signing on Authn and Logout requests.
SAML2_SP_x509=<cert_data>
SAML2_SP_x509_KEY=<key_data>
```

These options were primarily added to help fix single-logout-service requests when using 
ADFS.Thanks to [@theodor-franke](https://github.com/BookStackApp/BookStack/pull/2902) for helping by doing the initial work to implement these changes.


### Full List of Changes

**Released in v21.10**

* Added OpenID Connect authentication option. Thanks to [@jasperweyne](https://github.com/BookStackApp/BookStack/pull/2169). ([#2960](https://github.com/BookStackApp/BookStack/pull/2960), [#2169](https://github.com/BookStackApp/BookStack/pull/2169), [#1390](https://github.com/BookStackApp/BookStack/issues/1390), [#1157](https://github.com/BookStackApp/BookStack/issues/1157))
* Added Attachment API endpoints. ([#2986](https://github.com/BookStackApp/BookStack/pull/2986), [#2942](https://github.com/BookStackApp/BookStack/issues/2942))
* Added Estonian language to BookStack via Crowdin. ([#2979](https://github.com/BookStackApp/BookStack/issues/2979))
* Added support for SAML2 SLS signing to help address issues with ADFS. Thanks to [@theodor-franke](https://github.com/BookStackApp/BookStack/pull/2902). ([#2902](https://github.com/BookStackApp/BookStack/pull/2902))
* Added support for base64 image content within markdown text via page POST/PUT. ([#2898](https://github.com/BookStackApp/BookStack/issues/2898))
* Updated translations from Crowdin contributors. ([#2983](https://github.com/BookStackApp/BookStack/pull/2983))
* Updated SAML ACS post flow to retain user session and therefore redirect to the correct location upon login. ([#2996](https://github.com/BookStackApp/BookStack/pull/2996), [#2552](https://github.com/BookStackApp/BookStack/issues/2552))
* Fixed padding within book-tree sidebar items. Thanks to [@ffranchina](https://github.com/BookStackApp/BookStack/pull/3000). ([#3000](https://github.com/BookStackApp/BookStack/pull/3000))

**Released in v21.08.1 through v21.08.6**

* Added custom whoops-based debug view which fixes issue where debug view would not show content due to CSP rules. ([#2977](https://github.com/BookStackApp/BookStack/pull/2977), [#2976](https://github.com/BookStackApp/BookStack/issues/2976))
* Added throttling to password reset requests. ([ca764ca](https://github.com/BookStackApp/BookStack/commit/ca764caf2d55a5c9bac61718d656423b0c3a060b))
* Added IP address to tracked activities and displayed in audit log. Thanks to [@johnroyer](https://github.com/BookStackApp/BookStack/pull/2936). ([#2936](https://github.com/BookStackApp/BookStack/pull/2936), [#2747](https://github.com/BookStackApp/BookStack/issues/2747))
* Added the option to use database table prefixes. Thanks to [@floviolleau](https://github.com/BookStackApp/BookStack/pull/2935). ([#2935](https://github.com/BookStackApp/BookStack/pull/2935))
* Added concurrent page editing warnings upon draft save events. Thanks to [@MatthieuParis](https://github.com/BookStackApp/BookStack/pull/2877) ([#2877](https://github.com/BookStackApp/BookStack/pull/2877))
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
* Fixed issue where TOTP setup would provide guest email address upon QR code scan when MFA setup was enforced at login. ([#2971](https://github.com/BookStackApp/BookStack/issues/2971))


### Next Steps

This release marks the first feature release since [I left my job](https://danb.me/blog/posts/leaving-my-job-to-focus-on-open-source/) to focus on BookStack and other bits
for a while. My main focus of v21.10 was to work through some of the challenging
& time consuming authentication elements that have been on the backlog for a while. 
Having the extra time to dedicate to these has been helpful to perform the discovery and learning
required without frustratingly consuming many-a-weekend.

Now I've reduced some of the PR backlog, initial focus going into this week will be on 
upgrading the codebase framework from Laravel 6 to Laravel 8 (As mentioned the "Next Steps"
of the last two feature release posts). Once this upgrade is done I'll look to test things out
via making improvements to existing systems. Both the search system and tagging capabilities are
in need of some attention and hence is where I may spend some time.

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@benofthenorth?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Ben Griffiths</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>