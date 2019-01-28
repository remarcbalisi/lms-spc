# Installation

rename .env.example to .env

update the DB_DATABASE, DB_USERNAME, DB_PASSWORD inside .env

run *composer install*

#Migrate Tables

run *php artisan migrate --seed*

This will create single admin user:

email: remarc.balisi@gmail.com

pass: admin


This will also create 25 lecturers and 25 learners

Please see your database for the account credentials of 25 lecturers and 25 learners

Emails are created randomly using faker.

All Passwords are *test*