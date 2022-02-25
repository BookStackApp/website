+++
title = "PDF Rendering"
description = "Options to configure PDF rendering within BookStack"
date = "2017-01-22"
type = "admin-doc"
+++

By default BookStack uses [dompdf](https://github.com/dompdf/dompdf) to export pages as PDF documents. The benefit of using dompdf is that it doesn't require any additional installation or setup but the rendering capabilities are somewhat limited.

As an alternative you can use [wkhtmltopdf](http://wkhtmltopdf.org/) to generate PDF documents instead. wkhtmltopdf uses the Qt WebKit rendering engine to provide a more accurate overall result, but comes with additional security concerns to be aware of.

### Using wkhtmltopdf

Pre-compiled binaries for wkhtmltopdf can be found on the downloads page of [their website](http://wkhtmltopdf.org/downloads.html).
BookStack will check for a file named `wkhtmltopdf` at the base folder of a BookStack install. If found it will use that to render PDF exports. 
If that does not exist it will check for a `WKHTMLTOPDF` variable in the `.env` file. 
You can use the below variable in your `.env` file to set an alternate location to wkhtmltopdf:

```bash
WKHTMLTOPDF=/home/user/bins/wkhtmltopdf
```

If neither of those exist, or if the below mentioned security option is not enabled, the default dompdf renderer will be used instead.

**Note:** As of BookStack v21.08 the `ALLOW_UNTRUSTED_SERVER_FETCHING` must also be set to `true` for wkhtmltopdf to be enabled, without this dompdf will be used instead. 
This change was made for security since, in many cases, wkhtmltopdf will perform fetches to external URLs which may be defined by users.
You should only enable the below option in environments where users & visitors are trusted.

```bash
ALLOW_UNTRUSTED_SERVER_FETCHING=true
```

[See our security page for more detail regarding this option](/docs/admin/security/#server-side-requests).

### Export Page Size

By default PDF exports are generated at an A4 size. If you'd prefer exports to be generated at "US Letter" standard sizes
you can specify this within your `.env` like so:

```bash
# US Letter
EXPORT_PAGE_SIZE=letter
```