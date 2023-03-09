<?php /* Template Name: Page - BeWell 2023 */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<?php if(have_rows('heroimages')): $_s = 0; ?>
	<section class="page-section bewell-heroimage-section">
		<div class="heroimage-container carousel slide" id="bewellSlider" data-ride="carousel">
			<div class="carousel-inner">
			<?php while(have_rows('heroimages')): the_row();
				$_lgImage = get_sub_field('large_image');
				$_mobImage = get_sub_field('mobile_image');
			?>
			<picture class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
				<source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
    	<img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
			</picture>
			<?php $_s++; endwhile; ?>
			</div>
		</div>

		<figure class="bewell-animated-logo">
			<?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/images/bewell-logoAnim.svg') ?>
		</figure>
	</section>
	<?php endif; ?>

	<section class="page-section bewell-intro-section">
		<div class="bewell-introduction">
			<?php the_content() ?>
		</div>
	</section>

	<?php
	if(have_rows('bewell_cards')):
		get_template_part('bewell/mobile-cards');
		get_template_part('bewell/desk-cards');
	endif;
	?>


	<?php if(get_field('bewell_proof') != ''): ?>
	<section class="page-section bewell-proof-section">
		<div class="bewell-proof-container">
			<?php echo get_field('bewell_proof'); ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if(have_rows('bewell_electric_house')): get_template_part('bewell/bewell-electric'); endif; ?>

	<?php get_template_part('bewell/bewell-articles'); ?>

	<?php get_template_part('bewell/bewell-communities'); ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
