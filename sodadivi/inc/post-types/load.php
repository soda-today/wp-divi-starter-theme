<?php

$post_types = array(
  'custom_post_type',
);

// load all post types classes
foreach ( $post_types as $post_type ) {
  include_once  get_stylesheet_directory() .'/inc/post-types/class-sodadivishort-' . $post_type . '.php';

  $class_name = 'SODADIVISHORT_' . underscoreToCamelCase($post_type);
  $post_type_object = new $class_name();
  $post_type_object->load();
}
