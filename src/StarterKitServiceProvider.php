<?php

namespace Raystech\StarterKit;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class StarterKitServiceProvider extends BaseServiceProvider
{
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {
    // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'raystech');
    if(config('starter-kit.route_enable', false)) {
      $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
    }
    $this->loadHelpers();
    $this->loadViewsFrom(__DIR__.'/Resources/views', 'rt-starter-kit');

    // Publishing is only necessary when using the CLI.
    if ($this->app->runningInConsole()) {
      $this->registerConfig();
      $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

      /*
      
      if (!class_exists('CreateStarterKitTable')) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_starter_kit_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_starter_kit_table.php'),
        ], 'migrations');
      }

      
      // Publishing the views.
      $this->publishes([
      __DIR__.'/../resources/views' => base_path('resources/views/vendor/raystech'),
      ], 'views');

      // Publishing assets.
      $this->publishes([
      __DIR__.'/../resources/assets' => public_path('vendor/raystech'),
      ], 'assets');

      // Publishing the translation files.
      $this->publishes([
      __DIR__.'/../resources/lang' => resource_path('lang/vendor/raystech'),
      ], 'translation');

      // Registering package commands.
      // $this->commands([]);

      */
    }
  }

  /**
   * Register config.
   *
   * @return void
   */
  protected function registerConfig()
  {
    // Publishing the configuration file.
    // echo "Publishing StarterKit Config ...\n";
    $this->publishes([
      __DIR__ . '/../config/starter-kit.php' => config_path('starter-kit.php'),
    ], 'config');

    $this->mergeConfigFrom(__DIR__ . '/../config/starter-kit.php', 'StarterKit');
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  public function register()
  {
    // Register the service the package provides.
    $this->app->singleton('StarterKit', function ($app) {
      return new StarterKit;
    });

    $this->app->alias(StarterKit::class, 'starter-kit');

    $this->app->bind(
      'Raystech\StarterKit\Supports\SessionStore',
      'Raystech\StarterKit\Supports\LaravelSessionStore'
    );

    // Register Flash Toast
    $this->app->singleton('flashtoast', function () {
      return $this->app->make('RaysTech\StarterKit\Supports\FlashToast');
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

  public function loadHelpers() {
    foreach (glob(__DIR__ . '/Helpers/*.php') as $filename) {
      require_once($filename);
    }
  }
}
