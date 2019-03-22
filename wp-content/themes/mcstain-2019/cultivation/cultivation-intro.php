<?php $_galleryImages = get_field('community_slides'); $_size = 'full'; $_logo = get_field('community_logo'); ?>
<section class="community-introduction">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-10 col-lg-10">
        <div class="community-details">
          <?php the_content() ?>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">&nbsp;</div>
    </div>
  </div>

  <div class="community-scroller">
    <div class="mobile-scroller">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <img src="<?php echo $_logo['url'] ?>" class="img-fluid" alt="<?php the_title() ?>" />
          </div>
          <div class="col">
            <?php if($_galleryImages): $_s = 0; ?>
              <div id="community-carousel" class="carousel slide community-carousel" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                <?php foreach($_galleryImages as $_image): ?>
                  <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
                    <img src="<?php echo $_image['url']; ?>" class="img-fluid"/>
                  </div>
                <?php $_s++; endforeach; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /end mobile-scroller -->

    <!-- normal-scroller -->
    <?php if($_galleryImages): $_i = 4; ?>
    <div class="normal-scroller">
      <div class="container-fluid">
        <div class="row row-eq-height">
        <div class="col-2">
        <img src="<?php echo $_logo['url'] ?>" class="img-fluid" alt="<?php the_title() ?>" class="img-fluid" alt="<?php the_title() ?>" />
        </div>

        <div class="col-8">

          <div id="community-carousel-large" class="carousel slide community-carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
            <?php
              $_chunks = array_chunk($_galleryImages, $_i);
              $_html = '';

              foreach($_chunks as $_chunk):
                ($_chunk === reset($_chunks)) ? $_active = 'active' : $_active = '';
                $_html .= '<div class="carousel-item '.$_active. '"><div class="row">';

                foreach($_chunk as $_image):
                  $_html .= '<div class="col-md-3 col-lg-3">';
                  $_html .= '<img src="'.$_image['url'].'" class="img-fluid"/>';
                  $_html .= '</div>';
                endforeach;

                $_html .= '</div></div>';

              endforeach;

              echo $_html;
            ?>
            </div>
          </div><!-- end /carousel -->

        </div>
        <div class="col-2 right-btn">
          <button class="btn aqua-btn btn-block lightbox-trigger base-contact">
            <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
            <span class="text">First to know</span>
          </button>
        </div>
      </div>
      </div>
    </div>
    <?php endif; ?>
    <!-- /end normal-scroller -->
  </div>

  <button class="btn aqua-btn sidebar-btn lightbox-trigger base-contact">
    <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> First to know
  </button>
</section>
