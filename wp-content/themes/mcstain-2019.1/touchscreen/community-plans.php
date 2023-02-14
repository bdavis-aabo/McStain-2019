<?php
	$_postParent = get_page($post->post_parent);
	$_parent = str_replace('-touchscreen', '',$_postParent->post_name);

	$_floorplans = new WP_Query();
	$_args = array(
		'post_type'       => 'floorplans',
		'post_status'     => 'publish',
		'posts_per_page'  => -1,
		'order'           => 'ASC',
		'orderby'         => 'menu_order',
		'community'      	=> $_parent,
	);
	$_floorplans->query($_args);
?>


	<?php if($_floorplans->have_posts()): ?>
		<div class="floorplan-container <?php echo $_parent . '-floorplan-container' ?>">
		<?php while($_floorplans->have_posts()): $_floorplans->the_post();
			$_galleryImages = get_field('floorplan_elevations');
			$_galleryImage = $_galleryImages[0];
		?>
			<article class="floorplan" id="<?php echo $post->post_name ?>" data-target="#<?php echo $post->post_name . '-detail' ?>">
				<img src="<?php echo $_galleryImage['url'] ?>" alt="<?php the_title() ?> - Elevation" class="floorplan-thumbnail img-fluid" />
				<p class="floorplan-title"><?php the_title() ?></p>
				<?php if(have_rows('floorplan_details')): the_row(); ?>
					<p class="details">
						<?php echo get_sub_field('square_footage') ?> sq ft finished<br/>
						<?php echo get_sub_field('bedrooms') ?> beds | <?php echo get_sub_field('bathrooms') ?> baths
					</p>
					<p class="price">From $<?php echo get_sub_field('starting_price') ?></p>
				<?php endif; ?>
			</article>
		<?php endwhile; ?>
		</div> <!-- /end floorplan-container -->

		<div class="floorplan-detail-container">
			<?php while($_floorplans->have_posts()): $_floorplans->the_post(); ?>
			<article class="floorplan-details hidden" id="<?php echo $post->post_name . '-detail' ?>">
				<div class="floorplan-details-top">
					<div class="floorplan-titlebox">
						<h1 class="floorplan-title"><?php the_title() ?></h1>
						<?php if(have_rows('floorplan_details')): the_row(); ?>
							<p class="details">
								<?php echo get_sub_field('square_footage') ?> sq ft finished<br/>
								<?php echo get_sub_field('bedrooms') ?> beds | <?php echo get_sub_field('bathrooms') ?> baths<br/>
								From $<?php echo get_sub_field('starting_price') ?>
							</p>
						<?php endif; ?>
					</div>
					<figure class="floorplan-figure">
						<img src="<?php echo $_galleryImage['url'] ?>" alt="<?php the_title() ?> - Elevation" class="floorplan-thumbnail img-fluid">
					</figure>
					<button class="green-btn touch-btn btn backFloorplan-btn" data-target="#<?php echo $_parent . '-touch_plans' ?>" data-parent="#<?php echo $post->post_name . '-detail' ?>"><i class="fas fa-chevron-left"></i> Back to Floorplans</button>
				</div>
				<div class="floorplan-details-bottom">
					<?php if(get_field('floorplan_images')): $_floorplanImages = get_field('floorplan_images'); $_t = 0; $_c = 0; ?>
				  <div class="floorplan-images">
				    <div class="floorplan-image-container">
				      <ul class="nav nav-pills floorplan-tabs" tole="tablist">
								<?php foreach($_floorplanImages as $_image):
									$_tabLink = strtolower(str_replace(' ', '-',$_image['title']));
									$_tabID = $post->post_name . '-' . $_tabLink;
									$_tabControl = $_tabLink . '-tab';
								?>
								<li class="nav-item">
									<a href="#<?php echo $_parent . '-' . $_tabID ?>" class="nav-link <?php if($_t == 0): echo 'active'; endif; ?>" id="<?php echo $_parent . '-' . $_tabControl ?>" aria-controls="<?php echo $_parent . '-' . $_tabControl ?>" data-toggle="tab">
										<?php echo $_image['title'] ?>
									</a>
								</li>
								<?php $_t++; endforeach; ?>
				      </ul>
				      <div class="tab-content" id="floorplan-tabcontent">
								<?php foreach($_floorplanImages as $_image):
									$_tabLink = strtolower(str_replace(' ', '-',$_image['title']));
									$_tabID = $post->post_name . '-' . $_tabLink;
								?>
								<div class="tab-pane fade <?php if($_c == 0): echo 'show active'; endif; ?>" id="<?php echo $_parent . '-' . $_tabID ?>">
				            <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['title'] ?>" class="img-fluid aligncenter" />
				          </div>
				        <?php $_c++; endforeach; ?>
				      </div>
				    </div>
				  </div>
				  <?php endif; ?>
				</div>




			</article>
			<?php endwhile; wp_reset_query(); ?>


		</div>
	<?php endif; ?>
