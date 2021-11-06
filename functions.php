<?php
/**
 * Hero Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hero Theme
 */

require_once get_template_directory() . '/inc/customizer.php';

 /**
  * Enqueue scripts and styles
 */
 function hero_theme_scripts(){
   wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.5.1', true );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '5.0.0', 'all' );
    //Theme's main stylesheet
    wp_enqueue_style( 'hero-theme-style', get_stylesheet_uri(), array(), '1.0', 'all' );

    // Google Fonts
   wp_enqueue_style( 'rajdhani', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );
   wp_enqueue_style( 'crimson ', 'https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap' );
   wp_enqueue_style( 'dancing', 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap' );

 }
add_action( 'wp_enqueue_scripts', 'hero_theme_scripts' );

function hero_theme_config(){
   //Bootstrap Menu
   require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

   register_nav_menus(
      array(
         'hero_theme_main_menu' => 'Hero Theme Main Menu',
         'hero_theme_footer_menu' => 'Hero Theme Footer Menu'
      )
   );
   
   add_theme_support( 'woocommerce', array(
      'thumbnail_image_width'    => 255,
      'sigles_image_width'       => 255,
      'product_grid'             => array(
            'default_rows'    => 10,
            'min_rows'        => 5,
            'max_rows'        => 10,
            'default_columns' => 1,
            'min_columns'     => 1,
            'max_columns'     => 1,

      )
   ));
   add_theme_support( 'wc-product-gallery-zoom' );
   add_theme_support( 'wc-product-gallery-lightbox' );
   add_theme_support( 'wc-product-gallery-slider' );
   /* Logo */
   add_theme_support( 'custom-logo', array(
      'height'       => 85,
      'width'        => 160,
      'flex_height'  => true,
      'flex_width'   => true
   ) );

   add_image_size( 'hero-slider', 1920, 800, array('center', 'center') );

   if ( ! isset( $content_width ) ) {
      $content_width = 600;
   }

}
/* Hooks */
add_action( 'after_setup_theme', 'hero_theme_config', 0 );
if(class_exists('WooCommerce')){
   require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'hero_theme_woocommerce_header_add_to_cart_fragment' );

function hero_theme_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}