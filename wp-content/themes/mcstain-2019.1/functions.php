<?php
  // Load Parent Styles
  function mcstain_styles(){
    wp_enqueue_style('parent-style', get_template_directory_uri().'/assets/css/main.min.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/assets/css/main.min.css', array('parent-style'));
  }
  add_action('wp_enqueue_scripts', 'mcstain_styles', PHP_INT_MAX);

?>
