<?php /* Template Name: Page - Contact */ ?>

<?php get_header() ?>

  <section class="blank-section"></section>

  <section class="homepage-content homepage-section contact-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php while(have_posts()): the_post() ?>
          <div class="page-contents">
            <?php the_content() ?>
          </div>
          <?php endwhile; ?>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-3">
          <div class="left-column-container">
            <?php if(is_active_sidebar('contact-address')): dynamic_sidebar('contact-address'); endif; ?>

            <div class="page-social">
              <?php get_template_part('page/page-social') ?>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-9">
          <div class="right-column-container">
            <?php echo do_shortcode('[contact-form-7 title="Contact Us Form"]') ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="location-map-section">
    <div class="ltgreen-bg map-title">
      <h1 class="white-txt">Where do you want to live.
        <span class="arrows">
          <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>
        </span>
      </h1>
    </div>

    <div class="location-map-container">
      <?php echo do_shortcode('[wpgmza id="1"]') ?>
    </div>
  </section>

<?php get_footer() ?>
