+++
categories = ["News"]
tags = ["News"]
title = "BookStack in 2023"
image = "/images/blog-cover-images/cc-by-4/winter-gardens-scott-wylie.jpg"
author = "Dan Brown"
slug = "bookstack-in-2023"
draft = false
date = 2024-01-03T12:00:00Z
+++

As we enter into 2024 I thought we'd once again look back over the past year to 
see how the project has evolved, in terms of both the core platform and the
supporting working, including the current funding seen throughout 2023.

### Project Funding

TODO

### New Features & Enhancements

Within 2023 we've published 7 feature releases, with 15 patch versions for those.
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
and slow & steady growth has it's own benefits of being more manageable and requiring less resources.
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
Folks dunk on YouTube comments as being a toxic place, but generally the feedback I get is 
wonderfully wholesome which feeds my motivation for the project.

As you can see from the other stats, we've generally had good growth overall, even as
I recently promote the YouTube content less in favour of the [PeerTube alternative I set-up](https://www.bookstackapp.com/blog/bookstack-on-foss-video/).
I've been meaning to play around with shorts, just to provide quick summaries for releases, but my recording flow & format doesn't really make this easy.

The usage of the [BookStack PeerTube channel](https://foss.video/c/bookstack/videos) has gone well so far.
Views and usage is predictably a lot lower than our established YouTube presence, but I've really liked the fact
we're not forcing folks to view ads, or submit to Google's privacy requirements, when sending visitors to video 
content from the BookStack site. Plus it's nice to be a part of the open social fediverse.

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
which I built an integration for which allowed Chat-GPT querying of your BookStack content.
I talked about this more, along with a demo of this integration, [in my video here from about 4:28](https://foss.video/w/mB67n8JBBHb9mSMYUM5DED?start=4m28s).
This is probably the most valuable usage of LLMs with a system like BookStack.
I've also heard some other good ideas like using LLMs to generate out templates, or base page content.
Another neat idea is using image generation to create book and shelf covers.
Most of these desired should be possible via existing integration methods for the most part although
as LLM/AI options, and the desired usages of them, evolve we may start to see areas where we can
specifically provide interfaces to help these kinds of tools.

Outside of the core platform, we'd also seen AI's impact in our issue management, as well as in
external news content for BookStack, both of which reflects the downsides of AI:

On issue management, I've had a couple submitted that were clearly filled out using an LLM.
I don't mind a LLM used to help where it adds value, to assist user written content.
Unfortunately though, in these cases, it has simply been used in feature requests to back up the request
with many paragraphs of generic text that has barely a grasp of what BookStack is. 
These cases are a little frustrating as it just serves to waste my time, in attempting to extract any underlying intent
and value. I'm having to somewhat reverse the content to their original prompt.
The questions on our feature request form are to understand the value to users, not those imagined by a text generator.

In regard to news content, BookStack [was featured on Laravel news](https://web.archive.org/web/20231109033107/https%3A%2F%2Flaravel-news.com%2Fbookstack-documentation-wiki-software) which was awesome as a long-term reader of the site myself.
Unfortunately when reading it was quickly clear the article was LLM generated since many of the features detailed
reflected a limited grasp on understanding BookStack while some of them were just wrong & misleading.
Due to these issues, I didn't feel I could celebrate or share the article as that would just propagate this incorrect content.
Instead I emailed the site to notify them of the inaccuracies, with advised changes, although I had to follow that up [with a Tweet](https://twitter.com/bookstack_app/status/1722457925900280074) a few days later to prompt some action. It was then promptly updated using the text from our website.


### Hacks Site?

http://localhost:1313/blog/hacks-on-the-site/

### Going into 2024

TODO

---
  
<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp;<span>Photo by <a href="https://commons.wikimedia.org/wiki/File:Stowe_Landscape_Gardens_Early_Winter_Morning_Frost_10.jpg">Scott Wylie (CC-BY-4)</a> - Image Modified</span></span>