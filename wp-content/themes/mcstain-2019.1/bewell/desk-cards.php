<section class="page-section bewell-cards-section desk-cards">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="bewell-cards-container row no-gutters">
					<?php while(have_rows('bewell_cards')): the_row(); $_cardImage = get_sub_field('card_image'); ?>
						<article class="bewell-card col-12 col-sm-6 col-lg-4">
							<div class="flip-container">
								<div class="flipper card">
									<div class="card-front">
										<img src="<?php echo $_cardImage['url'] ?>" alt="BeWell Card Image" class="img-fluid">
									</div>
									<div class="card-back">
										<div class="card-back-content">
											<?php echo get_sub_field('card_content'); ?>
										</div>
									</div>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</section>
