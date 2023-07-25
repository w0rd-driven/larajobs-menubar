# Larajobs Notifier

## Installation

* Clone the repository
* Ensure you're running PHP 8.1, I haven't tested this in later versions.
* Ensure you're running Node v20. The rtx/asdf `.tool-versions` file can help.
    * The best way to have the fewest Node issues is to initialize a Node version immediately to the LTS version at the time your project is initialized.
* Run `composer install` to install PHP dependencies.
* Run `npm install` to install Node dependencies.

## Development

* Run `php artisan migrate --step` to migrate the database.
* Run `php artisan db:seed` to seed our only feed record (we may handle more later ;>).
* Run `php artisan nativephp:serve` to run the NativePHP version.
* [Laravel Valet](https://laravel.com/docs/10.x/valet) makes a great local development experience if you need xDebug or [Laravel Herd](https://herd.laravel.com/) for a brand new development environment for Mac.

## TODO

* [ ] Handle ApplicationBoot event.
    * This could be used to seed and refresh the feed. It's clunky because I wanted boot, a visible refresh, and a refresh context menu to not stomp on each other but the context handler opens an Electron window, not this one for deep linking.
