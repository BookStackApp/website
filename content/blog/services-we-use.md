+++
categories = ["Community"]
tags = ["Open Source", "Services"]
title = "The Services We Use"
date = 2021-10-15T16:39:32Z
author = "Dan Brown"
image = "/images/blog-cover-images/zebra-herd-the_bracketeer.jpg"
slug = "services-we-use"
draft = false
+++

Now that [I've got a bit more time](https://danb.me/blog/posts/leaving-my-job-to-focus-on-open-source/)
to work on BookStack, I thought it'd be good to
do something a little different on the blog and pay tribute to the services we use
to help manage the project. Keep in mind that this is not a complete listing
of projects that we use within BookStack itself, but instead a listing of the services
and projects that we use from a project & code management point of view. 


### GitHub

![GitHub](/images/2021/10/github.png)

[GitHub](https://github.com/BookStackApp/BookStack) provides a lot of the core central management of the project.
We use GitHub for the following:

- Central location for code management.
- Issue and feature request tracking.
- Release planning and management.
- Code contribution management via Pull Requests.
- Automated running of our test suite.
- Sponsorship management.

Originally I hosted the project on GitLab but, after deciding that I'd want to push
the project further into the open, I decided to move it to GitHub for better visibility.
Although not open itself, GitHub has provided good facilitation of the project's needs
and our value from GitHub has grown as they've increased their feature-set with new
offerings such as [GitHub Actions](https://github.com/BookStackApp/BookStack/actions)
and [GitHub Sponsors](https://github.com/sponsors/ssddanbrown).

### Plausible

![Plausible](/images/2021/10/plausible.png)

[Plausible](https://plausible.io/) provides [our website analytics](https://analytics.bookstackapp.com/bookstackapp.com) as a privacy friendly alternative
to the Google Analytics tracking we used to use. I detailed our migration
in [a blogpost earlier this year](https://www.bookstackapp.com/blog/replacing-ga-and-mailchimp/).

The information it provides is concise and exactly what I may need to know about our website's usage. Plausible is a great open-source offering, with a focused goal which
it meets superbly. We self-host an instance and then contribute back via GitHub sponsors.

### CrowdIn

![CrowdIn](/images/2021/10/crowdin.png)

[CrowdIn](https://crowdin.com/project/bookstack) provides translation management
services for BookStack. Previous to using CrowdIn translations would be managed
via GitHub pull requests which could pose a significant barrier to non-developer
translators while being tricky for me to manage.

Using CrowdIn's free-for-open-source
offerings provided a central location to track translations while massively
improving accessability for translators. CrowdIn the integrates neatly back to GitHub
to send back all translation changes via a single pull request making my maintainer role
easier. Overall it's very valuable and I'm grateful to CrowdIn for their free offering.

### StyleCI

![StyleCI](/images/2021/10/styleci.png)

It's good to have consistent code styling within a project to ease the cognitive load.
I did use [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) to impose
a standard but I'd often forget to run it or be hesitant of causing a lot of changes
which would then complicate pending pull requests.

Instead I turned to [StyleCI](https://styleci.io/), an offering from the great
open source wizard [Graham Campbell](https://twitter.com/GrahamJCampbell).
StyleCI will automatically assess code style upon push to GitHub, with blazing speed,
and report back if there any issues. You can then pull the fixes to be made
via automated or manual means to get the code back into shape. 

While StyleCI does cost, Open source projects can use it for free. It's a 
classic example of a focused service that just does exactly what you need it to, 
making your life easier in the process. 

### Code Climate

![Code Climate](/images/2021/10/code-climate.png)

[Code Climate](https://codeclimate.com/github/BookStackApp/BookStack) is something
I added to the project out of curiosity a few years ago and have since left active
after getting a surprising amount of value back. Code Climate provides code quality
analysis, highlighting potential maintainability issues in code. 
I don't follow it's guidance religiously but it's proved useful to get a feel
when particular files might be getting out of control. 

CodeClimate is not open source but it does provide free services to Open Source
projects. It's another service that was super simple, taking only minutes to set-up,
while providing a net benefit. 

### Hugo

![Go Hugo](/images/2021/10/gohugo.png)

Not so much a service as an open source project, but [Hugo](https://gohugo.io/) plays a big
part for our website and this blog. Hugo is a static-site generator that allows 
us to generate a performant, easy-to-host, static HTML site for our docs, blog
and homepage from content [we can manage via GitHub](https://github.com/BookStackApp/website).

Hugo has remained great for our usage and has remained super fast even as
the site and blog have grown. I've sometimes had trouble wrangling with the 
template & variable syntax but I can usually find a solution and it's infrequent
I need to make changes. Overall, A great open-source project.

### Mailbag

![Mailbag](/images/2021/10/mailbag.png)

Mailbag is a project I created myself to manage [our mailing lists](https://updates.bookstackapp.com/signup/bookstack-news-and-updates) as an alternative
to our previous Mailchimp usage.  I detailed our migration
in [a blogpost earlier this year](https://www.bookstackapp.com/blog/replacing-ga-and-mailchimp/).

It's quite a simple system, focusing on plaintext email content,
but it's designed to privacy respecting and fast to use. [I provide it under the 
MIT license via GitHub](https://github.com/ssddanbrown/mailbag).

### Discord

![Discord](/images/2021/10/discord.png)

Although primarily intended for gaming, [Discord](https://discord.com/) has been 
adopted as the discussion system of choice by many open source projects.
Personally I was very hesitant about [utilizing it for BookStack](https://discord.com/invite/ztkBqR2)
but Discord has acted as a very good host,
providing any required features while doing so with a 
great user experience. Discord has proved itself as a great alternative to our 
GitHub issue list as a place to informally discuss the project and to seek/provide
support.

### OVH

![OVH](/images/2021/10/ovh.png)

I've used many hosting providers over the years but I've landed on using
[OVH](https://www.ovh.co.uk/) for most of my personal projects thanks to their
relatively cheap price-point for VPS systems in Europe.
Their reliability may not be at Google Cloud or AWS levels, with a few recent events
occuring including [data centre fires](https://www.reuters.com/article/us-france-ovh-fire-idUSKBN2B20NU)
and [network configuration issues](https://www.theregister.com/2021/10/13/ovh_outage/),
but I'm happy to sacrifice a little reliability for a better price and
predictable pricing. We use OVH's VPS offerings to host this website & blog.


### Algolia DocSearch

![Aloglia DocSearch](/images/2021/10/docsearch.png)

The BookStack documentation pages are generated as part of the website static-site build.
While there are options for search in this scenario, using [DocSearch](https://docsearch.algolia.com/) by Algolia has made things very easy which providing a 
great search experience within our documentation. DocSearch is offered free
by Aloglia for open source projects.


----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@the_bracketeer?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Hendrik Cornelissen</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></span>