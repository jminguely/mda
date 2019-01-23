<?php

/**
 * Application routes.
 */
Route::any('/', function ($post, $query) {
    $posts = $query->get_posts();
    return view('welcome', ['name' => 'Julien', 'items' => $posts]);
});
