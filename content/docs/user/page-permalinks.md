+++
title = "Page Permalinks"
date = "2020-01-24"
type = "user-doc"
slug = "content-permalinks"
+++

The URL for a page within BookStack includes a "Slug" generated based upon the name in addition to a "Slug" generated from the parent book's name. Upon name changes of the book or page, BookStack will use the revision system to attempt resolving when old links are used but it is possible for some actions to cause old page links to no longer lead to the updated content.

The below details how you can find an id-based page link for scenarios where you want to be sure of a stable link.

## Finding the Page Permalink

A quick and easy way to find the page Permalink has been built into BookStack.
Simply select any block of text within a page and you'll see a small popup box. Within this popup box will be an input containing the page permalink. A copy button next to the input allows you to copy the link with a single click.

<video controls>
    <source src="/images/2021/01/bookstack-permalink.webm" type="video/webm">
    <source src="/images/2021/01/bookstack-permalink.mp4" type="video/mp4">
</video>

By default this link will include a `#` component so that the URL scrolls the page to the specific selected section. If you don't want this, and instead want the link to just lead to the page and not scroll down, you can remove the `#` and everything after it within the link you copied.
