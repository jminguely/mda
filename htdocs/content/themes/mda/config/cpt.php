<?php

use Themosis\Support\Facades\Field;

PostType::make('tenants', 'Locataires', 'Member')
  ->setArguments([
    'public' => true,
    'menu_position' => 20,
    'supports' => ['title', 'thumbnail'],
    'rewrite' => false,
    'query_var' => false,
    'menu_icon' => 'dashicons-smiley',
    'show_in_rest' => false,
    'taxonomies'  => array('category'),
  ])->set();

Metabox::make('tenants', 'tenants')
  ->add(Field::text('url', ['title' => 'Lien de la page de l\'artiste']))
  ->add(Field::choice('categorie', [
    'choices' => ['arts-visuels', 'arts-vivants', 'musique']
  ]))
  ->set();

Metabox::make('homepage', 'page')
  ->setTemplate('homepage')
  ->add(Field::collection('gallery'))
  ->set();
