<?php

$settings = array(
  'customize',
  'divi',
);

// load all post types classes
foreach ( $settings as $setting ) {
  include_once  get_stylesheet_directory() .'/inc/settings/class-sodadivi-' . $setting . '.php';

  $class_name = 'Sodadivi_' . underscoreToCamelCase($setting);
  $setting_object = new $class_name();
  $setting_object->load();
}
