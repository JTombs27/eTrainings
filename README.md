There is no font package included here, if you want to add icon/s go to https://icons.getbootstrap.com/ then copy the HTML SVG for performance.

Laravel 8 + Inertiajs + vue3

To install:

1. composer update
2. npm install
3. copy .env.example .env <- setup your database and config the .env
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed <-this will add user admin@admin.com/12345678
7. php artisan storage:link