<section class="l-illustration mt-5 mb-4 pt-5 pb-4">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">
                        
                    
                        <?php $duration = 400;
                        
                        if(have_rows( 'imagens' )) :
                            while(have_rows( 'imagens' ) ) : the_row(); $duration = $duration + 200;
                        ?>
                         <div 
                                class="col-md-4 my-3 my-md-0"
                                data-aos="fade-up"
                                data-aos-duration="600"
                                data-aos-delay="400">
                                <a 
                                class="swiper-slide"
                                href="<?php echo get_sub_field( 'link_ilustra' ) ?>"<?php if (get_sub_field('nova_guia') == '1'): ?>
                                    target="_blank"
                                    <?php endif;?>>
                                    <img
                                    class="img-fluid"
                                    src="<?php echo get_sub_field( 'imagem_ilustra' ) ?>"
                                    alt="">
                                </a>
                                </div>
                        <?php endwhile;
                            endif;
                        ?>

                    <!-- <div 
                    class="col-md-4 my-3 my-md-0"
                    data-aos="fade-up"
                    data-aos-duration="600"
                    data-aos-delay="600">
                        <a
                        class="hover:u-opacity-8 d-block text-decoration-none"
                        href="#">
                            <img
                            class="img-fluid"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/illustration-image-2.png"
                            alt="">
                        </a>
                    </div>

                    <div 
                    class="col-md-4 my-3 my-md-0"
                    data-aos="fade-up"
                    data-aos-duration="600"
                    data-aos-delay="800">
                        <a
                        class="hover:u-opacity-8 d-block text-decoration-none"
                        href="#">
                            <img
                            class="img-fluid"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/illustration-image-3.png"
                            alt="">
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>