<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- fontmontserrat -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- aoscss -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }
?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>

    <!-- top -->
    <section class="l-top position-relative">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="row">

                        <div class="col-md-3 d-flex justify-content-center align-items-center u-bg-folk-white"> 
                            <a href="<?php echo get_home_url( null, '/') ?>">
                                <img
                                class="img-fluid"
                                src="<?php echo get_field( 'logo_no_topo', 'option' ) ?>">
                            </a>
                        </div>

                        <div class="col-md-9 mt-3">

                            <div class="row">

                                <div class="col-12 d-flex flex-column flex-md-row align-items-center u-bg-folk-primary md:u-bg-folk-none py-3 py-md-0">

                                    <ul class="l-top__social-media d-flex mb-0 pl-0">

                                        <?php if(get_field( 'instagram', 'option' )) : ?>
                                            <li class="l-top__social-media__item d-flex justify-content-center align-items-center mx-1">
                                                <a
                                                class="u-icon__brands u-icon__instagram u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary"
                                                href="<?php echo get_field( 'instagram', 'option' ); ?>"
                                                target="_blank"
                                                rel="noreferrer noopener">
                                                    Link do Instagram
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        
                                        <?php if(get_field( 'facebook', 'option' )) : ?>
                                            <li class="l-top__social-media__item d-flex justify-content-center align-items-center mx-1">
                                                <a
                                                class="u-icon__brands u-icon__facebook u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary"
                                                href="<?php echo get_field( 'facebook', 'option' ); ?>"
                                                target="_blank"
                                                rel="noreferrer noopener">
                                                    Link do Facebook
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        
                                        <?php if(get_field( 'youtube', 'option' )) : ?>
                                            <li class="l-top__social-media__item d-flex justify-content-center align-items-center mx-1">
                                                <a
                                                class="u-icon__brands u-icon__youtube u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary"
                                                href="<?php echo get_field( 'youtube', 'option' ); ?>"
                                                target="_blank"
                                                rel="noreferrer noopener">
                                                    Link do Youtube
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        
                                        <?php if(get_field( 'whatsapp', 'option' )) : ?>
                                            <li class="l-top__social-media__item d-flex justify-content-center align-items-center mx-1">
                                                <a
                                                class="u-icon__brands u-icon__whatsapp u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary"
                                                href="<?php echo get_field( 'whatsapp', 'option' ); ?>"
                                                target="_blank"
                                                rel="noreferrer noopener">
                                                    Link do Whatsapp
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-cursor-pointer js-show-form-search mx-1">
                                            <span class="u-icon__free u-icon__search u-font-size-0 before::u-font-size-20 u-font-weight-semibold text-decoration-none u-color-folk-primary">
                                                Pesquisa
                                            </span>
                                        </li>
                                    </ul>

                                    <p class="l-top__contact u-font-weight-semibold text-white mt-3 mt-md-0 mb-0 ml-3">
                                        <!-- contatos@dombosco.net // (51) 3331-7939 -->
                                        <?php echo get_field( 'e-mail', 'option' ) . ' // ' . get_field( 'telefone', 'option' ); ?>
                                    </p>

                                    <div class="mt-3 px-5">
                                        
                                        <?php if(get_field( 'visivel', 'option' ) == 'Sim') : ?>
                                                <a
                                                class="d-block hover:u-opacity-8 u-font-size-14 u-font-weight-bold text-center text-decoration-none py-2 px-4"
                                                style="color:<?php echo get_field( 'cor', 'option' ) ?>;background-color:<?php echo get_field( 'cor_de_fundo', 'option' ) ?>"
                                                href="<?php echo get_field( 'link_do_botao', 'option' ) ?>"
                                                <?php if(get_field( 'abrir_em_uma_nova_guia', 'option') == 'Sim') : ?>
                                                    target="_blank"
                                                <?php endif; ?>
                                                >
                                                    <?php echo get_field( 'texto', 'option' ) ?>
                                                </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                                <!-- <img
                                class="img-fluid"
                                src="<php echo get_template_directory_uri()>/../wp-bootstrap-starter-child/assets/images/top-logo-salesianos-sul.png"
                                alt=""> -->
                                <a href="<?php echo get_home_url( null, '/' ) ?>">
                                    <img
                                    class="img-fluid"
                                    src="<?php echo get_field( 'logo_principal_no_topo', 'option' ) ?>"
                                    alt="<?php echo get_bloginfo( 'name' ) ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-10">
                    
                    <div class="d-none js-form-box mt-5">

                        <form method="GET" action="<?php echo get_home_url( null, '/' ) ?>">
                        
                            <div class="row">

                                <div class="col-lg-9">
                                    <input
                                    class="w-100 shadow border-0 d-block u-font-size-14 u-font-weight-regular u-font-style-iltalic py-2 px-3"
                                    type="search"
                                    name="s"
                                    placeholder="Pesquisar...">
                                </div>

                                <div class="col-lg-2 mt-3 mt-lg-0 pr-0">
                                    <input
                                    class="w-100 shadow border-0 rounded d-block u-font-size-14 u-font-weight-regular u-font-style-iltalic u-color-folk-white u-bg-folk-primary py-2 px-3"
                                    type="submit"
                                    value="Pesquisar">                      
                                </div>

                                <div class="col-1 d-none d-lg-flex justify-content-center align-items-center pl-0">
                                    <span class="u-font-weight-bold text-center u-cursor-pointer js-close-form" style="font-size:26px">
                                        x
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        if( document.querySelector( '.js-show-form-search' ) ) {
            const activeForm = document.querySelector( '.js-show-form-search' )
            const box = document.querySelector( '.js-form-box' )
            const close = document.querySelector( '.js-close-form' ) 

            activeForm.addEventListener( 'click', function() {
                box.classList.add( 'd-block' )
                box.classLis.remove( 'd-none' )
            })

            close.addEventListener( 'click', function() {
                box.classList.remove( 'd-block' )
                box.classLis.add( 'd-none' )
            })
        }
    </script>
    <!-- end top -->

    <header id="masthead" class="l-header header site-header navbar-static-top u-border-top-2 u-border-color-secondary my-5 pt-5 <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">

        <div class="container">

            <nav class="l-navbar navbar navbar-expand-xl p-0">

                <div class="navbar-brand d-none">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="l-navbar__hamburger"></span>
                </button>

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-center',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>
        </div>
    </header><!-- #masthead -->
    
    <?php endif; ?>