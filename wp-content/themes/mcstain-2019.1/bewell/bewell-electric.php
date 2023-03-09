	<section class="page-section bewell-electric-section">
		<div class="bewell-electric-container">
			<?php while(have_rows('bewell_electric_house')): the_row(); $_electricImage = get_sub_field('large_image') ?>
				<article class="bewell-electric-house">
					<div class="house-left">
						<?php echo get_sub_field('content') ?>
						<button class="btn green-btn popup-btn desktop-only">Learn More</button>
					</div>
					<figure class="house-right">
						<img src="<?php echo $_electricImage['url'] ?>" alt="BeWell All-Electric House" class="img-fluid" />
					</figure>
				</article>

				<?php if(have_rows('bewell_popup')): ?>
				<div class="mobile-only bewell-popup-slider">
					<?php while(have_rows('bewell_popup')): the_row(); $_galleryImages = get_sub_field('popup_gallery'); ?>
					<div class="popup-left"><?php echo get_sub_field('popup_content') ?></div>
					<div class="popup-right">
						<?php foreach($_galleryImages as $_image): ?>
						<figure class="popup-image">
							<img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
						</figure>
						<?php endforeach; ?>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>

				<button class="btn green-btn more-btn mobile-only" data-target="#electric-popup">Learn More</button>

			<?php endwhile; ?>
		</div>

	</section>

	<?php if(have_rows('bewell_popup')): ?>
	<div class="overlay bewell-popup desktop-only">
		<div class="popup-container">
			<button class="close-btn"><i class="fal fa-times"></i></button>
			<?php while(have_rows('bewell_popup')): the_row(); $_galleryImages = get_sub_field('popup_gallery'); ?>
				<div class="popup-left"><?php echo get_sub_field('popup_content') ?></div>
				<div class="popup-right">
					<?php foreach($_galleryImages as $_image): ?>
						<figure class="popup-image">
							<img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
						</figure>
					<?php endforeach; ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
