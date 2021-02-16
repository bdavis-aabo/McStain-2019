<?php
/*
pull collections for community by slug
-> if community has collections, get collections: else: pull floorplans;
-> pull floorplans for collections
-> display slider & thumbnail section
-> display collection details
*/
  $_community = $post->post_name;
  $_collections = get_terms(array(
    'taxonomy'  =>  'collection',
    'hide_empty'  =>  false,
    'orderby'     =>  'ID',
    'order'       =>  'ASC'
  ));
?>

<?php foreach($_collections as $_collection): ?>
  <?php
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

  <div class="collection-container" id="<?php echo $_collection->slug; ?>">
    <div class="collection-details blue-bg">
      <div class="collection-detail-container">
        <?php echo $_collection->description; ?>
        <button class="btn clear-btn view-btn" data-target="<?php echo '#' . $_collection->slug . '-floorplans' ?>">
          <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> View Collection
        </button>
      </div>
    </div>

    <div class="collection-slider">
      <?php if($_floorplans->have_posts()): ?>
      <div id="floorplanCarousel" class="carousel slide" data-ride="carousel" data-interval="6500">
        <div class="carousel-inner">
        <?php $_s = 0; while($_floorplans->have_posts()): $_floorplans->the_post();
          $_galleryImages = get_field('floorplan_elevations'); $_galleryImage = $_galleryImages[0];
        ?>
          <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>" id="slide-<?php echo $_s; ?>">
            <img src="<?php echo $_galleryImage['url'] ?>" alt="<?php the_title() ?> - Elevation" class="slide-image img-fluid"/>
          </div>
        <?php $_s++; endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="carousel-indicators">
          <?php $_i = 0; while($_floorplans->have_posts()): $_floorplans->the_post(); ?>
          <li data-target="#floorplanCarousel" data-slide-to="<?php echo $_i ?>"></li>
          <?php $_i++; endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="collection-floorplans hidden" id="<?php echo $_collection->slug . '-floorplans' ?>">
      <?php if($_floorplans->have_posts()): ?>
      <div class="floorplan-container">
        <?php while($_floorplans->have_posts()): $_floorplans->the_post();
          $_galleryImages = get_field('floorplan_elevations'); $_galleryImage = $_galleryImages[0]; ?>
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
                <a href="<?php the_permalink() ?>" class="floorplan-link">
                  <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> view this floorplan
                </a>
              <?php endif; ?>
            </div>
          </div>
        </article>
        <?php endwhile; ?>
      </div>

      <?php endif; ?>
    </div>

  </div>
<?php endforeach; wp_reset_query(); ?>
