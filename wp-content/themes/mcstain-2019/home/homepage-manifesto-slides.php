<?php
  $_manifestoSlides = new WP_Query();
  $_args = array(
    'post_type' => 'manifesto_messages',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'asc',
    'orderby' => 'menu_order'
  );
  $_manifestoSlides->query($_args);
?>

<?php if($_manifestoSlides->have_posts()): ?>
<section class="manifesto-slider homepage-section">
  <div id="manifesto-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <?php $_s = 0; while($_manifestoSlides->have_posts()): $_manifestoSlides->the_post();
      $_slideImage = get_field('manifesto_home_slide');
      $_smallSlideImage = get_field('manifesto_mobile_slide');
    ?>
      <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
        <picture>
          <source media="(max-width: 375px)" srcset="<?php echo $_smallSlideImage['url'] ?>">
          <img src="<?php echo $_slideImage['url'] ?>" class="img-fluid aligncenter" alt="<?php the_title() ?>">
        </picture>

      </div>
    <?php $_s++; endwhile; ?>
    </div>

    <?php rewind_posts() ?>

    <ol class="carousel-indicators">
    <?php $_i = 0; while($_manifestoSlides->have_posts()): $_manifestoSlides->the_post() ?>
      <li data-target="#manifesto-slider" data-slide-to="<?php echo $_i ?>" <?php if($_i == 0): ?>class="active"<?php endif; ?>></li>
    <?php $_i++; endwhile; wp_reset_query(); ?>
    </ol>
  </div>
</section>
<?php endif;  ?>
