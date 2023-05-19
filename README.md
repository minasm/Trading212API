# T212 Official API Client Wrapper for Laravel/PHP



This is a simple wrapper for Public Beta Trading212 Official API. The API currently works in Practice Mode.

You can check the documentation here https://t212public-api-docs.redoc.ly/

## Installation
To install this package via the `composer require` command:

```bash
$ composer require minasm/trading212api
```
Or add it to `composer.json` manually:



## Laravel
No configuration required for Laravel >= 5.5+, It will use the auto-discovery function.

In Laravel <= 5.4 (or if you are not using auto-discovery) register the service provider by adding it to the `providers` key in `config/app.php`. Also register the facade by adding it to the `aliases` key in `config/app.php`.

```php
'providers' => [
    ...
    MinasM\T212\T212ServiceProvider::class,
],

'aliases' => [
    ...
    'T212' => MinasM\T212\Facades\T212::class,
]
```
## Configuration

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="MinasM\T212\T212ServiceProvider"
```

This will create a `config/T212.php` file in your app that you can modify to set your configuration.

Set your T212  data API token in the file:

```bash
return [
    'api_token' => 'put your token here'
];
```




