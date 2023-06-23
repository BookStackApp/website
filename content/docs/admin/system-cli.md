+++
title = "BookStack System CLI"
date = "2023-06-32"
type = "admin-doc"
+++

The BookStack System CLI allows easy running of BookStack infrastructure-level tasks
such as backing up, restoring or updating. The CLI is distributed with 
the BookStack project source code, although the CLI is self-contained and can run independently
of a BookStack instance.

***Warning:** The System CLI was added in BookStack v23.05 in an alpha state and currently
remains in that non-production state until it has been well tested.
Please use the CLI with caution, and ensure you fully & periodically test any processes where the CLI is relied upon.*

{{<toc>}}

---

### CLI Usage

The CLI is included with the BookStack codebase, so you can usually run it like so:

```bash
# Go to your BookStack install
cd /var/www/bookstack

# Run the CLI
./bookstack-system-cli
```

The CLI is built using PHP. 
Depending on operating system and permissions, you may need to instead run it directly via PHP like so:

```bash
php ./bookstack-system-cli
```

By default, without any arguments provided, the CLI will list the available commands which are documented [in more detail below](#available-commands).
With any command, you can pass a `-h` option to show additional per-command details and options.

---

### Standalone Usage

It's possible to use the CLI without it being part of a BookStack instance. This can be useful if using it to create 
a new BookStack install instance.

You can grab a copy of the CLI from the `release` branch of the [core project GitHub repo](https://github.com/BookStackApp/BookStack/blob/release/bookstack-system-cli). 
Below is how you might fetch the CLI, and make it globally available on the command line, on a Linux server:

```bash
# Download the raw CLI file from GitHub
curl https://github.com/BookStackApp/BookStack/raw/release/bookstack-system-cli -sLo bookstack-system-cli

# Made the CLI executable by default
chmod +x bookstack-system-cli

# Move into a globally accessible PATH location
sudo mv bookstack-system-cli /usr/local/bin/bookstack-system-cli

# Run the CLI
bookstack-system-cli
```

---

### Available Commands

#### backup

Backup a BookStack installation to a single compressed ZIP file.
By default this will attempt to backup anything that may be expected to be user-generated, or admin edited, within an install.
This includes a database dump of everything within the connected BookStack database instance, along with the current `.env` file in use.
The backup will also attempt to include a copy of the CLI itself in the backup, so the exact same CLI can be used for restore where required.

Note that this won't attempt backup of anything on remote systems, like those uploaded when BookStack is configured to use S3 file storage.

If a backup target output ZIP is not provided as a first additional argument, it will be saved to the `storage/backups` folder, relative to
the BookStack root installation folder, with a name in the format:

```
bookstack-backup-<year>-<month>-<day>-<time>.zip
```

When successful, the CLI will report the backup ZIP location upon completion.

##### Usage Examples

```bash
# Create a backup in the default "storage/backups" directory of a BookStack install
./bookstack-system-cli backup

# Create a backup, specifying the target output file name and location
# as the first additional argument
./bookstack-system-cli backup ~/my-backup.zip
```

##### Command Options

- `--no-database` Skip inclusion of a database dump, containing your main BookStack content.
- `--no-uploads` Skip backup of any local file or image uploads.
- `--no-themes` Skip backup of any custom theme files.
- `--app-directory=<path>` Provide a path to the BookStack instance to back up. When not provided, the CLI will attempt to locate the BookStack install based upon current working directory and the location of the CLI itself.

#### restore

Restore the provided ZIP file into an existing BookStack installation.
The ZIP file should be one created via the `backup` command, or at least in a compatible format.

When ran, the command will attempt to resolve any APP_URL, or database, `.env` changes that might need to be made
when the backed-up `.env` file is restored.

##### Usage Examples

```bash
# Restore the ~/my-backup.zip backup file into the current BookStack instance
./bookstack-system-cli restore ~/my-backup.zip
```

##### Command Options

- `--app-directory=<path>` Provide a path to the BookStack instance to back up. When not provided, the CLI will attempt to locate the BookStack install based upon current working directory and the location of the CLI itself.

#### update

Update the existing BookStack installation to the latest version.
This runs an instance through the standard BookStack [update commands](/docs/admin/updates) to bring it up to the latest release version.

##### Usage Examples

```bash
# Update the current BookStack instance
./bookstack-system-cli update
```

##### Command Options

- `--app-directory=<path>` Provide a path to the BookStack instance to back up. When not provided, the CLI will attempt to locate the BookStack install based upon current working directory and the location of the CLI itself.

#### init

Initialize a new BookStack installation in the given folder.
This clones down the BookStack project, installs PHP dependencies, creates a fresh `.env` file for editing, then generates a key for the `.env` file.

Note that this won't do everything for a new BookStack install, you'll still need to configure your database details then migrate the database, and configure your system's web-server (and any required permissions).

##### Usage Examples

```bash
# Initialize a new BookStack install in the current folder
./bookstack-system-cli init

# Initialize a new BookStack install at the "/var/www/new-bookstack" path
./bookstack-system-cli init /var/www/new-bookstack
```

---

### CLI Source Code & Project

The CLI is maintained as its own project within the [BookStackApp/system-cli GitHub project](https://github.com/BookStackApp/system-cli).
There you can find the source code, development details and known issues.