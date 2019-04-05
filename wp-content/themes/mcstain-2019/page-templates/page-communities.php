<?php /* Template Name: Page - Communities */ ?>

<?php
$_communityParent = get_the_ID();
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
$_c = 1;
?>



<?php get_header() ?>
  <section class="community-introduction communities-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10">
          <div class="community-details">
            <?php the_content() ?>
          </div>
        </div>
        <div class="col-md-2 col-lg-3">&nbsp;</div>
      </div>
    </div>
  </section>

  <?php /*
    - set var $_community = $post->post_name
      - query community_slides by $_community
        - get contents
      - carousel slide (models renderings)
      - get logo
      - get floorplan details
  */
  ?>
  <?php if($_communities->have_posts()): while($_communities->have_posts()): $_communities->the_post();
    $_logo = get_field('community_logo');
    $_details = get_field('community_details');
    $_models = get_field('models');
  ?>
  <section class="community-information <?php echo $post->post_name.'-section' ?>">
    <div class="container">
      <?php get_template_part('community/community-intro'); ?>
      <div class="row row-eq-height">
        <div class="col-12 col-md-7 col-lg-8">
          <div class="model-slider left-column">
          <?php if($post->post_name == 'harvest-ridge'): ?>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/comm-page-hr.jpg" alt="<?php the_title() ?>" class="img-fluid" />
          <?php elseif($post->post_name == 'painted-prairie'): ?>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/comm-page-pp.jpg" alt="<?php the_title() ?>" class="img-fluid" />
          <?php elseif($post->post_name == 'arras-park'): ?>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/comm-page-ap.jpg" alt="<?php the_title() ?>" class="img-fluid" />
          <?php else: ?>
            <div id="model-slider-<?php echo $post->post_name ?>" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php
                  $_m = 0;
                  foreach($_models as $_model):
                  $_modelImage = $_model['model_rendering'];
                  ?>
                  <div class="carousel-item <?php if($_m == 0): echo 'active'; endif; ?>">
                    <img src="<?php echo $_modelImage['url']; ?>" alt="<?php echo $_modelImage['alt'] ?>" class="img-fluid" />
                  </div>
                <?php $_m++; endforeach; ?>
              </div>
              <ol class="carousel-indicators">
              <?php $_i = 0; foreach($_models as $_model): ?>
                <li data-target="#model-slider-<?php echo $post->post_name ?>" data-slide-to="<?php echo $_i ?>" <?php if($_i == 0): ?>class="active"<?php endif; ?>></li>
              <?php $_i++; endforeach; ?>
              </ol>
            </div>
          <?php endif; ?>
          </div>
        </div>


        <div class="col-12 col-md-5 col-lg-4 <?php if($_c % 2 == 0): echo 'order-first'; endif; ?>">
          <div class="model-details right-column">
            <div class="community-logo">
              <a href="<?php echo get_field('community_link') ?>">
                <img src="<?php echo $_logo['url'] ?>" class="img-fluid aligncenter" alt="<?php the_title() ?>" />
              </a>
            </div>
            <?php if($_details): ?>
            <div class="community-details gray-bg">
              <table class="community-table">
                <tr>
                  <td>
                    <strong>Location:</strong><br/>
                    <?php echo $_details['community_location'] ?>
                  </td>
                  <td>
                    <strong>Square Footage*:</strong><br/>
                    <?php echo $_details['community_square_footage'] ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Starting At:</strong><br/>
                    <?php echo $_details['community_price'] ?>
                  </td>
                  <td>
                    <strong>Home Style:</strong><br/>
                    <?php echo $_details['community_style'] ?>
                  </td>
                </tr>
              </table>
            </div>
          <?php endif; ?>
          </div>
        </div>
      </div>


    </div>
  </section>
  <?php $_c++; endwhile; endif; $_communities->reset_postdata(); ?>


<?php get_footer() ?>
