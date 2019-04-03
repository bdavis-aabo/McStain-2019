<?php /* Template Name: Page - Manifesto */ ?>
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

    <div class="right-btn nomobile">
      <div class="box">
        <div class="box-contents green-bg">
          <a href="/contact-us" class="btn green-btn btn-block">
            <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
            <span class="text">Contact us</span>
          </a>
        </div>
      </div>
    </div>

    <a href="/contact-us" class="btn green-btn sidebar-btn">
      <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> Contact us
    </a>
  </section>

  <?php if(is_page('mcstain-manifesto')): get_template_part('manifesto/manifesto-slides'); endif; ?>


<?php get_footer() ?>
