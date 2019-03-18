<?php // Model Modals :) ?>
<?php if(have_rows('models')): ?>
<section class="cultivation-modals floorplan-mask">
  <?php while(have_rows('models')): the_row(); $_fpImage = get_sub_field('model_floorplan') ?>
    <div class="floorplan-lightbox" id="<?php echo strtolower(get_sub_field('model_name')) ?>">
      <a class="close close-btn"><i class="fa fa-times"></i></a>
      <img src="<?php echo $_fpImage['url'] ?>" class="img-fluid aligncenter" />
      <button class="btn gold-btn right-btn lightbox-close" data-model="<?php echo strtolower(get_sub_field('model_name')) ?>">
        <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> See more
      </button>
    </div>
  <?php endwhile; ?>
</section>
<?php endif; ?>
