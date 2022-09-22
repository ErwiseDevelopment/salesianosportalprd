<section class="l-calendar my-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-6 offset-1 mb-3">
                        <h3 class="c-title l-most-read__title-line position-relative u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Calendário
                        </h3>
                    </div>
                </div>
            </div>

      
        

            <div class="col-6 mt-4">

                <!-- swiper -->
                <div class="swiper-container swiper-container-calendar js-swiper-day">

                    <div class="swiper-wrapper">
                        
                                <?php 
                                    $current_year = strftime('%Y', strtotime('today'));
                                    $mes = date('m');
                                    $dia = date('d');

                                    $args = array(
                                        'post_type'       	=> 'datas-especiais',
                                        'posts_per_page'	=> -1,
                                        'orderby'			=> 'meta_value',
                                        'order'				=> 'ASC',
                                        'meta_key'          => 'data_inicio_custom_post_calendario',
                                        'tax_query' => array(
                                            array(
                                                    'taxonomy' => 'categoria-datas-especiais',
                                                    'field' => 'id',
                                                    'terms' => 101,102,
                                            ),
                                        ),
                                    );

                                    $aniversarios = new WP_Query($args);

                                    while( $aniversarios->have_posts()) : $aniversarios->the_post();
                                    ?>

                        <div class="swiper-slide flex-wrap align-items-start">

                                        <?php $data = get_field('data_inicio_custom_post_calendario', $post->ID);?>
                                        <?php $title = get_the_title();?>
                                        <?php $excerpt = get_the_excerpt();?>
                                        <?php $permalink = get_the_permalink();?>
                                        <?php list($dia_data, $mes_data, $ano_data) = explode("/", $data);?>
                                        <?php $array_calendarios[] = array('data' => $current_year.'-'.$mes_data.'-'.$dia_data, 'title' => $title, 'excerpt' => $excerpt, 'permalink' => $permalink); ?>
                                        <?php endwhile; wp_reset_postdata();?>
                                    <div class="col-12">
                                    
                                            <h6 class="l-calendar__title u-font-weight-black text-uppercase u-color-folk-primary">
                                                comemorações e memória:
                                                <?php echo var_dump($current_year) ?>
                                            </h6>
                                                            <?php 
                                                        if (!empty ($array_calendarios)) :?>
                                                        <?php usort($array_calendarios, 'mantenedora_cmp');?>
                                                        <?php $contador = 1; ?>
                                                        <?php foreach ($array_calendarios as $calendario ) : ?>
                                                            <?php list($ano_data, $mes_data, $dia_data) = explode("-", $calendario['data']);?>
                                                        <?php if ($mes == $mes_data && $dia_data >= $dia && $contador <= 5 ) ;?>
                                                            <div class="my-2">
                                                                        <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                                            <!-- // 14 -->
                                                                            // <?php echo $dia_data; ?>.<?php echo $mes_data; ?></p>
                                                                        </p>

                                                                        <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                                            <!-- Nascimento | P. Ivo Poffo (1940) -->
                                                                            <?php echo $calendario["title"]; ?>
                                                                        </p>
                                                            </div>
                                                                <?php $contador++;?>
                                                                <?php 
                                                                    endforeach; 
                                                                ?>
                                                        <!-- end loop -->
                                    </div>                                
                                                        <?php   else : ?>
                                                        <div class="swiper-slide justify-content-start">
                                                            <p class="u-color-folk-white">
                                                                Não tem nenhum evento!
                                                            </p>
                                                        </div>
                                    
                                                        <?php   endif;?>
                        </div>
                    </div>
                </div>
                <!-- end swiper -->
            
            

            <div class="col-12 mb-5 my-md-5">

                <div class="row">

                    <div class="col-md-6">
                        <a
                        class="l-calendar__btn hover:u-opacity-8 d-block d-md-inline-block u-font-weight-bold text-decoration-none u-color-folk-white u-bg-folk-secondary mb-3 mb-md-0 py-3 px-4"
                        href="<?php echo get_home_url( null, 'agenda' ) ?>"
                        data-aos="zoom-in">
                            Todos os eventos
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a
                        class="l-calendar__btn hover:u-opacity-8 d-block d-md-inline-block u-font-weight-bold text-decoration-none u-color-folk-white u-bg-folk-secondary mt-3 mt-md-0 py-3 px-4"
                        href="<?php echo get_home_url( null, 'comemoracoes-e-memoria' ) ?>"
                        data-aos="zoom-in">
                            Calendário completo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>