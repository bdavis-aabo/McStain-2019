<?php if(have_rows('amenities')): ?>
<div class="amenities-tabs">
  <ul class="nav nav-tabs" id="amenitiesTabs" role="tablist">
  <?php $_t = 0; while(have_rows('amenities')): the_row(); ?>
    <li class="nav-item" role="presentation">
      <a class="nav-link <?php if($_t == 0): echo 'active'; endif; ?>" data-toggle="tab" href="<?php echo '#' . strtolower(get_sub_field('amenities_title')); ?>" role="tab" aria-controls="<?php echo strtolower(get_sub_field('amenities_title')) ?>"
        aria-selected="<?php if($_t == 0): echo 'true'; else: echo 'false'; endif; ?>"><?php echo get_sub_field('amenities_title') ?></a>
    </li>
  <?php $_t++; endwhile; ?>
  </ul>

  <div class="tab-content" id="amenitiesTabContent">
    <?php $_c = 0; while(have_rows('amenities')): the_row(); ?>
    <div class="tab-pane fade <?php if($_c == 0): echo 'show active'; endif; ?>" id="<?php echo strtolower(get_sub_field('amenities_title')); ?>" role="tabpanel" aria-labeledby="<?php echo strtolower(get_sub_field('amenities_title')); ?>-tab">
      <?php echo get_sub_field('amenities_content') ?>
    </div>
    <?php $_c++; endwhile; ?>
  </div>
</div>
<?php endif; ?>
