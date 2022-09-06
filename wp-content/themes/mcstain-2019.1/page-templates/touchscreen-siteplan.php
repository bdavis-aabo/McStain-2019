<?php /* Template Name: Page - Touchscreen Siteplan */ ?>
<?php get_header('touchscreen'); ?>

<?php
	$_postParent = get_page($post->post_parent);
	$_parent = substr($_postParent->post_name, 0, -6);

	$_collections = get_terms(array(
    'taxonomy'  	=>  'collection',
    'hide_empty'  =>  false,
    'orderby'     =>  'ID',
    'order'       =>  'ASC'
  ));
	$_parentTitle = ucwords($_parent,'-');
	$_parentTitle = str_replace('-', ' ', $_parentTitle);
?>

<?php if(have_posts()): while(have_posts()): the_post();
	$_mapURL = get_field('community_map_url');
?>
<div class="touchscreen-wrapper <?php echo $_parent . '-touchscreen' ?>">
	<section class="touchscreen-section floorplan-collection-section">
		<div class="touchscreen-map-container">
			<h1 class="white-txt"><?php echo $_parentTitle . ' '; the_title(); ?></h1>
			<div class="map-container">
				<iframe src="<?php echo $_mapURL ?>" width="100%"></iframe>
			</div>
			<p style="margin-top: 30px;">
				<a href="<?php echo '/' . $_postParent->post_name ?>" title="<?php echo 'Back to Home' ?>" class="touch-btn green-btn">
					<i class="fas fa-chevron-left"></i> Back to Home
			</a>
		</div>
	</section>
</div>
<?php endwhile; endif; ?>

<?php get_footer('touchscreen'); ?>
