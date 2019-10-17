
<section class="community-design">
  <?php
  if(get_field('design_hero') != ''):
    $_deskSlides = get_field('design_hero'); // desktop slides
    $_mobSlides = get_field('design_mobile'); // mobile slides
  ?>
  <div class="community-carousel carousel slide" id="desktop-carousel" data-ride="carousel">
    <div class="carousel-inner">
    <?php $_d = 0; foreach($_deskSlides as $_dSlide): ?>
      <div class="carousel-item <?php if($_d == 0): echo 'active'; endif; ?>">
        <img src="<?php echo $_dSlide['url'] ?>" alt="<?php the_title(); echo ' - Design Suites' ?>" class="img-fluid" />
      </div>
    <?php $_d++; endforeach; ?>
    </div>
    <div class="design-caption">
      <h1 class="design-title">This is getting good.</h1>
      <h2 class="design-subtitle">Tailored Interiors. Tailored for you.</h2>
    </div>
  </div>

  <div class="community-carousel carousel slide" id="mobile-carousel" data-ride="carousel">
    <div class="carousel-inner">
    <?php $_m = 0; foreach($_mobSlides as $_mSlide): ?>
      <div class="carousel-item <?php if($_m == 0): echo 'active'; endif; ?>">
        <img src="<?php echo $_mSlide['url'] ?>" alt="<?php the_title(); echo ' - Design Suites' ?>" class="img-fluid" />
      </div>
    <?php $_m++; endforeach; ?>
    </div>
    <div class="design-caption">
      <h1 class="design-title">This is getting good.</h1>
      <h2 class="design-subtitle">Tailored Interiors. Tailored for you.</h2>
    </div>
  </div>

  <?php endif; ?>

  <?php if(get_field('design_content') != ''): ?>
  <div class="community-design-container">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-10">
          <div class="container">
            <div class="row">
              <div class="col-lg-11 offset-lg-1">
                <div class="community-design-content">
                  <?php echo get_field('design_content'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg-2 nomobile">
          <div class="community-design-content right-btn">
            <div class="box">
              <div class="box-contents green-bg">
                <button class="btn green-btn btn-block design-trigger design-btn">
                  <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
                  <span class="text">Wow inside</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <button class="btn green-btn sidebar-btn design-trigger design-btn">
    <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> Wow inside
  </button>
  <?php endif; ?>
</section>
