<?php
	$_postParent = get_page($post->post_parent);
	$_parent = substr($_postParent->post_name, 0, -6);

	if($_parent == 'arras-park'){
  	$_collections = get_terms(array(
    	'taxonomy'  	=>  'collection',
    	'hide_empty'  =>  false,
    	'orderby'     =>  'ID',
    	'order'       =>  'ASC'
  	));
	}
?>
<section class="touchscreen-section floorplan-list-section nodisplay">
	arras park plans
</section>
