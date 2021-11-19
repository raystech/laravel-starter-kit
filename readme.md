# laravel-starter-kit

[![Laravel 7.29][ico-laravel]][link-laravel]
[![Build Status][ico-build]][link-build]
[![Latest Version on Packagist][ico-version]][link-packagist]
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

In model 

```php
use Raystech\StarterKit\Traits\CustomSlugify;
use Raystech\StarterKit\Traits\DataViewer;
use Raystech\StarterKit\Traits\HasMeta;
use Raystech\StarterKit\Traits\HasTenant;
```

```php
use HasMeta,
    CustomSlugify;
```

```php
protected $meta_model       = 'App\Models\Meta';
protected $meta_foreign_key = 'model_id';
protected $meta_primary_key = 'id';
protected $meta_key_name    = 'meta_key';
protected $meta_value_name  = 'meta_value';
```
Use CustomCounter for id as uuid.
use with option model.

```php
use Raystech\StarterKit\Traits\CustomCounter;

user CustomCounter
```

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

[ico-laravel]: https://img.shields.io/badge/Laravel-5.7-blue.svg
[ico-build]: https://travis-ci.com/raystech/laravel-starter-kit.svg?branch=master
[ico-version]: https://img.shields.io/packagist/v/raystech/laravel-starter-kit.svg
[ico-downloads]: https://img.shields.io/packagist/dt/raystech/laravel-starter-kit.svg
[ico-travis]: https://img.shields.io/travis/raystech/laravel-starter-kit/master.svg
[ico-styleci]: https://styleci.io/repos/12345678/shield
[ico-code-quality]: https://img.shields.io/scrutinizer/g/raystech/laravel-starter-kit.svg?b=master

[link-laravel]: http://laravel.com
[link-build]: https://travis-ci.com/raystech/laravel-starter-kit
[link-packagist]: https://packagist.org/packages/raystech/laravel-starter-kit
[link-downloads]: https://packagist.org/packages/raystech/laravel-starter-kit
[link-code-quality]: https://scrutinizer-ci.com/g/raystech/laravel-starter-kit

[link-author]: https://github.com/raystech
[link-contributors]: ../../contributors]