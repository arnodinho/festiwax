<?php
   /**
    * Template to show the content of Copyright Content
    *
    * @package dropshipping-store-pro
    */ 
   
   $footer_copy_section = get_theme_mod( 'drop_shipping_pro_footer_section_enable' );
   if ( 'Disable' == $footer_copy_section ) {
     return;
   }

   ?>
<div class="bwt-copyright py-3">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-7 col-12">
            <div class="copyright-text">
               <p class="mb-0 ms-sm-5 ms-0">
                  <?php echo esc_html( get_theme_mod( 'drop_shipping_pro_footer_copy' ) ); ?>
               </p>
            </div> 
         </div>
         <div class="col-lg-6 col-md-6 col-sm-5 col-12">
            <div class="footer-social-icon mt-sm-0 mt-3 text-sm-end text-center me-sm-5 me-0">
               <?php
               $Social_footer_icon=get_theme_mod('drop_shipping_pro_footer_social_icon_link_number');
                 for($i=1;$i<=$Social_footer_icon;$i++)
                        { ?>
                 <a class="social_icon me-2 icon icon-fill" href="<?php echo esc_url( get_theme_mod( 'drop_shipping_pro_footer_social_icon_link'.$i ) ); ?>" target="_blank">
                   <i class="<?php echo esc_html(get_theme_mod('drop_shipping_pro_footer_social_icon_picker'.$i)); ?> align-middle "></i>
                 </a>  
             <?php } ?>
            </div>
         </div>
      </div>      
   </div>
   
</div>