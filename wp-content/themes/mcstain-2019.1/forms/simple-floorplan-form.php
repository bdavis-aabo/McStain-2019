<?php
$_projectID = '';
$_url = parse_url($_SERVER['REQUEST_URI']);
$_path = $_url['path'];
$_segmentUrl = explode('/',$_path);

$_comm = str_replace('-','',$_segmentUrl[2]);
$_community = ucwords(str_replace('-', ' ', $_segmentUrl[2]));
$_floorplan = substr($_segmentUrl[4],0,-5);
?>

<h2 class="floorplan-form-title">Please send me a free brochure for the <?php echo ucwords($_floorplan) . ' at ' . $_community ?></h2>

<div id="contact-form">
  <?php echo do_shortcode('[contact-form-7 title="' . $_community . ' - Floorplan Form"]') ?>
</div>
