<?php
  $_manifestoPage = new WP_Query();
  $_args = array(
    'post_type' => 'page',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'name'  =>  'mcstain-manifesto',
  );
  $_manifestoPage->query($_args);
?>
<?php if($_manifestoPage->have_posts()): while($_manifestoPage->have_posts()): $_manifestoPage->the_post() ?>
<section class="homepage-manifesto homepage-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-11">
        <div class="homepage-leftcolumn">
          <h1 class="section-title green-txt"><?php the_title() ?></h1>
          <?php echo get_field('page_sub_content') ?>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <div class="right-btn nomobile">
    <div class="box">
      <div class="box-contents green-bg">
        <a href="<?php the_permalink() ?>" class="btn green-btn btn-block">
          <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
          <span class="text">Give it a read</span>
        </a>
      </div>
    </div>
  </div>

  <a href="<?php the_permalink() ?>" class="btn green-btn sidebar-btn">
    <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> Give it a read
  </a>
</section>
<?php endwhile; endif; ?>

<?php wp_reset_query(); ?>

<?php get_template_part('home/homepage-manifesto-slides') ?>
