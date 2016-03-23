# Social Authentication

BookStack currently supports login via both Google and GitHub. Once enabled options for these services will show up in the login, registration and user profile pages. By default these services are disabled. To enable them you will have to create an application on the external services to obtain the require application id's and secrets. Here are instructions to do this for the current supported services:

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
10. All done! Users should now be able to link to their social accounts in their account profile pages and also register/login using their Google accounts.

### Github

1. While logged in, open up your [GitHub developer applications](https://github.com/settings/developers).
2. Click 'Register new application'.
3. Enter an application name ('BookStack' or your custom set name), A link to your app instance under 'Homepage URL' and an 'Authorization callback URL' of the url that your BookStack instance is hosted on then click 'Register application'.
4. A 'Client ID' and a 'Client Secret' value will be shown. Add these two values to the to the `GITHUB_APP_ID` and `GITHUB_APP_SECRET` variables, replacing the default false value, in the '.env' file found in the BookStack root folder.
5. Set the 'APP_URL' environment variable to be the same domain as you entered in step 3.
6. All done! Users should now be able to link to their social accounts in their account profile pages and also register/login using their Github account.