<?php // Default Page Template ?>

<?php
  $_form = $_GET['form'];
  $_model = $_GET['model'];
  var_dump($_model);

?>


<?php get_header() ?>

  <section class="manifesto-heroimage homepage-heroimage">
    <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid aligncenter')); ?>
    <div class="homepage-heroimage-caption">
      <?php if(is_page('thank-you')): ?><h1 class="caption-title">Thank You</h1><?php endif; ?>
      <!-- <p class="caption-content">Subheadline Here.</p> -->
    </div>
  </section>

  <section class="homepage-content homepage-section manifesto-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-11">
          <div class="homepage-leftcolumn">
            <?php while(have_posts()): the_post() ?>
              <?php the_content() ?>
            <?php endwhile; ?>

            <?php if($_model): ?>
            <p class="download-link">Download your copy of the <a href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_model.'-brochure.pdf' ?>" target="_blank"><?php echo ucfirst($_model) ?> Floorplan Brochure</a>.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer() ?>
