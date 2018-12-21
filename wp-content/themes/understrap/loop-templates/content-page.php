<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php if ( is_front_page() ) : ?><!--main page-->
<section class="recents-wrapper pb-5">
    <h2 class="text-center"><?php _e('MEGAGEN IESPĒJAS', 'understrap'); ?></h2>
    <?php 
        $heading = get_field('me_subheading');
        if( !empty($heading) ): 
        ?>
        <h3><?php echo $heading; ?></h3>

    <?php endif; ?>
    <ul class="pl-0 recents-posts row">

    <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>

    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

    <li class="col-md-4 col-sm-6 col-12">
       <div class="box-shadow">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('featured'); ?>
            </a>
            <div class="p-3">
                <a class="recent-title" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                </a>
                <div class="recent-excerpt"><?php the_excerpt(__('(more…)')); ?></div>
            </div>
        </div>
    </li>

    <?php 
        endwhile;
        wp_reset_postdata();
    ?>
    </ul>
</section>


<?php if( have_rows('me_features') ): ?>
<section class="mt-5">
    <i class="far fa fa-thumbs-o-up feat"></i>

    <h2 class="text-center"><?php _e('MEGAGEN PRIEKŠROCĪBAS', 'understrap'); ?></h2>

	<ul class="main-features row pl-0 pt-5">

	<?php while( have_rows('me_features') ): the_row(); 

		// vars
		$featureTitle = get_sub_field('me_f_title');
		$featureDesc = get_sub_field('me_f_description');
		?>

		<li class="align-items-stretch col-12 col-md-4 col-sm-6 d-flex">
            <div class="feature box-shadow">		
                <h4><?php echo $featureTitle; ?></h4>
                <div class="feat-desc"><?php echo $featureDesc; ?></div>
            </div>
		</li>

	<?php endwhile; ?>

	</ul>


</section>
<?php endif; ?>
<?php endif; ?> <!--main page end-->

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    

	<header class="entry-header blue-title<?php if ( is_front_page() ) : ?> d-none<?php endif; ?>">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->
			<?php 
        $heading = get_field('me_subheading');
        if( !empty($heading) ): 
        ?>
        <h3<?php if ( is_front_page() ) : ?> class="d-none"<?php endif; ?>><?php echo $heading; ?></h3>

        <?php endif; ?>

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content pt-5">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->



<?php if ( is_page( 55 ) ) : ?><!-- about page-->

<?php if( have_rows('me_why_megagen') ): ?>
<section class="mt-5">

    <h2 class="text-center"><?php _e('kas ir megagen', 'understrap'); ?></h2>

	<ul class="main-features row pl-0 pt-5">

	<?php while( have_rows('me_why_megagen') ): the_row(); 

		$whyTitle = get_sub_field('me_wm_title');
		$whyDesc = get_sub_field('me_wm_desc');
		?>

		<li class="align-items-stretch col-12 col-md-4 col-sm-6 d-flex">
            <div class="feature box-shadow">		
                <h4><?php echo $whyTitle; ?></h4>
                <div class="feat-desc"><?php echo $whyDesc; ?></div>
            </div>
		</li>

	<?php endwhile; ?>

	</ul>

</section>
<?php endif; ?>
<?php if( have_rows('me_what_are_dental_implants') ): ?>
<section class="mt-5">

    <h2 class="text-center"><?php _e('Kādi ir Megagen implantu veidi', 'understrap'); ?></h2>

	<ul class="main-features row pl-0 pt-5">

	<?php while( have_rows('me_what_are_dental_implants') ): the_row(); 

		$whatTitle = get_sub_field('me_wadi_title');
		$whatDesc = get_sub_field('me_wadi_description');
		?>

		<li class="align-items-stretch col-12 col-md-4 col-sm-6 d-flex">
            <div class="feature box-shadow">		
                <h4><?php echo $whatTitle; ?></h4>
                <div class="feat-desc"><?php echo $whatDesc; ?></div>
            </div>
		</li>
	<?php endwhile; ?>

	</ul>

</section>
<?php endif; ?>
<?php if( have_rows('me_megagen_wins') ): ?>
<section class="mt-5">

    <h2 class="text-center"><?php _e('Megagen uzvar', 'understrap'); ?></h2>

	<ul class="main-features row pl-0 pt-5">

	<?php while( have_rows('me_megagen_wins') ): the_row(); 

		$winTitle = get_sub_field('me_mw_title');
		$winDesc = get_sub_field('me_mw_description');
		?>

		<li class="align-items-stretch col-12 col-md-4 col-sm-6 d-flex">
            <div class="feature box-shadow">		
                <h4><?php echo $winTitle; ?></h4>
                <div class="feat-desc"><?php echo $winDesc; ?></div>
            </div>
		</li>
	<?php endwhile; ?>

	</ul>

</section>
<?php endif; ?>


<?php endif; ?><!--about page end-->

