<?php
/**
 * The archive page for the Client Reviews
 *
 * @package Sanjay Law
 */

get_header(); ?>

<div id="contentrow">
	<div id="contentwrap">
		<section class="container row" role="document">
			
	<div id="primary" class="content-area medium-8 large-9 columns">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

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
					 	</div>	<!-- .archive-block .row -->

			<?php endwhile; ?>

			<?php sbl_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

	</div> <!-- #contentwrap -->
</div> <!-- #contentrow -->

<?php get_footer(); ?>
