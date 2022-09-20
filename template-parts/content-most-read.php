<section class="l-most-read my-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12">

                <div class="col-10 col-lg-6 offset-1 mb-3">
                    <h3 class="c-title c-title__small l-most-read__title-line position-relative u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                        <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> <?php echo get_field( 'titulo_mais_lidas', 'option' ) ?>
                    </h3>
                </div>
            </div>

            <div class="col-11 col-md-9 mt-3">

                <div class="row">

                    <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'post_type'      => 'post',
                            'category_name'  => 'portal-pastoral-juvenil'
                        );

                        $most_read = new WP_Query( $args ); 

                        if( $most_read->have_posts() ) :
                            while( $most_read->have_posts() ) : $most_read->the_post();
                    ?>
                                <div class="col-md-4 l-most-read__post-item my-3 my-md-0">

                                    <a
                                    class="l-most-read__post-link before::u-bg-folk-green"
                                    href="<?php the_permalink() ?>">
                                        <h6 class="l-most-read__post-title u-font-weight-extrabold text-uppercase u-color-folk-green mb-0">
                                            <!-- // ensino -->
                                            // <?php the_title() ?>
                                        </h6>

                                        <p class="l-most-read__post-content u-font-weight-semibold mb-0">
                                            <!-- Celebrações marcam os 10 anos de AMJ em Santa 
                                            Catarina -->
                                            <?php echo(limit_words(get_the_excerpt(), 12)); ?>
                                        </p>
                                    </a>
                                </div>
                    <?php endwhile;
                        endif;
                        
                        wp_reset_query();
                    ?>

                    <!-- <div class="col-md-4 l-most-read__post-item my-3 my-md-0">

                        <a
                        class="l-most-read__post-link"
                        href="">
                            <h6 class="l-most-read__post-title u-font-weight-extrabold text-uppercase u-color-folk-blue mb-0">
                                // vocacional
                            </h6>

                            <p class="l-most-read__post-content u-font-weight-semibold mb-0">
                                Reitor-Mor envia 
                                mensagem aos Noviços Salesianos
                            </p>
                        </a>
                    </div>

                    <div class="col-md-4 l-most-read__post-item my-3 my-md-0">

                        <a
                        class="l-most-read__post-link"
                        href="">
                            <h6 class="l-most-read__post-title u-font-weight-extrabold text-uppercase u-color-folk-red mb-0">
                                // obras sociais
                            </h6>

                            <p class="l-most-read__post-content u-font-weight-semibold mb-0">
                                Instituto Dom Bosco 
                                entrega 507 cestas básicas e colhe relatos da comunidade
                            </p>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>