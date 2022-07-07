<?php
/**
 * The Template for displaying Home Page.
 *
 * @package dropshipping-store-pro
 */
?>
<?php
/**
 * Template Name: Home Page
 */
?>
<?php get_header(); 

if ( Whizzie::get_the_suspension_status() == 'false' ) {
	get_template_part( 'template-parts/home/section-slider' );
	do_action( 'drop_shipping_pro_after_section_slider' );
        
    $section_order ='';
    $section_order = explode( ',', get_theme_mod( 'drop_shipping_pro_section_ordering_settings_repeater') );

      foreach( $section_order as $key => $value ){
           if($value !=''){

            get_template_part( 'template-parts/home/section', $value );

      }
    }
}

get_footer();?>