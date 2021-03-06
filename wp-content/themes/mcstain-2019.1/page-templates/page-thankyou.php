<?php /* Template Name: Page - Thank You */ ?>

<?php
  $_form = $_GET['form'];
  $_community = $_GET['community'];
  $_community = str_replace('-','',$_community);
  //var_dump($_model);

?>


<?php get_header() ?>

  <section class="manifesto-heroimage homepage-heroimage">
    <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid aligncenter')); ?>
    <div class="homepage-heroimage-caption">
      <?php if(is_page('thank-you')): ?><h1 class="caption-title">Thank You</h1><?php endif; ?>
      <!-- <p class="caption-content">Subheadline Here.</p> -->
    </div>
  </section>

  <section class="homepage-content homepage-section manifesto-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-11">
          <div class="homepage-leftcolumn">
            <?php while(have_posts()): the_post() ?>
              <?php the_content() ?>
            <?php endwhile; ?>

            <?php if($_community != '' && $_form == 'floorplan'): ?>
            <p class="download-link">Download the floorplan brochure(s) of your choice below:</p>
            <ul class="brochure-list">
              <?php if($_community == 'lostcreekfarm'): ?>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/myriad-brochure.pdf">Myriad</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/perspective-brochure.pdf">Perspective</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/scene-brochure.pdf">Scene</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/panorama-brochure.pdf">Panorama</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/aspect-brochure.pdf">Aspect</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/vista-brochure.pdf">Vista</a></li>
              <?php elseif($_community == 'westgrange'): ?>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/concerto-brochure.pdf">Concerto</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/interlude-brochure.pdf">Interlude</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/virtuoso-brochure.pdf">Virtuoso</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/harmony-brochure.pdf">Harmony</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/serenade-brochure.pdf">Serenade</a></li>
              <?php elseif($_community == 'paintedprairie'): ?>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/limelight-brochure.pdf">Limelight</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/cameo-brochure.pdf">Cameo</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/showcase-brochure.pdf">Showcase</a></li>
                <li><a target="_blank" class="btn green-btn" href="<?php bloginfo('url') ?>/_floorplan-pdf/<?php echo $_community ?>/centerstage-brochure.pdf">Centerstage</a></li>
              <?php endif; ?>
            </ul>
            <?php elseif($_form == 'design'): ?>
            <p class="download-link">Download the design suite brochure(s) of your choice below:</p>
              <?php if($_community == 'westgrange'): ?>
                <ul class="brochure-list" id="<?php echo $_community.'-design-list' ?>">
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/WG/wg_design-transitional.pdf" target="_blank" class="btn green-btn">Transitional</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/WG/wg_design-modern.pdf" target="_blank" class="btn green-btn">Modern</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/WG/wg_design-farmhouse.pdf" target="_blank" class="btn green-btn">Farmhouse</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/WG/wg_design-boho.pdf" target="_blank" class="btn green-btn">BOHO Chic</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/WG/wg_design-classic.pdf" target="_blank" class="btn green-btn">Classic</a></li>
                </ul>
              <?php elseif($_community == 'lostcreekfarm'): ?>
                <ul class="brochure-list" id="lostcreekfarm-design-list">
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/LCF/lcf_design-transitional.pdf" target="_blank" class="btn green-btn">Transitional</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/LCF/lcf_design-modern.pdf" target="_blank" class="btn green-btn">Modern</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/LCF/lcf_design-farmhouse.pdf" target="_blank" class="btn green-btn">Farmhouse</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/LCF/lcf_design-boho.pdf" target="_blank" class="btn green-btn">BOHO Chic</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/LCF/lcf_design-classic.pdf" target="_blank" class="btn green-btn">Classic</a></li>
                </ul>
              <?php elseif($_community == 'paintedprairie'): ?>
                <ul class="brochure-list" id="paintedprairie-design-list">
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/PP/pp_design-transitional.pdf" target="_blank" class="btn green-btn">Transitional</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/PP/pp_design-modern.pdf" target="_blank" class="btn green-btn">Modern</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/PP/pp_design-farmhouse.pdf" target="_blank" class="btn green-btn">Farmhouse</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/PP/pp_design-boho.pdf" target="_blank" class="btn green-btn">BOHO Chic</a></li>
                  <li><a href="<?php bloginfo('url') ?>/_design-pdf/2020/PP/pp_design-classic.pdf" target="_blank" class="btn green-btn">Classic</a></li>
                </ul>
              <?php endif; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer() ?>
