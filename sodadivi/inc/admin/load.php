<?php

$classes = [
  'adminlogin',
  'adminstyle'
];

// load all post types classes
foreach ( $classes as $class ) {
  include_once  get_stylesheet_directory() .'/inc/admin/class-sodadivishort-' . $class . '.php';

  $class_name = 'SODADIVISHORT_' . ucfirst($class);
  $class_object = new $class_name();
  $class_object->load();
}
