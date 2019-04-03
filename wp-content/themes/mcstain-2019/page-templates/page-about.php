<?php /* Template Name: Page - About */ ?>
<?php get_header() ?>

  <section class="manifesto-heroimage homepage-heroimage">
    <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid aligncenter')); ?>
  </section>

  <section class="homepage-content homepage-section manifesto-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-11">
          <div class="homepage-leftcolumn">
            <?php while(have_posts()): the_post() ?>
              <?php the_content() ?>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

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

  <?php if($_teamMembers->have_posts()): ?>
  <section class="members-section">
    <div class="container-fluid">
      <div class="row">
      <?php while($_teamMembers->have_posts()): $_teamMembers->the_post() ?>
        <div class="col-6 col-md-2">
          <div class="team-member">
            <a class="team-lightbox-trigger" data-target="<?php echo '#' . $post->post_name . '-bio' ?>" title="<?php the_title() ?>">
              <img src="https://placehold.it/450x450" alt="<?php the_title() ?>" class="img-fluid" />
            </a>
          </div>
        </div>
      <?php endwhile; ?>
      </div>
    </div>
  </section>

<?php endif; wp_reset_query(); ?>


<?php get_footer() ?>
