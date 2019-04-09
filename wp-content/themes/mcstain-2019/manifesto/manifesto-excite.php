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
    <ul class="excite-list">
    <?php while($_communities->have_posts()): $_communities->the_post() ?>
      <?php if($post->post_name != 'arras-park'): ?>
      <li class="excite-item">
        <a href="<?php echo get_field('community_link') ?>" title="<?php the_title() ?>"><?php echo get_field('community_description') ?></a>
      </li>
      <?php endif; ?>
    <?php endwhile; ?>
    </ul>
  </div>
</section>
<?php endif; wp_reset_query(); ?>
