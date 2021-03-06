<section class="community-design">
  <?php
  if(get_field('design_hero') != ''):
    $_designHero = get_field('design_hero');
    $_mport = get_field('design_mobile'); // mobile portrait
  ?>
  <div class="community-heroimage">
    <picture>
      <source media="(max-width: 375px)" srcset="<?php echo $_mport['url'] ?>">
      <source media="(max-width: 667px)" srcset="<?php echo $_designHero['sizes']['mobile_land'] ?>">
      <img src="<?php echo $_designHero['url'] ?>" alt="<?php echo $_designHero['title'] ?>" class="img-fluid aligncenter" />
    </picture>
  </div>
  <?php endif; ?>

  <?php if(get_field('design_content') != ''): ?>
  <div class="community-design-container">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-9">
          <div class="community-design-content">
            <?php echo get_field('design_content'); ?>

            <button class="btn green-btn sidebar-btn cult-trigger design-btn">
              <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> Wow inside
            </button>
          </div>
        </div>

        <div class="col-md-3">
          <div class="right-btn nomobile">
            <div class="box">
              <div class="box-contents green-bg">
                <button class="btn green-btn btn-block cult-trigger design-btn">
                  <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
                  <span class="text">Wow inside</span>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="col-md-3">
          <div class="right-btn nomobile">
            <div class="box">
              <div class="box-contents green-bg">
                <button class="btn green-btn btn-block cult-trigger design-btn">
                  <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
                  <span class="text">Wow inside</span>
                </button>
              </div>
            </div>
          </div>
        </div> -->


      </div>
    </div>
  </div>


  <?php endif; ?>
</section>
