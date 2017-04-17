+++
categories = ["News"]
tags = ["News"]
description = ""
slug = "ditching-disqus-comments"
draft = false
title = "Ditching Disqus Comments"
date = 2017-04-17T13:05:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/dog-splash-peter-hershey.jpg"
+++

Just a small update about a change on the blog here.
I have decided to drop the use of Disqus as a commenting system and instead
replaced the comments area with a few simple links to my twitter and to the
BookStack issues page.

I've really liked Disqus and am grateful for the service they
provided but it looks like they are moving forward with increasing their ad
displaying and user tracking.

A few times recently I've noticed requests hanging when loading blog pages
which keeps the tab loading icon spinning making the load time feel slow and
you'd sometimes see tracking domains pop up in the corner of the browser.
Looking at the network requests a whole load of requests were going out to
ad tracking domains even though ads were not showing. Some of these requests
were even failing stretching out that load time feeling.

Here's two screenshots to compare the page network activity for the same page
with and without Disqus:

**Disqus Enabled**

![With Disqus](/images/2017/04/disqus_enabled.png)

**Disqus Disabled**

![Without Disqus](/images/2017/04/disqus_disabled.png)

So here's what that shows, On a single page Disqus:

* Increased the download size by 2.5x
* Increased the request count by 8.5x
* Increased the total page load time by 25x

This was tested on a locally served maching so that will effect those results
against Disqus's favour but the difference on the live, remote system isn't much
different. From the above I've decided, for my use case, Disqus is not worth it.
I'd rather have faster feeling pages and increase user privacy than have
comments available.

Thank you to all those whom have previously left constructive and positive
comments about the project. I am thinking about using something like Gitter
as an alternative source of feedback and discussion but for now I'm keeping it
simple.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@peterhershey" target="_blank">Peter Hershey</a></span>
