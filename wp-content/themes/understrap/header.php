<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-lg navbar-light">

		<?php if ( 'container' == $container ) : ?>
			<div class="container-fluid" >
		<?php endif; ?>

                <!-- Your site title as branding in the menu -->
                <?php if ( ! has_custom_logo() ) { ?>

                    <?php if ( is_front_page() && is_home() ) : ?>

                        <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                    <?php else : ?>

                        <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

                    <?php endif; ?>


                <?php } else {
                    the_custom_logo();
                } ?><!-- end custom logo -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="d-flex justify-content-between justify-content-lg-center align-items-center mx-auto mt-3 mt-md-auto flex-wrap">
                <?php if( is_user_logged_in() ) : ?> 
                   <div class="order-1">
                    <?php echo get_product_search_form(); ?>
                    </div>
                <?php endif; ?>
                <!-- The WordPress Menu goes here -->
                <?php wp_nav_menu(
                    array(
                        'theme_location'  => 'primary',
                        'container_class' => 'collapse navbar-collapse order-3 order-lg-2',
                        'container_id'    => 'navbarNavDropdown',
                        'menu_class'      => 'navbar-nav navbar-expand-lg mx-0 mx-xl-5',
                        'fallback_cb'     => '',
                        'menu_id'         => 'main-menu',
                        'depth'           => 2,
                        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                    )
                ); ?>
                <?php if( is_user_logged_in() ) : ?>  
                   <div class="order-2 order-lg-3">
                    <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

                    $count = WC()->cart->cart_contents_count;
                    ?>
                    <a class="cart-contents fas fa fa-shopping-cart" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
                    if ( $count > 0 ) {
                        ?>
                        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
                        <?php
                    }
                        ?></a>
                    <?php } ?>
                    </div>
                <?php endif; ?>
            </div>				
            <div class="clients-zone d-none d-lg-block">
               <?php if( is_user_logged_in() ) : ?> 
                <a class="btn btn-secondary text-uppercase" title="<?php esc_attr_e( 'Log out', 'understrap' ); ?>" href="<?php echo esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) ); ?>">                    
                    <i class="fas fa fa-sign-out"></i>
                    <?php esc_attr_e( 'Log out', 'understrap' ); ?>
                </a>
               <?php else : ?>
                <a class="btn btn-secondary text-uppercase" title="<?php esc_attr_e( 'Klientu zona', 'understrap' ); ?>" href="<?php echo get_permalink( wc_get_page_id( 'login' ) ); ?>"> 
                    <i class="fas fa-user-md fa"></i> 
                    <?php esc_attr_e( 'Klientu zona', 'understrap' ); ?>
                </a>
                <?php endif; ?>
            </div>
        <?php if ( 'container' == $container ) : ?>
        </div><!-- .container -->
        <?php endif; ?>

    </nav><!-- .site-navigation -->

</div><!-- #wrapper-navbar end -->
