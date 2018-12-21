<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
   <div class="full-width">
   <?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
   <a href="#" class="scroll-down" address="true"></a>  
   </div>   
    

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title blue-title">', '</h1>' ); ?>

		<div class="entry-meta d-none">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	

	<div class="entry-content col-md-8 mx-auto">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->
	
	<section class="recents-wrapper pb-5">

        <ul class="pl-0 recents-posts row owl-carousel owl-theme">

        <?php $the_query = new WP_Query( 'posts_per_page=6' ); ?>

        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

        <li class="item">
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

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
