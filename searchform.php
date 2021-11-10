<?php
/**
 * Template for displaying search forms in Hero Theme
 *
 * @package Hero Theme
 */
?>

<form role="search" method="get" class="nav-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
	<input type="search" class="nav-search-input" placeholder="<?php echo esc_attr_x( 'Buscar produtos, marcas e muito mais…', 'placeholder', 'hero-theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="nav-search-btn">
		<div role="img" class="nav-icon-search"><?php echo esc_html_x( '', 'submit button', 'hero-theme' ); ?>
		</div>
	</button>
	<?php 
	// If WooCommerce is activated, we'll be searching among products, not posts
	if( class_exists( 'WooCommerce' ) ): 
	?>
		<input type="hidden" value="product" name="post_type" id="post_type" />
	<?php endif; ?>
</form>