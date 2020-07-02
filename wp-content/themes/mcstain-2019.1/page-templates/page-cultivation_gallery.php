<?php /* Template Name: Page - Cultivation Gallery */ ?>

<?php get_header() ?>

  <div class="community-container">
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <section class="community-introduction community-photogallery">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-10 col-lg-10">
            <div class="community-details">
              <?php the_content() ?>
            </div>
          </div>
          <div class="col-md-3 col-lg-3">&nbsp;</div>
        </div>
        <?php if(!is_page('painted-prairie-gallery')): ?>
        <div class="row">
          <div class="col-12">
            <?php if(do_shortcode('[envira-gallery slug="'.$post->post_name.'"]') != ''):
              echo do_shortcode('[envira-gallery slug="'.$post->post_name.'"]');
            endif; ?>
          </div>
        </div>
        <?php else: ?>
        <div class="row">
          <div class="col-12">
            <?php echo get_field('page_sub_content') ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endwhile; endif; ?>
  </div>

<?php get_footer() ?>
