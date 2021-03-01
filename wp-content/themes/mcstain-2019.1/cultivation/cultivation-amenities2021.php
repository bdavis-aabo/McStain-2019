<?php if(have_rows('amenities')): ?>
<div class="amenities-container carousel slide" id="amenitiesSlider">
  <div class="carousel-inner">
  <?php $_i = 0; while(have_rows('amenities')): the_row();
    $_tabID = str_replace(' ', '', strtolower(get_sub_field('amenities_title')));
    $_image = get_sub_field('amenities_image');
  ?>
    <div class="carousel-item <?php if($_i == 0): echo 'active'; endif; ?>" id="<?php echo $_i; ?>">
      <img src="<?php echo $_image['url'] ?>" alt="community images"  class="img-fluid" />

      <div class="amenities-content-container">
        <div class="amenities-content">
          <?php echo get_sub_field('amenities_content'); ?>
        </div>
      </div>
    </div>
  <?php $_i++; endwhile; ?>
  </div>

  <ol class="carousel-indicators">
    <?php $_d = 0; while(have_rows('amenities')): the_row(); ?>
    <li <?php if($_d == 0): echo 'class="active"'; endif; ?> data-target="#amenitiesSlider" data-slide-to="<?php echo $_d; ?>">
      <?php echo get_sub_field('amenities_title') ?>
    </li>
    <?php $_d++; endwhile; ?>
  </ol>

</div>
<?php endif; ?>
