<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<section class="l-template-content__banner d-flex justify-content-center align-items-center u-bg-cover u-bg-no-repeat"
style="background-image: url(<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/template-content-banner.png)">

    <div class="container">
        
        <div class="row">

            <div class="col-12">

                <h2 class="l-template-content__banner__title position-relative u-font-weight-bold u-font-family-cinzel-decorative text-center u-color-folk-white pb-4">
                    <?php the_title() ?>
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="l-single-agenda mt-4 pb-5">

    <div class="container">

        <div class="row">

            <div class="col-9">

                <h3 class="u-font-weight-bold text-uppercase u-color-folk-primary">
                    informações
                </h3>
                
            </div>
            <div class="col-3">
            <a
                                class="w-100 d-block u-font-size-14 xxl:u-font-size-16 u-font-weight-regular u-font-family-lato text-center text-decoration-none u-color-folk-white u-bg-folk-dark-marron hover:u-bg-folk-dark-golden py-2" 
                                href="<?php echo get_home_url( null, '/agenda'); ?>">
                                   Voltar
        </a>
            </div>

            <div class="col-md-8">
                
                <p>
                    <strong class="text-uppercase">Horário inicio:</strong> <?php echo get_field( 'txt_horario_custom_post_agenda_inicio' ); ?>
                </p>
                <p>
                    <strong class="text-uppercase">Horário Fim:</strong> <?php echo get_field( 'txt_horario_custom_post_agenda_fim' ); ?>
                </p>

                <p>
                    <strong class="text-uppercase">Data inicio:</strong> <?php echo get_field( 'data_custom_post_agenda_inicio' ) . '  ' . get_field( 'txt_dia_semana_custom_post_agenda' ) ; ?>
                </p>
                <?php if (!empty(get_field( 'data_custom_post_agenda_fim' ) )):?>
                <p>
                    <strong class="text-uppercase">Data fim:</strong> <?php echo get_field( 'data_custom_post_agenda_fim' ) ; ?>
                </p>
                <?php endif; ?>
                

                <p> <?php if (!empty(get_field('link_online'))):?>
                    <strong class="text-uppercase">Observações:</strong><br>
                       

                       Link online: <a href="<?php echo get_field('link_online')?>"><?php echo get_field('link_online');
                       
                        endif;?>
                                    </a>
                     <?php if (!empty(get_field( 'txt_local_custom_post_agenda' ) )):?>
                        <p>
                            <strong class="text-uppercase">Local:</strong> <?php echo get_field( 'txt_local_custom_post_agenda' ) ?>
                        </p>
                        <?php endif; ?>

                        </p>
                        <?php if (!empty(get_field( 'txt_observacoes_custom_post_agenda' ) )):?>
                            <span class="d-block">
                                <?php echo get_field( 'txt_observacoes_custom_post_agenda' ) ?>
                            </span>
                            <?php endif; ?>   
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
