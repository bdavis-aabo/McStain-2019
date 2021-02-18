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


<?php /* if(have_rows('amenities')): ?>
<div class="amenities-tabs">
  <ul class="nav nav-tabs" id="amenitiesTabs" role="tablist">
  <?php $_t = 0; while(have_rows('amenities')): the_row();
    $_tabID = str_replace(' ', '', strtolower(get_sub_field('amenities_title')));
  ?>
    <li class="nav-item" role="presentation">
      <a class="nav-link <?php if($_t == 0): echo 'active'; endif; ?>" data-toggle="tab" href="<?php echo '#' . $_tabID; ?>" role="tab" aria-controls="<?php echo $_tabID ?>" aria-selected="<?php if($_t == 0): echo 'true'; else: echo 'false'; endif; ?>">
        <?php echo get_sub_field('amenities_title') ?>
      </a>
    </li>
  <?php $_t++; endwhile; ?>
  </ul>

  <div class="tab-content" id="amenitiesTabContent">
    <?php $_c = 0; while(have_rows('amenities')): the_row();
      $_tabID = str_replace(' ', '', strtolower(get_sub_field('amenities_title')));
      $_image = get_sub_field('amenities_image');
    ?>
    <div class="tab-pane fade <?php if($_c == 0): echo 'active'; endif; ?>" id="<?php echo $_tabID; ?>" role="tabpanel" aria-labeledby="<?php echo strtolower(get_sub_field('amenities_title')); ?>-tab">
      <div class="tab-image">
        <img src="<?php echo $_image['url'] ?>" alt="" class="img-fluid" />
      </div>

      <?php echo get_sub_field('amenities_content') ?>
    </div>
    <?php $_c++; endwhile; ?>
  </div>
</div>
<?php endif; ?>
*/ ?>
