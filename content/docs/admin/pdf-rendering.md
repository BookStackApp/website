+++
title = "PDF Rendering"
description = "Options to configure PDF rendering within BookStack"
date = "2017-01-22"
type = "admin-doc"
+++

By default BookStack uses [dompdf](https://github.com/dompdf/dompdf) to export pages as PDF documents. The benefit of using dompdf is that it doesn't require any additional installation or setup but the rendering capabilities are somewhat limited.

As an alternative you can instead define a command to make use of external PDF rendering options that may provide more capabilities.

{{<toc>}}

---

### Export Page Size

By default PDF exports are generated at an A4 size. If you'd prefer exports to be generated at "US Letter" standard sizes
you can specify this within your `.env` like so:

```bash
# US Letter
EXPORT_PAGE_SIZE=letter
```

---

### PDF Export Command

Instead of using the default PHP-based default PDF rendering system, you can define a command for BookStack to use when generating
a PDF. This enables flexibility in what program is used to create PDF exports.
The command is set via a `EXPORT_PDF_COMMAND` option in your `.env` file, which can use the following placeholders:

- `{input_html_path}` - Path to a file where BookStack will provide HTML to convert.
- `{output_pdf_path}` - Path to a file where the command should output its PDF result.

Here's an example value for this option using these placeholders:

```bash
EXPORT_PDF_COMMAND="/scripts/convert.sh {input_html_path} {output_pdf_path}"
```

Below you can find some examples using this for specific PDF generation options.

**Considerations**

- Security is a significant concern for this option and process. Input HTML will include user-editable data, and is not assured to be trustworthy & safe. Ideally, any networking or filesystem access would be disabled/prevented during conversion.
- BookStack will attempt to embed required images into the HTML data as base64 data URIs to avoid external fetching.
- BookStack will embed CSS styling into the HTML data.
- Use of this option requires running a process from PHP, which can be considered risky and may potentially be blocked by configuration, environment and/or systems like SELinux by default.
- BookStack sets a timeout of 15 seconds for this command to return.
- BookStack will use the return status code of the command as an indicator of failure/success, while also checking that the output PDF was written to.

#### Example: Weasyprint Command Option

**Warning:** This is option is not considered secure due to potential filesystem/network access.

This option uses [weasyprint](https://doc.courtbouillon.org/weasyprint/stable/) to generate PDF exports.

```bash
EXPORT_PDF_COMMAND="weasyprint {input_html_path} {output_pdf_path}"
```

---

### Using wkhtmltopdf

**Note:** As of BookStack v24.05 this option is not considered deprecated, due to the diminishing support of wkhtmltopdf.
You can instead use the more flexible [PDF Export Command](#pdf-export-command) option detailed above.

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