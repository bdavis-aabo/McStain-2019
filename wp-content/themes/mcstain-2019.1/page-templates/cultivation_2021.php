<?php /* Template Name: Page - Cultivation 2021 */ ?>

<?php get_header(); ?>


  <?php if(have_posts()): while(have_posts()): the_post(); $_poster = get_the_post_thumbnail_url(get_the_ID(), 'poster'); ?>
  <section class="section community-heroimage">
    <video loop autoplay muted style="background: url('<?php echo esc_url($_poster) ?>') no-repeat center top; background-size: cover; object-fit: fill; width:100%;" preload="none" id="cultivation-video">
      <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.mp4" type="video/mp4">
      <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.webm" type="video/webm">
      <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.ogv" type="video/ogv">
    </video>
  </section>

  <section class="section community-quicklinks">
    <div class="quicklink-container">
      <ul class="quicklinks">
        <li><a href="#homeplans">Home Plans</a></li>
        <li><a href="#design">Design Suites</a></li>
        <li><a href="#about">About <?php the_title() ?></a></li>
        <li><a href="#sitemap">Site Map</a></li>
        <li><a href="#directions">Directions</a></li>
      </ul>
    </div>
  </section>

  <?php get_template_part('cultivation/three-bees') ?>

  <section class="section community-content-section">
    <div class="community-content-container">
      <div class="community-contents">
        <?php the_content() ?>

        <?php if(is_page('arras-park')): ?>
        <p>
          <a href="https://configurator.creatomus.com/project/arraspark-frontload?tab=index" target="_blank" title="Arras Park - Build Your Home Online Tool" class="btn cultivation-btn ltgreen-btn" onClick="ga('send', 'event', 'general', 'click', 'ap_homebuilder_btn');">Design Your Home Online</a>
          <a href="/communities/arras-park/virtual-tour" target="_blank" title="Arras Park Virtual Tour" class="btn cultivation-btn ltgreen-btn" onClick="ga('send', 'event', { eventCategory: 'general', eventAction: 'click', eventLabel: 'virtual_tour_btn'});">Take a 360&deg; Virtual Tour</a>
          <a href="https://vr360experience.norris-design.com/arraspark-salescenter/" title="Arras Park Virtual Sales Center" target="_blank" class="btn cultivation-btn ltgreen-btn" onClick="ga('send', 'event', 'general', 'click', 'virtual_sales_btn');">Visit the Virtual Sales Center</a>
        </p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="section community-collections" id="homeplans">
    <div class="community-collection-container">
      <?php
        if(is_page('arras-park')):
          get_template_part('cultivation/cultivation-models-ap');
        else:
          get_template_part('cultivation/cultivation-models-2021');
        endif;
      ?>
    </div>
  </section>

  <?php //get_template_part('cultivation/cultivation-design') ?>

  <section class="section community-design-suites" id="design">
    <div class="design-suite-container">
      <div class="design-suite-content">
        <?php echo get_field('design_content'); ?>
      </div>

      <?php if(have_rows('design_suite_downloads') != ''): ?>
      <ul class="design-suite-files">
        <?php while(have_rows('design_suite_downloads')): the_row(); $_file = get_sub_field('design_suite_file'); ?>
          <li class="design-file" id="<?php echo strtolower(str_replace(' ', '-', get_sub_field('design_suite_name'))) ?>">
            <a href="<?php echo $_file['url']; ?>" title="<?php echo get_sub_field('design_suite_name'); ?>"><?php echo get_sub_field('design_suite_name'); ?></a>
          </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>

      <?php if(get_field('design_images') != ''): $_designImages = get_field('design_images'); ?>
      <div class="design-suite-images">
        <?php foreach($_designImages as $_image): ?>
        <figure><img src="<?php echo $_image['url'] ?>" class="img-fluid" alt="design suite image" /></figure>
        <?php endforeach; ?>
      </div>

      <?php endif; ?>
    </div>
  </section>

  <section class="section community-amenities" id="about">
    <?php get_template_part('cultivation/cultivation-amenities2021') ?>
  </section>

  <?php if(get_field('cultivation_map_url') != ''): get_template_part('cultivation/cultivation-sitemap2021'); endif; ?>

  <section class="section community-location" id="directions">
    <div class="community-location-container">
      <div class="community-map">
        <?php
        if($post->post_name == 'painted-prairie'):
          echo do_shortcode('[wpgmza id="4"]');
        elseif($post->post_name == 'arras-park'):
          echo do_shortcode('[wpgmza id="5"]');
        endif;
        ?>
      </div>

      <div class="community-location-information ltgreen-bg">
        <div class="location-information">
          <h2 class="white-txt">There's much more to get you excited.</h2>
          <?php echo get_field('community_address') ?>

          <button class="btn dkblue-btn lightbox-trigger base-contact"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> sign up for more info</button><br/><br/>
          <?php if(is_page('arras-park')): ?>
            <a href="https://www.google.com/maps/dir/39.883354,-104.951735/39.8836339,-104.9512951/@39.8477047,-104.9976304,13z/" class="btn dkblue-btn" target="_blank"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> get directions</a>
          <?php elseif(is_page('painted-prairie')): ?>
            <a href="https://www.google.com/maps/dir//21511+E+60th+Ave,+Aurora,+CO+80019/@39.8058817,-104.7388692,17z/" class="btn dkblue-btn" target="_blank"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> get directions</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>


  <?php endwhile; endif; ?>


<?php get_footer(); ?>
