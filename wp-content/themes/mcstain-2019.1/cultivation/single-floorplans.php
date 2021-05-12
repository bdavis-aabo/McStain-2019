<?php
  $_uriPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $_uriSegments = explode('/', $_uriPath);

  $_collection = substr($_uriSegments[4], 0, -5);
  $_collection = $_collection . '-collection';

  $_floorplans = new WP_Query();
  $_args = array(
    'post_type'       => 'floorplans',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'order'           => 'ASC',
    'orderby'         => 'menu_order',
    'collection'      => $_collection,
  );
  $_floorplans->query($_args);

?>


  <?php if($_uriSegments[2] == 'arras-park'): //if community == arras park
    if($_floorplans->have_posts()):
  ?>
  <section class="section single-floorplan-section">
    <div class="collection-message">
      <h2>View other plans in the <span class="ltgreen-txt"><?php echo ucwords(str_replace('-', ' ', $_collection)) ?></span></h2>
    </div>
    <div class="collection-floorplans" id="<?php echo $_collection . '-floorplans' ?>">
      <div class="floorplan-container">
      <?php while($_floorplans->have_posts()): $_floorplans->the_post();
        $_galleryImages = get_field('floorplan_elevations'); $_galleryImage = $_galleryImages[0];
      ?>
      <article class="floorplan <?php if($post->post_name == $_uriSegments[4]): echo 'active'; endif; ?>" id="<?php echo $post->post_name ?>">
        <img src="<?php echo $_galleryImage['url'] ?>" alt="<?php the_title() ?> - Elevation" class="floorplan-thumbnail img-fluid" />
        <div class="floorplan-details noshow">
          <div class="background-box"></div>
          <div class="background-details">
            <p class="floorplan-title"><?php the_title() ?></p>
            <?php if($post->post_name == $_uriSegments[4]): ?>
              <p class="details">currently viewing</p>
            <?php endif; ?>
            <?php if(have_rows('floorplan_details')): the_row(); ?>
              <p class="details">
                <?php echo get_sub_field('square_footage') ?> sq ft finished above ground<br/>
                <?php echo get_sub_field('bedrooms') ?> beds | <?php echo get_sub_field('bathrooms') ?> baths
              </p>
              <p class="price">From $<?php echo get_sub_field('starting_price') ?></p>
              <a href="<?php the_permalink() ?>" class="floorplan-link">
                <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> view this floorplan
              </a>
            <?php endif; ?>
          </div>
        </div>
      </article>
      <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif;
    endif;
  ?>
