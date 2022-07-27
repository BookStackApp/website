+++
title = "Markdown Editor"
description = "Details on using the markdown editor in BookStack"
date = "2017-07-28"
type = "user-doc"
+++

If you prefer to write in a simpler format, a Markdown editor is available in BookStack. Markdown compatibility generally follows that of [CommonMark](https://commonmark.org/), along with a few extensions including tables and task-lists.


### Switching to the Markdown Editor

The default editor option, for when creating a new page, can be configured by an admin within the "Settings > Customization" area of BookStack.

You can change to the markdown editor at a page-level while within the page editor.
Simply click the draft status, located above the page name input, and you'll be presented a drop-down with options which include those to change the editor. If you don't see these options, you may not have the relevant "Change page editor" system permission on one of your assigned system roles.

![Editor Switch Menu Options](/images/docs/user/editor-switch-dropdown.png)

For switching to Markdown, from the WYSIWYG editor, you'll see a couple of options:

- **Clean Content** - This is a system-cleaned markdown output, which is much nicer but has potential for formatting loss and potential functionality breaks (Things depending on HTML attributes/IDs for example).
- **Stable Content** - This retains existing HTML content in Markdown to avoid any potential functionality breakages or loss of formatting.

When you choose either option, there is risk of losing certain content details or formatting. BookStack will warn you of this when switching.

### Editor Shortcuts

The following shortcuts are available in the Markdown Editor:

<table>
  <thead>
    <tr>
      <th>Shortcut (Windows &amp; Linux/Mac)</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>Ctrl+S</code> / <code>Cmd+S</code></td>
      <td>Save Draft</td>
    </tr>
    <tr>
      <td><code>Ctrl+Enter</code> / <code>Cmd+Enter</code></td>
      <td>Save Page &amp; Continue</td>
    </tr>
    <tr>
      <td>
        <code>Ctrl+1</code> / <code>Cmd+1</code> <br>
        <code>Ctrl+2</code> / <code>Cmd+2</code> <br>
        <code>Ctrl+3</code> / <code>Cmd+3</code> <br>
        <code>Ctrl+4</code> / <code>Cmd+4</code>
      </td>
      <td>
        Header Large (h2)<br>
        Header Medium (h3)<br>
        Header Small (h4)<br>
        Header Tiny (h5)
      </td>
    </tr>
    <tr>
      <td><code>Ctrl+5</code> / <code>Cmd+5</code><br><code>Ctrl+D</code> / <code>Cmd+D</code></td>
      <td>Normal Paragraph</td>
    </tr>
    <tr>
      <td><code>Ctrl+6</code> / <code>Cmd+6</code><br><code>Ctrl+Q</code> / <code>Cmd+Q</code></td>
      <td>Blockquote</td>
    </tr>
    <tr>
      <td><code>Ctrl+7</code> / <code>Cmd+7</code><br><code>Ctrl+E</code> / <code>Cmd+E</code></td>
      <td>Code Block</td>
    </tr>
    <tr>
      <td><code>Ctrl+8</code> / <code>Cmd+8</code><br><code>Ctrl+Shift+E</code> / <code>Cmd+Shift+E</code></td>
      <td>Inline Code</td>
    </tr>
    <tr>
      <td><code>Ctrl+9</code> / <code>Cmd+9</code></td>
      <td>Callout (Info)</td>
    </tr>
    <tr>
      <td>
        <code>Ctrl+O</code> / <code>Cmd+O</code> <br>
        <code>Ctrl+P</code> / <code>Cmd+P</code>
      </td>
      <td>Ordered List <br> Bullet List</td>
    </tr>
    <tr>
      <td><code>Ctrl+K</code> / <code>Cmd+K</code></td>
      <td>Insert Link</td>
    </tr>
    <tr>
      <td><code>Ctrl+Shift+K</code> / <code>Cmd+Shift+K</code></td>
      <td>Show link selector</td>
    </tr>
    <tr>
      <td><code>Ctrl+Shift+I</code> / <code>Cmd+Shift+I</code></td>
      <td>Insert Image</td>
    </tr>
  </tbody>
</table>
