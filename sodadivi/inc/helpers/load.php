<?php

$helpers = array(
  'text',
  'wpcf7',
);

// load all post types classes
foreach ( $helpers as $helper ) {
  include_once  get_stylesheet_directory() .'/inc/helpers/' . $helper . '.php';
}
