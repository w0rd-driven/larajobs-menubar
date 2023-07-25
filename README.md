# Larajobs Notifier

Notifier for new larajobs.com jobs in your MenuBar.

* NativePHP
* Laravel v10
* Laravel Jetstream w/InertiaJs
* SQLite

The RSS feed at [https://larajobs.com/feed] is parsed and saved into SQLite. While overkill for NativePHP recommendations NOT to use a database,
the long term goal of this project is to help curate and track applications over a long period of time.

## Installation

* Clone the repository.
* Ensure you're running PHP 8.1, I haven't tested this in later versions.
* Ensure you're running Node v20. The rtx/asdf `.tool-versions` file can help.
    * The best way to have the fewest Node issues is to initialize a Node version immediately to the LTS version at the time your project is initialized.
* Copy the `.env.example` to `.env`.
* Run `composer install` to install PHP dependencies.
* Run `npm install` to install Node dependencies.
* Run `npm run build` to build the Jetstream assets.

## Development

* Run `php artisan migrate --step` to migrate the database.
* Run `php artisan db:seed` to seed our only feed record (we may handle more later ;>).
* Run `php artisan nativephp:serve` to run the NativePHP version.
* [Laravel Valet](https://laravel.com/docs/10.x/valet) makes a great local development experience if you need xDebug or [Laravel Herd](https://herd.laravel.com/) for a brand new development environment for Mac.

## TODO

* [ ] Handle ApplicationBoot event.
    * This could be used to seed and refresh the feed. It's clunky because I wanted boot, a visible refresh, and a refresh context menu to not stomp on each other but the context handler opens an Electron window, not this one for deep linking.
* [ ] Save operation
    * [ ] These are jobs to research further.
* [ ] Star operation
    * [ ] These are jobs to focus on next.
* [ ] Apply operation
    * [ ] Clicking the URL should ask if you applied and store the timestamp.
* [ ] Archive operation
    * [ ] Automatically archive after 2 months. This is when jobs fall off the main site. The RSS feed is even shorter.
* [ ] Hide operation
    * [ ] Hide by job or by company name to ignore future jobs.
* [ ] Tabs
    * [ ] Saved, Starred, Applied, Archived, Hidden
    * [ ] Each operation should move an entry to a dedicated listing.
* [ ] Tab status section
    * [ ] Each tab should list the relevant timestamp or correlated data. There is a use case for listing multiple timestamps.
* [ ] Settings Page
    * [ ] Export data into a common format like JSON
    * [ ] Prune old records or archive offline

## Shortcomings

* NativePHP is currently alpha so everything will change.
* Links aren't opened externally so resizing windows to apply will be difficult. Electron has a shell but I had issues with using the `import` syntax.
* It's damn near difficult to prune the internal SQLite database as it's stored in a common location that does not reset if you clear /vendor.
    * You can do clever tricks like call `Artisan::call('migrate:fresh')` though.
* Had issues with `OpenedFromURL` event as it just opened an arbitrary Electron window. I probably held it wrong.
* It's a little unclear why I need to run `npm run build` for Jetstream assets as there is this weird mismatch between the electron-vite.
    * A better choice would've been Livewire but I went this route to learn Vue3, not more PHP.
* There is a `queue` and queue workers but it's unclear how to schedule commands or in my case I care about retrying a feed refresh on an interval.
