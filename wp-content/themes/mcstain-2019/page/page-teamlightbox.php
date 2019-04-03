<?php
  $_teamMembers = new WP_Query();
  $_args = array(
    'post_type' => 'team-members',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'menu_order'
  );
  $_teamMembers->query($_args);
?>

<section class="members-mask members-lightbox">
<?php while($_teamMembers->have_posts()): $_teamMembers->the_post() ?>
  <div class="teambio-lightbox" id="<?php echo $post->post_name . '-bio' ?>">
    <a class="close-btn"><i class="fas fa-times"></i></a>
    <div class="bio-top">
      <div class="bio-photo"><img src="https://placehold.it/450x450" alt="<?php the_title() ?>" class="aligncenter img-fluid" /></div>
      <div class="bio-name">
        <h1 class="ltgreen-txt"><?php the_title() ?></h1>
        <span class="bio-title"><?php echo get_field('member_title') ?></span>
        <?php echo get_field('member_bio') ?>
      </div>
    </div>
  </div>
<?php endwhile; wp_reset_query(); ?>
</section>
