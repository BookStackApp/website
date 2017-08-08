+++
title = "Mail Configuration"
description = "Configuring Bookstack to send mail"
date = "2017-08-08"
type = "admin-docs"
slug = "mail-config"
+++

This document has been written by referencing the file at `config/mail.php`.

Bookstack supports the following mechanisms for sending mail:

1. SMTP;
2. mail (php sendmail() function);
3. sendmail (Linux sendmail);
4. Mailgun (Rackspace Mailgun);
5. Mandrill;
6. Amazon SES ('ses'); or
7. Log

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

# Mailgun / Mandrill / Amazon SES

These web services are configured via the `config/services.php` file.
At present Bookstack does not have environment variables support for these.

## Mailgun

Mailgun requires:

* A domain as configured within the Mailgun configuration portal; and
* An API secret for the domain.
```PHP
'mailgun'  => [
  'domain' => '',
  'secret' => '',
],
```

## Mandrill

At time of writing, Mandrill only requires a 'secret'.
```PHP
'mandrill' => [
  'secret' => '',
],
```

## Amazon SES

SES requires three keys to be set:
```PHP
'ses'      => [
    'key'    => '',
    'secret' => '',
    'region' => 'us-east-1',
],
```

# The 'log' mail driver

This driver outputs the mail to the application log, and is useful for local
development instances.
