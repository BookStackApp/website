+++
title = "UTF8mb4/Emoji Support"
description = "Adding UTF8mb4 support to allow use of emoji in content"
date = "2017-01-01"
type = "admin-doc"
slug = "ut8mb4-support"
+++


As of BookStack v0.17 `UTF8mb4` is the default database charset and collation which allows emoji support.
If you installed and used BookStack prior to v0.17 you will have to upgrade your database manually
to support emoji.

**WARNING: Before following any of the below create a backup of your database to prevent potential data loss.**

From v0.17.2, BookStack has a helper command to generate the SQL for this change. Ensure you are on BookStack v0.17.2 or above and then run this command from root BookStack folder:

```bash
php artisan bookstack:db-utf8mb4
```

You can use the output of this command and execute the SQL output on your database to upgrade your database. Here's a general example of how you might do this on a unix-like system with MySQL.

```bash
# Navigate to the bookstack folder
cd bookstack-folder

# Generate the upgrade sql and output to a 'dbupgrade.sql' file
php artisan bookstack:db-utf8mb4 > dbupgrade.sql

# Run the SQL via MySQL (Using root account)
mysql -u root < dbupgrade.sql

```

### On 'Key too long' Error

You may get an error with a message along the lines of 'Specified key was too long' when following the above steps. In this scenario, If you want full emoji support, it may be best to re-create the database. Below is the recommended approach to achieving this. **BACKUP ALL DB DATA BEFORE PROCEEDING**.

1. Dump all data from the database (Data only). For example:
  ```bash
  # Change 'bookstack_db' to your bookstack database name
  mysqldump -u root --no-create-info bookstack_db > bookstack_data.sql
  ```
2. Re-create the database or create a new one.
3. Update your BookStack config with new database details if required.
4. Run `php artisan migrate` from your BookStack folder to migrate the database and re-create all tables.
5. Restore the data from step 1:
  ```bash
  mysql -u root < bookstack_data.sql
  ```
6. Run `php artisan migrate` again to ensure the database is up-to-date.
