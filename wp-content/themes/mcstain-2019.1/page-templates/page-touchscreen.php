<?php /* Template Name: Page - Touchscreen */ ?>

<?php get_header('touchscreen'); ?>

	<?php if(have_posts()): while(have_posts()): the_post();
		$_communityShort = strtolower(str_replace(' ', '', get_field('community')));
	?>
	<div class="touchscreen-wrapper <?php echo $_communityShort . '-bg' ?>">
		<section class="touchscreen-section main-touchscreen-section">
			<div class="main-touchscreen-container">
				<?php if(is_page('arras-park-sales')): ?>
				<figure class="touchscreen-logo">
					<img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/<?php echo $_communityShort ?>_logo_transparent.png" alt="<?php the_title() ?> - Logo" />
				</figure>
				<?php else: ?>
				<figure class="touchscreen-logo">
					<img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/<?php echo $_communityShort ?>-logo.svg" alt="<?php the_title() ?> - Logo" />
				</figure>
				<?php endif; ?>

				<ul class="quick-links">
					<li>
						<a href="<?php the_permalink() ?>floorplans" title="<?php echo get_field('community') . ' Floorplans' ?>" class="touch-btn green-btn">Floorplans</a>
					</li>
					<li>
						<a href="<?php the_permalink() ?>siteplan" title="<?php echo get_field('community') . ' Siteplan' ?>" class="touch-btn green-btn">Siteplan</a>
					</li>
					<li>
						<a href="<?php the_permalink() ?>nearby-amenities" title="<?php echo get_field('community') . ' Nearby Amenities' ?>" class="touch-btn green-btn">Nearby Amenities</a>
					</li>
				</ul>
			</div>
		</section>
	</div>
	<?php endwhile; endif; ?>

<?php get_footer('touchscreen'); ?>
