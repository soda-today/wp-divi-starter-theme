<?php

/**
 *  Class to laod Custom Divi Blocks
 */

class SODADIVISHORT_Divi {
  public function load() {
    if ( ! function_exists( 'digm_initialize_extension' ) ) {
      add_action( 'divi_extensions_init', array( $this, 'initialize_extension' ) );
    }
  }

  public function initialize_extension() {
    require_once get_stylesheet_directory() . '/includes/SodadiviDiviLoader.php';
  }
}
