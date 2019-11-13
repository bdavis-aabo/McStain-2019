<?php
$_projectID = '';
$_url = parse_url($_SERVER['REQUEST_URI']);
$_path = $_url['path'];
$_segmentUrl = explode('/',$_path);

$_comm = str_replace('-','',$_segmentUrl[2]);
$_community = ucwords(str_replace('-', ' ', $_segmentUrl[2]));
$_floorplan = substr($_segmentUrl[4],0,-5);

?>

<h2 class="floorplan-form-title">Please send me a more information about the design suites at <?php echo $_community ?></h2>

<img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/designsuite_form-image.jpg" alt="<?php echo $_community . ' design suites'; ?>" class="img-fluid aligncenter" />

<div id="contact-form">
  <?php echo do_shortcode('[contact-form-7 title="' . $_community . ' - Design Form"]') ?>
</div>
