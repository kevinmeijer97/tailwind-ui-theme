# Rapidez Tailwind UI Theme

## Installation

```
composer require rapidez/tailwind-ui-theme
```

After requiring the package you need to run the install script.
```
php artisan tailwind-ui-theme:install
```

When the installation is done, you need to run `php artisan migrate` to generate the Statamic tables.
When the migration is completed you can create an account by running `php please make:user`.



## Configuration

You can publish the config with:
```
php artisan vendor:publish --tag=rapidez-tailwind-ui-theme-config
```

## Views

You can publish the views with:
```
php artisan vendor:publish --tag=rapidez-tailwind-ui-theme-views
```

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
