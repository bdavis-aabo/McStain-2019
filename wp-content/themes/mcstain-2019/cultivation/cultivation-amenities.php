<?php if(have_rows('amenities')): ?>
<div class="amenities-slider">
  <div id="carousel-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php $_r = 0; while(have_rows('amenities')): the_row(); $_image = get_sub_field('amenities_image');?>
      <?php //if($_r == 0): comment out at launch ?>
      <div class="carousel-item <?php if($_r == 0): echo 'active'; endif; ?>">
        <picture>
          <source media="(max-width: 667px)" srcset="<?php echo $_image['sizes']['mobile_land'] ?>">
          <img src="<?php echo $_image['url'] ?>" alt="" class="img-fluid aligncenter" />
        </picture>
        <div class="carousel-caption">
          <h2 class="caption-title"><?php echo get_sub_field('amenities_title') ?></h2>
          <div class="caption-content"><?php echo get_sub_field('amenities_content') ?></div>
          <button class="btn orange-btn sidebar-btn lightbox-trigger amenities-btn">
            <span class="arrows">
              <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>
            </span>
            <span class="text"><?php echo get_sub_field('amenities_button') ?></span>
          </button>
        </div>
      </div>
    <?php //endif; ?>
    <?php $_r++; endwhile; ?>


    </div>
  </div>
</div>
<?php endif; //get_rows ?>
