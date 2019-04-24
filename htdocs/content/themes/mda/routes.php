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



// Contact
Route::get('page', ['contact', 'uses' => 'PageController@contact']);
Route::post('page', ['contact', 'uses' => 'PageController@sendContactConfirmation']);

// Blog
Route::any('home', 'PostController@archive');

// Pages
Route::get('front', 'PageController@front');
Route::get('page', ['locataires', 'uses' => 'PageController@tenants']);
Route::get('page', 'PageController@default');
