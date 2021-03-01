<?php
$_bees = new WP_Query();
$_args = array(
  'post_type'      => 'page',
  'post_status'    => 'publish',
  'posts_per_page' => 1,
  'pagename'       => 'bewell-house-by-mcstain/bewell-principles'
);
$_bees->query($_args);
?>

<?php if($_bees->have_posts()): ?>
<section class="section three-bees">
  <div class="callout-container bee-container">
    <?php while($_bees->have_posts()): $_bees->the_post(); ?>
    <div class="bee-contents ltgreen-bg">
      <div class="bee-content">
        <figure>
          <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/besmart-logo.png" alt="BeSmart by McStain" class="img-fluid aligncenter" />
        </figure>
        <?php echo get_field('besmart'); ?>
        <a href="/mcstain-manifesto" class="bee-link">
          <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> learn more
        </a>
      </div>
    </div>
    <div class="bee-contents yellow-bg">
      <div class="bee-content">
        <figure>
          <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/besolar-logo.png" alt="BeSolar by McStain" class="img-fluid aligncenter" />
        </figure>
        <?php echo get_field('besolar'); ?>
        <a href="/bewell-house-by-mcstain" class="bee-link">
          <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> learn more
        </a>
      </div>
    </div>
    <div class="bee-contents ltblue-bg">
      <div class="bee-content">
        <figure>
          <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/bewell-logo.png" alt="BeWell by McStain" class="img-fluid aligncenter" />
        </figure>
        <?php echo get_field('bewell'); ?>
        <a href="/bewell-house-by-mcstain" class="bee-link">
          <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> learn more
        </a>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
  <div class="excited-callout">
    <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/get-excited.png" alt="it's time to get excited" class="img-fluid alignright" />
  </div>
</section>
<?php endif; wp_reset_query() ?>
