<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<section>

	<div class="container">

		<div class="row">

			<?php 
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;
				
				the_posts_navigation();

				else :
					get_template_part( 'template-parts/content', 'none' );

				endif; 
			?>
		</div>
	</div>
</section>

</div><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
