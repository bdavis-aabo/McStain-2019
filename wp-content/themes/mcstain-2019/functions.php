<?php
// Theme Functions

/* bootstrap nav walker */
require_once get_template_directory() . '/assets/_inc/class-wp-bootstrap-navwalker.php';

/* Remove Admin Bar from Frontend */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar(){
  show_admin_bar(false);
}

if (function_exists('add_theme_support')){
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 700, '', true);  		// Large Thumbnail
  add_image_size('medium', 250, '', true); 		// Medium Thumbnail
  add_image_size('small', 125, '', true);  		// Small Thumbnail
  add_image_size('square', 450);   // Square Thumbnail
  add_image_size('custom-size', 700, 200, true);  // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'wpt_setup');
if(!function_exists('wpt_setup')):
  function wpt_setup() {
    register_nav_menu('primary', __('Primary Navigation', 'wptmenu'));
  }
endif;

function wpt_register_js(){
  if( !is_admin()){
    wp_deregister_script('jquery');
  }

	wp_register_script('jquery', '//code.jquery.com/jquery-3.3.1.slim.min.js', 'jquery', '', true);
  wp_register_script('jquery.popper.min', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js', 'jquery', '', true);
	wp_register_script('jquery.bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', 'jquery', '', true);
	wp_register_script('jquery.extras.min', get_template_directory_uri() . '/assets/js/main.min.js', 'jquery', '', true);

	if(!is_admin()){
	  wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.popper.min');
    wp_enqueue_script('jquery.bootstrap.min');
    wp_enqueue_script('jquery.extras.min');
  }
}

function wpt_register_css(){
  wp_register_style('bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css');
  wp_register_style('fontawesome.min', '//use.fontawesome.com/releases/v5.6.3/css/all.css');
  wp_register_style('main.min', get_template_directory_uri() . '/assets/css/main.min.css');
  wp_enqueue_style('bootstrap.min');
  wp_enqueue_style('fontawesome.min');
  wp_enqueue_style('main.min');
}
add_action('init','wpt_register_js');
add_action('wp_enqueue_scripts', 'wpt_register_css');

// Add Class to Images posted on pages
function add_responsive_class($content){
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
  $document = new DOMDocument();
  libxml_use_internal_errors(true);
  $document->loadHTML(utf8_decode($content));

  $imgs = $document->getElementsByTagName('img');
  foreach($imgs as $img){
    $existing_class = $img->getAttribute('class');
    $img->setAttribute('class', 'img-responsive ' . $existing_class);
  }
  $html = $document->saveHTML();
	return $html;
}
add_filter('the_content', 'add_responsive_class');

// Custom Post Types (communities,manifesto msgs)
add_action('init','create_community_slides');
function create_community_slides(){
  register_post_type('community_slides', array(
    'label'             =>  __('Community Slides'),
    'singular_label'    =>  __('Community Slide'),
    'public'            =>  true,
    'show_ui'           =>  true,
    'capability_type'   =>  'post',
    'hierarchical'      =>  true,
    'rewrite'           =>  array('slug' => 'community-slide'),
    'supports'          =>  array('title','thumbnail','custom-fields','order','page-attributes','editor'),
    'menu_position'     =>  20,
    'menu_icon'         =>  'dashicons-admin-home',
    'has_archive'       =>  false
  ));
}

add_action('init','create_quickmoves');
function create_quickmoves(){
	register_post_type('quickmoves', array(
		'label'				=>	__('Quick Move-Ins'),
		'singular_label'	=>	__('Quick Move-In'),
		'public'			=>	true,
		'show_ui'			=>	true,
		'capability_type'	=>	'post',
		'hierarchical'		=>	true,
		'rewrite'			=>	array('slug' => 'quick-moveins'),
		'supports'			=>	array('title','author','excerpt','custom-fields','order','page-attributes','editor'),
		'menu_position'		=>	21,
		'menu_icon'			=>	'dashicons-admin-home',
		'has_archive'		=>	true,
	));
}

add_action('init','create_members');
function create_members(){
  register_post_type('team-members', array(
    'label'             =>  __('Team Members'),
    'singular_label'    =>  __('Team Member'),
    'public'            =>  true,
    'show_ui'           =>  true,
    'capability_type'   =>  'post',
    'hierarchical'      =>  true,
    'rewrite'           =>  array('slug' => 'team-members'),
    'supports'          =>  array('title','thumbnail','custom-fields','order','page-attributes','editor'),
    'menu_position'     =>  22,
    'menu_icon'         =>  'dashicons-businessman',
    'has_archive'       =>  false
  ));
}

add_action('init','create_manifestos');
function create_manifestos(){
  register_post_type('manifesto_messages', array(
    'label'             =>  __('Manifesto Messages'),
    'singular_label'    =>  __('Manifesto Message'),
    'public'            =>  true,
    'show_ui'           =>  true,
    'capability_type'   =>  'post',
    'hierarchical'      =>  true,
    'rewrite'           =>  array('slug' => 'manifesto'),
    'supports'          =>  array('title','thumbnail','custom-fields','order','page-attributes','editor'),
    'menu_position'     =>  23,
    'menu_icon'         =>  'dashicons-megaphone',
    'has_archive'       =>  false
  ));
}

// Custom Taxonomy for Quick Move-in Homes
add_action('init','location_taxonomies',0);
function location_taxonomies(){
  $_labels = array(
		'name' 				=> 	_x('Locations', 'taxonomy general name'),
		'singular_name'		=> 	_x('Location', 'taxonomy singular name'),
		'search_items'		=>	__('Search Locations'),
		'all_items'			=>	__('All Locations'),
		'parent_item'		=>	__('Parent Location'),
		'parent_item_colon'	=>	__('Parent Location:'),
		'edit_item'			=>	__('Edit Location'),
		'update_item'		=>	__('Update Location'),
		'add_new_item'		=>	__('Add New Location'),
		'new_item_name'		=>	__('New Location Name'),
		'menu_name'			=>	__('Locations'),
		);
	$_args = array(
		'hierarchical'		=>	true,
		'labels'			=>	$_labels,
		'show_ui'			=>	true,
		'show_admin_column'	=>	true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'			=>	true,
		'rewrite'			=>	array('slug' => 'location'),
		);

	register_taxonomy('location', 'quickmoves', $_args);
}

// Add Widget Areas
function theme_widgets_init(){
  register_sidebar(array(
    'name'  =>  'Footer Address',
    'id'    =>  'footer-address',
    'before_widget' =>  '',
    'after_widget'  =>  '',
  ));
  register_sidebar(array(
    'name'  =>  'Blog Sidebar',
    'id'    =>  'blog-sidebar',
    'before_widget' =>  '<div class="blog-sidebar">',
    'after_widget'  =>  '</div>',
    'before_title'	=>	'<h3 class="blue-txt">',
		'after_title'	  =>	'</h3>'
  ));
}
add_action('widgets_init','theme_widgets_init');
