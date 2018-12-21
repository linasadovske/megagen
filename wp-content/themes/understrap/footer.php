<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="container-fluid">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info d-flex flex-wrap">
                        <div class="col-md-6 col-12">
                            <?php understrap_site_info(); ?>
                            &copy; <?php bloginfo( 'name' ); ?> 2017 – <?php echo date('Y'); ?> 
                        </div>
                        <div class="col-md-6 col-12 text-md-right">
                            <?php _e('Izveidojis:', 'understrap'); ?> <a href="https://adisoft.lt/" target="_blank" title="Adisoft">Adisoft</a>
                        </div>						

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

