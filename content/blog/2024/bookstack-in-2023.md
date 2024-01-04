+++
categories = ["News"]
tags = ["News"]
title = "BookStack in 2023"
image = "/images/blog-cover-images/cc-by-4/winter-gardens-scott-wylie.jpg"
author = "Dan Brown"
slug = "bookstack-in-2023"
draft = false
date = 2024-01-04T12:35:00Z
+++

As we enter into 2024 I thought we'd once again look back over the past year to 
review the development of the platform throughout 2023 while also diving into
topics about the wider project including funding and the impact of AI.

{{<toc>}}

### Project Funding

With 2023 now complete that marks another full year where I've been focusing on BookStack
instead of being employed elsewhere. Looking back to [my 2022 post](https://www.bookstackapp.com/blog/bookstack-in-2022/)
I had totalled about £15k of funding, with the rest of my living costs being paid for via personal savings.

For 2023 I'm pleased to say funding has increased to about £25.8k across our revenue streams!
While this excludes most taxes and costs, this marks a substantial increase and exceeds
the £24k target set out in my [7 years of BookStack post](https://www.bookstackapp.com/blog/7-years-of-bookstack/#working-on-bookstack-full-time--financial-stability).
Here's a breakdown of this funding:

![Monthly stacked bar chart revenue for 2023, split between sources: GitHub sponsors, Support Services & Ko-Fi. Most bars are between £1500 and £2000, although three spike just beyond £3000](/images/2024/01/bookstack_2023_income.png)

[GitHub sponsors](https://github.com/sponsors/ssddanbrown) has been relatively stable throughout the year, with a little fluctuation due to one-off donations and sponsors dropping in/out, and the december spike reflecting up-front sponsorship payment.
[Usage of Ko-Fi](https://ko-fi.com/ssddanbrown) has increased during 2023, with a current monthly recurring membership of £127 between donators and sponsors, with frequent one-off donations in various sizes.

The biggest growth factor by far has been through the support services.
As you can see, I've had some consistent monthly income through support services to help bolster income.
The lack of services reflected in December is just due to how I report on these figures, services were purchased in this month but they'd be reflected in Jan 24 numbers.
Renewal of support services upon those purchased last year has been healthy which, when combined with new subscriptions, has resulted in a stable 
revenue source for 2023.

I can't thank enough all those that have donated, sponsored, or purchased support offerings.
It's incredible to me that I'm able to pretty much cover my living costs, while building and sharing
an open source project, without needing to gate or lock features behind paywalls & barriers, and without 
having money dictate the direction of the project.

Now that I had a stable income source, without the need to burn through
savings, I could now comfortably adopt a cat once again so a thanks also from this 
floofy little lion named Ben who I adopted from Cats Protection early in December:

<img src="/images/2024/01/ben.jpg" width="240">

Ben will take a primarily motivational role on the BookStack project, while also acting as our chief mouser.

### New Features & Enhancements

Throughout 2023 we've published 7 feature releases, with 15 patch versions for those.
The below list summarizes many of the most significant additions and changes made during these releases:

- Notification system
- System CLI for common maintenance tasks
- App shortcut icon control
- Default page templates within books
- Comment threading
- Separate dark/light mode color options
- Image manager UI and behaviour overhaul
- WYSIWYG editor for descriptions
- Nesting support for page includes
- Comments in the editor sidebar
- Permission system logic revamp
- Overhaul of page include back-end logic
- "My account" area
- Page editor design update
- Basic PWA support
- OIDC logout integration
- Book, and shelf-book, sorting made accessible with improved UX
- Updated underlying framework to Laravel 9
- Updated code handling to CodeMirror 6
- New Languages:
  - Finnish
  - Norwegian Nynorsk
  - Uzbek
- API Additions:
  - Roles
  - Image gallery
  - Content permissions
  - Content ordering support
- Customization:
  - Expanded JavaScript event hooks
  - Added logical theme events
  - Added more customization-focused partial views

Looking across what has been achieved I'm really quite happy with the balance between new features & systems,
and improvements to existing parts of the platform.
I'm always trying to keep a focus on building upon, and improving, the platform for our existing user
base instead of chasing a wider audience via new features, and I think we're keeping to that focus well.

The overhaul of permissions logic stands out in that list as a particular pain-point to work on due to 
the logical complexity involved, but I'm happy I spent the time to get that in order rather than 
leaving in unpredictable logic.

Some favourites for me, although they're minor, are the overhauls to sorting and image management.
This work involved updating older interfaces so digging in to refresh these in a meaningful way, with
a much bigger focus on accessibility, was pretty enjoyable to get into while resulting in 
clear visual benefits to the user, unlike most time spent working on back-end improvements.

### Website Usage & Audience Reach

Looking at the [BookStack website analytics](https://analytics.bookstackapp.com/bookstackapp.com)
we can compare activity between 2022 and 2023 to understand year-relative growth
in website usage and audience reach:

![Weekly visitor chart comparing visits in 2022 to those in 2023, with detailed metrics along the top. The 2022 line shows a spike at the start of the year, but then generally sits just under that for 2023](/images/2024/01/2023-vs-2022-site-analytics.png)

Across visits and page-views, we can see a general average growth between 10% and 20%.
This is a bit lower than the 45% growth last year, but is not bad considering I've done almost no
additional outreach or marketing content pushes this year, so a ~15% growth indicates
a nice steady natural rise.

Last year we started the year very strong with [reaching the top of Hacker News](https://www.bookstackapp.com/blog/9000-stars-and-the-effects-of-hacker-news/),
which then boosted activity for a good while, but there hasn't really been any spikes or visitor boosts
from anything similar in 2023. 

Maybe I need to put more active effort into marketing in 2024 although it's not clear if there's a reason to do so,
and slow & steady growth has its own benefits of being more manageable and requiring less resources.
To be honest, as long as we're trending in the right direction, I'm happy. 
I'd rather not chase numbers for the sake of it.

### Videos on YouTube & PeerTube

Throughout 2023 I've kept up publishing videos, one for each feature release with extra videos
here and there to provide guidance and/or insight for the project.
Here are the [BookStack YouTube channel](https://www.youtube.com/c/BookStackApp) general stats for the year:

![YouTube views line chart, with statistics as follows. Views: 94.4K, up 70% from the previous year, Watch time (hours): 6.2K, up 72% from the previous year, Subscribers: 946, up 22% from the previous year, Estimated revenue: £129.27](/images/2024/01/2023-youtube-analytics.png)

You may notice the estimated revenue shown there. Earlier this year the channel met the requirements for monetization
so I'm now able to earn a little bit of bonus revenue from these videos.
Money isn't really the target though, as it's very far from covering the effort in making this content.
These videos are really about building this extra resource and community hub, while providing
a means for me to celebrate and emphasise work being done for the project.
While many dunk on YouTube comments as typically being a toxic place, the feedback I get is 
wonderfully wholesome which feeds my motivation for the project.

As you can see from the other stats, we've generally had good growth overall, even as
I recently promote the YouTube content less in favour of the [PeerTube alternative I set-up](https://www.bookstackapp.com/blog/bookstack-on-foss-video/).
I've been meaning to play around with YouTube shorts, just to provide quick summaries for releases, but my recording flow & format doesn't really make this easy.

The usage of the [BookStack PeerTube channel](https://foss.video/c/bookstack/videos) has gone well so far.
Views and usage is predictably a lot lower than our established YouTube presence, but I've really liked the fact
we're not forcing folks to view ads, or submit to Google's privacy requirements, when sending visitors to video 
content from the BookStack site. Plus it's nice for this content to be a part of the open social fediverse.

On the subject of video and YouTube, in August [I spotted BookStack](https://fosstodon.org/@danb/110956729212142440)
used within a Linus Tech Tips video, which was pretty awesome to see.
From what I could tell, it's likely an instance set up by Floatplane which LMG labs were also
using at that time.

### AI Impact on BookStack

AI has been a massive subject for this year as LLMs & image generation has exploded in use.
Personally, I've found LLMs to be quite useful in some select cases, although I'm still conflicted on the 
the morality of the training process and their overall impact on the world.
They seem to be becoming a bigger part of society though, so it's probably important to keep tabs on their use
along with their co-existence and potential benefits for projects like BookStack.

In regard to LLM usage in BookStack, earlier this year I came across [Danswer](https://docs.danswer.dev/introduction)
which I built an integration for which allowed Chat-GPT-like querying of your BookStack content.
I talked about this more, along with a demo of this integration, [in my video here from about 4:28](https://foss.video/w/mB67n8JBBHb9mSMYUM5DED?start=4m28s).
This is probably the most valuable usage of LLMs with a system like BookStack.
I've also heard some other good ideas like using LLMs to generate out templates, or base page content.
Another neat idea is using image generation to create book and shelf covers.
Most of these ideas should be possible to implement via existing integration methods for the most part although
as LLM/AI options, and the desired usages of them, evolve we may start to see areas where we can
specifically provide interfaces to help integrate with this kind of tooling.

Outside of the core platform, we'd also seen AI's impact in our issue management, as well as in
external news content for BookStack, both of which reflects the downsides of AI:

On issue management, I've had a couple of feature requests submitted that were clearly filled out using an LLM.
I don't mind a LLM used to help where it adds value, to assist user written content.
Unfortunately though, in these cases, it has simply been used to fill the request
with many paragraphs of generic text that has barely a grasp of what BookStack is. 
These cases are a little frustrating as it just serves to waste my time, in attempting to extract any underlying intent
and value. I'm having to somewhat reverse the content to their original LLM prompt.
The questions on our feature request form are to understand the value to users as humans, not those imagined by a text generator.

In regard to news content, BookStack [was featured on Laravel News](https://web.archive.org/web/20231109033107/https%3A%2F%2Flaravel-news.com%2Fbookstack-documentation-wiki-software) which was awesome as a long-term reader of the site myself.
Unfortunately when reading it was quickly clear the article was LLM generated since many of the features detailed
reflected a limited grasp on understanding BookStack while some of them were just wrong & misleading.
Due to these issues, I didn't feel I could celebrate or share the article as that would just propagate this incorrect content.
Instead I emailed the site to notify them of the inaccuracies, with advised changes, although I had to follow that up [with a Tweet](https://twitter.com/bookstack_app/status/1722457925900280074) a few days later to prompt some action. It was then promptly updated using the text from our website.
This isn't meant to pick on Laravel News, but is an example of what we'll probably start to see more and more going forward.


### Hacks Site

[Earlier in the year](https://www.bookstackapp.com/blog/hacks-on-the-site/) I set-up the [BookStack hacks site](https://www.bookstackapp.com/hacks/)
as a means to publish potentially useful hacks & customiziations for easy re-use.
So far this has been a useful resource to point folks to when required, although at the same time there have been a few cases
of people relying on these hacks without the knowledge to maintain them, requiring them to need support in some cases,
even though we clearly mark them as risky and unsupported.

There's a tricky tension in these hacks, as it provides functionality we can't or don't want to support in the official project,
but people may inherently assume official support since they're listed on our site.
Warnings are there to help prevent this, but they are not a solid defence. 

Within the last few months, I added a method to pay for hacks to be updated, as a potential means to keep them updated
for current BookStack versions in a way that's sustainable and worthwhile.
Though this may further feed into the above issue and increase that tension.
I've had one purchase through this so far, for which they required further support in use/application.

For now, I'll keep steadily growing & maintaining the hacks site as I've been doing so far, but I'm going to keep an close
eye on how this is used and its support impact, assessing potential options to ease/improve that tension.

### Going into 2024

Looking to start off 2024 I'd like to take a step back and try out some newer technologies in the PHP space
to see how they can impact or benefit BookStack users. These are newer PHP server projects 
like roadrunner and FrankenPHP.

I'd like to make some improvements to our site and docs this year, particularly around documenting
common tasks that are often discussed in support, alongside higher level information about the project
which is often requested in our community channels. Just details like how the project is managed,
the vision for future changes, thoughts on growth, our view on providing hosting services for BookStack.
I'm thinking this might be under a new "governance" part of the site.

In terms of my personal plan, I intend to keep working on the project as my primary full-time job,
especially now that I'm in the bounds of being somewhat financially stable.
Over the next year I'd like to become a little more open & active to outreach & community building.
As an example, I was invited to be on a podcast which I've yet to accept because that kind of
thing makes me really nervous as a super introvert, but I think it'd be fun to do while helpful for the project.

Otherwise, as we go into the next year I just want to thank everyone that's supported me and the project
over the last year. That's not limited to just financial support, that includes all the contributors,
translators, community members, folks recommending us on Reddit & other channels, those getting 
involved in discussions on GitHub, and those making articles and videos about BookStack. All these kinds
of things really do help in both supporting the project directly or providing motivation to those 
working on the project. Thanks!

---
  
<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp;<span>Photo by <a href="https://commons.wikimedia.org/wiki/File:Stowe_Landscape_Gardens_Early_Winter_Morning_Frost_10.jpg">Scott Wylie (CC-BY-4)</a> - Image Modified</span></span>