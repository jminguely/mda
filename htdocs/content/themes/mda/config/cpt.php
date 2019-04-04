<?php

use Themosis\Support\Facades\Field;

PostType::make('tenants', 'Locataires', 'Member')
->setArguments([
    'public' => true,
    'menu_position' => 20,
    'supports' => ['title', 'editor'],
    'rewrite' => false,
    'query_var' => false,
    'menu_icon' => 'dashicons-smiley'
])->set();

Metabox::make('laboratory', 'page')
  ->setTemplate('laboratory')
  ->add(Field::collection('gallery'))
  ->set();

Metabox::make('homepage', 'page')
  ->setTemplate('homepage')
  ->add(Field::collection('gallery'))
  ->set();