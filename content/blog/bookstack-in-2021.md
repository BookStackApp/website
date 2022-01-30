+++
categories = ["News"]
tags = ["News"]
title = "BookStack in 2021"
image = "/images/blog-cover-images/robin-alfred-kenneally.jpg"
author = "Dan Brown"
slug = "bookstack-in-2021"
draft = false
date = 2021-12-31T19:30:00Z
+++

Thought it would be nice to take some time out to look back over the last year
and review how things have progressed. This'll be a relatively high level summary
but more detailed figures can be found in our [six years of BookStack](/blog/6-years-of-bookstack/)
post from back in July.

### Development Rate

Development rate in 2021 has been fairly steady. The chart below shows releases, of any type, per month from the start of 2020 through to now:

![2021 Development Rate Chart](/images/2021/12/2021_development_rate.png)

For 2021 we've had releases every single month with 7 feature releases and 30 patch 
releases. In the last few months, [since leaving my job](https://danb.me/blog/posts/leaving-my-job-to-focus-on-open-source/), I've been able to wrap up a feature release every month thanks to having much more time available to devote to the project.
I hope to continue this cadence although a focus on some larger upcoming features may hinder this at some level.

### New Features & Enhancements

Below lists many of the major additions we've added to BookStack in 2021
across the 7 feature & 30 patch releases:

- Tag overview page
- Favorites system
- Recycle bin
- Content ownership
- Multi-factor authentication
- OpenID Connect authentication
- Outgoing webhooks
- Chapter, book & role copying
- Custom footer links
- Logical theme system implementation
- 8 new languages:
  - Norwegian, Bosnian, Catalan, Indonesian, Latvian, Portuguese, Lithuanian, Estonian
- Next/Previous page & chapter navigation
- A large amount of search enhancements
  - Tags within search results
  - More advanced parsing and scoring
  - Relative usage based-scoring
- LDAP user avatar import
- Markdown export
- Improved accessibility
  - Usage of new contrast preferences
  - Addition of "Skip to content" link
  - Header keyboard navigation overhaul
- API enhancements
  - Page endpoint
  - Search endpoints
  - Image upload via page markdown/html content
  - Attachment endpoints
- Audit log enhancements
  - Greater event tracking
  - More search options
  - Addition of IP address tracking
- Shelf sorting
- A new debug view
- Implementation of Content Security Policy for greater security
- Laravel framework update from Laravel 6 to Laravel 8
- PHP 8 & 8.1 support

Personally, my favorite addition has been the "Favorites" system since it was relatively easy to implement
while having a large affect on my own usage, in allow personal content list curation for quick 
access.

The developments to the API this year have meant it's now viable for many use-cases, and it's been 
good to hear feedback of people using this to automate and speed-up processes. The recent addition
of webhooks, along with the implementation of the logical theme system, mean that BookStack
is now much more extensible and open for integration.

Some of the most challenging developments this year have been then authentication elements; OpenID Connect and 
multi-factor authentication. Understanding the relevant specifications, while attempting to understand the 
various desired user/environment use-cases, takes a lot of time and discovery. It's been personally
beneficial to learn some new web standards but the effort and time required, while knowing the likely
limited existing BookStack audience usage, can be demoralizing. Going into 2022 I'll be even more defensive
when it comes to implementing further authentication features.

Gaining an extra 8 languages is pretty incredible. I can't thank [the translating community](https://github.com/BookStackApp/BookStack/blob/development/.github/translators.txt)
enough for the work they do to add and update language content.

### Version Numbering Change

Back in April, [as of v21.04](/blog/bookstack-release-v21-04/), we dropped our beta 
status and moved to a new versioning scheme which follows a year-month style format. 
This change went pretty smoothly and the new scheme has already been very
beneficial to me when dealing with support requests, allowing me to instantly know the relative
age of someone's BookStack instance just by their version number. Looking back, I'm
happy we made this change.

### YouTube Videos

Producing official BookStack videos has been a new thing for 2021.
You can [find the YouTube channel here](https://www.youtube.com/channel/UCH66RFWfw6CSm2T1EM4ik1g).
This has been an interesting new learning process for me as I attempt to improve the presentation
and quality of these videos, but it's also been quite fun during moments I want to do something
a little more creative. 

Below is my most recent video, at time of writing, which goes over using webhooks in BookStack:

<iframe width="100%" height="420" src="https://www.youtube.com/embed/_zIp1ruGpoI" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Having videos on specific BookStack topics has already proved very handy when needing to reference
certain functionality and processes when supporting others so I'll look to continue producing videos throughout 2022.

### Official Twitter Account

In October I created an [official BookStack twitter account](https://twitter.com/bookstack_app) 
so people can follow project updates without having to also scroll through 
cat pictures on my personal handle. This is something I should have done sooner really
since it's clear that people are more likely to tag the project in their own tweets when 
an official account exists, providing a network boost affect. 

### Sponsors & Project Funding

Over the last year I've been accepting [sponsorship/donations via GitHub](https://github.com/sponsors/ssddanbrown).
Initially most of these donations were used to help donate to upstream projects used by BookStack.
Over the last few months I've stopped expanding that idea, while not being employed, to assess viability
of working on BookStack full time. 

![GitHub Sponsor Progress, 23% towards $2k goal](/images/2021/12/sponsor_progress.png)

A massive thanks to all those that have sponsored me so far. 
There's been over 50 unique donators contributing in various amounts. 
About half of these are one-off donations with the other half being monthly/yearly commitments.
I set a monthly goal on my profile of $2,000 since that would roughly cover my living costs 
to work on BookStack full time (If I chose to take that path).

A special massive thanks to JGraph (Known for [draw.io/diagrams.net](https://www.diagrams.net/)) and
[Stellar Hosted](https://www.stellarhosted.com/) for their especially large monthly sponsorships.
I've since formalised the larger "Company" sponsorship tiers, to provide logo display on the 
BookStack website homepage in addition to the project readme, as a token of thanks and to encourage
further company level monthly sponsorships.

![BookStack Silver and Bronze Sponsors](/images/2021/12/company_sponsors.png)


### Website Usage

Throughout 2021 our bookstackapp.com website usage has been fairly flat, with it lowering in the 
northern hemisphere summer months. Ideally I'd like to see this grow at a greater rate
as BookStack reaches a larger audience but I find it difficult to gain engagement outside of
existing BookStack specific channels.

![Website analytics for 2021](/images/2021/12/site_stats.png)

All of our website analytics are accessible here: [BookStack Plausible Analytics Instance](https://analytics.bookstackapp.com/bookstackapp.com).

### Going into 2022

As of now, I'm still planning on spending the next 3 months focused on BookStack. My attention will be
primarily dedicated to building the new editor. The next stage after that [on the roadmap is](https://github.com/BookStackApp/BookStack#%EF%B8%8F-road-map) is a permission system review but there may be a stage before this to
heavily restructure the BookStack content database to support future plans in permission & URL handling.

Over these next few months I'll be further assessing my own stance on BookStack work, exploring how maintainership
fits in with my own career desires & if it's viable to work on BookStack full time.

---
  
<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp; <span>Photo by <a href="https://unsplash.com/@alken?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Alfred Kenneally</a> on <a href="https://unsplash.com/s/photos/mountain-river?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  </span></span>