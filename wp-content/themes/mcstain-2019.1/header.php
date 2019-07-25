<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php //seo plugin grabs page title ?>

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/assets/images/favicon.png" type="image/x-icon" />

  <?php /* Load CSS in functions.php */ ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php include_once('assets/_inc/ga.php') ?>

<?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

<div class="container">
  <div class="row">
  <header class="header">
    <nav class="navbar navbar-expand-xl fixed-top">
      <a class="navbar-brand" href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>">
        <img src="<?php bloginfo('template_directory') ?>/assets/images/mcstain-logo.svg" alt="<?php bloginfo('name') ?>" class="navbar-logo">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="toggle navigation">
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="main-navbar">
          <?php
            wp_nav_menu( array(
              'menu'            =>  'main_menu',
              'depth'           =>  2,
              //'container'       =>  'div',
              'menu_class'      =>  'main-menu navbar-nav',
              'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
              'walker'          => new WP_Bootstrap_Navwalker()
            ));
          ?>
      </div>
    </nav>
    <!-- Segment Pixel - RET - McStain Neighborhoods - Colorado - DO NOT MODIFY -->
    <script src="https://secure.adnxs.com/seg?add=16984879&t=1" type="text/javascript"></script>
    <!-- End of Segment Pixel -->
  </header>
  </div>
</div>
