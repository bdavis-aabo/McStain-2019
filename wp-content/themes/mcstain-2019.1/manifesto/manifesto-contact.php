<div class="lightbox-columns">
  <div class="lightbox-left">
    <?php if(is_active_sidebar('contact-address')): dynamic_sidebar('contact-address'); endif; ?>
    <div class="page-social">
      <?php get_template_part('page/page-social') ?>
    </div>
  </div>
  <div class="lightbox-right">
    <?php echo do_shortcode('[contact-form-7 id="1700" title="Contact Us Form"]'); ?>
  </div>
</div>
