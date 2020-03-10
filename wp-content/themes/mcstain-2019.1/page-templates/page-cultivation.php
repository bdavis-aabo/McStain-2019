<?php /* Template Name: Page - Cultivation */ ?>

<?php get_header() ?>

  <div class="community-container">
  <?php if(have_posts()): while(have_posts()): the_post(); $_poster = get_the_post_thumbnail_url(get_the_ID(), 'poster'); ?>
    <section class="community-heroimage">
      <video loop autoplay muted style="background: url('<?php echo esc_url($_poster) ?>') no-repeat 0 0" poster="<?php echo esc_url($_poster) ?>" id="cultivation-video">
        <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.mp4" type="video/mp4">
        <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.webm" type="video/webm">
        <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.ogv" type="video/ogv">
      </video>
    </section>

    <?php get_template_part('cultivation/cultivation-intro') ?>
    <?php get_template_part('cultivation/cultivation-models_new') ?>

    <?php if(get_field('cultivation_map_url') != ''): get_template_part('cultivation/cultivation-sitemap'); endif; ?>

    <?php get_template_part('cultivation/cultivation-design') ?>

    <?php if(have_rows('amenities')): ?>
    <section class="community-amenities">
      <div class="container">
        <div class="row row-eq-height">
          <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="amenities-container">
              <?php if(is_page('painted-prairie')): ?>
              <h1 class="amenities-title orange-txt">Fresh. Urban living.</h1>
              <?php else: ?>
              <h1 class="amenities-title orange-txt">You're going places</h1>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <?php get_template_part('cultivation/cultivation-amenities') ?>
    </section>
    <?php endif; ?>
  <?php endwhile; endif; ?>

    <section class="community-closing">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3 class="closing-title green-txt">There's much more to get you excited.</h3>
            <p><a class="content-link lightbox-trigger base-contact">I want to stay in touch and be among the first to know about <?php the_title() ?>.</a></p>

            <?php if(get_field('community_address') != ''): ?>
            <div class="community-address">
              <?php echo ucwords(str_replace('-', ' ', $post->post_name)); ?> is located at:<br />
              <?php echo get_field('community_address') ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="homepage-map community-map">
      <?php
      if($post->post_name == 'lost-creek-farm'):
        echo do_shortcode('[wpgmza id="2"]');
      elseif($post->post_name == 'west-grange'):
        echo do_shortcode('[wpgmza id="3"]');
      elseif($post->post_name == 'painted-prairie'):
        echo do_shortcode('[wpgmza id="4"]');
      elseif($post->post_name == 'arras-park'):
        echo do_shortcode('[wpgmza id="5"]');
      endif;
      ?>
    </section>

  </div>


<?php get_footer() ?>
