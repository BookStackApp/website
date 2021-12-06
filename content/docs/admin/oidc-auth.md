+++
title = "OpenID Connect Authentication"
description = "How to use an OpenID Connect identity provider as your primary way to access BookStack"
date = "2021-10-21"
type = "admin-doc"
+++

OpenID Connect (OIDC) can be used within BookStack as a primary method of authentication.
This replaces the default email & password authentication mechanism.
BookStack supports a simple level of auto-discovery to ease endpoint and key management.

When used, BookStack will attempt to match the OIDC user to an existing BookStack user
based on a stored external id value otherwise, if not found, BookStack will effectively
auto-register that user to provide a seamless access experience. They will be given the
default role set under the "Default user role after registration" option in the
application settings. 

### Requirements & Limitations

Listed below are some considerations to keep in mind in regard to BookStack's OIDC implementation:

- Only RS256 is currently supported as a token signing algorithm, Token encryption is not supported.
- Discovery covers fetching the auth & token endpoints, in addition to parsing any keys at the JWKS URI,
  from the `<issuer>/.well-known/openid-configuration` endpoint.
  - Issuer discovery is not supported.
- Group/Role handling is not currently supported but feedback, in the form of IDP-provided group examples, is welcome to help future implementation.

### BookStack Configuration

To set up OIDC based authentication add or modify the following variables in your `.env` file:

```bash
# Set OIDC to be the authentication method
AUTH_METHOD=oidc

# Set the display name to be shown on the login button.
# (Login with <name>)
OIDC_NAME=SSO

# Name of the claims(s) to use for the user's display name.
# Can have multiple attributes listed, separated with a '|' in which 
# case those values will be joined with a space.
# Example: OIDC_DISPLAY_NAME_CLAIMS=given_name|family_name
OIDC_DISPLAY_NAME_CLAIMS=name

# OAuth Client ID to access the identity provider
OIDC_CLIENT_ID=abc123

# OAuth Client Secret to access the identity provider
OIDC_CLIENT_SECRET=def456

# Issuer URL
# Must start with 'https://'
OIDC_ISSUER=https://instance.authsystem.example.com

# Enable auto-discovery of endpoints and token keys.
# As per the standard, expects the service to serve a 
# `<issuer>/.well-known/openid-configuration` endpoint.
OIDC_ISSUER_DISCOVER=true

############################################################
## NOTE: The below are only needed if not using the above ##
##       auto-discovery option.                           ##
############################################################

# Path to identity provider token signing public RSA key
OIDC_PUBLIC_KEY=file:///keys/idp-public-key.pem

# Full URL to the OIDC authorize endpoint
OIDC_AUTH_ENDPOINT=https://instance.authsystem.example.com/v1/authorize

# Full URL to the OIDC token endpoint
OIDC_TOKEN_ENDPOINT=https://instance.authsystem.example.com/v1/token
```

A user in BookStack will be linked to an OIDC provided account via the `sub` claim.
If the value of this ID changes in the identity provider it can be updated in BookStack, 
by an admin, by changing the "External Authentication ID" field on the user's profile.

### Callback URL

Should your OIDC provider require a callback URL, the following can be used: `https://example.com/oidc/callback`.
Change `https://example.com` to be the base URL of your BookStack instance.

### Debugging

To help when setting up or configuring BookStack to use your OIDC system, the below
`.env` option can help provide more insight:

```bash
# Dump out the details fetched from the identity provider.
# Only set this option to true if debugging since it will block logins
# and potentially show private details.
OIDC_DUMP_USER_DETAILS=false
```

Further to this, details of any BookStack errors encountered can be found by following
our [general debugging documentation](/docs/admin/debugging/).
