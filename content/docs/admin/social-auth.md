+++
title = "Social Authentication"
description = "Enabling and configuring social authentication for easier logins"
date = "2017-01-01"
type = "admin-doc"
+++

BookStack currently supports login via Google, Facebook, Slack, Twitter & GitHub. Once enabled options for these services will show up in the login, registration and user profile pages. By default these services are disabled. To enable them you will have to create an application on the external services to obtain the require application id's and secrets. Here are instructions to do this for the current supported services:

---

### Google

1. Open the [Google Developers Console](https://console.developers.google.com/).
2. Create a new project (May have to wait a short while for it to be created).
3. Select 'Enable and manage APIs'.
4. Enable the 'Google+ API'.
5. In 'Credentials' choose the 'OAuth consent screen' tab and enter a product name ('BookStack' or your custom set name).
6. Back in the 'Credentials' tab click 'New credentials' > 'OAuth client ID'.
7. Choose an application type of 'Web application' and enter the following urls under 'Authorized redirect URIs', changing `https://example.com` to your own domain where BookStack is hosted:
    - `https://example.com/login/service/google/callback`
    - `https://example.com/register/service/google/callback`
8. Click 'Create' and your app_id and secret will be displayed. Replace the false value on both the `GOOGLE_APP_ID` & `GOOGLE_APP_SECRET` variables in the '.env' file in the BookStack root directory with your own app_id and secret.
9. Set the 'APP_URL' environment variable to be the same domain as you entered in step 7. So, in this example, it will be `https://example.com`.
10. All done! Users should now be able to link their social accounts in their account profile pages and also register/login using their Google accounts.

---

### GitHub

1. While logged in, open up your [GitHub developer applications](https://github.com/settings/developers).
2. Click 'Register new application'.
3. Enter an application name ('BookStack' or your custom set name), A link to your app instance under 'Homepage URL' and an 'Authorization callback URL' of the url that your BookStack instance is hosted on then click 'Register application'.
4. A 'Client ID' and a 'Client Secret' value will be shown. Add these two values to the to the `GITHUB_APP_ID` and `GITHUB_APP_SECRET` variables, replacing the default false value, in the '.env' file found in the BookStack root folder.
5. Set the 'APP_URL' environment variable to be the same domain as you entered in step 3.
6. All done! Users should now be able to link their social accounts in their account profile pages and also register/login using their Github account.

---

### Twitter

To create a Twitter application for signing in with you may require a phone number linked to your Twitter account.

1. Go to your [Twitter apps page](https://apps.twitter.com/) and click 'Create New App'.
2. Enter an application name and description. The website and callback URL can just be your BookStack homepage urls. Then submit the form.
3. Click into your new application and go the the settings tab and ensure 'Allow this application to be used to Sign in with Twitter' is checked.
4. If you'd like, set an icon and change any other details.
5. Click the 'Permissions' tab and in the 'Additional Permissions' section check the box 'Request email addresses from users' then save.
6. Go to the 'Keys and Access Tokens' tab to find your API key and secret. Add or set these to your `.env` file like so:
	```bash
	# Replace the below (including '{}' braces) with your twitter API_KEY and API_SECRET
	TWITTER_APP_ID={API_KEY}
	TWITTER_APP_SECRET={API_SECRET}

	# APP_URL Needs to be set to your BookStack base url
	APP_URL=http://mybookstackurl.com
	```
7. All done! Users should now be able to link their Twitter account in their account profile pages and also register/login using their Twitter account.

---

### Facebook

1. Navigate to the [Facebook developers page](https://developers.facebook.com) then go 'My Apps' -> 'Add a New App'.
2. Enter an app name ('BookStack login' or something custom) and contact email then continue.
3. In your new app select 'Add Product' on the left sidebar then choose 'Facebook Login' by clicking the 'Get Started' button. Select the 'Web' option if asked to choose a platform.
4. Enter the your base BookStack url into the 'Site URL' box and save.
5. On the left sidebar again go to 'Facebook Login' -> 'Settings'.
6. Enter your base BookStack URL again into the 'Valid OAuth redirect URIs' input and save.
7. Navigate back to the app 'Dashboard' in the sidebar to find your app id and secret. Add or set these to your `.env` file like so:
	```bash
	# Replace the below (including '{}' braces) with your facebook APP_KEY and APP_SECRET
	FACEBOOK_APP_ID={APP_KEY}
	FACEBOOK_APP_SECRET={APP_SECRET}

	# APP_URL Needs to be set to your BookStack base url
	APP_URL=http://mybookstackurl.com
	```
7. All done! Users should now be able to link their Facebook account in their account profile pages and also register/login using their Facebook account.

---

### Slack

1. Go to the [Slack apps page](https://api.slack.com/apps) and select 'Create New App'.
2. Enter an app name ('BookStack login' or something custom), select your team then continue.
3. You should see your client ID and secret. Copy these details and add them as new variables in your `.env` file like so:
	```bash
	# Replace the below (including '{}' braces) with your slack CLIENT_ID and CLIENT_SECRET
	SLACK_APP_ID={CLIENT_ID}
	SLACK_APP_SECRET={CLIENT_SECRET}

	# APP_URL Needs to be set to your BookStack base url
	APP_URL=http://mybookstackurl.com
	```
4. In your slack app go to 'OAuth & Permissions' and enter your BookStack base URL into the 'Redirect URL(s)' input then save.
5. All done! Users should now be able to link their Slack account in their account profile pages and also register/login using their Slack account.

---

### AzureAD (Microsoft)

1. Login to your your azure portal and navigate to the 'Azure Activity Directory' area.
2. Under 'Manage > App registrations' select 'New application registration'.
3. Enter a name ('BookStack'). Keep the 'Application type' as 'Web app / API'. Set the 'Sign-on URL' to be the main URL to your BookStack instance.
4. Once created, Click on your new application and note the 'Application ID'. This is the APP_ID value for step 9.
5. Within your application in azure, Navigate to 'Keys' under 'API access'.
6. Enter any description you want and set a duration ('Never expires' is okay unless you specifically want it to expire). Then click 'Save'.
7. Copy the string of characters under 'Value'. This is the APP_SECRET value for step 9 and is only shown once.
8. Back under 'App registrations' click on 'Endpoints'. This will show a list of URL's that each contain a unique ID. For example, the OAuth2 token endpoint will look something like this: `https://login.microsoftonline.com/<UniqueID>/oauth2/token`. Copy out the unique ID. This is the TENANT value for step 9.
9. Copy these details and add them as new variables in your `.env` file like so:
	```bash
	# Replace the below (including '{}' braces) with your azure APP_ID and APP_SECRET and TENANT
  	AZURE_APP_ID={APP_ID}
  	AZURE_APP_SECRET={APP_SECRET}
  	AZURE_TENANT={TENANT}

	# APP_URL Needs to be set to your BookStack base url
	APP_URL=http://mybookstackurl.com
	```
10. All done! Users should now be able to link their AzureAD account in their account profile pages and also register/login using their Slack account.
