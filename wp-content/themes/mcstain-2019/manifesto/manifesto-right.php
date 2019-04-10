<?php
  $_testimonials = new WP_Query();
  $_args = array(
    'post_type' => 'testimonials',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'desc',
    'orderby' => 'date'
  );
  $_testimonials->query($_args);
?>

<section class="testimonial-container">
  <div class="testimonial-inner">
    <ul class="testimonials">
      <?php while($_testimonials->have_posts()): $_testimonials->the_post() ?>
      <li>
        <span class="quote"><i class="fas fa-quote-left"></i></span><?php the_content() ?>
      </li>
      <?php endwhile; wp_reset_query(); ?>
    </ul>
  </div>
</section>
