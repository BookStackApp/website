+++
author = "Dan Brown"
tags = ["News"]
image = "/images/2016/10/blog_bg_docker_thomas_kelly.jpg"
description = ""
categories = ["News"]
slug = "over-300-stars-the-next-release-and-dockerizing"
draft = false
title = "Over 300 Stars, The Next Release and Dockerizing"
date = 2016-10-24T21:09:58Z

+++

### Over 300 Stars
It's a bit delayed but BookStack now has over 300 stars on GitHub. Hooray! 🎆 Still fairly minor in the grand scheme of things but I hope this continues to grow in the future.

### The Next Release

The next release is going to be packed with some big new features including revision diffs and page attachments. Under the hood BookStack has been updated from Laravel 5.2 to 5.3. Due to some of these changes we will be facing the first potentially system-breaking upgrade due to a change in requirements. Here are the current known changes which will require some manual intervention:

* Minimum version of PHP increased from 5.5.9 to 5.6.4.
* PHP Tidy extension will be required. 

Upon release any breaking changes will be listed out with some instructions to make the transition as simple as possible. There will be some slight cosmetic changes to created content in regards to header sizes since these have been adjusted to provide a better range of headers.

As a side note, Semantic versioning will be broken 😓 in the run up to an initial non-beta release since I don't want to topple over to 1.0 before being release ready. Since there's not a public API here though it should not really matter.

### Repo Move

The main repository for BookStack has now moved on GitHub from ssddanbrown/BookStack to [BookStackApp/BookStack](https://github.com/BookStackApp/BookStack). This was done to group together all codebases involved in BookStack which keeps things a little more manageable. Under the [BookStackApp](https://github.com/BookStackApp) organisation page on github you can also find the code for the bookstackapp.com site, any devops and configuration scripts as well as the theme files used for this blog.

### Dockerization 🐳

Thanks to some great members in the community BookStack now has some solid docker options. The most mature solution can be found [here, provided by solidnerd](https://github.com/solidnerd/docker-bookstack). Using docker-compose you can really quickly have a BookStack instance up and running on MySQL 5.7 & PHP 7. All it takes, once you have `docker-compose` installed, is downloading the `docker-compose.yml` file and running `docker-compose up`. Folders will be created your current directory for the database and uploads so things stay persistent, no matter how many containers you destroy. Here's a asciinema cast showing how simple it is to run BookStack via docker-compose:

<script type="text/javascript" src="https://asciinema.org/a/90442.js" id="asciicast-90442" async></script>

### Email Updates

Upon request, I have started to set up email newsletters for things on this blog. Once fully set up emails will be sent weekly (If new content has been posted) giving a summary of news and updates regarding BookStack. If this interests you please sign up via the form below this post.

----

<span style="font-size: 0.8em;opacity:0.8;">Header Image Credits: <a href="https://unsplash.com/@thkelley" target="_blank">Thomas Kelley</a></span>