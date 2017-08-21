+++
title = "Mail Configuration"
description = "Configuring Bookstack to send mail"
date = "2017-08-08"
type = "admin-docs"
slug = "mail-config"
+++

Bookstack supports the following mechanisms for sending mail:

1. SMTP;
2. mail (php sendmail() function);
3. sendmail (Linux sendmail);

# SMTP

To get up and running with SMTP, you will need the following variables - Example
values have been provided below:

Generally speaking, if a value is not required (such as MAIL_PORT variable), it
can be set to 'null', or not defined and a default will be chosen.

The list below shows all the supported options for SMTP.

```bash
MAIL_DRIVER=smtp
MAIL_HOST=smtp.provider.tld
MAIL_PORT=465
MAIL_ENCRYPTION=tls
MAIL_USERNAME=user@provider.tld
MAIL_PASSWORD=onlyifneeded
# MAIL_FROM - The email address Bookstack uses to send emails.
MAIL_FROM=noreply@yourdomain.tld  
```

# mail and sendmail

The `mail` and `sendmail` drivers use the variables listed in the SMTP section,
however they use different methods to actually send the email, and connect to
the SMTP gateway:

* `mail` uses the PHP mail() function;
* `sendmail` uses the Linux application - It calls `/usr/sbin/sendmail -bs`.

# Other Mechanisms

These mechanisms are not supported, but are reported to work.
At present they may require additional dependencies in order to function
reliably.

| Service           | Driver Name |
|-------------------|-------------|
| Amazon SES        | ses         |
| Mandrill          | mandrill    |
| Rackspace Mailgun | mailgun     |

Refer to `config/services.php` for configuration hints.