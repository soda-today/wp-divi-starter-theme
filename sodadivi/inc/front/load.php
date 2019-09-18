
<?php

$classes = array(
  'setup',
);

// load all post types classes
foreach ( $classes as $class ) {
  include_once  get_stylesheet_directory() .'/inc/front/class-sodadivi-' . $class . '.php';

  $class_name = 'Sodadivi_' . underscoreToCamelCase($class);
  $class_object = new $class_name();
  $class_object->load();
}
