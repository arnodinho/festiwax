<?php
   /**
    * The Template for displaying Contact.
    *
    * @package dropshipping-store-pro
    */
   /**
    * Template Name: Contact
   */
get_header(); 
get_template_part( 'template-parts/banner/banner' );?>

<?php do_action('drop_shipping_pro_before_contact_title'); ?>
<section id="contact" class="pb-0">
	<div class="container">
		<div class="row contact-box">
			<div class="text-center section-title">
				<h4>
					<?php if(get_theme_mod('drop_shipping_pro_contact_page_block_main_title') != ''  ){?>
						<h4 class="">
						 <?php echo esc_html(get_theme_mod('drop_shipping_pro_contact_page_block_main_title')); ?>
						</h4>
          <?php } ?>
			</div>
			<?php
         $number =  get_theme_mod('drop_shipping_pro_contact_box_number',3);
          for ($i=1; $i<=$number; $i++) { ?>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12 <?php if($i == 1){ echo 'active';}?>  text-md-start text-sm-start text-center" >
            <div class="row mt-2 mb-5  hvr-shutter-in-vertical feature-block-inner feature-block<?php echo $i ?>">
              <div class="inner-box my-1 py-4 mx-sm-3 mx-auto">
              	<div class="text-center mb-3">
	                <i class="<?php echo esc_html(get_theme_mod('drop_shipping_pro_contact_box_icon'.$i)); ?> align-middle"></i>
	              </div>
	              <div class="text-center">
	                <div>
	                  <h3 class="feature-block-title">
	                    <?php echo esc_html(get_theme_mod('drop_shipping_pro_contact_box_heading'.$i)); ?>
	                  </h3>
	                </div>
	                <div>
	                	<?php if ( get_theme_mod('drop_shipping_pro_contact_box_text', true) != '') { 

											$var = esc_html(get_theme_mod('drop_shipping_pro_contact_box_text'.$i));

											$link = '';
											if ( $i == 1 ) {
												$link = "<a href='mailto".$var."'>".$var."</a>";
											} elseif ($i == 2) {
												$link = "<a href='http://maps.google.com/?q=".$var."'>".$var."</a>";
											} elseif ( $i == 3) {
												$link = "<a href='tel:".$var."'>".$var."</a>";
											}

											?>
										  	<div class="feature-block-text">
										    	<?php echo $link; ?>
											</div>
										<?php } ?>
	                </div>
	              </div>
              </div>
            </div>
          </div>
      <?php } ?>
			<div class="contact-shortcode">
				<div class="section-title contact-form-heading text-center">
					<?php if(get_theme_mod('drop_shipping_pro_contact_page_main_title') != ''  ){?>
						<h4 class="">
						 <?php echo esc_html(get_theme_mod('drop_shipping_pro_contact_page_main_title')); ?>
						</h4>
          <?php } ?>
				</div>
				<div class="contact-form">
					<?php echo do_shortcode(get_theme_mod('drop_shipping_pro_contact_page_shortcode')); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid p-0">
		<div class="contact-map">
			<?php if ( get_theme_mod('drop_shipping_pro_address_latitude',true) != "" && get_theme_mod('drop_shipping_pro_address_longitude',true) != "" ) {?>
		         <embed width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_attr(get_theme_mod('drop_shipping_pro_address_latitude','21.145800')); ?>,<?php echo esc_attr(get_theme_mod('drop_shipping_pro_address_longitude','79.088155')); ?>&hl=es;z=14&amp;output=embed"></embed>
         <?php }?>
		</div>
	</div>
</section>
<?php do_action('drop_shipping_pro_before_footer'); ?>
<?php get_footer(); ?>

