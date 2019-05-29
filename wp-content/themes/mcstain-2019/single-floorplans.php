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
  <section class="floorplan-information">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="floorplan-title"><?php the_title() ?></h1>

        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-4">
          <div class="floorplan-left">
            <h2 class="floorplan-community"><?php echo $_cat ?></h2>

            <?php if(have_rows('floorplan_details')): the_row(); ?>
            <?php echo get_sub_field('description') ?>
            <ul class="floorplan-details">
              <li><strong><?php echo get_sub_field('square_footage') ?> Sq. Ft. Finished Above Ground</strong></li>
              <?php if(get_sub_field('square_footage_partial_basement') != ''): ?>
                <li><strong><?php echo get_sub_field('square_footage_partial_basement') ?> Sq. Ft. Partial Basement</strong></li>
              <?php endif; if(get_sub_field('square_footage_unfinished_basement') != ''): ?>
                <li><strong><?php echo get_sub_field('square_footage_unfinished_basement') ?> Sq. Ft. Unfinished Basement</strong></li>
              <?php endif; if(get_sub_field('square_footage_total') != ''): ?>
                <li><strong><?php echo get_sub_field('square_footage_total') ?> Sq. Ft. Total</strong></li>
              <?php endif; ?>
              <li><?php echo get_sub_field('bedrooms') ?> <strong>Bedrooms</strong></li>
              <li><?php echo get_sub_field('bathrooms') ?> <strong>Bathrooms</strong><br/>

              <li><?php echo get_sub_field('garage') ?> <strong>Car Garage</strong></li>
              <li>From <strong>$<?php echo get_sub_field('starting_price') ?></strong><br/>
            </ul>
            <p>
              <button class="btn green-btn floorplan-trigger">
                <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> Request Floorplan Brochure
              </button>
            </p>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-12 col-md-8">
          <div class="floorplan-right">
            <?php if(get_field('floorplan_elevations') != ''): $_elevations = get_field('floorplan_elevations'); ?>
            <div id="elevation-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php $_s = 0; foreach($_elevations as $_elevation): ?>
                <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
                  <img src="<?php echo $_elevation['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
                  <p class="elevation-caption"><?php echo $_elevation['title'] ?></p>
                </div>
                <?php $_s++; endforeach; ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <?php if(get_field('floorplan_images')): $_floorplanImages = get_field('floorplan_images'); $_t = 0; $_c = 0; ?>
      <div class="row">
        <div class="col-12">
          <div class="floorplan-images">
            <ul class="nav nav-pills floorplan-tabs" role="tablist">
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
                  <div class="col-8 offset-2">
                    <p class="floorplan-name"><?php the_title(); echo ' | ' . $_image['title'] ?><br/><?php echo $_image['caption'] ?></p>
                    <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['title'] ?>" class="img-fluid aligncenter" />
                  </div>
                </div>
              <?php $_c++; endforeach; ?>
            </div>
          </div>

          <?php social_warfare() ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>



  <?php endwhile; endif; ?>

<?php get_footer() ?>
