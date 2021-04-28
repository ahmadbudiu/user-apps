# User Apps

This repo is functionality complete — PRs and issues welcome!

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone the repository

    git clone https://github.com/ahmadbudiu/user-apps.git

Switch to the repo folder

    cd user-apps

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Seed some data

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

## User Account

Admin

    email: admin@erajaya.dev
    password: admin123

Supervisor

    email: spv@erajaya.dev
    password: admin123

Staff

    email: staff@erajaya.dev
    password: admin123

## API

This application adheres to the api specifications set by the [Budi](https://github.com/ahmadbudiu) team. This helps mix and match any backend with any other frontend without conflicts.

Please check api.postman_collection.json in project root directory
