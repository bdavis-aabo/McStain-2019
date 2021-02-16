<?php /* Template Name: Page - Cultivation 2021 */ ?>

<?php get_header(); ?>


  <?php if(have_posts()): while(have_posts()): the_post(); $_poster = get_the_post_thumbnail_url(get_the_ID(), 'poster'); ?>
  <section class="section community-heroimage">
    <video loop autoplay muted style="background: url('<?php echo esc_url($_poster) ?>') no-repeat 0 0" poster="<?php echo esc_url($_poster) ?>" id="cultivation-video">
      <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.mp4" type="video/mp4">
      <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.webm" type="video/webm">
      <source src="<?php bloginfo('stylesheet_directory') ?>/assets/images/video/<?php echo $post->post_name ?>.ogv" type="video/ogv">
    </video>
  </section>

  <?php get_template_part('cultivation/three-bees') ?>

  <section class="section community-content-section">
    <div class="community-content-container">
      <div class="community-contents">
        <?php the_content() ?>
      </div>
    </div>
  </section>

  <section class="section community-collections">
    <div class="community-collection-container">
      <?php
        if($post->post_name == 'arras-park'):
          get_template_part('cultivation/cultivation-models-ap');
        else:
          get_template_part('cultivation/cultivation-models_new');
        endif;
      ?>
    </div>
  </section>

  <?php //get_template_part('cultivation/cultivation-design') ?>

  <section class="section community-design-suites">
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

      design suite gallery.
    </div>
  </section>

  <section class="section community-amenities">
    <div class="amenities-container">
      <?php
        /* Amenities slider -> activated by buttons below
          -> pull each tab contents
        */
      ?>
    </div>
  </section>

  <section class="section community-loaction">
    <div class="community-location-container">
      <div class="community-map">map</div>

      <div class="community-location-information ltgreen-bg">
        <h2 class="white-txt">There's much more to get you excited.</h2>
        <?php echo get_field('community_address') ?>
      </div>
    </div>
  </section>


  <?php endwhile; endif; ?>


<?php get_footer(); ?>
