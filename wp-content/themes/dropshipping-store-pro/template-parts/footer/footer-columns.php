<?php
/**
 * The Template for displaying all Footer Columns.
 *
 * @package dropshipping-store-pro
 */
?>
<?php
$address_section = get_theme_mod( 'drop_shipping_pro_radiolast_enable' );
if ( 'Disable' == $address_section ) {
	return;
}

if( get_theme_mod('drop_shipping_pro_section_footer_bgcolor') ) {
  $footer_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_section_footer_bgcolor')).';';
}elseif( get_theme_mod('drop_shipping_pro_footer_bgimage') ){
  $footer_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_footer_bgimage')).'\')';
}else{
  $footer_backg = '';
}

$img_bg = get_theme_mod('drop_shipping_pro_footer_image_bg');
?>


<section id="bwt-footer" class="<?php echo esc_attr($img_bg); ?> py-5" style="<?php echo esc_attr($footer_backg);?>">
   <?php //get_template_part('template-parts/home/section-newsletter' ); ?>
   <div id="bwt-footer_box">
      <div class="container bwt-footer-cols">
         <?php
            $count = 0;
            if ( is_active_sidebar('footer-1') != '' ) {
            	$count++;
            }
            if ( is_active_sidebar('footer-2') != '' ) {
            	$count++;
            }
            if ( is_active_sidebar('footer-3') != '' ) {
            	$count++;
            }
            if ( is_active_sidebar('footer-4') != '' ) {
            	$count++;
            }
            if ( $count == 1 ) {
            	$foot13 = 'col-lg-12 col-md-12 col-sm-12 text-lg-start text-md-start text-sm-start text-center';
               $foot2 = 'col-lg-12 col-md-4 col-sm-6 text-lg-start text-md-start text-sm-start text-center';
               $foot4 = 'col-lg-12 col-md-4 col-sm-6 text-lg-start text-md-start text-sm-start text-center';
            } elseif ( $count == 2 ) {
            	$foot13 = 'col-lg-6 col-md-4 col-sm-6 text-lg-start text-md-start text-sm-start text-center';
               $foot2 = 'col-lg-6 col-md-4 col-sm-6 text-lg-start text-md-start text-sm-start text-center';
               $foot4 = 'col-lg-6 col-md-4 col-sm-6 text-lg-start text-md-start text-sm-start text-center';
            } elseif ( $count == 3 ){
            	$foot13 = 'col-lg-3 col-md-4 col-sm-6 text-lg-start text-md-start text-sm-start text-center';
               $foot2 = 'col-lg-6 col-md-4 col-sm-12 text-lg-start text-md-start text-sm-start text-center';
               $foot4 = 'col-lg-6 col-md-4 col-sm-12 text-lg-start text-md-start text-sm-start text-center';
            } else {
            	$foot13 = 'col-lg-3 col-md-6 col-sm-6 col-12 text-lg-start text-md-start text-sm-start text-center';
               $foot2 = 'col-lg-2 col-md-6 col-sm-6 col-12 text-lg-start text-md-start text-sm-start text-center';
               $foot4 = 'col-lg-4 col-md-6 col-sm-6 col-12 text-lg-start text-md-start text-sm-start text-center';
            }			
                    	 
                  		?>
         <?php
            if ( is_active_sidebar('footer-1') != '' || is_active_sidebar('footer-2') != '' || is_active_sidebar('footer-3') != '' || is_active_sidebar('footer-4') != ''){
             ?>
         <div class="row footer-details">
            <div class="<?php if ( is_active_sidebar('footer-1') == '' ) { echo 'footer_hide'; } else { echo esc_html( $foot13 ); } ?> footer1">
               <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
            <div class="<?php if ( is_active_sidebar('footer-2') == '' ) { echo 'footer_hide'; } else { echo esc_html( $foot2 ); } ?> footer2">
               <?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
            <div class="<?php if ( is_active_sidebar('footer-3') == '' ) { echo 'footer_hide'; } else { echo esc_html( $foot13 ); } ?> footer3">
               <?php dynamic_sidebar( 'footer-3' ); ?>
            </div>
            <div class="<?php if ( is_active_sidebar('footer-4') == '' ) { echo 'footer_hide'; } else { echo esc_html( $foot4 ); } ?>">
               <?php dynamic_sidebar( 'footer-4' ); ?>
            </div>
         </div>
         <?php } ?>
      </div>
      
   </div>

      <?php if(get_theme_mod('drop_shipping_pro_genral_section_show_scroll_top',true) == "1") {?>
         <a href="javascript:" id="return-to-top">
            <i class="<?php echo esc_html(get_theme_mod('drop_shipping_pro_scroll_to_top_icon')); ?>">
            </i>
            <span class="screen-reader-text"><?php esc_html_e( 'srcoll arrow','dropshipping-store-pro' );?></span>
         </a>
      <?php }?> 
   <!-- #footer_box -->
</section>
