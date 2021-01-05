+++
title = "Replacing Google Analytics & Mailchimp"
date = 2021-01-05T18:44:52Z
categories = ["News"]
tags = ["News"]
author = "Dan Brown"
image = "/images/blog-cover-images/penguin-steffen-triekel.jpg"
draft = false
+++

On this BookStack site I have been using Google Analytics to track visitor metrics.
While not crucial to know, it's generally useful to have an idea of the target audience, current popularity and
be aware of any visitor spikes. For the email updates and email security alerts I've been
using Mailchimp. This post explains the move to more privacy aware alternatives.


### Google Analytics to Plausible

BookStack, being an open source self-hostable platform, will have an audience that's generally quite privacy aware.
Google is generally seen as an ever-growing threat to privacy on the internet. 
Google Analytics, as a service to track website visitor metrics, is very popular and well used since it's available
without paying and provides a very good amount of data hence was my choice for this site until now but I've 
had a growing unease sending visitor's details to Google without their consent. I did use it without cookie
usage while choosing to anonymise IP addresses but it would still effectively contribute to Google's 
own data usage which may be misaligned with the wishes of visitors.

As an alternative, I've set-up a self-hosted instance of [Plausible](https://plausible.io/). 
I was initially put off with its simplicity, compared to Google Analytics; I mean it has way fewer menus, graphs,
pages and options so it must be inferior right? But I thought about the questions I want answered from such a service:

* How many visitors are on my site?
* How many visitors have been on my site?
* Where have they come from?
* What pages are being viewed?
* What country are they visiting from?
* What kind of devices are being used?
* When does a traffic spike occur?

Plausible answers all of these, and it does so directly, in an easy and beautiful UI.
It's simplicity actually makes it better for the questions I need answered since I no longer
need to navigate through the slow, confusing interface that Google Analytics presents.
It's all just there in a single view.

![Plausible BookStack Site Analytics](/images/2021/01/plausible_bookstack_site_analytics.png)

Plausible offer paid, hosted plans but I've chosen to self-host the service to keep costs minimal and so that my visitor's data
is not held by a third-party. That said, I still want to support the project which can be done as a self-hoster via 
their [GitHub sponsors page](https://github.com/sponsors/plausible). Setup was a straight-forward process using their docker
configuration and it's been stable so far. I ran it alongside Google Analytics for a few days to check if figures aligned. 
The numbers were slightly higher (~5 to 10% or so) on the Plausible side which I'd guess may be down to visitors blocking
Google scripts/domains.

One of my favourite features of Plausible is that it's really easy to make the dashboard public which is something
I've often wanted to do with Google Analytics in the interest of transparency. The BookStack dashboard can be 
seen at https://analytics.bookstackapp.com/bookstackapp.com.

### Mailchimp to MailBag

As mentioned in the intro, I've been using Mailchimp to send newsletter updates and security alerts.
To be honest, It's worked fairly well; Their interface is generally pleasant, it was cost-free for my usage,
it sent the emails without issue. That said, there were two things I was not a fan of:

1. It's another entity that registrants would have to trust in addition to myself/BookStack.
2. They added link tracking even when choosing to disable it.

The second point really irked me, especially since you could choose to disable it during campaign setup.
To be fair, I did not raise it with them but based on this line from their [support page](https://mailchimp.com/help/troubleshooting-click-tracking/):

> We encourage you to leave click tracking on. However, you can disable click tracking in paid accounts after you've sent a few campaigns without any compliance issues.

It appears that user privacy may be a paid feature. 

This tracking was particularly unappealing on our plaintext security updates.
It's not obvious at all where the links actually lead to:

![Mailchimp Tracked Links Example](/images/2021/01/mailchimp_tracked_links.png)

When looking around for alternatives, I found lots of great options including:

- [Mailcoach](https://mailcoach.app/)
- [phpList](https://www.phplist.com/)
- [listmonk](https://listmonk.app/)
- [Mautic](https://www.mautic.org/)

Unfortunately though many of these lacked an auto-RSS-send feature and/or appeared too complex
for the focused use-case I had in mind so, with some extra Christmas holiday time, I put together
my own app which I've called [MailBag](https://github.com/ssddanbrown/mailbag).

![MailBag Home Dashboard ScreenShot](/images/2021/01/mailbag.png)

This is a purposefully very simple app and has lots of limitations, as listed in the [readme](https://github.com/ssddanbrown/mailbag#mailbag),
but it does what I need it to while providing me an opportunity to work on something
fresh for a change to sharpen some development skills.
There is no open/click tracking support; No HTML email support.

Over the next month or so I'll be migrating the existing contact lists from Mailchimp. I'll send out emails to existing
subscribers as a advisory and to provide an opportunity to opt-out of the migration beforehand. The subscribe links, found
at the bottom of all posts here, have been updated to the MailBag instance since I'll be running both systems side-by-side for a while.

----

<span style="font-size: 0.9em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@okinapansa?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Steffen Triekels</a> on <a href="https://unsplash.com/t/animals?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>