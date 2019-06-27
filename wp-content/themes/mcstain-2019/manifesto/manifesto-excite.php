<?php
  $_communities = new WP_Query();
  $_args = array(
    'post_type' => 'community_slides',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'menu_order'
  );
  $_communities->query($_args);
?>

<?php if($_communities->have_posts()): ?>
<section class="community-manifesto-section">
  <div class="excite-container">
    <div class="excite-list">
      <?php while($_communities->have_posts()): $_communities->the_post(); $_image = get_field('community_rendering'); ?>
        <?php if($post->post_name != 'arras-park'): ?>
        <button class="excite-btn" onclick="window.location.href = '<?php echo get_field('community_link')?>';">
          <div class="excite-image"><img src="<?php echo $_image['url'] ?>" alt="<?php the_title() ?>" class="img-fluid aligncenter"/></div>
          <div class="excite-description"><?php echo get_field('community_description') ?></div>
        </button>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; wp_reset_query(); ?>
