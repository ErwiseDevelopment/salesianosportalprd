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
                                                // 
                                                <?php
                                                    $cats = array();
                                                    $categories_current = array();
                                                   // $count = 0;

                                                    foreach (get_the_category($post_id) as $c) {
                                                        $cat = get_category($c);
                                                        array_push($cats, $cat->name);
                                                    }

                                                    foreach ($cats as $cat) {
                                                        foreach (get_categories_highlight() as $editorial) {
                                                            if ($cat == $editorial)
                                                                $editorial_current = $cat;
                                                        }
                                                    }

                                                    foreach ($cats as $cat) {
                                                        if ($editorial_current) {
                                                            if ($cat != $editorial_current) {
                                                                array_push($categories_current, $cat);
                                                                $count++;

                                                                if ($count == 1)
                                                                    break;
                                                            }
                                                        } else {
                                                            array_push($categories_current, $cat);
                                                            $count++;

                                                            if ($count == 3)
                                                                break;
                                                        }
                                                    }

                                                    if (sizeOf($categories_current) > 0) {
                                                        $post_categories = implode(', ', $categories_current);
                                                    }

                                                    echo var_dump( $c) //$editorial_current ? $editorial_current . ', ' . $post_categories : $post_categories;
                                                    ?>
                                            </p>

                                            <h6 class="l-digital__book__title u-font-size-15 u-font-weight-extrabold mb-4">
                                                
                                                <?php the_title() ?>
                                            </h6>

                                            <div class="row">

                                                <div class="col-12">
                                                    <a 
                                                    class="l-digital__download u-line-height-100 hover:u-opacity-8 d-block u-font-size-12 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-primary p-3" 
                                                    href=" <?php echo get_field('arquivo')
                        // $args = array(
                        //     'posts_per_page' => -1,
                        //     'post_type'      => 'ebook',
                        //     'order'          => 'DESC'
                        // );

                        // $ebooks = new WP_Query( $args );

                        // if( $ebooks->have_posts() ) :
                        //     while( $ebooks->have_posts() ) : $ebooks->the_post();
                    ?>" 
                                                    target="_blank" 
                                                    rel="noreferrer noopener">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php  endwhile; endif?>
                    <!-- loop -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end ebooks -->



<?php  endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
