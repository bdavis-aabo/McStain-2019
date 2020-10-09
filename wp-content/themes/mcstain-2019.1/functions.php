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
      array(),
      filemtime(get_stylesheet_directory().'/assets/css/min.min.css'),
      'all'
    );
  }
  add_action('wp_enqueue_scripts', 'mcstain_styles', PHP_INT_MAX);

  // Create Post Type for Promotions
  add_action('init','create_promos');
  function create_promos(){
    register_post_type('promos', array(
      'label'           =>	__('Promotions'),
		  'singular_label'	=>	__('Promotion'),
		  'public'          =>	true,
		  'show_ui'         =>	true,
		  'capability_type'	=>	'post',
		  'hierarchical'		=>	'true',
		  'rewrite'         =>	array('slug' => 'promos'),
		  'supports'        =>	array('title','custom-fields','order','page-attributes'),
		  'menu_position'		=>	25,
		  'menu_icon'       =>	'dashicons-megaphone',
		  'has_archive'     =>	true,
    ));
  }

  // Widgets (Directions)
  function energy_widget(){
    register_sidebar(array(
      'name'          => __('Footer Energy', 'footer-energy'),
	    'description'   => __('Widget to display EnergyStar in footer.', 'footer-energy'),
	    'id'            => 'footer-energystar',
	    'before_widget' => '<div class="footer-energy">',
	    'after_widget'  => '</div>',
	    'before_title'  => '',
	    'after_title'   => ''
    ));
  }

  add_action('widgets_init','energy_widget');


  /*Contact form 7 remove span*/
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);

    return $content;
});
?>
