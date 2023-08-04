+++
tags = ["News"]
image = "/images/2016/07/year-of-bookstack.jpg"
description = ""
title = "A Year of BookStack"
author = "Dan Brown"
categories = ["News"]
slug = "1-year-of-bookstack"
draft = false
date = 2016-07-11T15:37:51Z

+++

BookStack is now 1 year old! The first commit can be found on [GitHub here](https://github.com/BookStackApp/BookStack/commit/eaa1765c7a68cd671bcb37a666203210bf05d217). BookStack also now has over 200 stars GitHub stars! It's absolutely awesome to see BookStack grow into something worked on and shaped by a community.

## Back in Time

To celebrate how BookStack has grown over the last year I thought we'd take a quick look back at how the design of the project morphed, especially in the first few months, from the initial commit into its current state.

###### Initial Commit (Oxbow) - 12 Jul 2015

The first commit was super simple. It was all and only about books. No users, chapters or pages. The project was also named 'Oxbow' at that time.

![Initial BookStack prototype design](/images/2016/07/first-version.png)

###### First Proper Design - 15 Jul 2015

A few days after the initial commit the design was cleaned up into something non-prototypey. The design was based on an abstract idea of a piece of paper on a desk, Inspired by DokuWiki's simple and clean stock design. Personally I still really like this kind of design but the project needed to find its own identity.


![BookStack paper design Book Overview](/images/2016/07/BookStack-paper-design-book.png)

![BookStack paper design page](/images/2016/07/BookStack-paper-design-page.png)


###### BookStack with a Sidebar - 23 Jul 2015

Later in the month the project officially changed from Oxbow to BookStack. The main menu and navigation were put into a sidebar to make good use of vertical space (Later removed as it ended up empty most of the time). I like the contrast of the dark sidebar in this design as it gives a good separation of content and UI trim. Something to note is that there were still not chapters at this stage but pages could be infinitely nested within each other.

![Sidebar design & nested pages](/images/2016/07/nested-book-view-sidebar.png)

![Nested page view](/images/2016/07/BookStack-nested-page-view.png)


###### Feature Dump and Polish - Aug 2015

Up to the end of August a lot of features were added and some removed. Now there were users, notifications, A WYSIWYG editor, page revisions & chapters. Nested pages were removed due to difficulty in discoverability. It was found that pages would become hidden, nested in a complex web of nesting so they were removed to keep things simple and to force a level of thought regarding structure. The design also got a bump up which included a fancy background image (courtesy of [unsplash.com](https://unsplash.com/)) on the login screen which stayed behind the sidebar throughout. This is where BookStack really aligned to what it is today.

![Fancy login screen](/images/2016/07/bookstack-grand-login.png)

![Updated sidebar Page view](/images/2016/07/feature-dump-page.png)

###### BookStack as we Know it - October 2015

By October, After another redesign, BookStack had become almost the same as it looks like now. It now had a logo, after a lot of playing about in inkscape, and the sidebar had been changed back into a header bar to maximise the utility of screen space. Since this change BookStack has had loads of major under-the-hood changes and a whole bucket load of features added but this core design has remained. 

![BookStack as we know it](/images/2016/07/BookStack-as-we-know-it.png)

## Project Traffic

Traffic to the website has steadily grown since the [100 stars](https://www.bookstackapp.com/blog/100-stars-on-github/) post but is overall still very low. No large spikes of traffic like before but, thanks to the new docs and referrals from [alternative.to](http://alternativeto.net/software/bookstack/), daily traffic has crept up:

![BookStack Google Analytics Traffic](/images/2016/07/site-traffic.png)

## Moving Forwards

I'd like to re-focus on getting through more of the outstanding issues on GitHub soon since they are starting to build up. I'd also like to slowly prepare the project for becoming multilingual to reach more people. The official docs, https://www.bookstackapp.com/docs/, are still fairly weak (Especial for a documentation platform) so I'd like to focus on getting them up to standard and I'm still eager to make a video to introduce newcomers to the project.
