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
	wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', true );

   	wp_enqueue_style( 'font-awesome-free', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '5.0.0', 'all' );
	wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
    //Theme's main stylesheet
    wp_enqueue_style( 'hero-theme-style', get_stylesheet_uri(), array(), '1.0', 'all' );

    // Google Fonts
  	wp_enqueue_style( 'Montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;900&display=swapt' );

	wp_enqueue_style( 'Open Sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap' );

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

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */
add_action( 'widgets_init', 'fancy_lab_sidebars' );
function fancy_lab_sidebars(){
	register_sidebar( array(
		'name'          => esc_html__( 'Fancy Lab Main Sidebar', 'fancy-lab' ),
		'id'            => 'fancy-lab-sidebar-1',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'fancy-lab' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Shop', 'fancy-lab' ),
		'id'            => 'fancy-lab-sidebar-shop',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'fancy-lab' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'fancy-lab' ),
		'id'            => 'fancy-lab-sidebar-footer1',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'fancy-lab' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'fancy-lab' ),
		'id'            => 'fancy-lab-sidebar-footer2',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'fancy-lab' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'fancy-lab' ),
		'id'            => 'fancy-lab-sidebar-footer3',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'fancy-lab' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
}

/**
 * Adds custom classes to the array of body classes.
 */
function fancy_lab_body_classes( $classes ) {

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'fancy-lab-sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if ( ! is_active_sidebar( 'fancy-lab-sidebar-shop' ) ) {
		$classes[] = 'no-sidebar-shop';
	}

	if ( ! is_active_sidebar( 'fancy-lab-sidebar-footer1' ) && ! is_active_sidebar( 'fancy-lab-sidebar-footer2' ) && ! is_active_sidebar( 'fancy-lab-sidebar-footer3' ) ) {
		$classes[] = 'no-sidebar-footer';
	}

	return $classes;
}
add_filter( 'body_class', 'fancy_lab_body_classes' );


add_action( 'customize_register', 'themename_customize_register' );
function themename_customize_register($wp_customize) { 

	$wp_customize->add_section( 'slides', array(
		'title'          => 'Slides',
		'priority'       => 25,
	) );

	$wp_customize->add_setting( 'first_slide', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'first_slide', array(
		'label'   => 'First Slide',
		'section' => 'slides',
		'settings'   => 'first_slide',
	) ) );

	$wp_customize->add_setting( 'second_slide', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'second_slide', array(
		'label'   => 'Second Slide',
		'section' => 'slides',
		'settings'   => 'second_slide',
	) ) );

	$wp_customize->add_setting( 'third_slide', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'third_slide', array(
		'label'   => 'Third Slide',
		'section' => 'slides',
		'settings'   => 'third_slide',
	) ) );
}