<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<!-- banner -->
<section>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">
                <?php
                    $alt_title = get_the_title();

                    the_post_thumbnail( 
                        'post-thumbnail',
                        array(
                            'class' => 'img-fluid',
                            'alt'   => $alt_title
                    ));
                ?>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<!-- ebooks -->
<section>

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <!-- loop -->
                    <?php
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type'      => 'ebook',
                            'order'          => 'DESC'
                        );

                        $ebooks = new WP_Query( $args );

                        if( $ebooks->have_posts() ) :
                            while( $ebooks->have_posts() ) : $ebooks->the_post();
                    ?>
                                <div class="col-md-4 my-4">

                                    <div class="row">

                                        <div class="col-md-10 d-flex justify-content-center align-items-center">
                                            <!-- <img 
                                            class="img-fluid" 
                                            src="https://portal.erwise.com.br/wp-content/uploads/2022/02/convocação.png" 
                                            alt=""> -->

                                            <?php
                                                $alt_title = get_the_title();

                                                the_post_thumbnail(
                                                    'post-tumbnail',
                                                    array(
                                                        'class' => 'img-fluid',
                                                        'alt'   => $alt_title   
                                                    )
                                                );
                                            ?>
                                        </div>

                                        <div class="col-md-10">
                                            
                                            <p class="l-digital__book__tag u-font-weight-extrabold u-color-folk-theme mb-2">
                                                // E-book
                                                <!-- <php
                                                    $categories = get_the_terms( get_the_ID(), 'ebook-categoria' ); 
                                                    echo $categories[0]->name;
                                                ?> -->
                                            </p>

                                            <h6 class="l-digital__book__title u-font-size-12 u-font-weight-extrabold mb-4">
                                                
                                                <?php the_title() ?>
                                            </h6>

                                            <div class="row">

                                                <div class="col-12">
                                                    <a 
                                                    class="l-digital__download u-line-height-100 hover:u-opacity-8 d-block u-font-size-12 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-primary p-3" 
                                                    href="<?php echo get_field( 'arquivo' ) ?>" 
                                                    target="_blank" 
                                                    rel="noreferrer noopener">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php   endwhile;
                        endif;
                    ?>
                    <!-- loop -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end ebooks -->

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
