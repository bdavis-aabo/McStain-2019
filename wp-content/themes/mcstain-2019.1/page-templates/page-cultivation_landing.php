<?php /* Template Name: Page - Cultivation Landing */ ?>

<?php get_header(); ?>

  <section class="section landing-section <?php echo $post->post_name . '-section' ?>">
    <?php if(is_page('virtual-tour')): ?>
    <div class="embed-responsive embed-responsive-1by1">
      <iframe class="embed-responsive-item" src="https://vr360experience.norris-design.com/arras_park/"></iframe>
    </div>
    <?php endif; ?>
  </section>

<?php get_footer(); ?>
