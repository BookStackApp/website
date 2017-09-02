+++
title = "Security"
description = "BookStack security concerns and considerations"
date = "2017-01-01"
type = "admin-docs"
+++

Since BookStack can hold important information for users you should be aware of any potential security concerns.
Read through the below to ensure you have secured your BookStack instance. Note, The below only
relates to BookStack itself. The security of the server BookStack is hosted on is not
instructed below but should be taken into account.

### Initial Security Setup

1. Ensure you change the password and email address for the initial `admin@admin.com` user.
2. Ensure only the `public` folder is being served by your webserver. Serving files above this folder
opens up a lot of code that does not need to be public. Triple check this if you have installed
BookStack within the commonly used `/var/www` folder.
3. Ensure the database user you've used for BookStack has limited permissions for only accessing
the database used for BookStack data.
4. Within BookStack, go through the settings to ensure registration and public access settings are as you expect.
5. Review the user roles in the settings area.
6. Read the below to further understand the security for images & attachments.

### Images

Images are stored in a way which is publically accessible. This is done on purpose
to ensure decent performance while using BookStack as booting the application for every
image request caused multiple problems during testing. In the settings area of BookStack you can find
the option 'Enable higher security image uploads?'. Enabling this will add a 16 character
random string to the name of image files to prevent easy guessing of URLs.

Due to the above it's important to ensure you disable 'directory indexes' to prevent random
users from being able to navigate their way through your images. Here's the configuration
for NGINX & Apache if your server allows directory indexes:

**NGINX**

```nginx
# By default indexes are disabled on Nginx but if you have them enabled
# add this to your BookStack server block
location /uploads {
       autoindex off;
}
```

**Apache**

```apache
# Add this to your Apache BookStack virtual host if Indexes are enabled.
# If .htaccess file are enabled then the below should already be active.
<Location "/uploads">
    Options -Indexes
</Location>
```

### Attachments

Attachments, if not using Amazon S3, are stored in the `storage/uploads` directory.
Unlike images these are stored behind the application authentication layer so access
depends on permissions you have set up at a role level and page level.

If you are using Amazon S3 for file storage then access will depend on your S3 permission
settings. Unlike images, BookStack will not automatically attempt to make uploaded attachments
publically accessible.  

### User Passwords

User passwords, if not using an alternative authentication method, are stored in the database.
These are hashed using the standard Laravel hashing methods which use the Bcrypt hashing algorithm.
