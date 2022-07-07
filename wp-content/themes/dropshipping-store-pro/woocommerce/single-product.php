<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

   $banner_img_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_banner_bgimage')).'\')';

?>

<div class="banner-image py-2 mt-4" style="<?php echo esc_attr($banner_img_backg);?>" class="mt-4">
   <div class="banner-image-inner-box"></div>
   <div class="tm-titlebar-inner-wrapper">
      <div class="entry-title-watermark">
         <h1 class="text-center entry-title">Product</h1>
      </div>
      <div class="container py-5 mt-2 mb-3">
      	<div class="bradcrumbs text-center">
            <?php bwt_product_breadcrumbs(); ?>
     	</div>
     	<h2 class="text-center entry-title">Product</h2>
      </div>
   </div>
</div>

<?php

$single_product_col1="";
$single_product_col2="";
if(get_theme_mod('drop_shipping_pro_products_single_page_sidebar',true)=='1')
{
	$single_product_col1="col-lg-12 col-md-12";
	$single_product_col2="col-lg-3 col-md-12";
	
}else
{
	$single_product_col1="col-lg-12 col-md-12";
	$single_product_col2="";
}

?>
<div class="shop">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<div class="row">
		<div class="<?php echo esc_html($single_product_col1); ?>">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
		
	</div>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

</div>
<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
