+++
title = "Attachments"
date = "2024-01-17"
type = "user-doc"
+++

Within BookStack you can attach files & links to pages, so they can be referenced within content
and shown available for download. Access to attachments is controlled via view permissions to the
page they're uploaded to, so users can only access attachments for pages they can view in the system.

File attachments are really just there for storage and access convenience. 
BookStack does not do anything special with attachments like scan & index their contents,
since documentation content in BookStack is designed & intended to be within the text of pages.

{{<toc>}}

---

### Creating & Uploading Attachments

Attachments can be uploaded via the sidebar when in the page editor.
The attachments section of the sidebar is represented with a paper-clip 
icon and, when open, looks like this:

![View of the BookStack page editor, with the sidebar open on an "Attachments" view, with the buttons "Upload file" and "Attach Link", along with two listed attachment boxes below labelled as a link with names "kitty-cat.jpg" and "Secret Location"](/images/docs/user/attachments-sidebar.png)

With this open there are options to "Upload File" or "Attach Link". 
You can also just drag and drop a file into that zone around the buttons to quickly
upload a file from your device.
Uploading files is the most common use-case but you can attach a link to the page
to act as a dynamic, permission-controlled, reference/URL you can use & share.

Below the buttons is where any existing uploaded attachments can be found.
You can use the handles on the left to reorder them if needed.
There are buttons on each to delete or edit the attachment. 
Via editing you can alter the attachment name in addition to the underlying file or link, while the original
attachment URL will remain the same.
There's also a button to insert the attachment into the page, as referenced in the "Using Attachments in Pages" section below.

Keep in mind, attachments are strongly coupled to the pages they're uploaded to.
Access to an attachment is controlled via the ability to see the owning page.
If a page is deleted, the attachments uploaded to it will be deleted too!

---

### Accessing Attachments

One uploaded, attachments will show in the sidebar when viewing a page.
You can click on an attachment to open it up. 
Link attachments will open in a new tab.
File attachments will download, or you can view them in a new tab
via the dropdown menu on the right of the attachment:

![View of the sidebar when viewing a page with two attachments: a "kitty-cat.jpg" file attachment and "Secret Location" link attachment. There's also a view of the same but showing a dropdown menu on the right of the attachment, with "Download" and "Open in Tab" options](/images/docs/user/attachments-accessing.png)

Alternatively you can hold down Ctrl (or Cmd on Mac) and then click on it directly
to open in a new tab.
Note that attachments in new tabs may still download if the file format is not deemed
safe to show via a new tab, or if that's the browser's default behaviour.

---

### Using Attachments in Pages

While attachments are listed in the sidebar when viewing a page, as shown in the section above,
you can link to attachments within the page itself which can be a common need when wanting to add context
or reference the attachment in a particular part of your documentation content.
There are a few ways to do this.

The first method is to simply use the "link" icon button on the attachment in the sidebar.
Clicking this will insert a link into the page, at the current cursor position, with the correct
attachment URL & name.

The second method is via drag & drop. You can drag the attachment from the sidebar using its
handle or name, and then drop it into the editor which will insert an attachment link at that location.

![View of the page editor, with the attachments sidebar open. An attachment card named "Secret Location" is being dragged into the body of the page editor.](/images/docs/user/attachments-usage.png)

The third is just using normal browser and editor functionality.
You can right-click and copy the URL for the attachment, then insert a link as normal into the page
using that attachment URL you just copied.


---

### Technical Details

When you upload & download attachments, BookStack will attempt to stream files where possible so that the application
can serve large files quickly without needing to use up system memory or increase the PHP memory limit.
If your instance is using S3-based storage, then attachments are streamed from BookStack to server
but not from S3 (or similar) to BookStack at this time, so it may be better to store and serve attachments
direct from storage if possible in those large-file circumstances.

Even with streaming, you can often run into server-side (and proxy) upload/download/timeout limits. 
Our [admin documentation on file uploads](/docs/admin/upload-config/#changing-upload-limits) may help if you run into these.

When attachments are served inline (opened in new tab or with an `open=true` query parameter)
BookStack will attempt to sniff the mime-type of the attachment content, then serve the file
with that mime-type to allow in-browser viewing if supported, and if the detected mime-type
is deemed safe (For example, HTML won't be served inline). 
This is done via an internal allow-list of mime-type values.