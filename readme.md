# Synology TPB Download

This application is meant to be used with a Synology NAS to easily activate torrent downloads from any computer or phone from this one application, so its no longer needed to copy the magnet link and activating the download manually through Download Station.


## TODO:

- A search interface to search TPB for any torrents. ( **Done** )
- Activating downloads directly on your Synology NAS. ( **Done** )
- Show active downloads on the Synology Download Station. ( **Done** )
- Protect the application via a simple authentication system. ( **Done** )
- Rebuilding the search interface with vue.js to provide a more fluent experience.


## How to use:

- Clone this project.
- Copy the .env.example file to .env and add your database and NAS details.
- Run `composer install` and `php artisan migrate`.
- Next, make a user with `php artisan make:user`.
- Now you're all set to go!