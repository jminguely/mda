<?php

namespace Theme\Controllers;

use App\Forms\ContactForm;

use Illuminate\Http\Request;

use View;

class PageController extends Controller
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
  
  public function front($post) {
    return view('pages/home', ['post' => $post]);
  }

  public function members($post, $query) {
    $members = get_posts( array(
      'post_type' => 'members'
    ));

    $categories = array(
      'arts-visuels'   => array(),
      'arts-vivants'  => array(),
      'musique'       => array()
    );

    foreach ($members as $key => $member) {
      $member->categorie = get_post_meta($member->ID, 'th_categorie', true);
      $member->url = get_post_meta($member->ID, 'th_url', true);
      array_push($categories[$member->categorie], $member);
    }

    return view('pages/members', ['post' => $post, 'categories' => $categories]);
  }

  
  public function contact() {
    $form = $this->form(new ContactForm());

    return view('pages/contact', [
      'form' => $form
    ]);
  }

  public function sendContactConfirmation(Request $request)
  {
    $form = $this->form(new ContactForm());

    $form->handleRequest($request);

    $fullname = $form->repository()->getFieldByName('fullname')->getValue();
    $email = $form->repository()->getFieldByName('email')->getValue();
    $message = $form->repository()->getFieldByName('message')->getValue();
    
    $headers = "From: hello@mda.test \r\n";
    $headers .= "Reply-to: " .$email. "\r\n";
    $sentState =  wp_mail( get_bloginfo('admin_email'), 'MDA - Message de '.$fullname, $message, $headers );

    return view('pages/contact', [
      'form' => $form,
      'formSent' => true,
      'formSentState' => $sentState
    ]);
  }

  
  public function laboratory($post, $query) {
    $gallery = get_post_meta($post->ID, 'th_gallery');

    return view('pages/laboratory', ['post' => $post, 'gallery' => $gallery]);
  }
  
  public function default($post, $query) {
    $children = get_posts( array(
      'post_type' => 'page',
      'post_parent' => $post->ID,
      'orderby' => 'menu_order',
      'order' => 'ASC',
    ));
  
    return view('pages/default', ['post' => $post, 'children' => $children]);
  }
}
