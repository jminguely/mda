<?php

namespace Theme\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Themosis\Core\Forms\FormHelper;
use Themosis\Core\Validation\ValidatesRequests;

use View;

class Controller extends BaseController
{
    use FormHelper, ValidatesRequests;

    public function __construct()
    {
        $menu_name = 'main-menu';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

        $bgGallery = get_post_meta(6, 'th_gallery');

        View::share([
        'primaryMenu'  => $menuitems,
        'bg_gallery'  => $bgGallery,
        ]);    
    }
}
