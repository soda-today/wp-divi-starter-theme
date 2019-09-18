<?php

$post_types = array(
  'custom_post_type',
);

// load all post types classes
foreach ( $post_types as $post_type ) {
  include_once  get_stylesheet_directory() .'/inc/post-types/class-sodadivi-' . $post_type . '.php';

  $class_name = 'Sodadivi_' . underscoreToCamelCase($post_type);
  $post_type_object = new $class_name();
  $post_type_object->load();
}
