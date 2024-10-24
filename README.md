<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> -->

## Fashion E-commerce Store

This is a Laravel-based e-commerce application designed for a fashion retail store. The project showcases essential features of an online store such as product browsing, checkout, sales, and admin management.

## Table of Contents

- [Requirements](#)
- [Installation](#)
- [Database Setup](#)
- [Seeding Database](#)
- [Running the Application](#)
- [Features](#)

## Requirements

- [PHP >= 7.4](#)
- [Composer](#)
- [MySQL or any supported database](#)
- [Node.js and npm](#)
- [Laravel](#)

## Installation

Clone the repository and navigate into the project directory. Use commands: 

- [git clone https://github.com/ahmermirza/indigo-muse.git](#)
- [cd fashion-ecommerce](#)

Install all project dependencies using Composer and npm:

- [composer install](#)
- [npm install && npm run dev](#)

## Database Setup

Copy the .env.example file to .env and configure the database connection. use command:
- [cp .env.example .env](#)

In the .env file, update the following lines with your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fashion_store
DB_USERNAME=root
DB_PASSWORD=your_password

Migrate the database:

- [php artisan migrate](#)

### Seeding Database

To populate the database with sample data, run the following command:

- [php artisan db:seed](#)

## Running the Application

Once the setup is complete, you can run the application locally:

- [php artisan serve](#)

This will start the application at http://127.0.0.1:8000.

## Features
- [User Authentication](#)

Registration and login functionality for customers.
Separate guard for admin users.

- [Product Management](#)

Add, edit, delete products.
Categories and filters.
Sale pricing and discount management.

- [Shopping Cart](#)

Add products to the cart.
Update cart quantities.
Display sale prices in the cart.

- [Checkout](#)

Shipping and billing details.
Order processing with inventory updates.

- [SEO](#)

Meta tags and sitemap integration for better SEO performance.

- [Responsive Design](#)

Fully responsive layout using Bootstrap.

- [Payment Integration](#)

Integration with popular payment gateway i.e. PayPal.

## License

The Laravel framework used to create this project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Screenshots

![ScreenShot](/img/read-me-ss/ss1.png)
![ScreenShot](/img/read-me-ss/ss2.png)
![ScreenShot](/img/read-me-ss/ss3.png)