<?php /* Template Name: Page - BeWell */ ?>

<?php get_header() ?>

  <section class="manifesto-heroimage homepage-heroimage">
    <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid aligncenter')); ?>
  </section>

  <section class="homepage-content homepage-section bewell-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="bewell-headline"><?php echo get_field('bewell_headline') ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-8">
          <div class="homepage-leftcolumn bewell-leftcolumn">
            <?php while(have_posts()): the_post(); $_graphic = get_field('bewell_graphic'); ?>
              <?php the_content() ?>
            <?php endwhile; ?>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="bewell-rightcolumn">
            <img src="<?php echo $_graphic['url'] ?>" alt="<?php echo the_title() ?>" class="img-fluid aligncenter" />

            <?php if(get_field('bewell_brochure') != ''): $_brochure = get_field('bewell_brochure'); ?>
            <div class="right-btn nomobile">
              <div class="box">
                <div class="box-contents green-bg">
                  <a href="<?php echo $_brochure['url'] ?>" class="btn green-btn btn-block">
                    <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
                    <span class="text">Download<br/>BeWell Flier</span>
                  </a>
                </div>
              </div>
            </div>

            <a href="<?php echo $_brochure['url'] ?>" class="btn green-btn sidebar-btn">
              <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> Download BeWell Flier
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="bewell-bottomsection">
            <?php echo get_field('page_sub_content'); ?>
          </div>

          <?php if(have_rows('bewell_features')): $_c = 1; ?>
          <div class="accordion" id="feature-accordion">
            <?php while(have_rows('bewell_features')): the_row(); ?>
            <div class="card">
              <div class="card-header" id="<?php echo 'heading'.$_c ?>">

                <h5 class="card-toggle <?php if($_c == 1): echo 'open'; endif; ?>" data-toggle="collapse" data-target="#<?php echo 'collapse'.$_c ?>"
                    aria-expanded="<?php if($_c == 1): echo 'true'; else: echo 'false'; endif; ?>" aria-controls="<?php echo 'collapse'.$_c; ?>">
                      <span class="indicator <?php if($_c == 1): echo 'active'; endif; ?>"><i class="fas fa-plus"></i></span> <?php echo get_sub_field('feature_title') ?>
                </h5>
              </div>
              <div id="<?php echo 'collapse'.$_c ?>" class="collapse <?php if($_c == 1): ?>show<?php endif; ?>" aria-labelledby="<?php echo 'heading'.$_c ?>" data-parent="#feature-accordion">
                <div class="card-body"><?php echo get_sub_field('feature_content') ?></div>
              </div>
            </div>
            <?php $_c++; endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>




  </section>

<?php get_footer() ?>
