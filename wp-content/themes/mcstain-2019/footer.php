  <footer class="footer blue-bg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-4">
          <section class="footer-section footer-left">
            <a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>">
              <img src="<?php bloginfo('template_directory') ?>/assets/images/mcstain-logo.svg" alt="<?php bloginfo('name') ?>" class="footer-logo img-fluid" />
            </a>
            <?php get_template_part('page/page-social') ?>
          </section>
        </div>
        <div class="col-12 col-md-4">
          <section class="footer-section footer-middle">
            <div class="footer-contents">
              <strong>Communities</strong>
              <?php wp_nav_menu(array('menu' => 'footer_menu','depth' => 1,'menu_class' => 'footer-menu')) ?>
            </div>
          </section>
        </div>
        <div class="col-12 col-md-4">
          <section class="footer-section footer-right">
            <div class="footer-contents">
              <strong>Contact Us</strong>
              <?php if(is_active_sidebar('footer-address')): dynamic_sidebar('footer-address'); endif; ?>
            </div>
          </section>
        </div>
      </div>
    </div>
  </footer>
  <footer class="footer white-bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <p class="copyright">&copy; <?php echo date('Y').' '; bloginfo('name'); ?>. All rights reserved.</p>
          </div>
        </div>
      </div>
  </footer>

  <?php
  if(is_page('about-us')): get_template_part('page/page-teamlightbox'); endif;
  if(is_page('mcstain-manifesto') || is_page('welcome-to-mcstain-neighborhoods')): get_template_part('manifesto/manifesto-lightbox'); endif;

  if(is_page_template('page-templates/page-cultivation.php')):
    get_template_part('cultivation/cultivation-footer');
    get_template_part('cultivation/cultivation-lightbox');
  endif;
    get_template_part('cultivation/cultivation-realtor');


  ?>

<?php wp_footer() ?>







</body>
</html>
