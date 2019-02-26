<?php /* Template Name: Page - Homepage */ ?>

<?php get_header() ?>

  <?php get_template_part('home/homepage-hero') ?>

  <section class="homepage-content">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-9">
          <div class="homepage-leftcolumn">
          <?php while(have_posts()): the_post() ?>
            <h1 class="page-title blue-txt"><?php the_title() ?></h1>
            <?php the_content() ?>
          <?php endwhile; ?>
          </div>
        </div>

        <div class="col-12 col-md-3">
          button goes here
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part('home/homepage-communities') ?>

  <?php get_template_part('home/homepage-map') ?>

  <?php get_template_part('home/homepage-manifesto') ?>

  <?php get_template_part('home/homepage-latest') ?>


<?php get_footer() ?>
