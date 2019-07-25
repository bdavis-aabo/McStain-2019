<?php

$_parentID = $post->post_parent;
$_parentPost = get_post($_parentID);
$_form = $_GET['form'];

  $_parent = new WP_Query();
  $_args = array(
    'post_type' =>  'page',
    'p'  =>  $_parentID,
  );
  $_parent->query($_args);


  while($_parent->have_posts()): $_parent->the_post();

    if($_form == 'floorplan'):
  ?>
    <h2>Download the floorplan(s) you are interested in, by clicking the link below.</h2>
    <ul class="floorplan-list">
    <?php while(have_rows('models')): the_row(); ?>
      <li class="icon">
        <a href="<?php bloginfo('template_directory') ?>/assets/images/floorplans/<?php echo strtolower(get_sub_field('model_name')).'-floorplan.pdf' ?>">
          <i class="fa fa-file-pdf-o"></i> <?php echo get_sub_field('model_name'); ?>
        </a>
      </li>
    <?php endwhile; ?>
    </ul>

  <?php elseif($_form == 'design'): ?>
    <h2>Download the design package(s) you are interested in, by clicking the link below.</h2>
    <ul class="floorplan-list">
      <li class="icon">
        <a href="<?php bloginfo('template_directory') ?>/assets/images/design/traditional-design.pdf' ?>">
          <i class="fa fa-file-pdf-o"></i> Traditional
        </a>
      </li>
      <li class="icon">
        <a href="<?php bloginfo('template_directory') ?>/assets/images/design/fusion-design.pdf' ?>">
          <i class="fa fa-file-pdf-o"></i> Fusion
        </a>
      </li>
      <li class="icon">
        <a href="<?php bloginfo('template_directory') ?>/assets/images/design/modern-design.pdf' ?>">
          <i class="fa fa-file-pdf-o"></i> Modern
        </a>
      </li>
    </ul>
  <?php endif;

  endwhile; wp_reset_query();

?>
