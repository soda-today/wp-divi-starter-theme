<?php

/**
 *  Class to Enable Gutenberg Editor on Chosen Post Types
 */

class SODADIVISHORT_Gutenberg {
  public function load() {
    if ( ! function_exists( 'disodadivishort_initialize_extension' ) ) {
      add_filter( 'gutenberg_can_edit_post_type', array( $this, 'gutenberg_enabled' ), 10, 2 );
    }
  }

  public function gutenberg_enabled( $can_edit, $post_type ) {
    $gutenberg_supported_types = array( 'post' );
    if ( ! in_array( $post_type, $gutenberg_supported_types, true ) ) {
      $can_edit = false;
    }
    return $can_edit;
  }
}
