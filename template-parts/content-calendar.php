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

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-6">

                        <!-- swiper -->
                        <?php
                            $year_current = date( "Y" );

                            $array_meses = array (
                                '01' => 'Janeiro',
                                '02' => 'Fevereiro',
                                '03' => 'Março',
                                '04' => 'Abril',
                                '05' => 'Maio',
                                '06' => 'Junho',
                                '07' => 'Julho',
                                '08' => 'Agosto',
                                '09' => 'Setembro',
                                '10' => 'Outubro',
                                '11' => 'Novembro',
                                '12' => 'Dezembro'
                            );
                            
                        ?>
                        <div class="swiper-container js-swiper-month">

                            <div class="swiper-wrapper">

                                <?php foreach ($array_meses as $mes => $meses): ?>
                                    <div class="swiper-slide">

                                        <h6 class="l-calendar__date u-font-weight-black text-center text-uppercase u-color-folk-primary">
                                            <!-- Agosto // 2021 -->
                                            <?php echo $meses . ' // ' . $year_current; ?>
                                        </h6>
                                    </div>
                                <?php endforeach; ?>                                

                                <!-- <div class="swiper-slide">

                                    <h6 class="l-calendar__date u-font-weight-black text-center text-uppercase u-color-folk-primary">
                                        Setembro // 2021
                                    </h6>
                                </div> -->
                            </div>
                        </div>
                        <!-- end swiper -->

                        <!-- arrow -->
                        <div class="swiper-button-prev swiper-button-prev-calendar js-swiper-button-prev-calendar js-swiper-find-month-active"></div>
                        <div class="swiper-button-next swiper-button-next-calendar js-swiper-button-next-calendar js-swiper-find-month-active"></div>
                    </div>
                </div>
            </div>

            <div class="col-6 mt-4">

                <!-- swiper -->
                <div class="swiper-container swiper-container-day js-swiper-day">

                    <div class="swiper-wrapper">
                        
                        
                                    <div class="swiper-slide">

                                        <div class="col my-3 my-md-0">

                                            <h6 class="l-calendar__title u-font-weight-black text-uppercase u-color-folk-primary">
                                                destaques:
                                            </h6>
                                            <?php
                                            			$data_atual = date('Ymd');

                                                        $args = array (
                                                            'post_type'       	=> 'agendas',
                                                            'posts_per_page'	=> 2,
                                                            'orderby'			=> 'meta_value',
                                                            'order'				=> 'ASC',
                                                            'meta_key'          => 'data_custom_post_agenda',
                                                            'meta_query'		=> array (
                                                                'relation'			=> 'AND',
                                                                array (
                                                                    'key'			=> 'data_custom_post_agenda',
                                                                    'value'			=> $data_atual,
                                                                    'compare'		=> '>=',
                                                                    'type'			=> 'DATE',
                                                                ),
                                                            ),
                                                        );

                                                        $agendas = new WP_Query($args);

                                                    ?>
				<?php if ( $agendas->have_posts() ) : ?>
					<?php while( $agendas->have_posts()) : $agendas->the_post(); ?>
                                            <!-- loop -->
                                            
                                                        <div class="my-2">
                                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                                <!-- // 02-03 -->
                                                                // <?php echo $data_day . '-' . $data_month; ?>
                                                            </p>

                                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                                <!-- Conselho Inspetorial – Porto Alegre/RS -->
                                                                <?php echo $agenda["title"]; ?>
                                                            </p>
                                                        </div>     
                                            <?php 
                                                    else : $count++; 
                                                        if( $count == $post_agenda_count_current ) {
                                                            $count = 0;
                                                            echo '<p>Não há eventos!</p>';
                                                        }
                                            ?>
                                            <?php   endif;

                                                    if( $count_item == 5 )
                                                        echo 'Count: ' . $count_item;
                                                        // break;
                                                endforeach; 
                                            ?>
                                            <!-- end loop -->
                                        </div>
                                    </div>  
						<?php   else : ?>
                                    <div class="swiper-slide justify-content-start">
                                        <p class="u-color-folk-white">
                                            Não tem nenhum evento!
                                        </p>
                                    </div>
                        <?php   endif;
                            endforeach; 
                        ?>
                    </div>
                </div>
                <!-- end swiper -->
            </div>

            <div class="col-6 mt-4">

                <!-- swiper -->
                <div class="swiper-container swiper-container-calendar js-swiper-day">

                    <div class="swiper-wrapper">
                        
                        <?php 
                            $current_year = 2024; //strftime('%Y', strtotime('today'));
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
                                            <!-- 
                                                    else : $count_calendar++; 
                                                        if( $count_calendar == $post_calendar_count_current ) {
                                                            $count_calendar = 0;
                                                            echo '<p>Não há eventos!</p>';
                                                        }
                                            -->
                                            <?php $contador++;?>
                                            <?php 
                                                endforeach; 
                                            ?>
                                            <!-- end loop -->
                                        </div>
                                    </div>
                        <!--   else : >
                                    <div class="swiper-slide flex-column justify-content-start align-items-start">
                                        <h6 class="l-calendar__title u-font-weight-black text-uppercase u-color-folk-primary">
                                            comemorações e memória:
                                        </h6>
                                        <p>
                                            Não tem comemorações e memória!
                                        </p>
                                    </div> -->
						<?php   else : ?>
                                    <div class="swiper-slide justify-content-start">
                                        <p class="u-color-folk-white">
                                            Não tem nenhum evento!
                                        </p>
                                    </div>
                        <?php   endif;
                             
                        ?>
                    </div>
                </div>
                <!-- end swiper -->
            </div>

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