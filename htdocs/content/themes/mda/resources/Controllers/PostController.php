<?php

namespace Theme\Controllers;

use View;

class PostController extends Controller
{
  public function __construct()
  {
    $menu_name = 'main-menu';
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
    
    View::share([
      'primaryMenu'  => $menuitems,
    ]);    
  }
  
  public function archive($post, $query) {
    $posts = $query->get_posts();
    return view('posts/archive', ['post' => $post, 'posts' => $posts]);
  }
}
