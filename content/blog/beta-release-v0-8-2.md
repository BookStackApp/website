+++
author = "Dan Brown"
description = ""
slug = "beta-release-v0-8-2"
draft = false
title = "Beta Release v0.8.2"
date = 2016-03-30T16:13:09Z

+++

BookStack v0.8.2 has just been push up to the release branch in the official [GitHub repository](https://github.com/BookStackApp/BookStack/releases/tag/v0.8.2). This is a bugfix release to fix a few small things up before the next feature release. Update instructions can be found in the [new documentation pages here](https://www.bookstackapp.com/docs/admin/updates).

The biggest update is to the Book, Chapter & Page restrictions that were introduced in version 0.7.6. This has been re-named from 'Restrictions' to 'Permissions' since that's a much more appropriate name for them. Also it was noticed that the 'Restriction' system did not allow a role, with given permissions selected, to perform actions that they did not also have permissions for on a role level. Both role and asset permissions were required before which prevented this system being really useful.

This behaviour has now been amended so that asset-level permissions will now override role-level permissions. This makes total sense since, on assets, you have to specify what actions to allow on a role-by-role basis anyway. More details about this change can be found in my comment on [this issue](https://github.com/BookStackApp/BookStack/issues/89#issuecomment-203135563).

One other tweak is a presentational fix in the header. Longer names will be cut down (Or hidden if necessary) to prevent them from dropping down onto a new line and taking up space. Details of this issue can be [found here](https://github.com/BookStackApp/BookStack/issues/87).
