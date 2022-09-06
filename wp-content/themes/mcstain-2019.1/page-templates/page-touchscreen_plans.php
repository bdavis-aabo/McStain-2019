<?php /* Template Name: Page - Touchscreen Floorplans */ ?>

<?php
	$_postParent = get_page($post->post_parent);
	$_parent = substr($_postParent->post_name, 0, -6);

	$_collections = get_terms(array(
    'taxonomy'  	=>  'collection',
    'hide_empty'  =>  false,
    'orderby'     =>  'ID',
    'order'       =>  'ASC'
  ));
?>

<?php get_header('touchscreen'); ?>

	<?php if(have_posts()): while(have_posts()): the_post();
		$_logo = get_field('community_logo'); $_backgroundImage = get_field('community_background');
	?>
	<div class="touchscreen-wrapper <?php echo $_parent . '-touchscreen' ?>">
		<?php if($_parent == 'arras-park'): ?>
		<figure class="touchscreen-logo">
			<img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/arraspark_logo-black.svg" alt="Arras Park Logo" class="img-fluid" />
		</figure>
		<section class="touchscreen-section floorplan-collection-section">
			<?php foreach($_collections as $_collection): ?>
				<article class="collection-details blue-bg collection-btn" data-target="<?php echo '#' . $_collection->slug . '-touch_plans' ?>">
		      <div class="collection-detail-container">
		        <?php echo $_collection->description; ?>
		      </div>
		    </article>
			<?php endforeach; ?>

			<p style="margin-top: 30px;">
				<a href="<?php echo '/' . $_postParent->post_name ?>" title="<?php echo 'Back to Home' ?>" class="touch-btn green-btn">
					<i class="fas fa-chevron-left"></i> Back to Home
			</a>
		</section>

		<?php get_template_part('touchscreen/ap-touchscreen-plans'); ?>

		<?php else: ?>
		<section class="touchscreen-section floorplan-list-section">

		</section>
		<?php endif; ?>


	</div>
	<?php endwhile; endif; ?>

<?php get_footer('touchscreen'); ?>
