<?php
  $_uriPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $_uriSegments = explode('/', $_uriPath);

  $_community = new WP_Query();
  $_args = array(
    'post_type'      => 'page',
    'post_status'    => 'publish',
    'name'       => $_uriSegments[2],
  );
  $_community->query($_args);
?>

  <?php if($_community->have_posts()): ?>
  <section class="section community-location" id="directions">
    <div class="community-location-container">
    <?php while($_community->have_posts()): $_community->the_post() ?>
      <div class="community-map">
        <?php
        if($post->post_name == 'painted-prairie'):
          echo do_shortcode('[wpgmza id="4"]');
        elseif($post->post_name == 'arras-park'):
          echo do_shortcode('[wpgmza id="5"]');
					elseif($post->post_name == 'westerly'):
						echo do_shortcode('[wpgmza id="9"]');
					elseif($post->post_name == 'west-grange'):
						echo do_shortcode('[wpgmza id="10"]');
        endif;
        ?>
      </div>

      <div class="community-location-information ltgreen-bg">
        <div class="location-information">
          <h2 class="white-txt">There's much more to get you excited.</h2>
          <?php echo get_field('community_address') ?>

          <button class="btn dkblue-btn lightbox-trigger base-contact"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> sign up for more info</button>
        </div>
      </div>
      <?php endwhile; wp_reset_query(); ?>
    </div>
  </section>
  <?php endif; ?>
