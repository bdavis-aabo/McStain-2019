<?php $_terms = get_the_terms($post->ID,'community'); ?>

<?php get_header() ?>

<?php if(have_posts()): while(have_posts()): the_post(); $_galImages = get_field('qmi_gallery'); $_fpImages = get_field('qmi_plan_images') ?>
<section class="floorplan-heroslider">
  <?php if($_galImages != ''): $_s = 0; $_i = 0; ?>
  <div id="gallery-slider" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php foreach($_galImages as $_image): ?>
      <li data-target="#gallery-slider" data-slide-to="<?php echo $_i ?>" <?php if($_i == 0): echo 'class="active"'; endif; ?>></li>
      <?php $_i++; endforeach; ?>
    </ol>
    <div class="carousel-inner">
    <?php foreach($_galImages as $_galImage): ?>
      <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
        <img src="<?php echo $_galImage['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
      </div>
    <?php $_s++; endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#gallery-slider" role="button" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="carousel-control-next" href="#gallery-slider" role="button" data-slide="next"><i class="fas fa-chevron-right"></i></a>
  </div>
  <?php endif; ?>
</section>


<section class="floorplan-availability green-bg">
  <div class="availability-container"><?php echo get_field('qmi_available') ?></div>
</section>

<section class="floorplan-details floorplan-section">
  <div class="details-container">
    <div class="details-container-left">
      <h1 class="ltgreen-txt"><?php echo get_field('qmi_floorplan') ?> | <span class="qmi-price"><?php echo '$' . get_field('qmi_price') ?></span></h1>
      <p class="qmi-address"><?php echo get_field('qmi_address') ?></p>

      <?php if(have_rows('qmi_information')): while(have_rows('qmi_information')): the_row() ?>
      <p class="qmi-information">
        <?php echo get_sub_field('sq_foot') . ' sq ft | ' .
          get_sub_field('bedrooms') . ' Beds  | ' .
          get_sub_field('bathrooms') . ' Bath | ' .
          get_sub_field('garage') . '-car Garage';
        ?>
      </p>
      <?php echo get_field('qmi_details') ?>
      <?php endwhile; endif; ?>
    </div>
    <div class="details-container-right">
      <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/<?php echo $_terms[0]->slug.'-logo.jpg'; ?>" class="img-fluid" />
    </div>
</section>

<?php if($_fpImages != ''): $_s = 0; ?>
<section class="floorplan-images floorplan-section">
  <div class="floorplan-top">
    <h2 class="ltgreen-txt"><?php echo get_field('qmi_floorplan') ?> Floorplan</h2>
    <?php if(get_field('qmi_plan_download') != ''): $_brochure = get_field('qmi_plan_download'); ?>
      <a href="<?php echo $_brochure['url'] ?>" title="<?php echo get_field('qmi_floorplan') ?> Floorplan" class="btn ltgreen-btn">download brochure</a>
    <?php endif; ?>
  </div>
  <div class="floorplan-container desktop">
    <?php foreach($_fpImages as $_fpImage): ?>
    <div class="fp-image">
      <img src="<?php echo $_fpImage['url'] ?>" alt="<?php echo $_fpImage['alt'] ?>" class="img-fluid aligncenter" />
      <p class="image-caption"><?php echo $_fpImage['title'] ?></p>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="floorplan-container mobile">
    <div id="fpimage-carousel" class="carousel slide" data-ride="carousel" data-interval="10000">
      <div class="carousel-inner">
        <?php foreach($_fpImages as $_fpImage): ?>
          <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
            <img src="<?php echo $_fpImage['url'] ?>" alt="<?php echo $_fpImage['alt'] ?>" class="img-fluid aligncenter" />
            <p class="image-caption"><?php echo $_fpImage['title'] ?></p>
          </div>
        <?php $_s++; endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#fpimage-carousel" role="button" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
      <a class="carousel-control-next" href="#fpimage-carousel" role="button" data-slide="next"><i class="fas fa-chevron-right"></i></a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if(get_field('qmi_virtual_tour') != ''): ?>
<section class="floorplan-tour floorplan-section">
  <div class="floorplan-top">
    <h2 class="ltgreen-txt"><?php echo get_field('qmi_floorplan') ?> Virtual Tour</h2>
  </div>
  <div class="tour-container floorplan-container">
    <iframe src="<?php echo get_field('qmi_virtual_tour') ?>/?nt=1" class="tour-frame"></iframe>
  </div>
</section>
<?php endif; ?>

<?php endwhile; endif; //end loop ?>

<?php
  $_comm= new WP_Query();
  $_args = array(
    'post_type'       => 'page',
    'post_status'     => 'publish',
    'posts_per_page'  => 1,
    'orderby'         => 'title',
    'name'            => $_terms[0]->slug,
  );
  $_comm->query($_args);
?>

<?php if($_comm->have_posts()): while($_comm->have_posts()): $_comm->the_post(); $_commLogo = get_field('community_logo') ?>
<section class="floorplan-community floorplan-section">
  <div class="community-container">
    <div class="community-container-left">
      <h3 class="ltgreen-txt"><?php the_title() ?></h3>
      <h4 class="gray-txt">Sales Office and Model Homes</h4>
      <?php echo get_field('community_address') ?>
    </div>
    <div class="community-container-right">
      <img src="<?php echo $_commLogo['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
    </div>
  </div>
</section>
<?php endwhile; endif; ?>




<?php get_footer() ?>
