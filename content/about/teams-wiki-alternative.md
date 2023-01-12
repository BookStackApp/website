---
title: "BookStack: An Open Source Microsoft Teams Wiki Alternative"
---


With Microsoft retiring wikis within teams you may be looking for an alternative solution for documentation within your 
environment. BookStack offers a potential free and Open Source alternative for your needs.

{{<yt XBrqKRqt0lY>}}

### What BookStack Offers

##### AD Compatible SSO Options, Without the Tax

Built in to the BookStack core are SSO options for authentication including LDAP, OIDC and SAML2.
These also have the ability to map BookStack user roles to auth system groups for easy permission control.

##### Self-Host Without Complex Requirements

BookStack is built to be self-hosted and it can be done so without needing a great deal of resources.
It's fundamentally a modern PHP application using MySQL as a datastore. 
It can easily be ran on a 1GB RAM VM, and it's resource usage scales with system activity. 

##### WYSIWYG Editor Experience, Markdown for Power Users

At the core of BookStack is a WYSIWYG editor for its "pages" to ensure easy usage for all those within a business.
Optionally, a Markdown editor can be used instead if preferred. 

##### Content Format Keeping to Standards

The content written in BookStack is primarily stored in a relatively simple and flat layer of HTML. 
It's a core focus of ours that content remains portable so you're never seriously vendor-locked.

##### APIs and Extension

We have a developing simple REST API that covers all the core content types and user management requirements.
We also have extension options that allow customization of any view, icon or text, upon some options to extend back-end functionality.

##### Established Community Resources

Since 2016 BookStack has built a community across GitHub, Reddit and Discord.
Upon that, we have a built up library of video guidance on YouTube to provide detailed help for trickier subjects such as auth setup.

##### Built-in Diagramming

BookStack comes ready-integrated with [diagrams.net](https://www.diagrams.net/) for easy creation and editing of diagrams within
your documentation content.

##### Permission, Roles & Admin Controls at the Ready

Built in is a core role-based permission system that allows a great level of control for admins, which includes global and content-level control.
Admins also have access to an audit log for visibility into platform activity. 

##### Enterprise Support Available

While we have a range of community support options, we also have a range of [business support plans](/support/)
for where assured and official support is required.

---

The above only lightly touches on the functionality and features of BookStack.
To get a real feel of what BookStack is get started with your own instance or explore our demo:

[GitHub](https://github.com/BookStackApp/BookStack)   |   [Demo Instance](https://demo.bookstackapp.com)   |   [Installation Instructions](/docs/admin/installation)

[Read more and see screenshots on our homepage »](/)

---

## Migrating From Teams Wiki to BookStack

We don't have an automated way to migrate your content directly from Teams to BookStack.  
We do have a growing [REST API](/docs/admin/hacking-bookstack/#bookstack-api) that can be used to automate some of the process where possible.
We also have a collection of [API usage examples in various languages](https://github.com/BookStackApp/api-scripts) to help jumpstart your own tooling where needed.
