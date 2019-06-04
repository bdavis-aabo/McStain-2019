<?php // Default Page Template ?>

<?php
  $_form = $_GET['form'];
  $_community = $_GET['community'];
  //var_dump($_model);

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

            <?php if($_community != ''): ?>
            <p class="download-link">Download the floorplan brochures of your choice below:</p>
            <ul class="brochure-list">
              <?php if($_community == 'lostcreekfarm'): ?>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/myriad-brochure.pdf">Myriad</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/perspective-brochure.pdf">Perspective</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/scene-brochure.pdf">Scene</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/panorama-brochure.pdf">Panorama</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/aspect-brochure.pdf">Aspect</a></li>
              <?php elseif($_community == 'westgrange'): ?>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/concerto-brochure.pdf">Concerto</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/interlude-brochure.pdf">Interlude</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/virtuoso-brochure.pdf">Virtuoso</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/harmony-brochure.pdf">Harmony</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/serenade-brochure.pdf">Serenade</a></li>
              <?php endif; ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer() ?>
