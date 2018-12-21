<?php
/**
 * Template Name: Team
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

<div id="post-<?php the_ID(); ?>">
 <main class="container wrapper" id="full-width-page-wrapper" >
 
 	<header class="entry-header blue-title">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->
			<?php 
        $heading = get_field('me_subheading');
        if( !empty($heading) ): 
        ?>
        <h3><?php echo $heading; ?></h3>

        <?php endif; ?>

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
<section class="mt-5">

    <h3>Izvēlies pilsētu</h3>   
<!--    filter -->
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" class="col-md-6 col-12 mx-md-auto text-center">
	<?php
		if( $terms = get_terms( 'cities', 'orderby=name' ) ) : 
			echo '<div class="form-group"> <select name="citiesfilter"  class="form-control"><option>Select city...</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
			endforeach;
			echo '</select></div>';
		endif;
	?>
	<button type="submit" class="btn btn-primary mb-2">Apply filter</button>
	<input type="hidden" name="action" value="myfilter">
</form>
<div id="response"></div>
<!--    filter end -->
<?php 

$args = array(
    'post_type'   => 'specialists',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'orderby' => 'title'
 );
 
$specialists = new WP_Query( $args );
if( $specialists->have_posts() ) :
?>
	<div class="doctors row pl-0 pt-5">			
		<div id="accordion" class="w-100">
         <?php 
            $i = 1; 
             while( $specialists->have_posts() ) :
        $specialists->the_post();

            $docName = get_field('me_d_firstname_lastname');
            $docJob = get_field('me_d_job_title');
            $docProfile = get_field('me_d_profile_pic');
            $docBio = get_field('me_d_bio'); 
            ?>
          <div class="card">
            <div class="card-header">
             
              <a class="card-link d-flex align-items-center <?php if ($i != 1): ?> collapsed<?php endif; ?>" data-toggle="collapse" href="#collapse<?php echo $i; ?>" aria-expanded="<?php if ($i == 1): ?>true<?php else: ?>false<?php endif; ?>" aria-controls="collapse<?php echo $i; ?>">
               <img class="doc-image rounded" src="<?php echo $docProfile['url']; ?>" alt="<?php echo $docProfile['alt']; ?>" />
               <div class="pl-3">
                   <div class="doc-name"><?php echo $docName; ?></div>
                   <div class="doc-job"><?php echo $docJob; ?></div>
               </div>
                  <i class="fas fa-plus fa"></i><i class="fas fa-minus fa"></i>
              </a>
            </div>
            <div id="collapse<?php echo $i; ?>" class="collapse<?php if ($i == 1): ?> show<?php endif; ?>" data-parent="#accordion">
              <div class="card-body">
                <h3><?php _e('Informācija par ārstu:', 'understrap'); ?></h3>
                <?php echo $docBio; ?>
                    <?php if( have_rows('me_d_contacts') ):?>
                    <div class="contacts-1">
                        <?php while( have_rows('me_d_contacts') ): the_row(); 
                            $docCity = get_sub_field('me_d_c_city');
                            $docClinic = get_sub_field('me_d_c_clinic');
                            $docPhone = get_sub_field('me_d_c_phone');
                            $docEmail = get_sub_field('me_d_c_email'); 
                            $docAddress = get_sub_field('me_d_c_address'); 
                        ?>
                            <h4 class="text-uppercase"><?php _e('Kontaktinformācija:', 'understrap'); ?></h4>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('pilsēta:', 'understrap'); ?></span>
                                <?php echo $docCity; ?>
                            </div>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('KLĪNIKA:', 'understrap'); ?></span> 
                                <?php echo $docClinic; ?>
                            </div>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('TĀLRUNIS:', 'understrap'); ?></span> 
                                <?php echo $docPhone; ?>
                            </div>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('E-PASTS:', 'understrap'); ?></span> 
                                <a href="mailto:<?php echo $docEmail; ?>" title="<?php _e('Contact', 'understrap'); ?>"><?php echo $docEmail; ?></a>
                            </div>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('ADRESE:', 'understrap'); ?></span> 
                                <?php echo $docAddress; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>  
                     
                    <?php if (have_rows('me_d_contacts_copy')) : ?>                             
                    <div class="contacts-2">                
                        <?php while( have_rows('me_d_contacts_copy') ): the_row(); 
                            $docCity2 = get_sub_field('me_d_c_city2');
                            $docClinic2 = get_sub_field('me_d_c_clinic2');
                            $docPhone2 = get_sub_field('me_d_c_phone2');
                            $docEmail2 = get_sub_field('me_d_c_email2'); 
                            $docAddress2 = get_sub_field('me_d_c_address2'); 
                        ?>
                            <h4 class="text-uppercase"><?php _e('PAPILDUS KLĪNIKAS:', 'understrap'); ?></h4>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('pilsēta:', 'understrap'); ?></span>
                                <?php echo $docCity2; ?>
                            </div>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('KLĪNIKA:', 'understrap'); ?></span> 
                                <?php echo $docClinic2; ?>
                            </div>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('TĀLRUNIS:', 'understrap'); ?></span> 
                                <?php echo $docPhone2; ?>
                            </div>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('E-PASTS:', 'understrap'); ?></span> 
                                <a href="mailto:<?php echo $docEmail2; ?>" title="<?php _e('Contact', 'understrap'); ?>"><?php echo $docEmail2; ?></a>
                            </div>
                            <div class="mb-3">
                                <span class="font-weight-bold text-uppercase"><?php _e('ADRESE:', 'understrap'); ?></span> 
                                <?php echo $docAddress2; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>                    
                    <?php endif; ?>                    
              </div>
            </div>
          </div>
          <?php 
            $i++;
            endwhile;
      wp_reset_postdata();
            ?>
        </div>
	</div>
</section>

<?php
else :
  esc_html_e( 'No specialists found!', 'understrap' );
endif;
?>
</main>
</div>
<?php get_footer();
