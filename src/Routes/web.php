<?php


Route::group([
  'middleware' => 'web',
  'prefix'     => config('starter-kit.routes.prefix', 'rt-admin'),
  'namespace'  => 'Raystech\StarterKit\Http\Controllers'
], function(){

  Route::get('ping', function() {
    $config = config('starter-kit');
    dd($config);
    return 'received';
  });

  Route::resource('posts','PostController', [ 'as' => config('starter-kit.routes.name_prefix', 'rt-admin') ]);
  Route::resource('terms','TermController', [ 'as' => config('starter-kit.routes.name_prefix', 'rt-admin') ]);
});