<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php
	$cat = $wp_query->get_queried_object();
    $category = get_category( $cat->term_id );
    $backgroundColor = get_field( 'cor_de_fundo', $category);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>

	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title">', '</h2>' );

			if ( 'post' === get_post_type() ) : 
		?>

				<div class="entry-meta d-none">
					<?php wp_bootstrap_starter_posted_on(); ?>
				</div><!-- .entry-meta -->

				<div>
					<p class="u-font-size-14 u-font-weight-medium">
						<strong>Em:</strong> <?php echo get_the_date( 'd/m/Y', $post->ID ); ?>
					</p>
				</div>
		<?php
			endif; 
		?>

		<div class="entry-content">
			<?php echo(limit_words(get_the_excerpt(), 25)); ?>

			<!--
			if ( is_single() ) :
				the_content();
			else :
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
			endif;

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
					'after'  => '</div>',
				) );
			-->
		</div><!-- .entry-content -->

		<div>

			<div class="row">

				<div class="col-md-3 mt-3">

					<a 
					class="l-news__highlight__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-size-14 u-font-weight-bold text-center text-decoration-none u-color-folk-white py-2 px-4" 
					style="background-color: <?php echo $backgroundColor ? $backgroundColor : '#0B4DAD !important'; ?>;" 
					href="<?php the_permalink() ?>">
						Ler mais
					</a>
				</div>
			</div>
		</div>

	</header><!-- .entry-header -->
	
	<footer class="entry-footer d-none">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->
