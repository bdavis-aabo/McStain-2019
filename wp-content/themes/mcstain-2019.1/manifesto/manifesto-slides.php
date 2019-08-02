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

  <?php if($_manifestoSlides->have_posts()): $_s = 0; ?>

  <?php // tablet landscape and larger ?>
  <section class="manifesto-slides">
    <ul class="nav nav-tabs nav-tabs-container grid-container grid-container--fit" id="manifesto-tabs" role="tablist">
      <?php while($_manifestoSlides->have_posts()): $_manifestoSlides->the_post(); ?>
      <li class="grid-element nav-item">
        <a class="nav-link <?php if($_s == 0): echo 'active'; endif; ?> <?php echo get_field('manifesto_button_color').'-line' ?>" id="tab-<?php echo $_s ?>" data-toggle="tab" role="tab" href="#tabcontent-<?php echo $_s ?>">
          <?php the_title() ?>
        </a>
      </li>
      <?php $_s++; endwhile; rewind_posts(); $_s = 0; ?>
    </ul>
    <div class="tab-content" id="manifesto-tabcontent">
    <?php while($_manifestoSlides->have_posts()): $_manifestoSlides->the_post(); $_slideImage = get_field('manifesto_main_slide'); ?>
      <div class="tab-pane fade <?php if($_s == 0): echo 'show active'; endif; ?>" id="tabcontent-<?php echo $_s ?>" role="tabpanel">
        <div class="tab-container">
          <img src="<?php echo $_slideImage['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
          <div class="tab-contents"><?php the_content() ?></div>

          <div class="right-btn nomobile">
            <div class="box">
              <div class="box-contents <?php echo get_field('manifesto_button_color') ?>-bg">
              <?php if($post->post_name == 'bewell'): ?>
              <button class="btn <?php echo get_field('manifesto_button_color') ?>-btn btn-block" onclick="window.location.href='/bewell-house-by-mcstain';">
                <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
                <span class="text"><?php echo get_field('manifesto_button_text') ?></span>
              </button>
              <?php else: ?>
              <button class="btn <?php echo get_field('manifesto_button_color') ?>-btn btn-block manifesto-trigger" data-target="<?php echo $post->post_name ?>">
                <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
                <span class="text"><?php echo get_field('manifesto_button_text') ?></span>
              </button>
              <?php endif; ?>
              </div>
            </div>
          </div>
          <button class="btn <?php echo get_field('manifesto_button_color') ?>-btn sidebar-btn manifesto-trigger" data-target="<?php echo $post->post_name ?>">
            <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <?php echo get_field('manifesto_button_text') ?>
          </button>
        </div>
      </div>
    <?php $_s++; endwhile; rewind_posts(); $_s = 0; ?>
    </div>
  </section>

  <?php // tablet portrait and smaller ?>
  <section class="manifesto-slides-mobile">
    <div id="manifesto-mobile-slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      <?php while($_manifestoSlides->have_posts()): $_manifestoSlides->the_post(); $_slideImage = get_field('manifesto_main_mobile'); ?>
        <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
          <img src="<?php echo $_slideImage['url'] ?>" class="img-fluid" alt="">
          <div class="carousel-contents"><?php the_content() ?></div>
          <?php if($post->post_name == 'bewell'): ?>
          <button class="btn <?php echo get_field('manifesto_button_color') ?>-btn sidebar-btn" onclick="window.location.href='/bewell-house-by-mcstain';">
            <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <?php echo get_field('manifesto_button_text') ?>
          </button>
          <?php else: ?>
          <button class="btn <?php echo get_field('manifesto_button_color') ?>-btn sidebar-btn manifesto-trigger" data-target="<?php echo $post->post_name ?>">
            <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <?php echo get_field('manifesto_button_text') ?>
          </button>
          <?php endif; ?>
        </div>
      <?php $_s++; endwhile; rewind_posts(); $_s = 0;?>
      </div>

      <ol class="carousel-indicators">
      <?php while($_manifestoSlides->have_posts()): $_manifestoSlides->the_post() ?>
        <li data-target="#manifesto-mobile-slider" data-slide-to="<?php echo $_s ?>" <?php if($_s == 0): ?>class="active"<?php endif; ?>></li>
      <?php $_s++; endwhile; wp_reset_query(); ?>
      </ol>
    </div>
  </section>


<?php endif; //endif query ?>
