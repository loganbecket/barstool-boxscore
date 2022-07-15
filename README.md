<br>

![Jupiter Order Management System](/public/images/jupiter_logo.svg)

Jupiter gives publishers the tools to build smarter proposals in less time. We do this with innovative design, a deep understanding of ad sales and operations, and a relentless focus on user experience.
<hr>

## Barstool Sports Boxscore Challenge

### Prerequisites:
- A server running PHP 8.0+, Composer, and MySql
- A web server that has been configured to serve the project directory
    - NOTE: If no such environment exists, Laravel's <a href="https://laravel.com/docs/master/sail#installing-sail-into-existing-applications">Sail</a> package can easily spin up a Docker container


### Project Installation:
This guide will walk you step-by-step through the process of deploying this application.  Once cloned, cd into the project directory and implement the steps below.

1. `cp .env.example .env`
2. Using the editor of your choice, add your database credentials to `.env` for `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`
3. `composer install`
4. `php artisan key:generate`
5. `php artisan migrate --seed`
6. `npm install`
7. `npm run dev` or `npm run prod`



