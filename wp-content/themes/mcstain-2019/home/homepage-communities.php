<?php
  $_communities = new WP_Query();
  $_args = array(
    'post_type' => 'community_slides',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'menu_order'
  );
  $_communities->query($_args);
  $_s = 0;
?>

  <section class="homepage-communities homepage-section">
    <div id="community-slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      <?php while($_communities->have_posts()): $_communities->the_post();
        $_slideImage = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $_slideMobile = get_field('community_mobile_image');
        if($_slideImage != ''):
      ?>
        <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
            <picture>
              <source media="(max-width: 375px)" srcset="<?php echo $_slideMobile['url'] ?>">
              <img src="<?php echo $_slideImage ?>" alt="" class="img-fluid aligncenter" />
            </picture>
            <a href="<?php echo get_field('community_link') ?>" title="<?php the_title() ?>" class="btn ltgreen-btn community-btn">
              Tell me more
            </a>
        </div>
      <?php endif;
        $_s++; endwhile; ?>
      </div>

      <a href="#community-slider" class="carousel-control prev" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a href="#community-slider" class="carousel-control next" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
