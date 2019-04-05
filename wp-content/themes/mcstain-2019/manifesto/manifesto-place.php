<?php //get all children of 'communities' page
$_communityParent = get_page_by_path('communities');

//var_dump($_communityParent);
$_communities = new WP_Query();
$_args = array(
  'post_type' => 'page',
  'post_status' => 'publish',
  'order' => 'asc',
  'orderby' => 'menu_order',
  'post_parent' =>  $_communityParent->ID,
  'post__not_in'  =>  array(160)
);
$_communities->query($_args);
$_c = 1;
?>


<?php if($_communities->have_posts()): ?>
<section class="community-manifesto-section">
  <div class="excite-container place-container">
    <?php while($_communities->have_posts()): $_communities->the_post();
      $_logo = get_field('community_logo');
      $_details = get_field('community_details');
      $_models = get_field('models');
    ?>
    <article class="community-information <?php echo $post->post_name.'-section' ?>">
      <div class="left-column community-logo-container">
        <img src="<?php echo $_logo['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
      </div>
      <div class="right-column community-info">
        <?php get_template_part('manifesto/manifesto-community_titles') ?>

        <?php if($_details): ?>
        <div class="community-details gray-bg">
          <table class="community-table">
            <tr>
              <td><strong>Location:</strong><br/><?php echo $_details['community_location'] ?></td>
              <td><strong>Square Footage*:</strong><br/><?php echo $_details['community_square_footage'] ?></td>
              <td><strong>Starting At:</strong><br/><?php echo $_details['community_price'] ?></td>
              <td><strong>Home Style:</strong><br/><?php echo $_details['community_style'] ?></td>
            </tr>
          </table>
        </div>
      <?php endif; ?>
      </div>
    </article>
    <?php endwhile; ?>
  </div>
</section>
<?php endif; ?>
