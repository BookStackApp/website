+++
title = "Page Templates"
date = "2022-11-24"
type = "user-doc"
slug = "page-templates"
+++

Within BookStack you can mark a page as a template so that its content
can easily be reused when editing and creating pages.
This can be super useful when you need to create many pages following
a similar format.

## Creating a Page Template

A page template in BookStack is simply a normal page that has been marked as a template.
Start by creating/editing the page you want to use as a template.
Within the editor sidebar you should see a templates tab.
Within this tab you should find a "Page is a template" checkbox.
Simply check that option and save the page to make the page become a template. 
If you don't see that checkbox, you likely lack the "Manage page templates" role system permission.

![Page edit view showing the templates tab and mentioned checkbox](/images/docs/user/template_checkbox.png)

Note: Visibility of page templates are controlled via visibility of the page itself. If a user lacks permission to view the page marked as a template, it will not show as an available template for them.

## Using Page Templates

Page templates can be accessed when creating or editing a page.
Within the editor sidebar you should see a templates tab.
If you have templates available they will be listed in this area.
A search bar will also show for easy searching of templates.

There are multiple ways to add a template into a page:

- Select the template box itself to replace the editor content with contents of the template.
- Select the up arrow of the template box to prepend its contents to the editor.
- Select the down arrow of the template box to append its contents to the editor.
- Drag the template box into the editor to insert its contents into the dragged location.

![Dragging a template into the page editor](/images/docs/user/template_dragging.png)

Keep in mind that using a template simply copies its content at time-of-use, it is not
a "live" connection to the template page, and updating the template page won't affect pages that have previously used it as a template.