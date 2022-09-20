<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evolutap
 *
 * Template Name: Template Blog
 * Template Post Type: page
 */

get_header();
?>

<div id="primary">
<main id="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php
    if( isset( $_GET[ 'cat' ] ) ) {
        $category_id = $_GET[ 'cat' ]; 
        $category_current = get_category( $category_id );
    }
?>

<section class="l-template-blogs__banner">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">

                <img
                class="img-fluid"
                src="<?php echo get_field( 'imagem_de_fundo', $category_current )?>"
                alt="<?php echo $category_current->name; ?>">
            </div>
        </div>
    </div>
</section>

<section class="l-template-blogs u-border-top-2 u-border-color-secondary">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-md-10 offset-1 d-lg-flex align-items-center mb-5">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-5">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> <?php the_title() ?>
                        </h3>

                        <p class="c-text-pattern u-line-height-100 u-font-weight-semibold mb-0 ml-3">
                            <!-- Conteúdos de todas as nossas áreas <br>
                            de atuação para você se aprofundar -->
                            <?php the_content() ?>
                        </p>
                    </div>
                </div>

                <div class="row">

                    <!-- loop -->
                    <?php
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type'      => 'post',
                            'cat'            => $category_id,
                            'order'          => 'DESC'
                        );
        
                        $blogs = new WP_Query( $args );
                        
                        if( $blogs->have_posts() ) :
                            while( $blogs->have_posts() ) : $blogs->the_post();
                    ?>
                                <a 
                                class="col-12 u-border-bottom-1 last-child:u-border-none u-border-color-light-gray u-color-folk-pattern mb-4 pb-4"
                                href="<?php the_permalink() ?>">

                                    <div class="row">

                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <?php
                                                $altTitle = get_the_title();
                                                
                                                the_post_thumbnail('post-thumbnail', 
                                                    array(
                                                        'class' => 'img-fluid w-100',
                                                        'alt'   => $altTitle,
                                                        'order' => 'DESC'
                                                ));
                                            ?>
                                        </div>
                                        
                                        <div class="col-md-8">

                                            <h2 class="l-template-blogs__title u-font-weight-bold">
                                                <?php the_title() ?>
                                            </h2>

                                            <p class="u-font-size-14 u-font-weight-medium">
                                                <strong>Em </strong><?php echo get_the_date( 'd/m/Y', $blog_post_highlight->ID ) ?>
                                            </p>

                                            <p class="u-font-size-14 u-font-weight-medium">
                                                <?php echo(limit_words(get_the_excerpt(), 25)); ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                    <?php endwhile; 
                        endif;

                        wp_reset_query();
                    ?>
                    <!-- end loop -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
