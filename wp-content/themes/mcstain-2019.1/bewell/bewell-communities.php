	<?php if(have_rows('bewell_communities')): ?>
	<section class="page-section bewell-communities-section">
		<div class="bewell-community-intro">
			<?php echo get_field('bewell_communities_intro') ?>
		</div>
		<div class="communities-container">
			<?php while(have_rows('bewell_communities')): the_row(); $_image = get_sub_field('thumbnail'); ?>
				<article class="community">
					<a href="<?php echo get_sub_field('community_link') ?>">
						<figure><img src="<?php echo $_image['url'] ?>" alt="community image" class="img-fluid"></figure>
					</a>
					<div class="community-details">
						<?php echo get_sub_field('community_content'); ?>
						<a href="<?php echo get_sub_field('community_link') ?>" class="btn green-btn" title="learn more">
							Learn More
						</a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>
