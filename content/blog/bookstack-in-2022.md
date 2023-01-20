+++
categories = ["News"]
tags = ["News"]
title = "BookStack in 2022"
image = "/images/blog-cover-images/winter-atle-mo.jpg"
author = "Dan Brown"
slug = "bookstack-in-2022"
draft = false
date = 2023-01-05T23:00:00Z
+++

Well 2022 is now in the past. During the year BookStack had a few milestones which included
[reaching the top of Hacker News](https://www.bookstackapp.com/blog/9000-stars-and-the-effects-of-hacker-news/),
[becoming 7 years old](https://www.bookstackapp.com/blog/7-years-of-bookstack/) and
[hitting 10K stars on GitHub](https://www.bookstackapp.com/blog/10k-stars-and-a-look-back-at-first-sharing/).
In this post we'll look back on how the project has progressed over the year, not just in 
terms of the codebase but also elements of the wider project as a whole.

### Project Funding & Support Services

With 2022 over I now have experience of spending a complete year 
of not being employed, with BookStack being my main focus instead.
I started the year with some support via GitHub sponsors in addition to 
some very kind support from my parents (albeit against my own advisory). 
In the past year the following developments have occurred in respect to funding:

- I [started offering](https://www.bookstackapp.com/blog/bookstack-support-services/) official [paid support services](https://www.bookstackapp.com/support/).
- I created a [focused donation page](https://www.bookstackapp.com/donate/) and added KoFi as a donation option.
- The GitHub sponsors have continued to grow.

I've shared some more in-depth thoughts and findings in regards to project finances
in the ["Seven Years of BookStack" post](https://www.bookstackapp.com/blog/7-years-of-bookstack/#working-on-bookstack-full-time--financial-stability), where I also provided some high-level income details.

Now we're at the end of the year, I can provide a more detailed view of the figures.
The below chart shows rough high-level monthly revenue (excluding taxes and most costs):

![BookStack 2022 Revenue](/images/2023/01/bookstack-2022-funding.png)

GitHub sponsors acts as my primary income. The monthly amount is variable due to multiple factors.
The May payment was missed and rolled into June hence those anomalies. The very large amount in December
is thanks to a sponsor pre-paying for a year. 
Sponsorships have continued to grow, both in the base of small contributors in addition to a few large (>£100) monthly sponsors.
Overall, across the year, these have totalled about £11.8k providing a great foundation of income.
The donations via KoFi have helped add to this in the form of additional one-off donations totalling about ~£310.
The support services have also had a positive impact, providing about £3k of revenue since launching to act as a significant secondary source of revenue.

Overall I've seen just over £15k of revenue from these sources over 2022.
While this isn't really anywhere near the expected salary for a full stack lead web developer, 
it reflects some significant growth that shows covering my living costs could be a real possibility.
I'm about 75% of the way there, with me continuing to take a hit from my savings
for the time being.

A very big thank-you to everyone that has donated or purchased a support service offering, for your
generosity and help in working towards a sustainably funded project.

### New Features & Enhancements

Throughout 2022 we've had 8 feature releases and 20 patch releases.
The below lists many of the major additions and changes made within these:

- Page content references
- Auto cross-content-link updating
- Page-level WYSIWYG and Markdown editor switching
- Hierarchy (Book & Chapter) conversion/promotion
- New "Local (Secure - Restricted)" image storage option
- Redesigned content permission management
- User interface shortcuts
- Global search live preview
- Redesigned in-interface lists
- Redesigned settings view
- Handling of shelves on book copy
- Data streaming upload/download support for large attachments
- Webhook debugging support and extra detail
- Ubuntu 22.04 install script
- Greek & Romanian translation support
- WYSIWYG editor enhancements:
  - Collapsible blocks
  - Tasks lists
  - Updated TinyMCE base
  - Better link control/management
  - Code editor redesign and code-language favourites
  - List shortcuts
- Markdown editor enhancements:
  - Preview hide/scroll/size controls
  - Cleaned up design
  - Significant preview performance & stability increase
- Further API development:
  - User management capabilities
  - Recycle bin endpoints
  - Extra book-read detail
- Auth enhancements:
  - SAML/OIDC auto-initiation
  - OIDC group sync
  - LDAP group debug support
- Customization additions:
  - Tag-based content CSS rules
  - Added "Activity Logged" and "Page Include Parse" logical theme system events
  - Large range of added visual theme system partials for view customization
  - Added Diagrams.net-specific configuration event

Looking back across that list, it reflects the past year's focus on refinement. 
There's not actually that much new in terms of added subsystems, but there's been a lot of focus 
upon developing, updating & revamping existing core features to strengthen the spine of the platform.

Personally, my favourite feature within the above has to be the [interface shortcuts from our v22.11 release](https://www.bookstackapp.com/blog/bookstack-release-v22-11/#user-interface-shortcuts).
It's something I wanted to add for a long time to empower keyboard-focused workflows and I'm really happy 
with the result which provides full control and customizability along with an overlay help interface to help
show the shortcuts available. 

### YouTube Videos

Last year I started [a BookStack YouTube channel](https://www.youtube.com/c/BookStackApp) and I have continued to enjoy
developing these videos throughout 2022. Not only are they super useful to provide on-hand visual guidance, but they
usually attract great positive feedback to keep me motivated. 

{{<yt 9Oz6-YOeiuU>}}

Since BookStack v22.07 I've enjoyed creating release-specific overview videos which I could only viably do thanks to the 
extra time afforded to working on the project full-time, due to the extra day or so they add to the release process.
These have had a particularly positive reception, and I quite enjoy them as a visual way to show-off or emphasize
work done that would otherwise be difficult to detail via text.

Overall I've published 16 videos across the year and we've gone from 90 to over 850 subscribers throughout the year.
Video views have continued to accelerate as more content is published:

![BookStack 2022 YouTube Channel Growth](/images/2023/01/youtube-2022-growth.png)

While nothing is earnt from videos right now, we'll soon be eligible for monetization which may provide a bonus, yet very minor, revenue source. Growth may also open the door and support other options in the future; for example, sponsored guides in using certain hosting options or integrating with specific third-party services etc...).
The main benefit though is in building up this visual community hub to act as a valuable resource in guidance and access to the platform.

### Website Usage & Audience Reach

Looking at the [bookstackapp.com](https://analytics.bookstackapp.com/bookstackapp.com) analytics for the year, we started off
with a bang from climbing to the [top of Hacker news back in January](https://www.bookstackapp.com/blog/9000-stars-and-the-effects-of-hacker-news/), which is reflected by the spike in the middle of the chart:

![Website Activity Line Chart, Showing greater 2022 activity](/images/2023/01/bookstack-site-21-22-activity.png)

Since then, activity has been fairly consistently about 45% above last year.

Towards end of 2022 I looked at ways to expand the reach of the platform to new potential audiences. 
For the first time, i had a go at writing for an external site which resulted in 
[this article on opensource.com](https://opensource.com/article/23/1/bookstack-open-source-documentation). 
I'm not really a writer, and therefore was a bit nervous about writing for someone else but the opensource.com team were
great and I was excited to see the article go live. It's too early to see the affects just yet, the article was only
published a couple of days ago relative to me writing this, but hopefully it'll bring BookStack to some new folks. 


### Going into 2023

To kick off 2023 I'm focused on finishing up permission system work for BookStack. I've made a lot of progress on this in December,
but it required a lot more work than expected hence no v22.12 release. I'm hoping to have this wrapped up for the end of this month.

At some point soon, we'll be upgrading the Laravel framework base and dropping PHP 7.4 support in the process.
I may soon dedicate some time to formalizing and building upon the core existing "theme" systems to develop
options that make customizations easier to share, apply & combine. Providing tweaks using these systems is becoming more
common but it can take some time to write and provide the correct guidance so I'd like to make this process easier. 
This may also provide some additional routes for revenue generation (via maintenance/updates of unofficial tweaks & customizations).

I recently applied for the [GitHub accelerator program](https://accelerator.github.com/). 
If I get in, it would have a massive impact for project funding in 2023. 
Additionally I think the structured mentoring with experienced open source maintainers would be a massive help since this 
is something I've never really had access to before, and I've found the social elements of open source particularly challenging.
I have no idea on my chances, but I'm keeping my fingers crossed for sure!

My plan for 2023 is to keep working on BookStack full time instead of getting employed elsewhere. 
As I nervously see my savings deplete, I've been toying with the idea of doing some contract/gig work to supplement income.
That said, I'd prefer to explore and develop possible BookStack revenue methods before resorting to other work and hence 
I may dedicate some time to this early on in the year.

---
  
<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp;<span>Photo by <a href="https://unsplash.com/@atlemo?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Atle Mo</a> on <a href="https://unsplash.com/images/nature/winter?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>