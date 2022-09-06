<?php
	$_postParent = get_page($post->post_parent);
	$_parent = substr($_postParent->post_name, 0, -6);

	if($_parent == 'arras-park'){
  	$_collections = get_terms(array(
    	'taxonomy'  	=>  'collection',
    	'hide_empty'  =>  false,
    	'orderby'     =>  'ID',
    	'order'       =>  'ASC'
  	));
	}
?>

	<?php foreach($_collections as $_collection):
		$_floorplans = new WP_Query();
		$_args = array(
			'post_type'       => 'floorplans',
			'post_status'     => 'publish',
			'posts_per_page'  => -1,
			'order'           => 'ASC',
			'orderby'         => 'menu_order',
			'collection'      => $_collection->slug,
		);
		$_floorplans->query($_args);
	?>
	<section class="touchscreen-section floorplan-list-section hidden" id="<?php echo $_collection->slug . '-touch_plans' ?>">
		<div class="floorplan-container">
			<h1 class="white-txt"><?php echo $_collection->name ?></h1>
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
					<!-- <button class="floorplan-link">
						<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> view this floorplan
					</button> -->
				<?php endif; ?>
			</article>
		<?php endwhile; ?>
		<button class="green-btn btn touch-btn backCollections-btn" data-target="#<?php echo $_collection->slug . '-touch_plans' ?>"><i class="fas fa-chevron-left"></i> Back to Collections</button>
		</div>

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
						<img src="<?php echo $_galleryImage['url'] ?>" alt="<?php the_title() ?> - Elevation" class="floorplan-thumbnail img-fluid" />
					</figure>
					<button class="green-btn touch-btn btn backFloorplan-btn" data-target="#<?php echo $_collection->slug . '-touch_plans' ?>" data-parent="#<?php echo $post->post_name . '-detail' ?>">
						<i class="fas fa-chevron-left"></i> Back to Floorplans
					</button>
				</div>
				<div class="floorplan-details-bottom">
					<?php if(get_field('floorplan_images')): $_floorplanImages = get_field('floorplan_images'); $_t = 0; $_c = 0; ?>
				  <div class="floorplan-images">
				    <div class="floorplan-image-container">
				      <ul class="nav nav-pills floorplan-tabs" tole="tablist">
				        <?php foreach($_floorplanImages as $_image): $_tabLink = strtolower(str_replace(' ','-',$_image['title'])); ?>
				          <li class="nav-item">
				            <a href="#<?php echo $post->post_name . '-' . $_tabLink ?>" class="nav-link <?php if($_t == 0): echo 'active'; endif; ?>" id="<?php echo $_tabLink . '-tab' ?>" role="tab" aria-controls="<?php echo $_tablink . '-tab' ?>" data-toggle="tab">
				              <?php echo $_image['title'] ?>
				            </a>
				          </li>
				        <?php $_t++; endforeach; ?>
				      </ul>
				      <div class="tab-content" id="floorplan-tabcontent">
				        <?php foreach($_floorplanImages as $_image): $_tabLink = strtolower(str_replace(' ','-',$_image['title'])); ?>
				          <div class="tab-pane fade <?php if($_c == 0): echo 'show active'; endif; ?>" id="<?php echo $post->post_name . '-' . $_tabLink ?>">
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
	</section>
	<?php endforeach; ?>

<?php /*
	<div class="floorplan-container">
		<?php while($_floorplans->have_posts()): $_floorplans->the_post();
			$_galleryImages = get_field('floorplan_elevations'); $_galleryImage = $_galleryImages[0]; ?>
		<article class="floorplan" id="<?php echo $post->post_name ?>">
			<img src="<?php echo $_galleryImage['url'] ?>" alt="<?php the_title() ?> - Elevation" class="floorplan-thumbnail img-fluid" />
			<?php if($_collection->slug != 'parkway-collection'): ?>
			<div class="floorplan-details noshow">
				<div class="background-box"></div>
				<div class="background-details">
					<p class="floorplan-title"><?php the_title() ?></p>
					<?php if(have_rows('floorplan_details')): the_row(); ?>
						<p class="details">
							<?php echo get_sub_field('square_footage') ?> sq ft finished<br/>
							<?php echo get_sub_field('bedrooms') ?> beds | <?php echo get_sub_field('bathrooms') ?> baths
						</p>
						<p class="price">From $<?php echo get_sub_field('starting_price') ?></p>
						<a href="<?php the_permalink() ?>" class="floorplan-link">
							<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> view this floorplan
						</a>
					<?php endif; ?>
				</div>
			</div>
			<?php else: ?>
			<div class="floorplan-details parkway-details">
				<div class="background-details">
					<p class="floorplan-title"><?php the_title() ?></p>
					<?php if(have_rows('floorplan_details')): the_row(); ?>
						<p class="details">
							<?php echo get_sub_field('square_footage') ?> sq ft finished<br/>
							<?php echo get_sub_field('bedrooms') ?> beds | <?php echo get_sub_field('bathrooms') ?> baths
						</p>
						<p class="price">From $<?php echo get_sub_field('starting_price') ?></p>
						<a href="<?php the_permalink() ?>" class="floorplan-link">
							<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> view this floorplan
						</a>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</article>
		<?php endwhile; ?>
	</div>
