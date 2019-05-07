<?php

namespace Theme\Controllers;

use App\Forms\ContactForm;

use Illuminate\Http\Request;

use View;

class PageController extends Controller
{
  public function front($post) {
    return view('pages/home', ['post' => $post]);
  }

  public function tenants($post, $query) {
    $tenants = get_posts( array(
      'post_type' => 'tenants'
    ));

    $categories = array(
      'arts-visuels'   => array(),
      'arts-vivants'  => array(),
      'musique'       => array()
    );

    foreach ($tenants as $key => $member) {
      $member->categorie = get_post_meta($member->ID, 'th_categorie', true);
      $member->url = get_post_meta($member->ID, 'th_url', true);
      array_push($categories[$member->categorie], $member);
    }

    return view('pages/tenants', ['post' => $post, 'categories' => $categories]);
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
