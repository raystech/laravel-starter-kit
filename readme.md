# laravel-starter-kit

[![Laravel 5.7](https://img.shields.io/badge/Laravel-5.7-blue.svg?style=flat-square)](http://laravel.com)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require raystech/laravel-starter-kit
```

You can publish [the migration](https://github.com/raystech/laravel-starter-kit/blob/master/database/migrations/create_starter_kit_tables.php.stub) with:

```bash
php artisan vendor:publish --provider="Raystech\StarterKit\StarterKitServiceProvider" --tag="migrations"
```

```bash
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Raystech\StarterKit\StarterKitServiceProvider" --tag="config"
```

## Usage

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email piyapannr@gmail.com instead of using the issue tracker.

## Credits

- [Piyapan Rodkuen][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/raystech/laravel-starter-kit.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/raystech/laravel-starter-kit.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/raystech/laravel-starter-kit/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield
[ico-code-quality]: https://img.shields.io/scrutinizer/g/raystech/laravel-starter-kit.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/raystech/laravel-starter-kit
[link-downloads]: https://packagist.org/packages/raystech/laravel-starter-kit
[link-code-quality]: https://scrutinizer-ci.com/g/raystech/laravel-starter-kit

[link-author]: https://github.com/raystech
[link-contributors]: ../../contributors]