<?php
  // Load Parent Styles
  function mcstain_styles(){
    wp_enqueue_style(
      'main.min',
      get_template_directory_uri() . '/assets/css/main.min.css',
      array(),
      filemtime(get_template_directory().'/assets/css/main.min.css'),
      'all'
    );
    wp_enqueue_style(
      'child-main.min',
      get_stylesheet_directory_uri().'/assets/css/main.min.css',
      array('main.min'),
      filemtime(get_stylesheet_directory().'/assets/css/min.min.css'),
      'all'
    );
  }
  add_action('wp_enqueue_scripts', 'mcstain_styles', PHP_INT_MAX);

?>
