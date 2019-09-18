<?php

add_action( 'admin_print_styles-toplevel_page_wpcf7', function () {
	if ( empty( $_GET['post'] ) ) {
		return;
	}

	$settings = wp_enqueue_code_editor( array(
    'type' => 'text/html',
    'codemirror' => array(
      'tabSize' => 2,
    ),
  ) );

	if ( false === $settings ) {
		return;
	}
	wp_add_inline_script(
		'code-editor',
		sprintf( 'jQuery( function() { wp.codeEditor.initialize( "wpcf7-form", %s ); } );', wp_json_encode( $settings ) )
	);

	wp_add_inline_script(
		'code-editor',
		sprintf( 'jQuery( function() { wp.codeEditor.initialize( "wpcf7-mail-body", %s ); } );', wp_json_encode( $settings ) )
	);
});
