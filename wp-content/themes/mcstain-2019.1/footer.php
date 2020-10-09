  <footer class="footer blue-bg">
    <div class="container">
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
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p class="copyright">
              &copy; <?php echo date('Y').' '; bloginfo('name'); ?>. All rights reserved. <a href="/privacy-policy" title="Privacy Policy">Privacy Policy</a></p>
            <p class="copyright">Artist renderings may not be to scale and homes may not be built as shown. McStain Neighborhoods reserves the right to change plans, elevations, specifications, materials, and pricing without prior notice. Your individual contract supersedes all features listed here and may differ in final details, specifications and finishes. McStain Neighborhoods® is a registered trademark of McStain Constructors LLC.
            </p>
          </div>
          <div class="col-12">
            <?php dynamic_sidebar('footer-energy'); ?>
          </div>
        </div>
      </div>
  </footer>

  <?php
  if(is_page('about-us')): get_template_part('page/page-teamlightbox'); endif;
  if(is_page('mcstain-manifesto')): get_template_part('manifesto/manifesto-lightbox'); endif;

  if(is_page_template('page-templates/page-cultivation.php')):
    get_template_part('cultivation/cultivation-design-lightbox');
  elseif(is_singular('floorplans')):
    get_template_part('cultivation/cultivation-floorplan-lightbox');
  endif;
    get_template_part('cultivation/cultivation-realtor');
  ?>

  <?php if(is_front_page() || is_page('home')): get_template_part('home/home-promotion'); endif; ?>

<?php wp_footer() ?>

<?php /* email redirect */ ?>


<?php //edits by Jay ?>
<script>
window.addEventListener('load', function(){
  if(window.location.pathname == "/contact-us/thank-you/"){
    if(document.referrer == "https://mcstain.com/communities/west-grange/"){
      gtag('event', 'submit', {
        'event_category' : 'form',
        'event_label' : 'west grange'
      });
    }else if(document.referrer == "https://mcstain.com/contact-us/"){
      gtag('event', 'submit', {
        'event_category' : 'form',
        'event_label' : 'contact us'
      });
    }else if(document.referrer == "https://mcstain.com/communities/painted-prairie/"){
      gtag('event', 'submit', {
        'event_category' : 'form',
        'event_label' : 'painted prairie'
      });
    }else if(document.referrer == "https://mcstain.com/communities/lost-creek-farm/"){
      gtag('event', 'submit', {
        'event_category' : 'form',
        'event_label' : 'lost creek farm'
      });
    }
  }
});
</script>

<script src="https://www.google.com/recaptcha/api.js?render=6Lf2wb4UAAAAAB76Wxx4Fy0VYsaEmlCvr8we_1uD"></script>
<script>
  grecaptcha.ready(function(){
    grecaptcha.execute('6Lf2wb4UAAAAAB76Wxx4Fy0VYsaEmlCvr8we_1uD', {action: 'contact'}).then(function(token){
      var recaptchaResponse = document.getElementById('recaptchaResponse');
      recaptchaResponse.value = token;
    });
  });
</script>

</body>
</html>
