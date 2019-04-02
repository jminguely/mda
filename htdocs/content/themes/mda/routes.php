<?php

/**
 * Theme routes.
 *
 * The routes defined inside your theme override any similar routes
 * defined on the application global scope.
 */
// Route::get('home', function ($post, $query) {
//   $posts = $query->get_posts();
//   return view('pages.home', ['homepage' => true]);
// });

Route::get('front', 'PageController@front');

Route::get('page', ['locataires', 'uses' => 'PageController@members']);

Route::get('template', ['laboratory', 'uses' => 'PageController@laboratory']);

Route::get('page', ['contact', 'uses' => 'PageController@contact']);

Route::post('page', ['contact', 'uses' => 'PageController@sendContactConfirmation']);

Route::get('page', 'PageController@default');
