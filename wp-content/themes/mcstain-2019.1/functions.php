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
      filemtime(get_stylesheet_directory().'/assets/css/main.min.css'),
      'all'
    );
		wp_enqueue_style(
			'touch.min',
			get_stylesheet_directory_uri().'/assets/css/touch.min.css',
			array(),
			filemtime(get_stylesheet_directory().'/assets/css/touch.min.css'),
			'all'
		);
		wp_enqueue_style(
			'bewell.min',
			get_stylesheet_directory_uri().'/assets/css/bewell.min.css',
			array(),
			filemtime(get_stylesheet_directory().'/assets/css/bewell.min.css'),
			'all'
		);
  }
  add_action('wp_enqueue_scripts', 'mcstain_styles', PHP_INT_MAX);

  function mcstain_cultivation_js(){
    wp_register_script(
      'jquery.cultivation.min',
      get_stylesheet_directory_uri() . '/assets/js/cultivation.min.js?v='.filemtime(get_stylesheet_directory().'/assets/js/cultivation.min.js'),
      array('jquery'),
      filemtime(get_stylesheet_directory().'/assets/js/cultivation.min.js'),
      true
    );
		wp_register_script(
      'jquery.touch.min',
      get_stylesheet_directory_uri() . '/assets/js/touch.min.js?v='.filemtime(get_stylesheet_directory().'/assets/js/touch.min.js'),
      array('jquery'),
      filemtime(get_stylesheet_directory().'/assets/js/touch.min.js'),
      true
    );
    wp_enqueue_script('jquery.cultivation.min');
		wp_enqueue_script('jquery.touch.min');
  }
  	add_action('wp_enqueue_scripts','mcstain_cultivation_js', 11);

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

  // Custom Taxonomy for Collections
  add_action('init','collection_taxonomies',0);
  function collection_taxonomies(){
    $_labels = array(
  		'name' 				=> 	_x('Collections', 'taxonomy general name'),
  		'singular_name'		=> 	_x('Collection', 'taxonomy singular name'),
  		'search_items'		=>	__('Search Collections'),
  		'all_items'			=>	__('All Collections'),
  		'parent_item'		=>	__('Parent Collection'),
  		'parent_item_colon'	=>	__('Parent Collection:'),
  		'edit_item'			=>	__('Edit Collection'),
  		'update_item'		=>	__('Update Collection'),
  		'add_new_item'		=>	__('Add New Collection'),
  		'new_item_name'		=>	__('New Collection Name'),
  		'menu_name'			=>	__('Collections'),
  		);
  	$_args = array(
  		'hierarchical'		=>	true,
  		'labels'			=>	$_labels,
  		'show_ui'			=>	true,
  		'show_admin_column'	=>	true,
  		'update_count_callback' => '_update_post_term_count',
  		'query_var'			=>	true,
  		'rewrite'			=>	array('slug' => 'collection'),
  		);

  	register_taxonomy('collection', array('floorplans'), $_args);
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
