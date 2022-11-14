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

<section id="primary">
<main id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<!--
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'ebook'
    );

    $ebooks = new WP_Query( $args ); 

    if( $ebooks->have_posts() ) :
        while( $ebooks->have_posts() ) : $ebooks->the_post();
            //$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' )s            
            get_featured_image_api_field(get_the_ID());      
        endwhile;
    endif;

    wp_reset_query();
-->

<!-- banner -->
<?php echo get_template_part( 'template-parts/content', 'banner' ) ?>
<!-- end banner -->

<!-- news -->
<section class="l-news my-4">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">
                    
                    <div class="col-lg-10 offset-md-1 d-flex flex-column flex-md-row align-items-center mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Notícias
                        </h3>

                        <p class="c-text-pattern u-line-height-100 u-font-weight-semibold mb-0 ml-3">
                            Fique por dentro de tudo o que está <br>
                            acontecendo em nossa Inspetoria
                        </p>
                    </div>
                </div>

                <div class="row">

                    <!-- destaque -->
                    <div class="col-lg-6 my-3 my-lg-0">
                        
                        <?php
                            $editorias = array(
                                'Portal',
                                'Institucional',
                                'Paróquia',
                                'Ensino',
                                'Pastoral Juvenil',
                                'Vocacional',
                                'Obras Sociais',
                                'Gráfica'
                            );

                            $args = array(
                                'posts_per_page' => 1,
                                'post_type'      => 'post',
                                'category_name'  => 'portal-noticia-destaque',
                            );

                            $blog_post_highlight = new WP_Query( $args );
                            $cats = array();

                            if( $blog_post_highlight->have_posts() ) : 
                                while( $blog_post_highlight->have_posts() ): $blog_post_highlight->the_post();
                                    $blogPostHighlight = get_the_ID();  

                                    foreach (get_the_category( get_the_ID() ) as $c) {
                                        $cat = get_category($c);
                                        array_push($cats, $cat);
                                    }

                                    foreach($cats as $catt) {
                                        foreach( $editorias as $editoria) {
                                            if( $catt->name == $editoria ) {
                                                $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                $category_name = $catt->name;
                                            }
                                        }
                                    }
                        ?>
                                    <div class="card border-0">

                                        <div class="l-news__highlight__card-img card-img">
                                            <?php
                                                $altTitle = get_the_title();
                                                
                                                the_post_thumbnail('post-thumbnail', 
                                                    array(
                                                        'class' => 'img-fluid w-100 h-100 u-object-fit-cover',
                                                        'style' => 'height:280px',
                                                        'alt'   => $altTitle,
                                                ));
                                            ?>
                                        </div>

                                        <div class="card-body mt-n4 pt-0">

                                            <div class="d-flex justify-content-center">
                                                <p class="l-news__highlight__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white py-2 px-5" style="background-color: <?php echo $backgroundColor; ?>;">
                                                    <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Destaque
                                                </p>
                                            </div>

                                            <h6 class="l-news__highlight__card-title u-line-height-100 u-font-weight-extrabold mt-2">
                                                <?php the_title() ?>
                                            </h6>

                                            <p class="l-news__highlight__card-info u-line-height-100 mt-3">
                                                <span class="u-font-weight-semibold">
                                                    por <?php echo get_the_author_meta('user_firstname', get_the_author_ID() ) . ' ' . get_the_author_meta( 'user_lastname', get_the_author_ID() ); ?>
                                                </span> <br>

                                                <span 
                                                class="u-font-weight-bold"
                                                style="color: <?php echo $backgroundColor; ?>;">
                                                    em <?php echo get_the_date( 'd/m/Y', $blog_post_highlight->ID ) ?>
                                                </span>
                                            </p>

                                            <span class="l-news__highlight__card-excerpt d-block u-font-weight-semibold">
                                                <?php echo(limit_words(get_the_excerpt(), 25)); ?>
                                            </span>

                                            <div class="row">

                                                <div class="col-md-6 mt-3">
                                                    <a
                                                    class="l-news__highlight__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-3 px-5"
                                                    style="background-color: <?php echo $backgroundColor; ?>;"
                                                    href="<?php the_permalink() ?>">
                                                        Ler mais
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php endwhile; 
                            endif;

                            wp_reset_query();
                        ?>
                    </div>
                    <!-- end destaque -->

                    <div class="col-lg-6">

                        <div class="row">

                            <div class="col-12 my-3 my-lg-0">

                                <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type'      => 'post',
                                        'category_name'  => 'portal-noticia',
                                    );

                                    $blog_post_portal_hightlight = new WP_Query( $args );
                                    $status = false;
                                    $cats = array();

                                    if( $blog_post_portal_hightlight->have_posts() ) : 
                                        while( $blog_post_portal_hightlight->have_posts() ) : $blog_post_portal_hightlight->the_post();
                                            $blogPostPortalID1 = get_the_ID(); 
                                            $status = true;
                                            
                                            foreach (get_the_category( get_the_ID() ) as $c) {
                                                $cat = get_category($c);
                                                array_push($cats, $cat);
                                            }

                                            foreach( $cats as $catt ) {
                                                // if( $catt->name == 'Paróquia' ) {
                                                //     $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                //     $category_name = $catt->name;
                                                // }

                                                foreach( $editorias as $editoria) {
                                                    if( $catt->name == $editoria ) {
                                                        $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                        $category_name = $catt->name;
                                                    }
                                                }
                                            }                         
                                ?>
                                                <div class="card border-0">

                                                    <div class="card-img l-news__medium__card-img">

                                                        <?php
                                                            $altTitle = get_the_title();
                                                            
                                                            the_post_thumbnail('post-thumbnail', 
                                                                array(
                                                                    'class' => 'img-fluid w-100 h-100',
                                                                    'alt'   => $altTitle,
                                                            ));
                                                        ?>
                                                    </div>

                                                    <div class="card-body mt-n4 pt-0 px-0">

                                                        <div class="d-flex justify-content-center">
                                                            <p class="l-news__medium__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white mb-2 py-2 px-5" style="background-color: <?php echo $backgroundColor; ?>;">
                                                                <span class="u-font-weight-medium u-color-folk-white mr-2">//</span>
                                                                <?php echo $category_name; ?>
                                                        </div>

                                                        <h6 class="l-news__medium__card-title u-line-height-100 u-font-weight-extrabold mb-0">
                                                            <?php the_title() ?>
                                                        </h6>

                                                        <p class="l-news__medium__card-info u-line-height-100">
                                                            <span class="u-font-weight-semibold">por <?php echo get_the_author_meta('user_firstname', get_the_author_ID() ) . ' ' . get_the_author_meta( 'user_lastname', get_the_author_ID() ); ?></span> <br>
                                                            <span class="u-font-weight-bold"
                                                            style="color: <?php echo $backgroundColor; ?>;">
                                                                <?php 
                                                                    echo 'em ' . get_the_date( 'd/m/Y', $blog_post_portal_hightlight->ID );
                                                                ?>
                                                            </span>
                                                        </p>

                                                        <div class="row">

                                                            <div class="col-md-5">
                                                                <a
                                                                class="l-news__medium__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-2 px-5"
                                                                style="background-color: <?php echo $backgroundColor; ?>;"
                                                                href="<?php the_permalink() ?>">
                                                                    Ler mais
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php   
                                            if($status)
                                                break;
                                        endwhile; 
                                    endif;

                                    wp_reset_query();
                                ?>
                            </div>

                            <div class="col-md-6 my-3 my-lg-0">
                                
                                <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type'      => 'post',
                                        'category_name'  => 'portal-noticia',
                                    );

                                    $blog_post_portal2 = new WP_Query( $args );
                                    $status = false;

                                    if( $blog_post_portal2->have_posts() ) : 
                                        while( $blog_post_portal2->have_posts() ): $blog_post_portal2->the_post();
                                            $blogPostPortalID2 = get_the_ID();

                                            if($blogPostPortalID1 != $blogPostPortalID2) :
                                                $status = true;

                                                foreach (get_the_category( get_the_ID() ) as $c) {
                                                    $cat = get_category($c);
                                                    array_push($cats, $cat);
                                                }
    
                                                foreach($cats as $catt) {
                                                    // if( $catt->name == 'Paróquia' ) {
                                                    //     $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                    //     // $category_name = $catt->name;
                                                    // }

                                                    foreach( $editorias as $editoria) {
                                                        if( $catt->name == $editoria ) {
                                                            $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                            $category_name = $catt->name;
                                                        }
                                                    }
                                                } 
                                ?>
                                                <div class="card h-100 border-0">

                                                    <div class="l-news__small__card-img card-img">
                                                        <?php
                                                            $altTitle = get_the_title();
                                                            
                                                            the_post_thumbnail('post-thumbnail', 
                                                                array(
                                                                    'class' => 'img-fluid w-100 h-100',
                                                                    'alt'   => $altTitle,
                                                            ));
                                                        ?>
                                                    </div>

                                                    <div class="card-body d-flex flex-column justify-content-between mt-n4 pt-0 px-0">

                                                        <div>

                                                            <div class="d-flex justify-content-center">
                                                                <p class="l-news__small__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white mb-2 py-2 px-5" style="background-color: <?php echo $backgroundColor; ?>;">
                                                                    <span class="u-font-weight-medium u-color-folk-white mr-2">//</span>
                                                                    <?php echo $category_name; ?>
                                                                </p>
                                                            </div>

                                                            <h6 class="l-news__small__card-title u-line-height-100 u-font-weight-extrabold mb-1">
                                                                <?php the_title() ?>
                                                            </h6>

                                                            <p class="l-news__small__card-info u-line-height-100">
                                                                <span class="u-font-weight-semibold">por <?php echo get_the_author_meta('user_firstname', get_the_author_ID() ) . ' ' . get_the_author_meta( 'user_lastname', get_the_author_ID() ); ?></span> <br>
                                                                <span 
                                                                class="u-font-weight-bold"
                                                                style="color: <?php echo $backgroundColor; ?>;">
                                                                    <?php 
                                                                        echo 'em ' . get_the_date( 'd/m/Y', $blog_post_portal_hightlight->ID );
                                                                    ?>
                                                                </span>
                                                            </p>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-10">
                                                                <a
                                                                class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-2 px-5"
                                                                style="background-color: <?php echo $backgroundColor; ?>;"
                                                                href="<?php the_permalink() ?>">
                                                                    Ler mais
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php           if($status) :
                                                    break;
                                                endif;
                                            endif;
                                        endwhile; 
                                    endif;

                                    wp_reset_query();
                                ?>
                            </div>
                            
                            <div class="col-md-6 my-3 my-lg-0">

                                <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type'      => 'post',
                                        'category_name'  => 'portal-noticia',
                                    );

                                    $blog_post_portal2 = new WP_Query( $args );
                                    $status = false;
                                    
                                    if( $blog_post_portal2->have_posts() ) : 
                                        while( $blog_post_portal2->have_posts() ): $blog_post_portal2->the_post();
                                            $blogPostPortalID3 = get_the_ID();

                                            if($blogPostPortalID3 != $blogPostPortalID2 && $blogPostPortalID3 != $blogPostPortalID1) :
                                                $status = true;

                                                foreach (get_the_category( get_the_ID() ) as $c) {
                                                    $cat = get_category($c);
                                                    array_push($cats, $cat);
                                                }
    
                                                foreach($cats as $catt) {
                                                    // if( $catt->name == 'Paróquia' ) {
                                                    //     $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                    //     $category_name = $catt->name;
                                                    // }

                                                    foreach( $editorias as $editoria) {
                                                        if( $catt->name == $editoria ) {
                                                            $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                            $category_name = $catt->name;
                                                        }
                                                    }
                                                }
                                ?>

                                                <div class="card h-100 border-0">

                                                    <div class="l-news__small__card-img card-img">
                                                        <?php
                                                            $altTitle = get_the_title();
                                                            
                                                            the_post_thumbnail('post-thumbnail', 
                                                                array(
                                                                    'class' => 'img-fluid w-100 h-100',
                                                                    'alt'   => $altTitle,
                                                            ));
                                                        ?>
                                                    </div>

                                                    <div class="card-body d-flex flex-column justify-content-center mt-n4 pt-0 px-0">

                                                        <div>
                                                            
                                                            <div class="d-flex justify-content-center">
                                                                <p class="l-news__small__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white mb-2 py-2 px-5" style="background-color: <?php echo $backgroundColor; ?>;">
                                                                    <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> 
                                                                    <?php echo $category_name; ?>
                                                                </p>
                                                            </div>

                                                            <h6 class="l-news__small__card-title u-line-height-100 u-font-weight-extrabold mb-1">
                                                                <?php the_title() ?>
                                                            </h6>

                                                            <p class="l-news__small__card-info u-line-height-100">
                                                                <span class="u-font-weight-semibold">por <?php echo get_the_author_meta('user_firstname', get_the_author_ID() ) . ' ' . get_the_author_meta( 'user_lastname', get_the_author_ID() ); ?></span> <br>
                                                                <span 
                                                                class="u-font-weight-bold"
                                                                style="color: <?php echo $backgroundColor; ?>;">
                                                                    <?php 
                                                                        echo 'em ' . get_the_date( 'd/m/Y', $blog_post_portal_hightlight->ID );
                                                                    ?>
                                                                </span>
                                                            </p>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-10">
                                                                <a
                                                                class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-2 px-5"
                                                                style="background-color: <?php echo $backgroundColor; ?>;"
                                                                href="<?php the_permalink() ?>">
                                                                    Ler mais
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php           if($status) :
                                                    break;
                                                endif;
                                            endif;
                                        endwhile; 
                                    endif;

                                    wp_reset_query();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end news -->

<!-- shortcut -->
<?php echo get_template_part( 'template-parts/content', 'shortcut-home' ) ?>
<!-- end shortcut -->

<!-- most read -->
<?php echo get_template_part( 'template-parts/content', 'most-read' ) ?>
<!-- end most read -->

<!-- videos -->
<?php echo get_template_part( 'template-parts/content', 'videos' ) ?>
<!-- end videos -->

<!-- blogs -->
<?php echo get_template_part( 'template-parts/content', 'blogs' ) ?>
<!-- end blogs -->

<!-- materials -->
<?php echo get_template_part( 'template-parts/content', 'marterials' ) ?>
<!-- end materials -->

<!-- calendar -->
<?php echo get_template_part( 'template-parts/content', 'calendar' ) ?>
<!-- end calendar -->

<!-- links -->
<?php echo get_template_part( 'template-parts/content', 'links' ) ?>
<!-- end links -->

<!-- mvv -->
<?php echo get_template_part( 'template-parts/content', 'quite' ) ?>
<!-- end mvv -->

<!-- illustration -->
<?php echo get_template_part( 'template-parts/content', 'illustration' ) ?>
<!-- end illustration -->

<!-- other posts -->
<section class="l-other-posts u-border-top-2 u-border-color-secondary">

    <div class="container"> 
        
        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-md-8">

                        <div class="row">

                            <!-- loop -->
                            <?php
                                $editorias = array(
                                    'Portal',
                                    'Institucional',
                                    'Paróquia',
                                    'Ensino',
                                    'Pastoral Juvenil',
                                    'Vocacional',
                                    'Obras Sociais',
                                    'Gráfica'
                                );

                                $args = array(
                                    'posts_per_page' => -1,
                                    'post_type'      => 'post',
                                    'category_name'  => 'portal-noticia',
                                );

                                $other_posts = new WP_Query( $args );
                                $count = 0;

                                if( $other_posts->have_posts() ) : 
                                    while( $other_posts->have_posts() ): $other_posts->the_post();
                                        $other_post = get_the_ID();

                                        foreach (get_the_category( get_the_ID() ) as $c) {
                                            $cat = get_category($c);
                                            array_push($cats, $cat);
                                        }
    
                                        foreach($cats as $catt) {
                                            foreach( $editorias as $editoria ) {
                                                if( $catt->name == $editoria ) {
                                                    $backgroundColor = get_field( 'cor_de_fundo', $catt); 
                                                    $category_name = $catt->name;
                                                }
                                            }
                                        }

                                        if( $other_post != $blogPostHighlight && 
                                            $other_post != $blogPostPortalID1 && 
                                            $other_post != $blogPostPortalID2 && 
                                            $other_post != $blogPostPortalID3 ) :
                                                $count++;
                            ?>
                                            <div class="col-12 l-other-posts__col-border py-4 pr-md-5">

                                                <a 
                                                class="row hover:u-opacity-8 text-decoration-none"
                                                href="<?php the_permalink() ?>">

                                                    <div class="col-md-5 pl-md-0">
                                                        <!-- <img
                                                        class="img-fluid w-100 h-100"
                                                        src="<php echo get_template_directory_uri()>/../wp-bootstrap-starter-child/assets/images/other-posts-image-1.png"
                                                        alt=""> -->

                                                        <?php
                                                            $altTitle = get_the_title();
                                                            
                                                            the_post_thumbnail('post-thumbnail', 
                                                                array(
                                                                    'class' => 'img-fluid w-100 h-100',
                                                                    'alt'   => $altTitle,
                                                            ));
                                                        ?>
                                                    </div>

                                                    <div class="col-md-7 pr-5">

                                                        <p 
                                                        class="l-other-posts__post-tag u-line-height-100 d-inline-block u-font-weight-medium u-color-folk-white mb-2 py-2 px-4"
                                                        style="background-color:<?php echo $backgroundColor; ?>">
                                                            <!-- Pastoral Juvenil     -->
                                                            <?php echo $category_name; ?>
                                                        </p>

                                                        <h6 class="l-other-posts__post-title u-font-weight-extrabold mb-2">
                                                            <!-- Disponível para download o 
                                                            subsídio do Tríduo de Dom 
                                                            Bosco 2021 -->
                                                            <?php the_title() ?> <br>
                                                        </h6>

                                                        <p class="l-other-posts__post-date u-font-weight-bold">
                                                            em <?php echo get_the_date( 'd/m/Y', $other_posts->ID ) ?>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                            <?php       endif;
                                        if( $count == 4 ) 
                                            break;
                                    endwhile; 
                                endif;

                                wp_reset_query();
                            ?>
                            <!-- end loop -->
                        </div>

                        <div class="row justify-content-center">

                            <div class="col-md-3 mt-3">
                                <a 
                                class="l-calendar__btn w-100 hover:u-opacity-8 d-block d-md-inline-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-secondary mb-3 mb-md-0 py-2 px-4 aos-init aos-animate" 
                                href="<?php echo get_home_url( null, 'noticias' ) ?>" 
                                data-aos="zoom-in">
                                    Ver mais
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        
                        <div class="row">

                            <div class="col-12">
                                <img
                                class="img-fluid"
                                src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/podcast.png"
                                alt="">
                            </div>
                            
                            <!-- loop -->
                            <?php
                                $podcast_post_link = get_field( 'link_do_podcast', 'option' );                              
                                $request_posts = wp_remote_get( $podcast_post_link );
                                //$category_ebook = get_field( 'categoria_do_e-book', 'option' );

                                if(!is_wp_error( $request_posts )) :
                                    $body = wp_remote_retrieve_body( $request_posts );
                                    $data = json_decode( $body );
    
                                    if(!is_wp_error( $data )) :
                                        foreach( $data as $rest_post ) :  
                                            //if( $rest_post->category[0] ==  $category_ebook ) :  
                            ?>
                                            <div class="col-12 u-border-bottom-2 last-child:u-border-none u-border-color-primary py-3">

                                                <div class="d-flex justify-between-center align-items-center">
                                                    <p class="l-other-posts__podcast-number u-font-weight-bold u-color-folk-primary mb-0">
                                                        <!-- #06 -->
                                                        <?php echo $rest_post->numero_episodio < 10 ? '#0' . $rest_post->numero_episodio : '#' . $rest_post->numero_episodio; ?>
                                                    </p>

                                                    <p class="l-other-posts__podcast-title u-line-height-100 u-font-weight-bold u-color-folk-green mb-0 ml-2">
                                                        <!-- AMJ: E ela ‘tá’ ‘tá’ 
                                                        movimentando -->
                                                        <?php echo $rest_post->title->rendered; ?>
                                                    </p>
                                                </div>

                                                <p class="u-font-size-12 u-font-weight-semibold">
                                                    <!-- Neste programa, os coordenadores Lucas 
                                                    Eduardo Lunardi e Giovana Celli vão conversar 
                                                    com os missionários Guilherme Peters, Flaviane 
                                                    Mandagará Pereira, Eduarda Testoni Scoz e 
                                                    Fabrício Bavarovsku dos Santos. -->
                                                    <!-- echo $rest_post->descricao_do_episodio; -->
                                                    <?php echo $rest_post->descricao_do_episodio; ?>
                                                </p>

                                                <a 
                                                class="d-flex justify-content-end align-items-center"
                                                href="<?php echo $rest_post->link_episodio->url; ?>">
                                                    <p class="u-font-size-12 u-font-weight-bold text-right u-color-folk-primary mb-0 mr-2">
                                                        <!-- 02 de agosto <br>
                                                        58 minutos <br> -->
                                                        <?php
                                                            list($data_day, $data_month) = explode("/", $rest_post->acf->data_podcast);
                                                        ?>

                                                        <?php echo $data_day . ' de ' . $data_month . '<br>'; ?>
                                                        <?php echo $rest_post->tempo_do_episodio . ' minutos'; ?>
                                                    </p>

                                                    <img
                                                    class="img-fluid"
                                                    src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-play.png"
                                                    alt="">
                                                </a>
                                            </div>
                            <?php           //endif;
                                        endforeach;
                                    endif;
                                endif;
                            ?>
                            <!-- end loop -->

                            <!-- <div class="col-12 u-border-bottom-2 last-child:u-border-none u-border-color-primary py-3">

                                <div class="d-flex justify-between-center align-items-center">
                                    <p class="l-other-posts__podcast-number u-font-weight-bold u-color-folk-primary mb-0">
                                        #05
                                    </p>

                                    <p class="l-other-posts__podcast-title u-line-height-100 u-font-weight-bold u-color-folk-green mb-0 ml-2">
                                        Ajudar os outros?
                                        Porquê? Para que?
                                    </p>
                                </div>

                                <p class="u-font-size-12 u-font-weight-semibold">
                                    Neste programa, P. Edvaldo Nogueira, referencial 
                                    da PJS no Rio Grande do Sul, e P. Adriano Toiller, 
                                    referencial da PJS no Paraná, conversam com Juan 
                                    Carlos Montenegro, coordenador do "Salesian 
                                    Volunteers" e Irmã Solange Sanches, Filha de Maria 
                                    Auxiliadora. Acompanhe.
                                </p>

                                <a 
                                class="d-flex justify-content-end align-items-center"
                                href="#">
                                    <p class="u-font-size-12 u-font-weight-bold text-right u-color-folk-primary mb-0 mr-2">
                                        30 de agosto <br>
                                        62 minutos
                                    </p>

                                    <img
                                    class="img-fluid"
                                    src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-play.png"
                                    alt="">
                                </a>
                            </div>

                            <div class="col-12 u-border-bottom-2 last-child:u-border-none u-border-color-primary py-3">

                                <div class="d-flex justify-between-center align-items-center">
                                    <p class="l-other-posts__podcast-number u-font-weight-bold u-color-folk-primary mb-0">
                                        #04
                                    </p>

                                    <p class="l-other-posts__podcast-title u-line-height-100 u-font-weight-bold u-color-folk-green mb-0 ml-2">
                                        Missionário...
                                        Eu?
                                    </p>
                                </div>

                                <p class="u-font-size-12 u-font-weight-semibold">
                                    Neste programa, os missionários Ana e Irmão 
                                    Lucas vão conversar sobre o "ser missionário" 
                                    com os convidados da noite: P. Gilson Marcos da 
                                    Silva, Inspetor Salesiano; Gilson Cardoso, Assessor 
                                    e Coordenador de Pastoral e Ane Caroline 
                                    Machado, coordenadora da AMJ.
                                </p>

                                <a class="d-flex justify-content-end align-items-center"
                                href="#">
                                    <p class="u-font-size-12 u-font-weight-bold text-right u-color-folk-primary mb-0 mr-2">
                                        30 de julho <br>
                                        62 minutos
                                    </p>

                                    <img
                                    class="img-fluid"
                                    src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-play.png"
                                    alt="">
                                </a>
                            </div> -->
                        </div>

                        <div class="row">

                            <div class="col-12 d-flex justify-content-center mt-2">
                                <a
                                class="hover:u-opacity-8 u-font-weight-bold text-decoration-none u-color-folk-white u-bg-folk-secondary py-2 px-4"
                                href="<?php echo get_field( 'link_podcast' ) ?>"
                                target="_blank"
                                rel="noreferrer noopener">
                                    Ver mais
                                </a>

                                <!-- <a
                                class="hover:u-opacity-8 d-flex align-items-center u-font-size-12 u-font-weight-bold text-decoration-none u-color-folk-white u-bg-folk-green py-2 px-4"
                                href="#">
                                    Podcast completo
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end other posts -->

<!-- contact -->
<?php echo get_template_part( 'template-parts/content', 'contact' ) ?>
<!-- end contact -->

<img
class="img-fluid d-none"
data-src="<php echo get_template_directory_uri()>/../wp-bootstrap-starter-child/assets/images/image.png"
alt="">

<?php endwhile; ?>

</main><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
