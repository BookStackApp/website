+++
title = "Email & Webhooks"
date = "2021-12-21"
type = "admin-doc"
slug = "email-webhooks"
aliases = ["email-config"]
+++

Within BookStack email is used in various ways relating to user management & authentication. 
Outgoing webhooks are available as a mechanism to extend BookStack or notify in an event-driven manner.

- [Email Configuration](#email-configuration)
- [Outgoing Webhooks](#outgoing-webhooks)
- [Async Action Handling](#async-action-handling)

---

### Email Configuration

BookStack sends out emails for a range of purposes such as email-address confirmation & "forgot password" flows.
Both SMTP and Sendmail (Linux Sendmail) are supported email mechanisms.

#### SMTP

To get up and running with SMTP you will need to add, or set, the following variables in your `.env` file:

```bash
MAIL_DRIVER=smtp

# Host, Port & Encryption mechanism to use
MAIL_HOST=smtp.provider.tld
MAIL_PORT=465
MAIL_ENCRYPTION=tls

# Authentication details for your SMTP service
MAIL_USERNAME=user@provider.tld
MAIL_PASSWORD=onlyifneeded

# The "from" email address for outgoing email
MAIL_FROM=noreply@yourdomain.tld  

# The "from" name used for outgoing email
MAIL_FROM_NAME=BookStack
```

#### Sendmail

The `sendmail` drivers uses the sendmail application on the host system. It will call `/usr/sbin/sendmail -bs`.

To enable this option you can set the following in your `.env` file:

```bash
MAIL_DRIVER=sendmail

# The "from" email address for outgoing email
MAIL_FROM=noreply@yourdomain.tld  

# The "from" name used for outgoing email
MAIL_FROM_NAME=BookStack
```

#### Debugging Email

You can follow the instructions provided in the [debugging documentation page](/docs/admin/debugging/)
to help gain more details about issues you may come across. Within the "Settings > Maintenance" area of
BookStack you can find a "Send a Test Email" action which provides a quick & easy way to send emails
after changing your configuration. This action will also attempt to capture any errors thrown and display them.

---

### Outgoing Webhooks

Webhooks can be configured in the "Settings > Webhooks" area of your BookStack instance.
An example of the POST data format is shown when creating or editing a webhook.

The webhook data is "Slack Compatible" in respect to having a `text` property containing a human-readable description
of the event. Services such as [Discord](https://discord.com/developers/docs/resources/webhook#execute-slackcompatible-webhook), [Zulip](https://zulip.com/integrations/doc/slack_incoming) and Teams, upon many others, have options to support this format.

A video guide on BookStack webhooks, including usage with Discord and HomeAssistant, [can be found here](https://www.youtube.com/watch?v=_zIp1ruGpoI).

The running of webhooks can slow down a system due to the required additional processing time.
See the [async action handling](#async-action-handling) section below to details on running webhooks
in a background process to improve performance.

---


### Async Action Handling

Actions like sending email or triggering webhooks are performed synchronously by default which can
slow down page loading when those actions are triggered. These actions can instead be processed asynchronously
so they're handled in the background to prevent slowing down the request. This requires a config change 
and a queue worker process to handle these background jobs:

#### Config Change

Within your `.env` file add or update (if already existing) the following option then save the file.

```bash
QUEUE_CONNECTION=database
```

#### Queue Worker Process

The queue work process can be run via the following command from your BookStack installation directory:

```bash
php artisan queue:work --sleep=3 --tries=3
```

Ideally this needs to be ran continuously. The method of doing this may depend on your operating system
and personal software preferences. On many modern Linux systems systemd is an appropriate method.
The below unit file example can be used with systemd to run this process. Note, this is suited to 
Ubuntu 20.04 setups that have used our installation script. Details may need tweaking for other systems.

```bash
[Unit]
Description=BookStack Queue Worker

[Service]
User=www-data
Group=www-data
Restart=always
ExecStart=/usr/bin/php /var/www/bookstack/artisan queue:work --sleep=3 --tries=1 --max-time=3600

[Install]
WantedBy=multi-user.target
```

To configure systemd (On a Ubuntu 20.04 system) with the above unit you'd typically:

- Create a new `/etc/systemd/system/bookstack-queue.service` file containing the above content.
- Run `systemctl daemon-reload` to discover the new service.
- Run `systemctl enable bookstack-queue.service` to ensure the service starts at (re)boot.
- Run `systemctl start bookstack-queue.service` to start the queue service.

Note: you may need to run the above commands with `sudo` if not acting as a privileged user. 

You can then use `systemctl status bookstack-queue.service` to check the status of the queue worker. 
