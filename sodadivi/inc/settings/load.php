<?php

$settings = array(
  'customize',
  'divi',
);

// load all post types classes
foreach ( $settings as $setting ) {
  include_once  get_stylesheet_directory() .'/inc/settings/class-sodadivishort-' . $setting . '.php';

  $class_name = 'SODADIVISHORT_' . underscoreToCamelCase($setting);
  $setting_object = new $class_name();
  $setting_object->load();
}
