<?php

use Themosis\Support\Facades\Field;
use Themosis\Support\Facades\Page;
use Themosis\Support\Section;

Page::make('options-page', 'Options')
    ->setIcon('dashicons-admin-home')
    ->setPosition(4)
    ->setCapability('edit_posts')
    ->addSections([
        new Section('options-social', 'Réseaux sociaux')
    ])
    ->addSettings([
        'options-social' => [
            Field::text('option_social_facebook'),
            Field::text('option_social_instagram')
        ]
    ])
    ->set();
