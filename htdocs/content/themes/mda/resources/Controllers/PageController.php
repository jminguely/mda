<?php

namespace Theme\Controllers;

use App\Forms\ContactForm;

use Illuminate\Http\Request;

use View;

class PageController extends Controller
{
  public function front($post)
  {
    return view('pages/home', ['post' => $post]);
  }

  public function tenants($post, $query)
  {

    $tenants = get_posts(array(
      'post_type' => 'tenants'
    ));

    $categories = array();

    foreach ($tenants as $key => $member) {
      $member->thumbnail = get_the_post_thumbnail_url($member->ID, 'card-thumbnail');
      $member->thumbnail_2x = get_the_post_thumbnail_url($member->ID, 'card-thumbnail_2x');
      $member->url = get_post_meta($member->ID, 'th_url', true);

      if (get_post_meta($member->ID, 'th_categorie', true) != null) {
        $member->categorie = get_post_meta($member->ID, 'th_categorie', true);
      } else {
        $member->categorie = 'non-classe';
      }

      if (!array_key_exists($member->categorie, $categories)) $categories[$member->categorie] = array();

      array_push($categories[$member->categorie], $member);
    }

    ksort($categories);

    return view('pages/tenants', ['post' => $post, 'categories' => $categories]);
  }


  public function contact($post)
  {
    $form = $this->form(new ContactForm());

    return view('pages/contact', [
      'form' => $form,
      'post' => $post
    ]);
  }

  public function sendContactConfirmation(Request $request)
  {
    $form = $this->form(new ContactForm());

    $form->handleRequest($request);

    $data = $request->all();

    // post request to server
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode(env('RECAPTCHA_API_KEY')) .  '&response=' . urlencode($data["g-recaptcha-response"]);
    $response = file_get_contents($recaptcha_url);
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {
      $fullname = $data["th_fullname"];
      $email = $data["th_email"];
      $message = $data["th_message"];

      $headers = "From: hello@cooperativemda.ch \r\n";
      $headers .= "Reply-to: " . $email . "\r\n";

      $sentState = mail(get_bloginfo('admin_email'), 'MDA - Message de ' . $fullname, $message, $headers);
    } else {
      $sentState = false;
    }

    return view('pages/contact', [
      'form' => $form,
      'formSent' => true,
      'formSentState' => $sentState,
      'data' => $data
    ]);
  }

  public function
  default($post, $query)
  {
    $children = get_posts(array(
      'post_type' => 'page',
      'post_parent' => $post->ID,
      'orderby' => 'menu_order',
      'order' => 'ASC',
    ));

    return view('pages/default', ['post' => $post, 'children' => $children]);
  }
}
