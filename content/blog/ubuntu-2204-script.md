+++
categories = ["News"]
tags = ["News"]
title = "Ubuntu 22.04 BookStack Install Script Now Available"
date = 2022-04-21T15:30:00Z
author = "Dan Brown"
image = "/images/blog-cover-images/jellyfish-ruthlaine-tan.jpg"
slug = "ubuntu-2204-script"
draft = false
+++

To support today's release of the next LTS version of Ubuntu, 22.04 (Jammy Jellyfish),
we have added a new BookStack install script for users of this OS:

[Find script details here](/docs/admin/installation/#ubuntu-2204).

Relative to our previous Ubuntu LTS scripts, this 22.04 script introduces a series of improvements including:

- Setting of file/folder permissions based upon the user running the script (Instead of just applying root permissions).
- Writing of script command output to a file by default, for easier debugging.
- Simpler command line output to user with clear indication of progress.
- Checks to ensure a sudo/privileged user is used to run the script.
- Checks for existing MySQL/Apache usage to prevent conflicts.

Overall these changes provide a much simpler & stable install experience. This following CLI recording shows the improved process (with some steps sped-up):


<script id="asciicast-489055" src="https://asciinema.org/a/489055.js" async></script>

----

<span style="font-size: 0.8em;opacity:0.9;">Header Image Credits: <span>Photo by <a href="https://unsplash.com/@ruthlainezz?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Ruthlaine Tan</a> on <a href="https://unsplash.com/s/photos/jellyfish?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  </span></span>