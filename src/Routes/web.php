<?php


Route::group([
  'prefix' => config('starter-kit.routes.prefix'),
  'namespace' => 'Raystech\StarterKit\Http\Controllers'
], function(){

  Route::get('ping', function() {
    $config = config('starter-kit');
    dd($config);
    return 'received';
  });

  Route::resource('posts','PostController', [ 'as' => config('starter-kit.routes.name_prefix') ]);
});