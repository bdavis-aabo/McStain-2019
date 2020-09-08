<?php
$_columns   = 2;
$_rowCount  = 0;
$_bootWidth = 12 / $_columns;
$_m = 1;

$_rows = get_field('models');
$_totalRows = count($_rows);

$_floorplans = new WP_Query();
$_args = array(
  'post_type' => 'floorplans',
  'post_status' => 'publish',
  'community'   =>  $post->post_name,
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => 'menu_order'
);
$_floorplans->query($_args);

?>

<?php if(get_field('models_content') != ''): ?>
<section class="community-models">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 col-sm-12">
        <div class="community-models-content">
          <?php echo get_field('models_content') ?>
          <?php if(is_page('lost-creek-farm')): ?>
            <button class="btn gold-btn model-btn nomobile" onclick="window.location.href = '/communities/<?php echo $post->post_name ?>/<?php echo $post->post_name ?>-gallery';" target="_blank"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> Photo Gallery</button>

          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- mobile models -->
  <div class="mobile-models">
    <div class="container-fluid">
      <div class="row">
        <?php while($_floorplans->have_posts()): $_floorplans->the_post(); $_galleryImages = get_field('floorplan_elevations');
          $_galleryImage = $_galleryImages[0];
          $_floorplanName = substr($post->post_name, 0, -5);
        ?>
        <div class="col <?php if($_totalRows == $_m): echo 'col-6'; endif; ?>">
          <article class="model comm-model" data-target="<?php echo strtolower(get_sub_field('model_name')) ?>" style="margin-bottom: 20px;">
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
              <img src="<?php echo $_galleryImage['sizes']['thumbnail'] ?>" class="img-fluid" alt="<?php the_title() ?>" />
              <div class="overlay"><span><?php echo $_floorplanName ?></span></div>
            </a>
          </article>
        </div>
        <?php $_rowCount ++; $_m++;
          if($_rowCount % $_columns == 0): echo '</div><div class="row">'; endif; ?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
  <?php //endif; ?>
  <!-- /end mobile models -->

  <!-- normal models -->
  <div class="normal-models">
    <div class="container-fluid">
      <div class="row">
        <?php if(is_page('painted-prairie')): ?>
        <div class="col-6 col-sm-4 col-md-4 col-lg-2 right-btn">
          <article class="model">
            <button class="green-btn btn btn-block model-btn" onclick="window.location.href = '/painted-prairie/floorplan-configurator';">
              <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
              <span class="text"> You gotta see it<br/>to believe it...</span>
            </button>
          </article>
        </div>
        <?php endif; ?>
        <?php while($_floorplans->have_posts()): $_floorplans->the_post(); $_galleryImages = get_field('floorplan_elevations');
          $_galleryImage = $_galleryImages[0];
          $_floorplanName = substr($post->post_name, 0, -5);
        ?>
        <div class="col-6 col-sm-4 col-md-4 col-lg-2">
          <article class="model">
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
              <img src="<?php echo $_galleryImage['sizes']['thumbnail'] ?>" class="img-fluid" alt="<?php the_title() ?>" />
              <div class="overlay"><span><?php echo $_floorplanName ?></span></div>
            </a>
          </article>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>

        <?php if(!is_page('lost-creek-farm')): ?>
        <div class="col-6 col-sm-4 col-md-4 col-lg-2 right-btn">
          <article class="model">
            <button class="gold-btn btn btn-block model-btn" onclick="window.location.href = '/communities/<?php echo $post->post_name ?>/<?php echo $post->post_name ?>-gallery';" target="_blank">
              <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
              <span class="text"> Photo Gallery</span>
            </button>
          </article>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- /end normal models -->

  <button class="btn gold-btn sidebar-btn model-btn" onclick="window.location.href = '/communities/<?php echo $post->post_name ?>/<?php echo $post->post_name ?>-gallery';" target="_blank"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> Photo Gallery</button>
</section>
<?php endif; ?>

<?php if(get_field('model_configurator') != ''): ?>
<section class="community-models">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 col-sm-12">
        <div class="community-models-content">
          <?php echo get_field('model_configurator') ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if(get_field('model_features') != ''): ?>
<section class="bewell-section community-features">
  <div class="accordion" id="feature-accordion">
    <div class="card">
      <div class="card-header" id="<?php echo 'heading'.$_c ?>">
        <h5 class="card-toggle" data-toggle="collapse" data-target="#standard-features"
            aria-expanded="<?php if($_c == 1): echo 'true'; else: echo 'false'; endif; ?>" aria-controls="standard-features">
              <span class="indicator"><i class="fas fa-plus"></i></span> standard features
        </h5>
      </div>
      <div id="standard-features" class="collapse " aria-labelledby="standard-features" data-parent="#feature-accordion">
        <div class="card-body"><?php echo get_field('model_features') ?></div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
