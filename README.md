1- cp .env.example .env

2- composer install

3- php artisan key:generate

4- please set "QUEUE_CONNECTION" value database in .env file.

5- please run php artisan queue:work command because we are converting our videos through job and our job is queueable.

6- Please run "php artisan storage:link" to link storage
