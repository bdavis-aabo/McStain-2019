<?php
  $_floorplan = new WP_Query();
  $_args = array(
    'post_type' => 'floorplans',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'name' => $post->post_name
  );
  $_floorplan->query($_args);
?>

<?php get_header() ?>

  <?php if($_floorplan->have_posts()): while($_floorplan->have_posts()): $_floorplan->the_post();
    $_terms = get_the_terms($post->ID, 'community'); if($_terms): foreach($_terms as $_term): $_cat = $_term->name; endforeach; endif;
  ?>

  <?php if(get_field('floorplan_large_elevations')): $_elevations = get_field('floorplan_large_elevations'); $_s = 0; ?>
  <section class="section floorplan-heroslider">
    <div class="floorplan-slider-container">
      <div class="carousel slide" id="floorplanSlider">
        <div class="carousel-inner">
        <?php foreach($_elevations as $_elevation): ?>
          <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
            <img src="<?php echo $_elevation['url'] ?>" alt="<?php echo $_elevation['title'] ?>" class="img-fluid" />
            <div class="carousel-caption dkblue-bg"><?php echo $_elevation['title'] ?></div>
          </div>
        <?php $_s++; endforeach; ?>
        </div>
        <a href="#floorplanSlider" class="carousel-control-prev" role="button" data-slide="prev">
          <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
        </a>
        <a href="#floorplanSlider" class="carousel-control-next" role="button" data-slide="next">
          <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i>
        </a>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="section floorplan-back">
    <div class="floorplan-back-container">
      <a href="/communities/<?php echo $_term->slug ?>" title="Back to <?php echo $_cat ?>">
        <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i> Back to <?php echo $_cat ?>
      </a>

    </div>
  </section>

  <section class="section floorplan-information">
    <div class="floorplan-info-container">
      <div class="floorplan-contents">
        <h1 class="floorplan-title"><?php the_title() ?> at <span class="ltgreen-txt"><?php echo $_cat; ?></span></h1>
        <?php if(have_rows('floorplan_details')): the_row(); ?>
          <?php echo get_sub_field('description') ?>
          <ul class="floorplan-details">
            <li><?php echo get_sub_field('square_footage') ?> Sq. Ft. Finished Above Ground</li>
            <?php if(get_sub_field('square_footage_partial_basement') != ''): ?>
              <li><?php echo get_sub_field('square_footage_partial_basement') ?> Sq. Ft. Partial Finished Basement</li>
            <?php endif; if(get_sub_field('square_footage_unfinished_basement') != ''): ?>
              <li><?php echo get_sub_field('square_footage_unfinished_basement') ?> Sq. Ft. Unfinished Basement</li>
            <?php endif; if(get_sub_field('square_footage_total') != ''): ?>
              <li><?php echo get_sub_field('square_footage_total') ?> Sq. Ft. Total</li>
            <?php endif; ?>
            <li><?php echo get_sub_field('bedrooms') ?> Bedrooms</li>
            <li><?php echo get_sub_field('bathrooms') ?> Bathrooms</li>
            <li><?php echo get_sub_field('garage') ?> Car Garage</li>
            <li>From $<?php echo get_sub_field('starting_price') ?><br/>
            </ul>
        <?php endif; ?>
          <?php if(get_field('floorplan_brochure') != ''): $_brochure = get_field('floorplan_brochure'); ?>
          <a href="<?php echo $_brochure['url'] ?>" title="<?php echo $_brochure['title'] ?>" target="_blank" class="btn green-btn">
            Download Brochure&nbsp;&nbsp;<i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i>
          </a>
          <?php endif; ?>
      </div>
      <div class="excited-callout">
        <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/get-excited.png" alt="it's time to get excited" class="img-fluid alignright" />
      </div>
    </div>
  </section>

  <?php if(get_field('floorplan_images')): $_floorplanImages = get_field('floorplan_images'); $_t = 0; $_c = 0; ?>
  <section class="section floorplan-images">
    <div class="floorplan-image-container">
      <ul class="nav nav-pills floorplan-tabs" tole="tablist">
        <?php foreach($_floorplanImages as $_image): $_tabLink = strtolower(str_replace(' ','-',$_image['title'])); ?>
          <li class="nav-item">
            <a href="#<?php echo $_tabLink ?>" class="nav-link <?php if($_t == 0): echo 'active'; endif; ?>" id="<?php echo $_tabLink.'-tab' ?>" role="tab" aria-controls="<?php echo $_tablink.'-tab' ?>" data-toggle="tab">
              <?php echo $_image['title'] ?>
            </a>
          </li>
        <?php $_t++; endforeach; ?>
      </ul>
      <div class="tab-content" id="floorplan-tabcontent">
        <?php foreach($_floorplanImages as $_image): $_tabLink = strtolower(str_replace(' ','-',$_image['title'])); ?>
          <div class="tab-pane fade <?php if($_c == 0): echo 'show active'; endif; ?>" id="<?php echo $_tabLink ?>">
            <p class="floorplan-name"><?php the_title(); echo ' | ' . $_image['title'] ?><br/><?php echo $_image['caption'] ?></p>
            <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['title'] ?>" class="img-fluid aligncenter" />
          </div>
        <?php $_c++; endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="section floorplan-builder">
    <div class="floorplan-builder-container">
      <div class="builder-button-container ltgreen-bg">
        <a class="builder-btn" title="Build your home">
          <h1>Build your house</h1>
          <span class="blue-bg"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></span>
        </a>
      </div>
      <div class="builder-graphic">
        <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/homebuilder-graphic.jpg" alt="McStain Homebuilder" class="img-fluid aligncenter" />
      </div>
    </div>
  </section>
  <?php endwhile; endif; ?>

  <?php get_template_part('cultivation/single-floorplans') ?>

  <?php get_template_part('cultivation/floorplan-map') ?>



<?php get_footer() ?>
