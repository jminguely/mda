<?php 

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'column',
			'title'				=> __('Column'),
			'description'		=> __('A custom column block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'column', 'quote' ),
		));
	}
}

function my_acf_block_render_callback( $block, $content = '', $is_preview = false  ) {
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);

	$context = array();

	$context['block'] = $block;

	$context['fields'] = get_fields();

	$context['is_preview'] = $is_preview;

	echo View::make('blocks/content-column', $context)->render();
}


// /**
//  *  This is the callback that displays the block.
//  *
//  * @param   array  $block      The block settings and attributes.
//  * @param   string $content    The block content (emtpy string).
//  * @param   bool   $is_preview True during AJAX preview.
//  */
// function my_acf_block_render_callback( $block, $content = '', $is_preview = false ) {
// 	$slug = str_replace('acf/', '', $block['name']);

// 	// Store block values.
// 	$context['block'] = $block;

// 	// Store field values.
// 	$context['fields'] = get_fields();

// 	// Store $is_preview value.
// 	$context['is_preview'] = $is_preview;

// 	return view('blocks/content-column', $context);
// }