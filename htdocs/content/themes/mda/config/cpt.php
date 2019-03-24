<?php

use Themosis\Support\Facades\Field;

$members = PostType::make('members', 'Members', 'Member')->set([
  'public'        => true,
  'menu_position' => 20,
  'supports'      => ['title'],
  'rewrite'       => false,
  'query_var'     => false
]);

Metabox::make('infos', 'members')
  ->add(Field::text('url'))
  ->add(Field::choice('categorie', [
    'choices' => ['arts-visuels', 'arts-vivants', 'musique']
  ]))
  ->set();