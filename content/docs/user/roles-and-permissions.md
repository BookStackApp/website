+++
title = "Roles and Permissions"
date = "2021-04-15"
type = "user-doc"
slug = "roles-and-permissions"
+++

Within BookStack the abilities of a user is controlled by the roles assigned to them and the permissions provided to those roles. A user can be assigned multiple roles, in which case the permissions will stack and the user will receive any ability if any of the roles is provided that specific ability.

### Managing Roles

Roles can be created and edited by an admin user by navigating to "Settings > Roles" within the BookStack interface. A set of default roles are provided in a fresh BookStack instance for common use-cases.
When altering a role you'll be able to change the system permissions which provides certain system-wide abilities. 
In addition, you'll see a range of "Asset Permissions" which are the default abilities provided to members of that role for content within the system. These may be overridden by content-level permissions. Many of the asset permissions have an "Own" option. This provides the members of that role the ability only when they are an owner of an item in the system.

### Assigning Roles

Roles can be assigned to users an admin user editing a user's profile in the "Settings > Users" area of the BookStack interface. Here multiple roles can be assigned to a user, in which case the permissions will stack and the user will receive any ability if any of the roles is provided that specific ability.

Keep in mind that certain mechanisms within BookStack do have the ability to alter the roles of a user. These include:

- The "Default user role after registration" option in the registration settings.
- LDAP group syncing.
- SAML2 group syncing.

### Content Level Permissions

Permissions can be overridden at a Shelf, Book, Chapter or Page level where required.
This can be done using the "Permissions" action when viewing such content, by any user that has a role permission to "Manage all/own permissions".
When overriding at content-level, an "Enable Custom Permissions" checkbox toggles the custom override on or off. When enabled, a table of roles and their permissions will be shown (Excluding the default "Admin" role which always retains all permissions). Within this table, you can then select the individual permissions you want each role to receive instead of their default role permissions. These custom permissions need to be configured for all roles as desired, permissions cannot currently be overridden on a singular role or per-user basis.

![A view of the page permissions screen showing custom permissions being selected](/images/docs/user/page-permissions.png)

Content level permissions within BookStack have the following behavior:

- Custom permissions applied to books or chapters will auto-cascade to all child content within, unless that content has its own custom permissions.
- Custom permissions applied to shelves _**will not**_ auto-cascade, due to the many-to-many relation to books, but they can be copied to all child books in a single action where required. 

When custom content level permissions are active and affecting the currently viewed item, you'll see an indicator within the details sidebar section. If you have permission to edit the active content level permissions, this acts as a link which will take you to the relevant permissions view, even if applied to a parent chapter or book.

![Content level permissions indicator for a page showing "Book Permissions Active"](/images/docs/user/permissions-active-indicator.png)