<section class="email-section email-lightbox">
  <div class="email-section-header">
    <a class="close close-btn"><i class="fa fa-times"></i></a>
  </div>
  <div class="email-section-content">
    <div class="email-content base-form form">
      <?php get_template_part('forms/base-form') ?>
    </div>
    <div class="email-content model-form form" style="display: block !important;">
      <?php get_template_part('forms/floorplan-form') ?>
    </div>
    <div class="email-content design-form form">
      <?php get_template_part('forms/design-form') ?>
    </div>
    <div class="email-content realtor-form form">
      <?php get_template_part('forms/realtor-form') ?>
    </div>
  </div>
</section>
