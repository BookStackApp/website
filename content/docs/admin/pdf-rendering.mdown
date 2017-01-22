+++
title = "PDF Rendering"
description = "Using WKHTMLtoPDF to generate PDF's for better rendering"
date = "2017-01-22"
type = "admin-docs"
+++

By default BookStack uses [Dompdf](https://github.com/dompdf/dompdf) to export pages as PDF documents. The benefit of using DomPDF is that it doesn't require any additional installation or setup but the rendering capabilities are somewhat limited.

As an alternative you can use [wkhtmltopdf](http://wkhtmltopdf.org/) to generate PDF documents instead. wkhtmltopdf uses the Qt WebKit rendering engine to provide a more accurate overall result.

### Using wkhtmltopdf

Pre-compiled binaries for wkhtmltopdf can be found on the downloads page of [their website](http://wkhtmltopdf.org/downloads.html). BookStack will check for a file named `wkhtmltopdf` at the base folder of a BookStack install. If found it will use that to render PDF's. If that does not exist it will check for a `WKHTMLTOPDF` variable in the `.env` file. You can use this variable to set an alternate location to wkhtmltopdf:

```
# In .env file
WKHTMLTOPDF=/home/user/bins/wkhtmltopdf
```

If neither of those exist Dompdf will be used instead.