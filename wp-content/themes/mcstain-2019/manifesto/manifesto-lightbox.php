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
<section class="email-section members-mask manifesto-lightbox">
  <div class="email-section-header">
    <a class="close close-btn"><i class="fa fa-times"></i></a>
  </div>
  <?php while($_manifestoSlides->have_posts()): $_manifestoSlides->the_post() ?>
  <div class="manifesto-box" id="<?php echo $post->post_name ?>">
    <div class="manifesto-content <?php echo $post->post_name.'-contents' ?>">
    <?php if($post->post_name == 'excite'): ?>
      <h1 class="blue-txt"><?php echo get_field('manifesto_lightbox_title') ?></h1>
      <?php get_template_part('manifesto/manifesto-excite') ?>
    <?php elseif($post->post_name == 'place'): ?>
      <h1 class="ltgreen-txt"><?php echo get_field('manifesto_lightbox_title') ?></h1>
      <?php get_template_part('manifesto/manifesto-place') ?>
    <?php elseif($post->post_name == 'right'): ?>
      <h1 class="ltgreen-txt"><?php echo get_field('manifesto_lightbox_title') ?></h1>
      <?php get_template_part('manifesto/manifesto-right') ?>
    <?php elseif($post->post_name == 'home'): ?>
      <h1 class="ltgreen-txt"><?php echo get_field('manifesto_lightbox_title') ?></h1>
      <?php echo do_shortcode('[wpgmza id="1"]');
    else:
    ?>
      <h1 class="ltgreen-txt"><?php echo get_field('manifesto_lightbox_title') ?></h1>
      <?php get_template_part('manifesto/manifesto-contact'); ?>
    <?php endif; ?>
    </div>

  </div>
  <?php endwhile; ?>
</section>
<?php endif; wp_reset_query() ?>
