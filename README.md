## Please do this command:
composer install
composer dump-autoload
php artisan migrate

## Database Details
DB_DATABASE=exam
DB_USERNAME=root
DB_PASSWORD=

## To run the CRON or SCHEDULER, run this command
php artisan import:players

## To run PHPUnit Testing, run this command
./vendor/bin/phpunit