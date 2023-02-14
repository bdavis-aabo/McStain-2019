<?php /* Template Name: Page - Touchscreen Community Floorplans */ ?>

<?php
	$_postParent = get_page($post->post_parent);
	$_parent = str_replace('-touchscreen', '',$_postParent->post_name);
?>

<?php get_header('touchscreen'); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<div class="touchscreen-wrapper <?php echo $_parent . '-bg' ?>">
			<section class="touchscreen-section floorplan-list-section <?php echo $_parent . '-floorplan-list-section'; ?>" id="<?php echo $_parent . '-touch_plans' ?>">
				<?php get_template_part('touchscreen/community-plans'); ?>

				<p style="margin-top: 30px;">
					<a href="<?php echo '/' . $_postParent->post_name ?>" title="<?php echo 'Back to Home' ?>" class="touch-btn green-btn">
						<i class="fas fa-chevron-left"></i> Back to Home</a>
				</p>
			</section>
		</div>
	<?php endwhile; endif; ?>

<?php get_footer('touchscreen'); ?>
