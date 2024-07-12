+++
categories = ["News"]
tags = ["News"]
title = "Nine Years of BookStack"
image = "/images/blog-cover-images/cc-by-sa-4/dartmoor-herbythyme.jpg"
author = "Dan Brown"
slug = "9-years-of-bookstack"
draft = false
date = 2024-07-12T12:00:00Z
+++

Today the BookStack project becomes 9 years old! Like [last year's post](/blog/8-years-of-bookstack/), and the years before it,
we'll take this as an opportunity to provide an update on the status of the project including the
financials, current development status, and the growth figures.

{{<toc>}}

### Financials

Below is the general high level financial monthly breakdown of my BookStack revenue sources (excluding costs, fees, taxes etc...)
ranging from the start of 2022 until now:

[![Monthly breakdown of project finances across Kofi, Support Services & GitHub sponsors. Shows a general trend upwards, with some spikes from support services in 2024](/images/2024/07/finances.png)](/images/2024/07/finances.png)

As you can see, this year's finances have gotten off to quite a good comparable start, with March and June reflecting large
income spikes from support services. This is mainly thanks to a couple of businesses purchasing our enterprise support option
which is priced at £4,500 per year. Upon that, the renewals and sign-ups for our professional support plan (£450/y) have
helped continue to establish a nice recurring base income via support services.

Donations and sponsorships across KoFi & GitHub sponsors has grown slightly when looking at the past 12 months, 
averaging about £1,328/m compared to the £1,211/m for the 12 months before that.
In addition to some one-off donations, many of these are recurring yearly or monthly, which serves as a
very welcome stable base of income.

Overall, these increases mean that at 6 months into 2024, I've almost reached the level of income received for the 
whole of 2023. 
Thank you so much to all donators, sponsors, and those who support by purchasing the BookStack support offerings.
The kind support from such folks has helped to assure a stable income source for me as I continue to work on BookStack.

Currently I donate to open source services & libraries I use to help build BookStack, but this is rather minimal (~£100 per month)
since I somewhat put it on pause a few years ago when leaving my last job to work on BookStack full time.
Now that I'm due to more than cover my living costs, later this year I plan to re-assess this element to scale this up again to help
support & sustain the other projects we rely upon.

### Project Status Update: New Editor

Right now my main efforts are in [attempting to build](https://github.com/BookStackApp/BookStack/pull/5058) an new editor
for pages (and description/comment inputs) to replace our existing WYSIWYG editor, based upon TinyMCE,
which [changed licenses](https://github.com/BookStackApp/BookStack/issues/4908) earlier this year.

This new editor is built using [lexical](https://lexical.dev/) as a foundation, but every part of the UI is custom-built.
So far this is going okay, but there's still a fair way to go. 
My aim is to initially match the existing WYSIWYG editor in both functionality and general UI, and then we can improve & build
upon this in future when things are stable to fully take advantage of the control and features that we'd gain from this new editor.
There ultimately will be an element of breaking change, especially in lesser trodden edge-case scenarios, but I want to make this minimal.

My plan is to introduce the editor as an additional non-default editor option in alpha status, then switch that to beta status after
a round of feedback and fixes (still non-default), then change the default WYSIWYG option to the new editor once things are stable
(leaving the old editor as an option for a few releases) before eventually removing the old editor after a few releases
of stable overlap.

If you'd like to see the progress so far, I show off the current state in my video here (starting at around 3:30):

{{<pt 8yJ38pNM8STzpyRJhV2fz4>}}

The work on the editor for an initial release will take a while longer though so I'll probably look to extend out the current feature release further than usual with some extra
patch releases.

### On the Tech over Tea Podcast

In June I spoke to Brodie Robertson on his Tech Over Tea podcast.
This was mainly to talk about open source, and a [blogpost I had written](https://danb.me/blog/futo-open-source-definition/) to Futo
regarding their attempts to change what open source means, but we also talk about BookStack and specifically I
touch on many of my thoughts in regards to licensing around BookStack:

{{<yt WhCcvzT3IaE>}}


### BookStack, In Numbers

Like we do on each BookStack birthday, we'll dive into the numbers once again to see how BookStack has grown over the past year.

The below figures were collected at the time of writing *(8th July 2024)*, with changes in <strong style="color:red;">red</strong>/<strong style="color:green;">green</strong> reflecting change upon last year's numbers.

#### GitHub Figures

- [14,310 GitHub stars](https://github.com/BookStackApp/BookStack/stargazers) <strong style="color: green;">+2,494</strong>
- [1,810 forks on GitHub](https://github.com/BookStackApp/BookStack/network/members) <strong style="color: green;">+266</strong>
- 5,106 GitHub issues and PRs opened <strong style="color: green;">+728</strong>
- 3,669 GitHub issues closed (<strong style="color: green;">+488</strong>), 540 currently open (<strong style="color: green;">+139</strong>)
- [190 releases published](https://github.com/BookStackApp/BookStack/releases) <strong style="color: green;">+22</strong>

#### Code Repository Stats

- [4,594 commits](https://github.com/BookStackApp/BookStack/commits/development) <strong style="color: green;">+466</strong>
- 175 direct git contributors <strong style="color: green;">+18</strong>

#### Social

- [3,553 Discord members](https://discord.gg/ztkBqR2) <strong style="color: green;">+414</strong>
- [1,562 Subreddit members](https://www.reddit.com/r/BookStack/) <strong style="color: green;">+588</strong>
- [2,188 YouTube channel subscribers](https://www.youtube.com/c/BookStackApp) <strong style="color: green;">+778</strong>
- [40 PeerTube channel followers](https://foss.video/c/bookstack/videos) <strong style="color: green;">+40</strong>
- [620 Twitter Followers](https://twitter.com/bookstack_app) <strong style="color: green;">+123</strong>
- [556 Mastodon Followers](https://fosstodon.org/@bookstack) <strong style="color: green;">+321</strong>

#### Website Analytics

Main bookstackapp.com site only, Averaged over last 90 days:

- 1,417 unique users per day <strong style="color: green;">+187</strong>
- 3,542 page views per day  <strong style="color: green;">+337</strong>
- Operating system breakdown:
  - 55% Windows
  - 18% Mac
  - 9% Android <strong style="color: red;">-1%</strong>
  - 9% Linux <strong style="color: red;">-1%</strong>
  - 8% iOS/iPadOS <strong style="color: green;">+1%</strong>

[Our full website analytics can be found here.](https://analytics.bookstackapp.com/bookstackapp.com)

#### CrowdIn (Project Translations) Numbers

- 46 languages <strong style="color: green;">+4</strong>
- 8,059 words to translate <strong style="color: green;">+887</strong>
- 337 project members <strong style="color: green;">+48</strong>

#### Thoughts on the Numbers

Like last year, no major surprises here really.
It's good to see continued steady growth in general across most of these figures,
even though I've put very little effort into any kind of marketing & outreach in the last
year. I was concerned these may slip, as BookStack becomes a more mature/stable project which
doesn't make headlines via big new additions or from being a newly launched project, but growth has retained which is great.

### Further Reading

Here are the non-release/update posts that you may have missed over the last year:

- [Eight Years of BookStack](/blog/8-years-of-bookstack/)
- [BookStack in 2023](/blog/bookstack-in-2023/)
- [A YouTube Alternative for our Video Content](/blog/bookstack-on-foss-video/)

---


<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: &nbsp;<span>Photo by <a href="https://commons.wikimedia.org/wiki/File:From_O_Pupers_last_light-3.jpg">Herbythyme (CC-BY-4)</a> - Image Modified</span></span>