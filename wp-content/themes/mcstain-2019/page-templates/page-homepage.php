<?php /* Template Name: Page - Homepage */ ?>

<?php get_header() ?>

  <?php get_template_part('home/homepage-hero') ?>

  <section class="homepage-content homepage-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-11">
          <div class="homepage-leftcolumn">
            <?php while(have_posts()): the_post() ?>
              <h1 class="page-title aqua-txt"><?php the_title() ?></h1>
              <?php the_content() ?>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="right-btn nomobile">
      <div class="box">
        <div class="box-contents aqua-bg">
          <button class="btn aqua-btn btn-block lightbox-trigger base-contact">
            <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
            <span class="text">First to know</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part('home/homepage-communities') ?>

  <?php get_template_part('home/homepage-map') ?>

  <?php get_template_part('home/homepage-manifesto') ?>

  <?php get_template_part('home/homepage-latest') ?>

<?php get_footer() ?>
