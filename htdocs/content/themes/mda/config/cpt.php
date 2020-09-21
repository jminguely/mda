<?php

use Themosis\Support\Facades\Field;

PostType::make('tenants', 'Locataires', 'Member')
  ->setArguments([
    'public' => true,
    'menu_position' => 20,
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => false,
    'query_var' => false,
    'menu_icon' => 'dashicons-smiley',
    'show_in_rest' => false
  ])->set();

Metabox::make('tenants', 'tenants')
  ->add(Field::text('url', ['title' => 'Lien de la page de l\'artiste'], ['class' => 'artist-link']))
  ->set();

Metabox::make('homepage', 'page')
  ->setTemplate('homepage')
  ->add(Field::collection('gallery'))
  ->set();
