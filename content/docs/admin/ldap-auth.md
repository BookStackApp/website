+++
title = "LDAP Authentication"
description = "How to use LDAP as your primary way to register and login to BookStack"
date = "2017-01-21"
type = "admin-docs"
+++

BookStack can be configured to allow LDAP based user login. While LDAP login is enabled you cannot log in with the standard user/password login and new user registration is disabled. BookStack will only use the LDAP server for getting user details and for authentication. Data on the LDAP server is not currently editable through BookStack.

When a LDAP user logs into BookStack for the first time their BookStack profile will be created and they will be given the default role set under the 'Default user role after registration' option in the application settings.    

To set up LDAP-based authentication add or modify the following variables in your `.env` file:

```
# General auth
AUTH_METHOD=ldap

# The LDAP host, Adding a port is optional
LDAP_SERVER=example.com:389
# If using LDAP over SSL you should also define the protocol:
# LDAP_SERVER=ldaps://example.com:636

# The base DN from where users will be searched within.
LDAP_BASE_DN=ou=People,dc=example,dc=com

# The full DN and password of the user used to search the server
# Can both be left as false to bind anonymously
LDAP_DN=false
LDAP_PASS=false

# A filter to use when searching for users
# The user-provided user-name used to replace any occurrences of '${user}'
LDAP_USER_FILTER=(&(uid=${user}))

# Set the LDAP version to use when connecting to the server.
LDAP_VERSION=false

# Set the default 'email' attribute. Defaults to 'mail'.
LDAP_EMAIL_ATTRIBUTE=mail
```

You will also need to have the php-ldap extension installed on your system. It's recommended to change your `APP_DEBUG` variable to `true` while setting up LDAP to make any errors visible. Remember to change this back after LDAP is functioning.

A user in BookStack will be linked to a LDAP user via a 'uid'. If a LDAP user uid changes it can be updated in BookStack by an admin by changing the 'External Authentication ID' field on the user's profile.

You may find that you cannot log in with your initial Admin account after changing the `AUTH_METHOD` to `ldap`. To get around this set the `AUTH_METHOD` to `standard`, login with your admin account then change it back to `ldap`. You get then edit your profile and add your LDAP uid under the 'External Authentication ID' field. You will then be able to login in with that ID.
