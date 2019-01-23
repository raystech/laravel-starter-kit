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
    // $this->loadViewsFrom(__DIR__.'/../resources/views', 'raystech');
    // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    // $this->loadRoutesFrom(__DIR__.'/routes.php');

    // Publishing is only necessary when using the CLI.
    if ($this->app->runningInConsole()) {

      // Publishing the configuration file.
      $this->publishes([
        __DIR__ . '/../config/starter-kit.php' => config_path('starter-kit.php'),
      ], 'starter-kit.config');


      if (!class_exists('CreateStarterKitTable')) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_starter_kit_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_starter_kit_table.php'),
        ], 'migrations');
      }
/*
      if (!class_exists('CreateTermMetaTable')) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_term_meta_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_term_meta_table.php'),
        ], 'migrations');
      }

      if (!class_exists('CreateTermRelationshipMetaTable')) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_term_relationship_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_term_relationship_table.php'),
        ], 'migrations');
      }

      if (!class_exists('CreateTermTaxonomyMetaTable')) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_term_taxonomy_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_term_taxonomy_table.php'),
        ], 'migrations');
      }
*/
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

    $this->app->alias(StarterKit::class, 'starter-kit');
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
