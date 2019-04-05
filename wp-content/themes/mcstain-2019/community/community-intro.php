<?php
$_slides = new WP_Query();
$_args = array(
  'post_type' => 'community_slides',
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'name' =>  $post->post_name
);
$_slides->query($_args);

var_dump($_args);
?>

      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="community-introduction">
          <?php while($_slides->have_posts()): $_slides->the_post(); ?>
            <h2 class="ltgreen-txt"><a href="<?php echo get_field('community_link') ?>"><?php the_title() ?></a></h2>
            <?php the_content() ?>
          <?php endwhile; $_slides->reset_postdata(); ?>
          </div>
        </div>
        <div class="col-4"></div>
      </div>
