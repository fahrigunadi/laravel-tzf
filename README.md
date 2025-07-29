# Laravel Timezone Finder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fahrigunadi/laravel-tzf.svg?style=flat-square)](https://packagist.org/packages/fahrigunadi/laravel-tzf)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/fahrigunadi/laravel-tzf/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/fahrigunadi/laravel-tzf/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/fahrigunadi/laravel-tzf/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/fahrigunadi/laravel-tzf/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/fahrigunadi/laravel-tzf.svg?style=flat-square)](https://packagist.org/packages/fahrigunadi/laravel-tzf)

Get timezone via longitude and latitude in laravel

## Installation

You can install the package via composer:

```bash
composer require fahrigunadi/laravel-tzf
```

## Usage

```php
use FahriGunadi\TimezoneFinder\Facades\TimezoneFinder;

echo TimezoneFinder::timezoneName(-4.8644237, 138.2578241); // Asia/Jayapura
```

## Testing

```bash
composer test
```

## Credits

- [Fahri Gunadi](https://github.com/fahrigunadi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
