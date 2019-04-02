<?php

use Themosis\Support\Facades\Field;

$members = PostType::make('members', 'Members', 'Member')->set([
  'public'        => true,
  'menu_position' => 20,
  'supports'      => ['title'],
  'rewrite'       => false,
  'query_var'     => false,
  'menu_icon'     => 'dashicons-smiley'
]);

Metabox::make('infos', 'members')
  ->add(Field::collection('gallery'))
  ->add(Field::text('url'))
  ->add(Field::choice('categorie', [
    'choices' => ['arts-visuels', 'arts-vivants', 'musique']
  ]))
  ->set();

Metabox::make('laboratory', 'page')
  ->setTemplate('laboratory')
  ->add(Field::collection('gallery'))
  ->set();