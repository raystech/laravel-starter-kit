<?php

namespace Raystech\StarterKit;

use Illuminate\Support\ServiceProvider;

class StarterKitServiceProvider extends ServiceProvider
{
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {
    // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'raystech');
    // $this->loadViewsFrom(__DIR__.'/../resources/views', 'raystech');
    // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    // $this->loadRoutesFrom(__DIR__.'/routes.php');

    // Publishing is only necessary when using the CLI.
    if ($this->app->runningInConsole()) {

      // Publishing the configuration file.
      $this->publishes([
        __DIR__ . '/../config/starter-kit.php' => config_path('starter-kit.php'),
      ], 'starter-kit.config');

      if (!class_exists('CreateMediaTable')) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_media_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_media_table.php'),
        ], 'migrations');
      }

      // Publishing the views.
      /*$this->publishes([
      __DIR__.'/../resources/views' => base_path('resources/views/vendor/raystech'),
      ], 'starter-kit.views');*/

      // Publishing assets.
      /*$this->publishes([
      __DIR__.'/../resources/assets' => public_path('vendor/raystech'),
      ], 'starter-kit.views');*/

      // Publishing the translation files.
      /*$this->publishes([
      __DIR__.'/../resources/lang' => resource_path('lang/vendor/raystech'),
      ], 'starter-kit.views');*/

      // Registering package commands.
      // $this->commands([]);
    }
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/../config/starter-kit.php', 'StarterKit');

    // Register the service the package provides.
    $this->app->singleton('StarterKit', function ($app) {
      return new StarterKit;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return ['StarterKit'];
  }
}
