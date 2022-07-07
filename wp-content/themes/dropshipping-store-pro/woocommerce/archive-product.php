<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

   $banner_img_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_banner_bgimage')).'\')';

 ?>
<div class="banner-image py-2 mt-4" style="<?php echo esc_attr($banner_img_backg);?>" class="mt-4">
   <div class="banner-image-inner-box"></div>
   <div class="tm-titlebar-inner-wrapper">
      <div class="entry-title-watermark">
         <h1 class="text-center entry-title"><?php echo woocommerce_page_title() ?></h1>
      </div>
      <div class="container py-5 mt-2 mb-3">
      	<div class="bradcrumbs text-center">
            <?php bwt_shop_breadcrumbs(); ?>
     	</div>
     	<h2 class="text-center entry-title"><?php echo woocommerce_page_title() ?></h2>
      </div>
   </div>
</div>
<?php 
$postcol1='';
$postcol2='';

if(get_theme_mod('drop_shipping_pro_products_shop_page_sidebar',true)=='1')
{
	$postcol1="col-lg-9 col-md-12";
	$postcol2="col-lg-3 col-md-12";
	
}else
{
	$postcol1="col-lg-12 col-md-12";
	$postcol2="";
}

?>
<div class="shop">
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
	<div class="row">
		<div class="<?php echo esc_html($postcol1); ?>">
			<header class="woocommerce-products-header">

				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
				?>
			</header>
			<?php
			if ( woocommerce_product_loop() ) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}?>
		</div>
		<?php if(get_theme_mod('drop_shipping_pro_products_shop_page_sidebar',true)=='1'){ ?>
			<div class="<?php echo esc_html($postcol2); ?> mt-5">
				<?php if(is_active_sidebar('shop-page-sidebar')){?>
					<div id="sidebar">
						<?php dynamic_sidebar('shop-page-sidebar');?>
					</div>
				<?php }else{
				/**
				 * Hook: woocommerce_sidebar.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
				} ?>
			</div>
		<?php } ?>	
	</div>
	<?php
		/**
		* Hook: woocommerce_after_main_content.
		*
		* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		*/
	do_action( 'woocommerce_after_main_content' );?>
</div>
<?php
get_footer( 'shop' );