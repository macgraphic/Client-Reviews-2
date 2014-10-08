<?php
 /*
 * Template Name: Client Reviews
 */
 
get_header(); ?>

<div id="contentrow">
	<div id="contentwrap">    
	    <section class="container row" role="document">
	    	<div id="content" class="medium-8 large-9 columns" role="main">
			    <?php
			    $mypost = array( 'post_type' => 'client_reviews', );
			    $loop = new WP_Query( $mypost );
			    ?>

				<div class="row">	

					<div class="large-12 columns">
						<div class="cta row">
							<div class="large-6 columns">
								<h6>Has Sanjay handled your case?<br />Or helped you?</h6>
							</div>
							<div class="large-6 columns">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>client-testimonials/submit-a-client-testimonial/" target="_self" alt="submit a client testimonial" class="radius button">
								Submit a client review</a>
							</div>
						</div>
					</div>

					<?php while ( $loop->have_posts() ) : $loop->the_post();?>

		    	    
		    	    	<div class="large-12 columns">
					        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					            <header class="entry-header">
					 
					                <!-- Display featured image in right-aligned floating div -->
					                <div style="float: right; margin: 10px">
					                    <?php the_post_thumbnail( array( 100, 100 ) ); ?>
					                </div>
					 
					                <!-- Display Title  -->
					                <h6 class="review-title"><?php the_title(); ?></h6>
					                
					                <!-- Display stars based on rating -->
					                Rating:
					                <?php
					                $nb_stars = intval( get_post_meta( get_the_ID(), 'client_rating', true ) );
					                for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
					                    if ( $star_counter <= $nb_stars ) {
					                        echo '<img class="review-star" src="' . plugins_url( 'Client-Reviews/images/gold.png' ) . '" />';
					                    } else {
					                        echo '<img class="review-star" src="' . plugins_url( 'Client-Reviews/images/grey.png' ). '" />';
					                    }
					                }
					                ?>
					            </header>
					 
					            <!-- Display client review comments -->
					            <div class="entry-content"><?php the_content(); ?></div>
					            
								<!-- Client Name -->
					            <p class="review-client"><?php echo esc_html( get_post_meta( get_the_ID(), 'client_name', true ) ); ?></p>
					        </article>
					 	</div>

					<?php endwhile; ?>

				</div>

				<div class="row">
					<div class="navigation large-12 columns">
						<?php
						// Bring $wp_query into the scope of the function
						global $wp_query;

						// Backup the original property value
						$backup_page_total = $wp_query->max_num_pages;

						// Copy the custom query property to the $wp_query object
						$wp_query->max_num_pages = $loop->max_num_pages;
						?>

						<!-- now show the paging links -->
						<div class="alignleft"><?php previous_posts_link('Previous Entries'); ?></div>
						<div class="alignright"><?php next_posts_link('Next Entries'); ?></div>

						<?php
						// Finally restore the $wp_query property to it's original value
						$wp_query->max_num_pages = $backup_page_total;
						?>
					</div>
				</div>

				<div class="cta row">
					<div class="large-6 columns">
						<h6>Has Sanjay handled your case?<br />Or helped you?</h6>
					</div>
					<div class="large-6 columns">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>client-testimonials/submit-a-client-testimonial/" target="_self" alt="submit a client testimonial" class="radius button">
						Submit a client review</a>
					</div>
				</div>

		    </div><!-- #content -->

			<?php get_sidebar(); ?>
	</div><!-- #contentwrap -->
<?php wp_reset_query(); ?>

</div> <!-- #contentrow -->
<?php get_footer(); ?>