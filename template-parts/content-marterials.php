<section>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">

                <!-- swiper -->
                <div class="swiper-container js-swiper-banner-materials">

                    <div class="swiper-wrapper">

                        <!-- slide -->
                        <?php
                            if( have_rows( 'banner_materials' ) ) :
                                while( have_rows( 'banner_materials' ) ) : the_row();
                        ?>
                                    <div class="swiper-slide">
                                        <a 
                                        href="<?php echo get_sub_field( 'link' ) ?>"
                                        <?php echo get_sub_field( 'abrir_em_uma_nova_guia' ) == 'Sim' ? 'target="_blank"' : '';?>>
                                            <img
                                            class="img-fluid w-100"
                                            src="<?php echo get_sub_field( 'imagem' ) ?>"
                                            alt="<?php the_title() ?>">
                                        </a>
                                    </div>
                        <?php
                                endwhile;
                            endif;
                        ?>
                        <!-- end slide -->
                    </div>
                </div>
                <!-- end swiper -->
            </div>
        </div>
    </div>
</section>