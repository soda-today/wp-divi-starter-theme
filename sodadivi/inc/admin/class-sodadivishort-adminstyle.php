<?php

class SODADIVISHORT_Adminstyle {
  public function load() {
    add_action( 'admin_head', [ $this, 'add_admin_style' ]);
    add_action( 'admin_footer', [ $this, 'add_admin_script' ] );
    add_action( 'admin_menu', [ $this, 'remove_admin_pages' ] );
    add_action( 'admin_menu', [ $this, 'add_separators' ] );
    add_action( 'init', [ $this, 'unregister_tags' ] );

    // change admin menu order
    add_filter( 'custom_menu_order', '__return_true' );
    add_filter( 'menu_order', [ $this, 'custom_menu_order' ], 0, 100 );

    // change gravity forms menu position
    apply_filters( 'gform_menu_position', [ $this, 'set_gform_menu_position' ] );

    // add tinyMCE colors
    add_filter('tiny_mce_before_init', [ $this, 'mce4_options' ]);
  }

  function custom_menu_order() {

    return [
      'index.php',
      'upload.php',
      'gf_edit_forms',

      'separator1',
      'edit.php',
      'edit.php?post_type=page',
      'edit.php?post_type=event',
      'separator-lo-1',
      'edit.php?post_type=ambassador',
      'edit.php?post_type=product',
      'edit.php?post_type=statement',
      'edit.php?post_type=team',
      'separator-lo-2',
    ];
  }

  public function set_gform_menu_position() {
    return null;
  }

  public function add_admin_style() {
    // style
    echo "<link rel='stylesheet' href='" . get_template_directory_uri() . "/dist/admin.css?v=" . wp_get_theme()->get( 'Version' ) . "' type='text/css' media='all' />";

    // fonts
    echo '<link rel="stylesheet" href="https://use.typekit.net/pum2qvy.css">';
    echo '<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">';
  }

  public function add_admin_script() {
    // $theme_version = wp_get_theme()->get( 'Version' );
    // echo "<script src='" . get_template_directory_uri() . "/dist/js/admin.js?v=" . $theme_version . "' type='text/javascript'></script>";
  }

  // remove posts from admin menu
  public function remove_admin_pages() {
    // divi project
    remove_menu_page( 'edit.php?post_type=project' );

    // post tag
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
  }

  public function add_separators() {
    global $menu;
    $number_separators = 2;

    for ( $i = 1; $i <= $number_separators; $i++ ) {
      $menu[] = array(
        '',                  //Menu title (ignored)
        'read',              //Required capability
        'separator-lo-'.$i,           //URL or file (ignored, but must be unique)
        '',                  //Page title (ignored)
        'wp-menu-separator', //CSS class. Identifies this item as a separator.
      );
    }
  }

  public function unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
  }


  public function mce4_options($init) {

    $custom_colours = '
      "000000", "Black",
      "6A6A6A", "Dark Gray",
      "E9E9E9", "Light Gray",
      "FFFFFF", "White",
      "00A5FF", "Primary Color",
      "ECF8FF", "Primary Light Color",
      "FF5A5A", "Red",
      "5AFF72", "Green"
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
  }

}
