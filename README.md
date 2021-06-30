1- cp .env.example .env

2- composer install

3- php artisan key:generate

4- php artisan migrate

5- please set "QUEUE_CONNECTION" value database in .env file.

6- please run php artisan queue:work command because we are converting our videos through job and our job is queueable.

7- Please run "php artisan storage:link" to link storage

8- it is tested in linux and unix environment it will give error in windows to resolve that
ffmpeg in folder C:/FFmpeg/bin/ffmpeg.exe and
ffprope in folder C:/FFmpeg/bin/ffprope.exe
and added the path C:/FFmpeg/bin/ to environment variables to both user and system variables
after refresh and cleaning cache it's working fine now
