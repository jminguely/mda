<?php

namespace Theme\Controllers;

use View;

class PostController extends Controller
{
  public function archive($post, $query) {
    $posts = $query->get_posts();
    return view('posts/archive', ['post' => $post, 'posts' => $posts]);
  }

  public function single($post, $query) {
    $posts = $query->get_posts();
    return view('posts/single', ['post' => $post]);
  }
}
