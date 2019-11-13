<?php
  $_community = ucwords(str_replace('-', ' ', $post->post_name));
?>


<div class="email-form base-contactform">
  <h1 class="aqua-txt"><?php the_title() ?></h1>
  <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/leaf.png" class="alignleft" />
  <?php if(!is_page('quick-move-in-homes')): ?>
    <p>I want to be the first to know about McStain at <?php echo $_community ?>.<br />Please keep me informed&hellip;and excited.</p>
  <?php elseif(is_page('quick-move-in-homes')): ?>
    <p>I would like to know more about quick move-in homes from McStain</p>
  <?php endif; ?>

  <div id="contact-form">
    <?php echo do_shortcode('[contact-form-7 title="' . $_community . ' - Base Form"]'); ?>
  </div>
</div><!-- /end email-form.base-contactform -->
