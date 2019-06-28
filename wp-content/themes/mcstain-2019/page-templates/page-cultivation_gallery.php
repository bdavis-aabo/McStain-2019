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
        <div class="row">
          <div class="col-12">
            <?php echo do_shortcode('[envira-gallery slug="'.$post->post_name.'"]') ?>
          </div>
        </div>
      </div>
    </section>
  <?php endwhile; endif; ?>
  </div>

<?php get_footer() ?>
