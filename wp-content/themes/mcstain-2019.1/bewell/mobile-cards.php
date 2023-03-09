<section class="page-section bewell-cards-section mobile-cards">
	<div class="bewell-cards-container carousel slide" id="mobileCardSlider" data-ride="carousel" data-interval="false" data-touch="true">
		<div class="carousel-inner">
			<?php $_s = 0; while(have_rows('bewell_cards')): the_row(); $_cardImage = get_sub_field('card_image'); ?>
				<div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
					<img src="<?php echo $_cardImage['url'] ?>" class="img-fluid" alt="bewell card" />
					<div class="carousel-content">
						<div class="content-container">
							<?php echo get_sub_field('card_content'); ?>
						</div>
					</div>
				</div>
			<?php $_s++; endwhile; ?>
		</div>
		<ol class="carousel-indicators">
			<?php $_i = 0; $_num = 1; while(have_rows('bewell_cards')): the_row(); ?>
			<li <?php if($_i == 0): ?>class="active"<?php endif; ?> data-slide-to="<?php echo $_i ?>" data-target="#mobileCardSlider">
				<?php echo '0' . $_num; ?>
			</li>
			<?php $_i++; $_num++; endwhile; ?>
		</ol>
	</div>
</section>
