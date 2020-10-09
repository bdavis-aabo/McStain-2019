<section class="email-section email-lightbox">
  <div class="email-section-header">
    <a class="close close-btn"><i class="fa fa-times"></i></a>
  </div>

  <div class="email-section-content">
    <?php if(!is_front_page() && !is_page('home')): ?>
    <div class="email-content base-form form">
      <?php get_template_part('forms/base-form') ?>
    </div>
    <?php endif; ?>
    <div class="email-content realtor-form form">
      <?php get_template_part('forms/realtor-form') ?>
    </div>
  </div>
</section>
