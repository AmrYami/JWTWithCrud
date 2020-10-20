# JWTWithCrud
used laravel and jwtauth
please see routs in api
simple crud functions

please copy .env.example to .env and add username, pass, name of database
create new database (mysql)
then do commends
composer update
php artisan migrate

brief what i did
make api to create update delete list show department
used controller 
controller call class service(service to have logic business)
service call class repositery (repositery to have connection to database using model)
repositery extend from class abstract department
