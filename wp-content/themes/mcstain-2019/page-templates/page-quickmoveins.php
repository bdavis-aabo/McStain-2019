<?php /* Template Name: Page - Quick Move-Ins */ ?>

<?php get_header() ?>

  <section class="homepage-section homepage-heroimage">
    <img src="https://placehold.it/1600x650" class="img-fluid" alt="">
    <div class="homepage-heroimage-caption">
      <h1 class="caption-title">Quick Move-In Homes</h1>
      <p class="caption-content">New home inventory available now.</p>
    </div>
  </section>

  <section class="community-introduction">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10">
          <div class="community-details">
            <?php the_content() ?>
          </div>
        </div>
        <div class="col-md-3 col-lg-3">&nbsp;</div>
      </div>
    </div>
  </section>

  <?php get_template_part('page/page-qmihomes') ?>


<?php get_footer() ?>
