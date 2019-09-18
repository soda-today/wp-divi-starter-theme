<?php

$widgets = array(
  'footer',
);

// load all post types classes
foreach ( $widgets as $widget ) {
  include_once  get_stylesheet_directory() .'/inc/widgets/class-sodadivi-' . $widget . '.php';

  $class_name = 'Sodadivi_' . underscoreToCamelCase($widget);
  $widget_object = new $class_name();
  $widget_object->load();
}
