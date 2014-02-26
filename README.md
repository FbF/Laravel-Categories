Laravel Categories
==================

A Laravel 4 package for adding one or more types of category hierarchies to a website

e.g. a hierarchy for blog categories and another for product categories

## Comes with

* Migration for the `categories` table
* Category Model (that extends Baum/Node so you can use all the handy methods from this excellent nested set implementation)
* Seed for building the root nodes, one for each type of hierarchy, specified in your config file
* Sample FrozenNode/Administrator config file for managing the categories

## Installation

Add the following to you composer.json file (Recommend swapping "dev-master" for the latest release)

    "fbf/laravel-categories": "dev-master"

Run

    composer update

Add the following to app/config/app.php

    'Fbf\LaravelCategories\LaravelCategoriesServiceProvider'

Publish the config

    php artisan config:publish fbf/laravel-categories

Run the migration

    php artisan migrate --package="fbf/laravel-categories"

Ensure the categories `types` are set correctly in the config file.

Run the seed (this will create root nodes for each of your category `types`)

	php artisan db:seed --class=Fbf\LaravelCategories\CategoriesTableBaseSeeder

Build your menus in the database, or if you are using FrozenNode's Laravel Administrator, see the info below

## Administrator

You can use the excellent Laravel Administrator package by FrozenNode to administer your categories.

http://administrator.frozennode.com/docs/installation

A ready-to-use model config file for the `Category` model (`categories.php`), including custom actions to reorder nodes in
the hierarchy, is provided in the `src/config/administrator` directory of the package, which you can copy into the
`app/config/administrator` directory (or whatever you set as the `model_config_path` in the administrator config file).