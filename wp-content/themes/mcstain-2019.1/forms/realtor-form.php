<?php
  $_realtorPage = new WP_Query();
  $_args = array(
    'post_type' => 'page',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'pagename' => 'realtor-information-center'
  );
  $_realtorPage->query($_args);

?>
<div class="email-form base-contactform realtor-contact">
  <?php if($_realtorPage->have_posts()): while($_realtorPage->have_posts()): $_realtorPage->the_post(); the_content(); endwhile; endif; ?>

  <div id="contact-form">
    <?php echo do_shortcode('[contact-form-7 id="1701" title="Realtor Information Form"]') ?>
  </div>
</div>

<?php wp_reset_query(); ?>
