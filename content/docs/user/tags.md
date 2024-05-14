+++
title = "Content Tags"
date = "2024-05-14"
type = "user-doc"
slug = "tags"
+++

While BookStack has a hierarchy at the center of the platform to organise content, 
you can sometimes desire an extra dimension of categorisation for content.
Tags in BookStack offer this in a flexible manner, where a tag can represent a category
and value across all levels & parts of the hierarchy.

{{<toc>}}

### Tag Format

Tags in BookStack have a name, but can also optionally have a value. This allows
detailed & categorised levels of tagging where required for a mixed range of use-cases.

![Three tags applied to content. A "Reviewed At" tag with value "20240611". A "Admin Books" tag with no value. A "Category" tag with value "Team planning"](/images/docs/user/tags-list.png)

For example, you could use a tag named `Critical` with no value to mark important high priority pages.
Alternatively, if you have a range of priorities, you could use a tag named `Priority` with a value
of `Critical`. Using both a name and value here allows you to identify any content with a Priority set, in addition
to allowing identification of just `Critical` content.

This can also come in useful when you want to use tags for metadata. For example, you may want to record content review
dates, which you could achieve through a `Reviewed At` tag with value representing the last review date.

### Adding & Managing Tags

Tags can be added to any level of the content hierarchy (Shelves, books, chapters & pages).
You can apply tags when editing any such item. For shelves, books & chapters, tags are found
in a dropdown section on the edit view:

![View of editing tags for a Book, showing two tags, each as small cards with two edit zones within for tag name and value](/images/docs/user/tags-edit.png)

For pages, you can find tags in the sidebar toolbox when in the page editor:

![View of the page editor, with a "Page Tags" section open in the sidebar](/images/docs/user/tags-page-edit.png)

When editing a tag name or value BookStack will show a list of potential existing relevant options to help you quickly
fill the input. Suggestions for values will be just those used before for the chosen tag name, rather than all values
across all tags.

While editing, you're also able to re-order & remove tags as desired.
Any changes to tags are saved alongside when you save the item they're applied to.

### Tag Display & Overview

When applied, tags are shown in a few areas of BookStack alongside the content they're applied to:

- In the sidebar or info pane when viewing any tagged item.
- On items listed within search results.
- In API responses for items.

When viewing an item with tags applied, you can click the tag to start a tag search. Clicking the tag name will start
a search for all content that also has a tag of that name. Clicking the value will start a search for other content
that has that same tag name & value applied.

To view all tags being used, you can access an Tag overview page via the "View Tags" action found on the books or shelves index,
or you can navigate straight to the `/tags` URL path. Here you'll see a list of all tag names used across content you have
visibility of, alongside figures detailing their usage counts across each type of content.

![View of a tags list, including a search box and sort options. It shows 4 tags as rows, and each row has a breakdown of usage.](/images/docs/user/tags-overview.png)

You can click the tag name, or item counts, to start a relevant filtered search.
Where tag values are used, you can also click the link on the right to access a
list of all tag values for that tag name, with a similar breakdown as before.

### Tags in the Search Index

When content is indexed for searching in BookStack, tags names & values are considered as part of the search engine,
and are even given a boost above normal content. This means you can boost content in search results 
for specific search terms using tags where needed.

### Tag Search Operations

Content can be queried in BookStack by tag name or value.
This can be used in many areas of BookStack where searching is made available. 
As mentioned in the sections above, you can often initiate tag searches via clicking tags
or statistics in the tag index. Otherwise you can directly use the following syntax:

- Search by tag name:
  - Syntax: `[<name>]`
  - Example: `[Location]`
- Search by tag value:
  - Syntax: `[<operator><value>]`
  - Example: `[=London]`
- Search by tag name & value:
  - Syntax: `[<name><operator><value>]`
  - Example: `[Location=London]`

The following are valid operators: `=`, `!=`, `<`, `>`, `<=`, `>=`, `like`.
When using the `like` operator you can use `%` symbols in the search value to represent wildcards.

Using this syntax you can get quite inventive. As an example, if you were applying `Reviewed At` tags with values 
in a format like `20240627` (YYYYMMDD) you could search for all content with "Reviewed At" dates before 2024 using: <br> `[Reviewed At<20240101]`.

See our [documentation on searching](/docs/user/searching/) for more advanced search syntax.

### Tags for Customization

Tags can also be handy for customization in a range of ways, even if just to assist as extra metadata or identification points.
For example, you could use the [logical theme system](https://github.com/BookStackApp/BookStack/blob/development/dev/docs/logical-theme-system.md)
to run a custom action on page creations, and within that change behaviour or action based upon whether the parent Book has a specific tag.

Additionally, BookStack will convert tags to classes within the HTML templates used when viewing content in BookStack, which can then
be used for easy tag-controlled customization & styling.
Details of these tag classes can be found in our [Hacking BookStack documentation here](/docs/admin/hacking-bookstack/#tag-classes).