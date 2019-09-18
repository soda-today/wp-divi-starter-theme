<?php

/**
 * A Class generating SODADIVI_NB_FOOTER_AREAS footer areas
 */

class Sodadivi_Footer {
  public function load() {
    $sidebar_attributes = array(
        'name'          => __( 'Footer Area', 'sodadivi' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'sodadivi' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => ' <div class="d-none">',
        'after_title' => '</h2>',
    );

    foreach ( array_fill(0, SODADIVI_NB_FOOTER_AREAS, null) as $i ) {
      $sidebar_attributes['id'] = "footer-$i";
      $sidebar_attributes['name'] = __( 'Footer Area', 'sodadivi' ) . " $i";
      register_sidebar( $sidebar_attributes );
    }
  }
}
