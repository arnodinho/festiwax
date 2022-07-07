<?php
/**
 * dropshipping-store-pro functions and definitions
 *
 * @package dropshipping-store-pro
 */

if ( ! function_exists( 'drop_shipping_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function drop_shipping_pro_setup() {
	$GLOBALS['content_width'] = apply_filters( 'drop_shipping_pro_content_width', 640 );
	if ( ! isset( $content_width ) ) $content_width = 640;
	load_theme_textdomain( 'dropshipping-store-pro', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('dropshipping-store-pro-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'dropshipping-store-pro' )
	) );

	register_nav_menus( array(
       'footer 1'   => __( 'Footer Menu 1', 'dropshipping-store-pro' ),
 	) );

	register_nav_menus( array(
       'footer 2'   => __( 'Footer Menu 2', 'dropshipping-store-pro' ),
    ) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( array( 'assets/css/editor-style.css') );
}
endif;
add_action( 'after_setup_theme', 'drop_shipping_pro_setup' );

/* Theme Widgets Setup */
function drop_shipping_pro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'dropshipping-store-pro' ),
		'description'   => __( 'Appears on blog page sidebar', 'dropshipping-store-pro' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => __('Blog Left Sidebar', 'dropshipping-store-pro'),
		'description'   => __('Appears on blog page left sidebar', 'dropshipping-store-pro'),
		'id'            => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Blog Right Sidebar', 'dropshipping-store-pro'),
		'description'   => __('Appears on blog page left sidebar', 'dropshipping-store-pro'),
		'id'            => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'dropshipping-store-pro' ),
		'description'   => __( 'Appears on page sidebar', 'dropshipping-store-pro' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => __('Page Left Sidebar', 'dropshipping-store-pro'),
		'description'   => __('Appears on page sidebar', 'dropshipping-store-pro'),
		'id'            => 'sidebar-page-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Shop Page Sidebar', 'dropshipping-store-pro'),
		'description'   => __('Appears on shop page sidebar', 'dropshipping-store-pro'),
		'id'            => 'shop-page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'dropshipping-store-pro' ),
		'description'   => __( 'Appears on footer', 'dropshipping-store-pro' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'dropshipping-store-pro' ),
		'description'   => __( 'Appears on footer', 'dropshipping-store-pro' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column 3', 'dropshipping-store-pro' ),
		'description'   => __( 'Appears on footer', 'dropshipping-store-pro' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column 4', 'dropshipping-store-pro' ),
		'description'   => __( 'Appears on footer', 'dropshipping-store-pro' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-5">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'drop_shipping_pro_widgets_init' );

/* Theme Font URL */
function drop_shipping_pro_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = '--font-raleway';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Poppins';
	$font_family[] = 'PT Serif';
	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
		'display' => 'swap',
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */
function drop_shipping_pro_scripts() {
	wp_enqueue_style( 'dropshipping-store-pro-font', drop_shipping_pro_font_url(), array() );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'dropshipping-store-pro-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'dropshipping-store-pro-style', 'rtl', 'replace' );

	/* Inline style sheet */
	require get_parent_theme_file_path( '/inline_style.php' );
	wp_add_inline_style( 'dropshipping-store-pro-basic-style',$custom_css );

	if(is_rtl()){
	    wp_enqueue_style( 'dropshipping-store-pro-rtl-style', get_template_directory_uri().'/rtl.css',true, null,'all');
	    wp_add_inline_style( 'dropshipping-store-pro-rtl-style',$custom_css );
  	}
  	else{
		// ---------- CSS Enqueue -----------
		// if(is_front_page() || is_home()){
		wp_enqueue_style( 'dropshipping-store-pro-home-page-style', get_template_directory_uri().'/assets/css/main-css/home-page.css',true, null,'all');
		wp_add_inline_style( 'dropshipping-store-pro-home-page-style',$custom_css );
		// }else{
		wp_enqueue_style( 'dropshipping-store-pro-other-page-style', get_template_directory_uri() . '/assets/css/main-css/other-pages.css',true, null,'all');
		wp_add_inline_style( 'dropshipping-store-pro-other-page-style',$custom_css );
		// }
		if('post' == get_post_type() && is_home()){
		wp_enqueue_style( 'dropshipping-store-pro-other-page-style', get_template_directory_uri() . '/assets/css/main-css/other-pages.css',true, null,'all');
		wp_add_inline_style( 'dropshipping-store-pro-other-page-style',$custom_css );
		}
		wp_enqueue_style( 'dropshipping-store-pro-header-footer-style', get_template_directory_uri().'/assets/css/main-css/header-footer.css',true, null,'all' );

		wp_enqueue_style( 'dropshipping-store-pro-responsive-style', get_template_directory_uri().'/assets/css/main-css/mobile-main.css',true, null,'all' );

		wp_add_inline_style( 'dropshipping-store-pro-header-footer-style',$custom_css );
		wp_add_inline_style( 'dropshipping-store-pro-responsive-media-style',$custom_css );
  	}

  	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
	    wp_enqueue_style( 'amp-style', get_template_directory_uri().'/assets/css/main-css/amp-style.css',true, null,'all' );
  	}
  	else{

	    wp_enqueue_style( 'animation-wow', get_template_directory_uri().'/assets/css/animate.css' );
	    wp_enqueue_style( 'animation', get_template_directory_uri().'/assets/css/animation.css' );
	    wp_enqueue_style( 'aos',get_template_directory_uri().'/assets/css/aos.css' );
	    wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri().'/assets/css/owl.carousel.css' );
	    wp_enqueue_script( 'vanimation-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), true);
	    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js',array('jquery'),'',true);
  	}

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.min.css' );
	wp_enqueue_style( 'video-popup', get_template_directory_uri().'/assets/css/video.popup.css' );
	wp_enqueue_style( 'basic-font', get_template_directory_uri().'/assets/css/basicfont.css' );
	wp_enqueue_style( 'slick-css', get_template_directory_uri().'/assets/css/slick.css' );


	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'),'', true);
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/assets/js/tether.js', array('jquery'), '',true);
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js',array('jquery'),'',true);
	
	wp_enqueue_script( 'superfsh', get_template_directory_uri() . '/assets/js/jquery.superfish.js',array('jquery'),'',true);
	wp_enqueue_script( 'animation-aos', get_template_directory_uri() . '/assets/js/aos.js', array( 'jquery' ) );
	wp_enqueue_script( 'video-popup', get_template_directory_uri() . '/assets/js/video.popup.js', array( 'jquery' ) );
	wp_enqueue_script( 'slick-carousel', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ) ); 
	wp_register_script( 'dropshipping-store-pro-customscripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );

	wp_localize_script(
    'dropshipping-store-pro-customscripts',
    'bwt_custom_script_obj',
    array(
      'is_home' =>  ( is_home() || is_front_page() ),
      'home_url' =>  home_url()
    )
  );
    wp_enqueue_script( 'dropshipping-store-pro-customscripts' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js',array('jquery'),'',true);
    wp_enqueue_script( 'bootstrap-notify-js', get_template_directory_uri() . '/assets/js/bootstrap-notify.min.js', array( 'bootstrap-js' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'drop_shipping_pro_scripts' );


/* Implement the Custom Header feature. */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/* Custom template tags for this theme. */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/* Customizer additions. */
require get_parent_theme_file_path( '/inc/customize/customizer.php' );

/** Functions which enhance the theme by hooking into WordPress */
require get_parent_theme_file_path( 'inc/custom-functions.php');

/* Theme Wizard */
require get_parent_theme_file_path('/theme-wizard/config.php' );

 //about us
require get_template_directory() . '/inc/widget/about-us-widget.php';

// Contact-Widgets
require get_parent_theme_file_path( 'inc/widget/contact-widget.php');

// social-widgets
require get_parent_theme_file_path( 'inc/widget/socail-widget.php');

//require get_parent_theme_file_path( '/inc/posttype-templates/posttype-templates.php' );

// /* Breadcrumbs class. */
// require_once get_parent_theme_file_path( '/inc/breadcrumbs.php' );
 // /* Breadcrumbs class. */
function bwt_breadcrumbs() {
	if (!is_home()) {
		  echo '<a href="';
	      	echo esc_url(home_url());
	    	echo '">';
	      	echo ' Home  ';
	   	 	echo "</a> ";
		if (is_category() || is_single()) {
			the_category(', ');
			if (is_single()) {
				echo " /<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "/<span> ";
					the_title();
				echo "</span> ";
		}
	}
}
 
function bwt_product_breadcrumbs() {
	if (!is_home()) {
		  echo '<a href="';
	      	echo esc_url(home_url());
	    	echo '">';
	      	echo ' Home';
	   	 	echo "</a> ";
		if (is_category() || is_single()) {
			the_category(', ');
			if (is_single()) {
				echo " /<span> Product";
					
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "/<span> ";
					the_title();
				echo "</span> ";
		}
	}
}

function bwt_shop_breadcrumbs() {
	if (!is_home()) {
		  echo '<a href="';
	      	echo esc_url(home_url());
	    	echo '">';
	      	echo ' Home / Shop';
	   	 	echo "</a> ";
		}
}

/* URL DEFINES */
define('drop_shipping_pro_site_url','https://buywptemplates.com');
define( 'IBTANA_THEME_LICENCE_ENDPOINT', drop_shipping_pro_site_url . '/wp-json/ibtana-licence/v2/' );



add_action('switch_theme', 'drop_shipping_pro_deactivate');
function drop_shipping_pro_deactivate() {
	Whizzie::remove_the_theme_key();
	Whizzie::set_the_validation_status('false');
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 4; // arranged in 2 columns
	return $args;
}


add_filter( 'woocommerce_add_to_cart_fragments', 'vw_bakery_pro_wc_refresh_mini_cart_count');
function vw_bakery_pro_wc_refresh_mini_cart_count( $fragments ) {
  ob_start();
  $items_count = WC()->cart->get_cart_contents_count();
  ?>
    <span class="cart-value"><?php echo $items_count ? $items_count : '0'; ?></span>
  <?php
  $fragments['.cart-value'] = ob_get_clean();
  return $fragments;
}

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}

// Change the Number of WooCommerce Products Displayed Per Page
add_filter( 'loop_shop_per_page', 'lw_loop_shop_per_page', 30 );

function lw_loop_shop_per_page( $products ) {
 $products = 9;
 return $products;
}

//change text to leave a reply on comment form
function isa_comment_reform ($arg) {
$arg['title_reply'] = __('Leave Comments:');
return $arg;
}
add_filter('comment_form_defaults','isa_comment_reform');

add_filter( 'deprecated_function_trigger_error', '__return_false' );


// Adding a custom Meta container to admin products pages
add_action( 'add_meta_boxes', 'create_custom_meta_box' );
if ( ! function_exists( 'create_custom_meta_box' ) )
{
    function create_custom_meta_box()
    {
        add_meta_box(
            'custom_product_meta_box',
            __( 'Product badge', 'cmb' ),
            'add_custom_content_meta_box',
            'product',
            'normal',
            'default'
        );
    }
}
//  Custom metabox content in admin product pages
if ( ! function_exists( 'add_custom_content_meta_box' ) ){
    function add_custom_content_meta_box( $post ){
        $prefix = '_bhww_'; // global $prefix;
        $ingredients = get_post_meta($post->ID, $prefix.'ingredients_wysiwyg', true) ? get_post_meta($post->ID, $prefix.'ingredients_wysiwyg', true) : '';
        $args['textarea_rows'] = 6;
        echo '<p>'.__( 'Example : New / Sale', 'cmb' ).'</p>';
        wp_editor( $ingredients, 'ingredients_wysiwyg', $args );
        echo '<input type="hidden" name="custom_product_field_nonce" value="' . wp_create_nonce() . '">';
    }
}
//Save the data of the Meta field
add_action( 'save_post', 'save_custom_content_meta_box', 10, 1 );
if ( ! function_exists( 'save_custom_content_meta_box' ) )
{
    function save_custom_content_meta_box( $post_id ) {
        $prefix = '_bhww_'; // global $prefix;
        // We need to verify this with the proper authorization (security stuff).
        // Check if our nonce is set.
        if ( ! isset( $_POST[ 'custom_product_field_nonce' ] ) ) {
            return $post_id;
        }
        $nonce = $_REQUEST[ 'custom_product_field_nonce' ];
        //Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce ) ) {
            return $post_id;
        }
        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        // Check the user's permissions.
        if ( 'product' == $_POST[ 'post_type' ] ){
            if ( ! current_user_can( 'edit_product', $post_id ) )
                return $post_id;
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) )
                return $post_id;
        }
        // Sanitize user input and update the meta field in the database.
        update_post_meta( $post_id, $prefix.'ingredients_wysiwyg', wp_kses_post($_POST[ 'ingredients_wysiwyg' ]) );
    }
}

/*-------------- Product Front Badge ------------------*/
// Add content to custom tab in product single pages (1)
	function ingredients_product_tab_content() {
	    global $post;
	    $product_ingredients = get_post_meta( $post->ID, '_bhww_ingredients_wysiwyg', true );
	    if ( ! empty( $product_ingredients ) ) {
	        echo apply_filters( 'the_content', $product_ingredients );
	    }
	}

function remove_featured_category_from_frontend(array $terms)
{
    if ( ! is_admin() && !is_home() && is_front_page() ){
        $terms = array_filter($terms, function ($term) {
            if ($term->taxonomy === 'product_cat') {
                return $term->slug !== 'uncategorized';
            }

            return true;
        });
    }

    return $terms;
}

add_filter('get_terms', 'remove_featured_category_from_frontend');
add_filter('get_object_terms', 'remove_featured_category_from_frontend');


