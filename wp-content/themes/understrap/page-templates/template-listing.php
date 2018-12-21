<?php
/**
 * Template Name: My Custom Post Type Listing
 */

get_header(); ?>
<?php 
// main image
$image = get_field('me_main_image');
if( !empty($image) ): 
?>
<div class="full-width-hero">
    <img class="hero-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	<a href="#" class="scroll-down" address="true"></a>    
</div>
	
<?php endif; ?>


<main class="container wrapper" id="full-width-page-wrapper">
	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="blue-title"><?php the_title(); ?></h1>
		<?php 
        $heading = get_field('me_subheading');
        if( !empty($heading) ): 
        ?>
        <h3><?php echo $heading; ?></h3>

        <?php endif; ?>

		<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => - 1,
			);
			$q    = new WP_Query( $args );
		?>

		<ul class="row blog-posts">
			<?php while ( $q->have_posts() ) : $q->the_post(); ?>
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
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>

	<?php endwhile; ?>
</main>

<?php get_footer();