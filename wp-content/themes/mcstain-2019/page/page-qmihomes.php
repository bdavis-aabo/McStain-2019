<?php
  //query to get communities listed by menu_order
  $_communityParent = get_id_by_slug('communities');
  $_communities = new WP_Query();
  $_args = array(
    'post_type' => 'page',
    'post_status' => 'publish',
    'order' => 'asc',
    'orderby' => 'menu_order',
    'post_parent' =>  $_communityParent,
    'post__not_in'  =>  array(160)
  );
  $_communities->query($_args);
?>

  <?php while($_communities->have_posts()): $_communities->the_post(); $_logo = get_field('community_logo'); ?>
  <section class="inventory-section <?php echo $post->post_name.'-inventory' ?>">
    <div class="container">
      <div class="row">
        <div class="col-4 col-md-2">
          <div class="community-logo">
            <img src="<?php echo $_logo['url'] ?>" class="img-fluid" alt="<?php the_title() ?>" />
          </div>
        </div>
        <div class="col-8 col-md-10">
          <div class="community-details">
            <p>
              <strong><?php the_title() ?></strong><br/>
              <?php
              if(get_field('community_address') != ''):
                echo get_field('community_address');
              else:
                if($post->post_name == 'painted-prairie'): echo 'Homes Available December 2019'; endif;
              endif;
              ?>
            </p>
          </div>
        </div>
      </div>

      <?php
        //get available inventory (or) print message "nothing available"
        $_args = array(
          'post_type'       =>  'quickmoves',
          'community'         =>  $post->post_name,
          'orderby'         =>  'menu_order',
          'order'           =>  'ASC',
          'posts_per_page'  =>  4,
          'hide_empty'      =>  1
        );
        $_quickmoves = new WP_Query($_args);
        $_community = ucwords(str_replace('-', ' ',$post->post_name));
          switch($_community){
            case '':
            $_projectID = '9882'; break;
            case 'Lost Creek Farm':
            $_projectID = '9883'; break;
            case 'Harvest Ridge':
            $_projectID = '9877'; break;
            case 'Painted Prairie':
            $_projectID = '10512'; break;
            case 'Arras Park':
            $_projectID = '10724'; break;
          }
      ?>

      <?php if($_quickmoves->have_posts()): ?>
      <div class="row row-eq-height">
        <?php while($_quickmoves->have_posts()): $_quickmoves->the_post(); $_homeImage = get_field('qmi_image'); ?>
        <div class="col-12 col-md-4">
          <div class="qmi-home">
            <img src="<?php echo $_homeImage['url'] ?>" class="aligncenter img-fluid" />
            <h2 class="home-name"><?php echo get_field('qmi_floorplan') ?></h2>
            <span class="address-price"><?php echo get_field('qmi_address') ?> | <strong><?php echo '$' . get_field('qmi_price') ?></strong></span>
            <p><?php echo get_field('qmi_available') ?></p>

            <p class="details">
            <?php echo get_field('qmi_square_footage') . ' sq ft | ' . get_field('qmi_bedrooms') . ' beds | ' . get_field('qmi_bathrooms') . ' bath<br/>' .
								get_field('qmi_garage') ?>
            </p>
						<a class="builder-btn ltgreen-btn" href="<?php the_permalink() ?>">View Home</a>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php else: ?>
      <div class="row">
        <div class="col-12">
          There are no quick move-in inventory homes currently available in this community.
        </div>
      </div>
      <?php endif; rewind_posts(); ?>
      <div class="gray-line"></div>
    </div>
  </section>
<?php endwhile; wp_reset_query(); ?>
