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

<?php // commented out until team page is built ?>
    <div class="right-btn nomobile">
      <a href="/mcstain-manifesto#manifesto-tabs" title="BeWell House, exclusively by McStain Neighborhoods">
        <img src="<?php bloginfo('template_directory') ?>/assets/images/bewell-btn.jpg" class="img-fluid" />
      </a>
    </div>

    <a href="/mcstain-manifesto#manifesto-tabs" title="BeWell House, exclusively by McStain Neighborhoods" class="sidebar-btn">
      <img src="<?php bloginfo('template_directory') ?>/assets/images/bewell-btn-mobile.jpg" class="img-fluid aligncenter" />
    </a>

  </section>

  <?php get_template_part('home/homepage-communities') ?>

  <?php get_template_part('home/homepage-map') ?>

  <?php get_template_part('home/homepage-manifesto') ?>

  <?php get_template_part('home/homepage-latest') ?>

<?php get_footer() ?>
