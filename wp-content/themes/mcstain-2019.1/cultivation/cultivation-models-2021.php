<?php
$_floorplans = new WP_Query();
$_args = array(
  'post_type' => 'floorplans',
  'post_status' => 'publish',
  'community'   =>  $post->post_name,
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => 'menu_order'
);
$_floorplans->query($_args);
?>

  <div class="collection-container" id="<?php echo $post->post_name; ?>">
    <div class="collection-floorplans quad-floorplans" id="<?php echo $post->post_name . '-floorplans' ?>">
      <?php if($_floorplans->have_posts()): ?>
      <div class="floorplan-container">
        <?php while($_floorplans->have_posts()): $_floorplans->the_post();
          $_galleryImages = get_field('floorplan_large_elevations'); $_galleryImage = $_galleryImages[0];
        ?>
        <article class="floorplan" id="<?php echo $post->post_name ?>">
          <img src="<?php echo $_galleryImage['url'] ?>" alt="<?php the_title() ?> - Elevation" class="floorplan-thumbnail img-fluid" />
          <div class="floorplan-details noshow">
            <div class="background-box"></div>
            <div class="background-details">
              <p class="floorplan-title"><?php the_title() ?></p>
              <?php if(have_rows('floorplan_details')): the_row(); ?>
                <p class="details">
                  <?php echo get_sub_field('square_footage') ?> sq ft finished above ground<br/>
                  <?php echo get_sub_field('bedrooms') ?> bedrooms | <?php echo get_sub_field('bathrooms') ?> bathrooms
                </p>
                <p class="price">From $<?php echo get_sub_field('starting_price') ?></p>
                <a href="<?php the_permalink() ?>" class="floorplan-link"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> view this floorplan</a>
                <?php if(is_page('painted-prairie')): ?>
                <a href="https://configurator.creatomus.com/project/paintedprairie-<?php echo substr($post->post_name, -4) ?>?tab=index" target="_blank" class="floorplan-link">
                  <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> Build Your House
                </a>
                <?php
                  $_fpTitle = substr($post->post_name, 0, -5);
                  //var_dump($_fpTitle);
                  if($_fpTitle == 'showcase' || $_fpTitle == 'limelight'): ?>
                  <a href="https://mcstain.com/painted-prairie-gallery/<?php echo strtolower($_fpTitle) ?>-model-gallery/" target="_blank" class="floorplan-link">
                  <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> Photo Gallery
                  </a>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        </article>
        <?php endwhile; ?>

      </div>
    <?php endif; wp_reset_query(); ?>
    </div>
  </div>
