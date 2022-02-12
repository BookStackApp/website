+++
categories = ["Community"]
tags = ["Open Source"]
title = "Contributing to BookStack (And Open Source)"
date = 2022-02-12T20:00:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/lions-joel-herzog.jpg"
slug = "contributing-to-open-source"
draft = false
+++

A few times recently people have asked how they can get involved
and help BookStack so I thought I'd formalize my response into this 
blog post. While the below is my view in regards to BookStack contributions, it
will likely apply to many open source projects


#### Contribute Code

This is one of the most direct ways to get involved with an open source project, while
potentially being the most difficult and intimidating. I remember making
my first pull request (PR) to an open source project on GitHub. I put a fair 
amount of work in to provide a much requested feature, opened the PR with an 
explanation, and there it sat for 6 months before it was closed without comment
or reasoning. 

The trouble with contributing code is that every project is different, with a different 
process, with different maintainers that have different visions and opinions.
From maintaining BookStack I've come to understand the challenges from a maintainer point of view.
It can feel really bad to reject someone's work, after they've spent time on something, and it can
be time consuming to guide someone through getting their contribution into an acceptable state. 

When looking to contribute code to a project, this is the general process I'd advise:

- Look for contributing guidance in the project readme or `contributing.md` file and follow that if existing.
- Check the license of the project to see if it's something you can even contribute to.
- Look over a few existing pull requests in the project, both open and closed, to get a feel for any expected conventions and to understand how the maintainers communicate.
- Search for open and closed issues relating to your planned contribution. It may be that your idea has already been requested but is not something desired by the maintainer. It may be that someone has already started or the idea needs to be fleshed out first.
- If you're going to invest a non-insignificant amount of time in your contribution, and would feel insulted or upset upon a quick rejection, communicate with the project maintainers (via issues, their discussion forum or via a draft PR) early on to understand if you're on the right track for a contribution that would be accepted, as to avoid disappointment down the line.
- Be receptive to feedback and be prepared to follow requests from the maintainer. I've seen some cases where people have struggled with this and taken offence to requested changes, or asked for the maintainer to spend time to justify in detail their requests. Be understanding that the maintainer is likely the one that's going to be primarily responsible for the code going forward. A request for change doesn't by default mean your code is bad, but the maintainer may just forsee other cases that need to be handled based upon experience, or they need things done a certain way to ease maintenance.

#### Provide Translations

If you're skilled with fluency in multiple languages, contributing translation text can be a 
massive help. Translations within BookStack help the project be accessible to a much wider
audience. Apart from a memorized French speech about "Family Guy" (Or "Les Griffins") I don't 
know much outside of English but luckily a bunch of wonderful folks in our community
keep BookStack translated in, at the time of writing, 36 language variants. 

![BookStack Crowdin Page](/images/2022/02/crowdin.png)

You often don't need to have code skills to help with translating. Sometimes you'll need
to edit text files otherwise it's common for projects to use a platform that provides
an easier-to-use interface. Within BookStack [we use Crowdin as our translation platform of choice](https://crowdin.com/project/bookstack).

#### Help on Issues & Feature Requests

When maintaining a project like BookStack, GitHub issues can consume a large amount of time.
Our own issues list is comprised of:

- Support Requests
- Feature Requests
- Bug Reports

We utilise different entry forms for these different categories to tag up the issues 
appropriately and attempt to get the needed information although that's not always provided.

Support requests are probably the easiest to help with if you're familiar with the technologies
and environments where the project may run. Requesting vital or missing details, guiding the issue
creator to the relevant documentation, or providing options & next steps to attempt resolution, are all good first
steps that can help move things forward and save time for the maintainers.

With feature requests, it can be useful to provide perspective and add to the discussion for ideas. 
Sometimes it's just a case of showing the issue creator alternative paths to their desired outcome. 
It's quite common, especially by more technical users, that feature requests are opened requesting a certain implementation rather than stating their intended benefit purpose. 
For example: Requesting "Add a header bar link to page X" instead of "Provide faster access to page X from any location, since this would benefit Y". 
A request for a specific implementation can keep you blind to better alternatives to reaching the same outcome. If this occurs, it can be very useful to communicate with the issue creator to understand that actual desire behind their implementation request.
Even if a feature is requested for something that you would not desire, it can be useful to know from a maintainer
perspective if a request is something that would go unused in your environment and hence may only
add as extra complexity/clutter. 

Bug reports can be very useful to a maintainer to create a more stable and issue-free platform but 
they're not always provided in an ideal format, even when we have measures in place to request certain
details. Upon that, sometimes bug reports are opened for elements that are in reality a matter of opinion or based upon false expectations.
Validating and confirming re-production of issues can be a massive help and speed up the process for someone to get onto fixing the fundamental issue/bug.

Finally, there's general issue management. Reporting issues that are no longer relevant, or advising of potential duplication, can save time and keep the issues list down.

#### Testing and Bug Reporting

Many open source projects don't have the full QA capabilities of commercial offerings.
While I attempt to write automated tests where possible, and manually test each logical
scenario, you can't catch absolutely everything and it's commonplace that I'd be the only
tester for a new feature being released.

Reporting bugs you come across in production can be very useful, just ensure you're running the 
latest version (since things may have already been fixed) and provide as much detail as
possible to replicate the bug (Including environment details such as browser used, operating system etc...).

Testing pre-release developments can be valuable to ensure another use-case has been tested
before changes are shipped to production, but communicate with the maintainers before attempting
this since the pre-release environment may be knowingly unstable and you may just end up wasting your own time 
in addition to the maintainer's. Probably best to find some recent changes, then reach out to see
if they're ready for testing & feedback.

An alternative form of bug reporting is security issue reporting. Security is of course quite vital
to most projects. It's quite common for services & projects to have security "bug bounties" where you
can be rewarded money for discovering and reporting vulnerabilities. 
In BookStack I've dealt with many submissions via [huntr.dev](https://huntr.dev/) which has led to many issues being reported and fixed, with the reporters receiving significant monetary gain for their discovery
without being at cost to us. Upon that they have also rewarded me for patching many of the vulnerabilities found. 

![Huntr.dev example BookStack vulnerability report](/images/2022/02/huntr-dev.png)


If going down the security route, many open source projects will have their own procedures and classifications when it comes to reporting security vulnerabilities. Look within the project readme or for a `security.md` file like [the one we have in BookStack](https://github.com/BookStackApp/BookStack/blob/development/.github/SECURITY.md).

#### Create Guides, Videos, Articles etc...

![List of BookStack videos by community members](/images/2022/02/community-videos.png)

Text and video media can have a great benefit on a project.
Not only do they help in spreading the word, they can provide 
a massive morale boost. Seeing people take the time to create videos about BookStack
creates a great sense of pride to help me continue on the project, while often showcasing
an alternative viewpoint in terms of thoughts and usage of the platform.
Upon their emotional and network affect, this kind of media can just generally help
in terms of providing guidance to new users. Here are two videos as examples:

- ["Install Bookstack on Synology in 2 Minutes" by Geeked](https://youtu.be/_13K1DeZwhk)
- ["BookStack Installed on Docker and Portainer" by DB Tech](https://youtu.be/NhPw1DvxYZc)

Both of these provide very useful visual guidance relating to specific hosting platforms that I 
wouldn't cover myself, hence helping improve accessibility to the project for a sizable chunk
of users.

#### Get Involved on Discord

We [have a discord server](https://discord.gg/ztkBqR2) to host quick and informal discussion for BookStack.
People often pop in to request support, discuss ideas or talk about ways to do things. 
Supporting others and being part of the conversation can help build the sense of community within
the project and help BookStack be something more than just its codebase.

#### Share the Project

Simply sharing the project around can provide a positive affect on a project.
I [use f5bot](https://f5bot.com/) to track BookStack mentions on Reddit & Hacker News,
for which I see multiple almost daily which again can provide a great morale boost.
In addition, links posted to the project is great for SEO, to help us rank up
in search engine results and therefore reach a wider audience. 

On thing to be careful of is sharing the project in the incorrect context or over-sharing. 
If spam-like behavior is seen then it can cause resentment towards the project.
For this reason I strongly limit how often I personally post the project, as a new submission, on Reddit.

#### Contribute Financially

Financial contributions are used differently depending on the project.
For the majority of BookStack's development I avoided receiving donations to prevent 
getting money involved in the project. I then changed my stance with the idea that I
could take donations and redistribute them to the projects we rely upon within BookStack.
Since I decided to take a career break to focus on BookStack I paused any additional
"donation forwarding" and instead have been using them to support myself financially.
However they're used, donations can provide extra options and flexibility to a project or,
at minimum, indicate your support and appreciation for a project.

![My GitHub Sponsors Profile](/images/2022/02/github-sponsors.png)

[I currently accept donations via GitHub sponsors](https://github.com/sponsors/ssddanbrown/).
Recently, I altered my higher-level tiers to have rewards of [logo display on our website](https://www.bookstackapp.com/#sponsors)
and readme. This was to give something back to our larger sponsors while trying to entice
additional large sponsorships from business that can afford these levels.


----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@joel_herzog?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Joel Herzog</a> on <a href="https://unsplash.com/s/photos/animal-pack?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a></span></span>
  