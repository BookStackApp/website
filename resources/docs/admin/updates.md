# Updating BookStack

BookStack is updated regularly and the version number follow [semantic versioning](http://semver.org/). The latest release can be found on [GitHub here](https://github.com/ssddanbrown/BookStack/releases) and detailed information on releases is posted on the [BookStack blog here](https://www.bookstackapp.com/blog/tag/releases/).

**Before updating you should back up the database and any file uploads to prevent potential data loss**. Updating is current done via Git version control. To update BookStack you can run the following command in the root directory of the application:
```
git pull origin release && composer install && php artisan migrate
```
This command will update the repository that was created in the installation, install the PHP dependencies using `composer` then run the database migrations.