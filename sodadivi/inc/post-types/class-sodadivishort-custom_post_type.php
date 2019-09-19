<?php


class SODADIVISHORT_CustomPostType {

  /**
   * Loads post type related actions and filters
   *
   * @return void
   */
  public function load()
  {
    add_action('init', [ $this, 'init_action' ]);
    add_filter( 'manage_event_posts_columns', array( $this, 'filter_admin_columns' ) );
    add_filter( 'manage_edit-event_sortable_columns', array( $this, 'admin_sortable_columns' ));
    add_action( 'pre_get_posts', array( $this, 'posts_orderby' ) );
    add_action( 'manage_event_posts_custom_column', array( $this, 'admin_column' ), 10, 2);
  }

  /**
   * Initializes post type on wordpress init
   *
   * @return void
   */
  public function init_action() {
      $this->register_post_type();
  }

  /**
   * Registers Post Type
   *
   * @return void
   */
  public function register_post_type() {
    register_post_type(
      'event',
      [
        'labels'        => [
          'name'          => __('Custom Elements', 'sodadivi'),
          'singular_name' => __('Custom Element', 'sodadivi'),
        ],
        'menu_position' => 19,
        'show_in_rest'  => true,
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'	    => 'dashicons-calendar',
        'rewrite'       => [ 'slug' => 'custom-element' ],
        'taxonomies'    => [],
        'supports'      => [
          'title',
          'editor',
          'revisions',
        ],
      ]
    );
  }

  /**
   * Set admin custom columns
   */
  public function filter_admin_columns( $columns ) {
    return array(
      'cb'    => $columns['cb'],
      'title'  => __('Title', 'sodadivi'),
      'event_date'  => __('Date', 'sodadivi'),
      'image' => __('Photo', 'sodadivi'),
    );
  }

  /**
   * Set admin custom sortable columns
   */
  public function admin_sortable_columns( $columns ) {
    $columns['event_date'] = 'event_date';
    return $columns;
  }

  /**
   * Set admin custom sortable tyoe
   */
  public function posts_orderby( $query ) {
    if( ! is_admin() || ! $query->is_main_query() ) {
      return;
    }

    if ( 'event_date' === $query->get( 'orderby') ) {
      $query->set( 'orderby', 'meta_value' );
      $query->set( 'meta_key', 'start_date' );
    }
  }

  /**
   * Set admin column values
   */
  public function admin_column( $column, $post_id ) {
    if ( 'event_date' === $column ) {

      // start date
      $start_date = get_field( 'start_date', $post_id );
      if ( $start_date ) {
        $start_date = strtotime($start_date);
        echo date( 'd.m.Y', $start_date );
      }
    }
  }
}
