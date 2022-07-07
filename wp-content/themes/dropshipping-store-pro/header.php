<?php

/**
 * Template part for displaying The Header for our theme.
 *
 * @package dropshipping-store-pro
 */
   $sticky_header="";
   if ( get_theme_mod('drop_shipping_pro_header_section_sticky',true) == "1" ) {
   
     $sticky_header="yes";
   }else{
   
     $sticky_header="no";
   }
   ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width">
      <link rel="profile" href="https://gmpg.org/xfn/11">
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
      <link rel="shortcut icon" href="#">
      <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?> <?php if ( ! function_exists( 'wp_body_open' ) ) { function wp_body_open() { do_action( 'wp_body_open' ); } }?> >
  <header id="masthead" class="site-header">
    <?php if ( get_theme_mod('drop_shipping_pro_general_spinner_enable_disable',true) == "1" ) { ?>
      <div class="bwt-travel-loading-box">
        <div class="loader loader-1">
          <div class="loader-outter"></div>
          <div class="loader-inner"></div>
        </div>
      </div>
    <?php } ?>
    <div id="bwt_header">
      <div id="bwt_header-menu">
        <div class="header-wrap">
          <?php get_template_part('template-parts/header/main-header'); ?>
        </div>
        <span id="sticky-onoff"><?php echo esc_html($sticky_header); ?></span>
      </div>      
    </div>
  </header>