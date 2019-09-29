# Overview

## Requirements Brief
This is a rental form for the local bicycle shop in our college town. The owner had been keeping records of rentals on paper for years,
and wanted an online form and management system to handle all rentals. 

In addition to having the form online, the owner wanted a database management system so that he could see all the rentals and edit 
the contents of the form. The form includes user input, bicycle selection, and accessory package selection. Payment was to be done online at the end. Finally, he wanted the form to have a modern feel that scaled to mobile devices well.

## Technologies
* Laravel Framework
* PHP
* Eloquent ORM
* Blade Files
* MySQL
* Bootstrap
* JavaScript
* Digital Ocean
* Composer


# Project Layout
As per Laravel project layout, this web application uses the MVC architecture

## Model
All database transactions are managed through Eloquent ORM. Models are described in the `/app` directory, while the database configuration is
handled in `/database/migrations`. The database can be automatically seeded with default values for testing in `/database/seeds`.

## View
Server-side HTML generation is done with Blade files. These are in the `/resources/views` directory. Most Blade files are database views,
and the rental form for customers is `rentals.blade.php`. This file heavily uses Bootstrap CSS and JavaScript to create a modern, sleek bicycle rental 
form. Features include custom package selection, an updating price bar, and mobile scaling.

## Controller
All HTTP Requests are mapped to controllers with the `routes/web.php` file. The controllers are in `/app/Http/Controllers`. Most
business logic is handled in the controllers, a design flaw that we pushed down the road too far
